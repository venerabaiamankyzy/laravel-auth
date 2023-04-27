@extends('layouts.app')

@section('title', $project->id ? 'Modify Project' : 'Create project')
    
@section('actions')
<div class="d-flex justify-content-end my-4 mx-3">
  <a href="{{ route('admin.projects.index')}}" class="btn btn-success text-end mx-1">Back to list</a>
  
  @if ($project->id)
    <a 
      href="{{ route('admin.projects.show', $project)}}" class="btn btn-success text-end mx-1">Show project
    </a>
  @endif
</div>
@endsection

    
@section('content')

  @include('layouts.partials.errors')

  <section class="card py-2">
    <div class="card-body">
      @if ($project->id)
      <form 
        method="POST"
        action="{{ route('admin.projects.update', $project) }}"
        class="row gy-4 gx-5 p-4">
        @method('put')
        @else 
          <form action="{{ route('admin.projects.store')}}" enctype="multipart/form-data" method="POST" class="row gy-4 gx-5 ">
        @endif

        @csrf
        <div class="row m-3">
          <div class="col-md-2 text-end">
            <label for="title"  class="form-label me-4">Title</label>
          </div>

          <div class="col-md-10">
            <input 
            type="text" 
            class="form-control @error('title') is-invalid @enderror" 
            id="title" 
            name="title" 
            value="{{ old('title', $project->title)}}">

            @error('title')
              <div class="invalid-feedback">
                {{ $message}}
              </div>  
            @enderror
          </div>  
        </div>
          
        <div class="row mb-3">
          <div class="col-md-2 text-end">
            <label for="image" class="form-label me-4">Image</label>
          </div>
          
            <div class="col-8">
              
              <input 
                type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $project->image)}}"
              > 
              @error('image')
                <div class="invalid-feedback">
                  {{ $message}}
                </div>  
              @enderror
            </div>  

            <div class="col-2">
              <img src="{{ old('image', $project->image)}}" class="img-fluid" alt="">
            </div>
          
        </div>
            
        <div class="row m-3">
          <div class="col-md-2 text-end">
              <label for="text"  class="form-label me-4">Description</label>
          </div>
          <div class="col-md-10">
            <input type="text" 
              class="form-control @error('text') is-invalid @enderror" 
              id="text" 
              name="text" 
              value="{{ old('text', $project->text)}}">
            @error('text')
              <div class="invalid-feedback">
                {{ $message}}
              </div>  
            @enderror              
          </div>
        </div>    
            
        <div class="row m-3">
          <div class="col-md-2 text-end">
            <label for="link" class="form-label">Link</label>
          </div>
          <div class="col-md-10">
            <input type="text" 
              class="form-control @error('link') is-invalid @enderror" 
              id="link" 
              name="link" 
              value="{{ old('link', $project->link)}}">
            @error('link')
              <div class="invalid-feedback">
                {{ $message}}
              </div>  
            @enderror           
          </div>
        </div>  

        <div class="row">
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-outline-success ms-auto">Save</button>
          </div>    
        </div>
      </form>  
    </div>      
  </section>           
@endsection
     {{-- is-invalid - il bordino rosso       --}}
   
        
        
        
      
  