<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('term')) {
            $term = $request->get('term');
            $projects = Project::where('title', 'LIKE', "%$term%")->paginate(8)->withQueryString();
        }else {
             $projects = Project::orderBy('updated_at', 'DESC')->paginate(8);
        }
       
        return view('admin.projects.index', compact('projects'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $project = new Project;
        $project->fill($request->all());
        $project->slug = Project::generateSlug($project->title);
        // $project->slug = $project->id . '-' . Str::of($project->title)->slug('-');
        $project->save();

        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // $project->update($request->all()); // riempe e salva
        $project->fill($request->all()); // solo riempe senza salvare
        $project->slug = Project::generateSlug($project->title);
        $project->save();

        return to_route('admin.projects.show', $project); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $project = Project::findOrFail($id);
        $project->delete();

        return to_route('admin.projects.index');        
        // return redirect()->route('admin.projects.index');
    }
} 