@extends('layouts.app')

@section('page-name', 'Modifica project '  .$project->title)

@section('actions')
<div class="d-flex justify-content-end my-4 mx-3">
  <a href="{{ route('admin.projects.index')}}" class="btn btn-success text-end">Torna alla lista</a>
</div>
@endsection

@section('content')
  {{-- @dump($project) --}}

  @include('layouts.partials.errors')

  @section('actions')
<div class="d-flex justify-content-end my-4 mx-3">
  <a href="{{ route('admin.projects.index')}}" class="btn btn-success text-end">Torna alla lista</a>
</div>
@endsection
<div class="card ">
  <form 
  action="{{ route('admin.projects.update', $project) }}" method="POST" 
  class="row gy-4 gx-5 p-4">
  @csrf
  @method('PUT')

  <div class="col-4">
    <label for="title"  class="form-label me-4">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $project->title}}">
    @error('title')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>

  <div class="col-4">
    <label for="slug"  class="form-label me-4">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') ?? $project->slug}}">
    @error('slug')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>

  <div class="col-4">
    <label for="image"  class="form-label me-4">Image</label>
    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') ?? $project->image}}"> 
    @error('image')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div> 
  
  <div class="col-4">
    <label for="text"  class="form-label me-4">Description</label>
    <input type="text" class="form-control @error('text') is-invalid @enderror" id="text" name="text" value="{{ old('text') ?? $project->text}}">
    @error('text')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div>

  <div class="col-4">
    <label for="link"  class="form-label me-4">Link</label>
    <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') ?? $project->link}}">
    @error('link')
    <div class="invalid-feedback">
      {{ $message}}
    </div>  
    @enderror
  </div> 

  <div class="col-12">
    <button type="submit" class="btn btn-outline-success ms-auto">Salva</button>
  </div>
</form>
</div>

@endsection  