@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Book Story') }}</div>
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
                    <form method="POST" action="{{route('bookstory.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name Book Story</label>
                          <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="slug" name="namebookstory"
                          aria-describedby="emailHelp" placeholder="Name Book Story..." value="{{old('namebookstory')}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Book Story</label>
                            <input type="text" class="form-control" id="convert_slug" name="slug_bookstory"
                            aria-describedby="emailHelp" placeholder="Slug Book Story..." value="{{old('slug_bookstory')}}">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description Book Story</label>
                            <textarea class="form-control" rows="5" style="resize: none" name="descriptionbookstory" placeholder="Description Book Story..."></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" >List Book Story</label>
                            <select class="form-select" name="listbookstory" aria-label="Default select example" class="form-control">
                                @foreach($categories as $key => $category)
                                    <option  value="{{$category->id}}">{{$category->namecategory}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image Book Story</label>
                            <input type="file" class="form-control-file"  name="imagebookstory">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" >Active</label>
                            <select class="form-select" name="active" aria-label="Default select example" class="form-control">
                                <option selected value="0">Active</option>
                                <option value="1">No Active</option>
                              </select>
                          </div>
                        <button type="submit" name="addbookstory" class="btn btn-primary">Add Book Story</button>
                      </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
