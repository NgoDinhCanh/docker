@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Categories') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name Category</th>
                            <th scope="col">Describe Category</th>
                            <th scope="col">Slug Category</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$category->namecategory}}</td>
                                <td>{{$category->describecategory}}</td>
                                <td>{{$category->slug_category}}</td>
                                <td>
                                    @if($category->active == 0)
                                    <span class="text text-success">Active</span>
                                    @else
                                    <span class="text text-danger">No Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('categories.edit',[$category->id])}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('categories.destroy',[$category->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Do you want to delete category ?')" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection