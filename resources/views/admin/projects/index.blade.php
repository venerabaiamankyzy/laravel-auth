@extends('layouts.app')

@section('title', 'Projects')

@section('actions')
<div>
  <a href="{{ route('admin.projects.create')}}" type="button" class="btn btn-outline-success ms-auto">Crea track</a>
</div>

@endsection

@section('content')
<section class="">    
  <div class="row my-5"> 
    <form class="d-flex mb-5" role="search">
      <input class="form-control me-sm-2" type="search" name="term" placeholder="Search">
      <button class="btn btn-outline-success my-0" type="submit">Search</button>
    </form>   
      <table class="table table-striped table-hover p-4 ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            {{-- <th scope="col">Slug</th> --}}
            <th scope="col">Image</th>
            <th scope="col">Text</th>
            <th scope="col">Link</th>
            <th scope="col">Action</th>
          </tr>
          </tr>
        </thead>
        <tbody>
          @forelse ($projects as $project)
          <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{ $project->title }}</td>
            {{-- <td>{{ $project->slug }}</td> --}}
            <td>{{ $project->image }}</td>
            <td>{{ $project->getAbstract() }}</td>
            <td>{{ $project->link }}</td>
            <td class="action-cell">
              <a href="{{route('admin.projects.show', $project)}}"><i class="bi bi-eye"></i></a>
              {{-- <td><a href="{{route('projects.show', ['project'=$project->id])}}"><i class="bi bi-eye"></i></a></td> --}}

              <a href="{{ route('admin.projects.edit', $project)}}"><i class="bi bi-pencil"></i></a>

              <button class="bi bi-trash3 text-danger btn-icon" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $project->id }}"></button> 
              
            </td>   
          </tr>   
          @empty  
          @endforelse 
        </tbody>
      </table>     
    {{ $projects->links('')}}    
   
</section>
 
@endsection

@section('modals')
  @forelse ($projects as $project)
    <!-- Modal -->
    <div class="modal modal-lg fade" id="delete-modal-{{ $project->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $project->id }}" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            Sei sicuro di voler eliminare il progetto "{{ $project->title }}" con ID "{{ $project->id }}"? <br>
            L'operazione non è reversibile.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            
            <form action="{{ route('admin.projects.destroy', $project)}}" method="POST">
                @method('delete')
                @csrf 
                
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @empty  
  @endforelse
@endsection
    
        
     
    
  
   
