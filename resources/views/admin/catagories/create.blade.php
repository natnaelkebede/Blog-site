@extends('layouts.app')

@section('content')

@include('includes.errors')
    <div class="panel-default">
        <div class="panel-heading">
            Create new catagory
        </div>
        <div class="panel-body">
            <form action="{{route('catagory.store')}}" method = "POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn-sm btn-success" type="submit">
                            Store catagory
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection