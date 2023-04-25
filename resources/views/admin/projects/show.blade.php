@extends('layouts.app')

@section('title', $project->title)
    
@section('content')
<div class="d-flex justify-content-end my-4 mx-3">
  <a href="{{ route('admin.projects.index')}}" class="btn btn-success text-end">Torna alla lista</a>
</div>

  <section class="card mx-3">
    {{-- @dump($project) --}}
    <figure class="clearfix py-3">
      <img src="{{ $project->image}}" alt="" width="300" class="float-start ms-4 me-4" >
      <figcaption class="px-5">{{ $project->title}}</figcaption>
      <p>{{ $project->slug}}</p>
      <p>{{ $project->slug}}</p>
      <p>{{ $project->link}}</p>
      <p>{{ $project->text}}</p>
  </figure>

    
  </section>
    
@endsection