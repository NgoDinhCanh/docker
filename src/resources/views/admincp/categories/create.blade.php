@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Categories') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('categories.store')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name Category</label>
                          <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="slug" name="namecategory"
                          aria-describedby="emailHelp" placeholder="Name Category..." value="{{old('namecategory')}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Category</label>
                            <input type="text" class="form-control" id="convert_slug" name="slug_category"
                            aria-describedby="emailHelp" placeholder="Slug Category..." value="{{old('slug_category')}}">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Describe Category</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="describecategory"
                            aria-describedby="emailHelp" placeholder="Describe Category..." value="{{old('describecategory')}}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" >Active</label>
                            <select class="form-select" name="active" aria-label="Default select example" class="form-control">
                                <option selected value="0">Active</option>
                                <option value="1">No Active</option>
                              </select>
                          </div>
                        <button type="submit" name="addcategory" class="btn btn-primary">Add Category</button>
                      </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
