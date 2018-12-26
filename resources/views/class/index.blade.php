@extends('layouts.app')

@section('title','Classes')

    @section('content')

        <div class="card">
            <div class="card-body">
                Class List || <a href="{{ url('class/create') }}">Add Class</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as  $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->title }}</td>
                    <td>
                        <a href="{{ url('class/edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ url('class/delete', $data->id) }}" style="display: none">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                        </form>

                        <a href="" onclick="
                                if(confirm('Are you sure, You want to Delete this ??'))
                                {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $data->id }}').submit();
                                }
                                else {
                                event.preventDefault();
                                }">Delete
                        </a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

     @endsection