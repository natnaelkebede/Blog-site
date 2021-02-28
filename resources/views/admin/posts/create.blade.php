@extends('layouts.app')

@section('content')

@include('includes.errors')
    <div class="panel-default">
        <div class="panel-heading">
            Create new post
        </div>
        <div class="panel-body">
            <form action="{{route('post.store')}}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Feature</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="catagory">Catagory</label>
                    <select name="catagory" id="catagory_id">
                        @foreach ($catagories as $catagory)
                            <option value="{{$catagory->id}}"> {{$catagory->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <textarea name="content" id="content" cols="50" rows="5" class="form-content"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn-sm btn-success" type="submit">
                            Store a post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection