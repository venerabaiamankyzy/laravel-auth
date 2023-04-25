@extends('layouts.app')

@section('title', 'Crea nuovo progetto')
    
@section('actions')
<div class="d-flex justify-content-end my-4 mx-3">
  <a href="{{ route('admin.projects.index')}}" class="btn btn-success text-end">Torna alla lista</a>
</div>
@endsection

    
@section('content')
  <section class="card">
    <div class="card-body">
     
      <form action="{{ route('admin.projects.store')}}" method="POST" class="row gy-4 gx-5 ">
        @csrf
        <div class="col-6">
          <label for="title"  class="form-label me-4">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')}}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message}}
          </div>  
          @enderror
        </div>

        <div class="col-6">
          <label for="image"  class="form-label me-4">Image</label>
          <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image')}}"> 
          @error('image')
          <div class="invalid-feedback">
            {{ $message}}
          </div>  
          @enderror
        </div>  
      
        <div class="col-6">
          <label for="text"  class="form-label me-4">Description</label>
          <input type="text" class="form-control @error('text') is-invalid @enderror" id="text" name="text" value="{{ old('text')}}">
          @error('text')
          <div class="invalid-feedback">
            {{ $message}}
          </div>  
          @enderror
        </div>
        
        <div class="col-6">
          <label for="link"  class="form-label me-4">Link</label>
          <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link')}}">
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
  </section>
@endsection
        
         
        
        
        
      
  