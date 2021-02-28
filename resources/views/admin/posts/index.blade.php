@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <table class="table-hover">
            <thead>
                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>

            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        
                            <td>Image</td>
                            <td><img src="{{$post->fearured}} " alt="$posts->title" width="50px" height="50px"></td>
                            <td>Edit</td>
                            <td>
                                <a href="{{route('post.delete')}} " class="btn btn-danger">Trash</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection