@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <table class="table-hover">
            <thead>
                <th>
                    Catagory
                </th>
                <th>
                    Editing
                </th>
                <th>
                    deleting
            </thead>
            <tbody>
                @foreach ($catagories as $catagory)
                    <tr>
                        <td>
                            {{$catagory->name}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection