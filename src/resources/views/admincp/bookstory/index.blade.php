@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Book Story') }}</div>
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
                            <th scope="col">Name Book Story</th>
                            <th scope="col">Description Book Story</th>
                            <th scope="col">Slug Book Story</th>
                            <th scope="col">Categories Book Story</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($bookstories as $key => $bookstory)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$bookstory->namebookstory}}</td>
                                <td>{{$bookstory->descriptionbookstory}}</td>
                                <td>{{$bookstory->slug_bookstory}}</td>
                                <td>{{$bookstory->categories_id}}</td>
                                <td>
                                    @if($bookstory->active == 0)
                                    <span class="text text-success">Active</span>
                                    @else
                                    <span class="text text-danger">No Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('bookstory.edit',[$bookstory->id])}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('bookstory.destroy',[$bookstory->id])}}" method="POST">
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