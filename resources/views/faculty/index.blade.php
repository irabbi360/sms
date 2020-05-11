@extends('layouts.app')

@section('title','Student List')

    @section('content')

        <div class="card">
            <div class="card-body">
                Faculty List || <a href="{{ route('faculties.create') }}">Add New</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Class</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($faculties->count() > 0)
                @foreach($faculties as  $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->first_name }}</td>
                    <td>{{ $data->last_name }}</td>
                    <td>{{ $data->phone_number }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->department_id }}</td>
                    <td>
                        <a href="{{ url('student/edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ url('student/delete', $data->id) }}" style="display: none">
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
                @else
                    <p>No data found!</p>
                @endif
                </tbody>
            </table>
                <!--paginate-->
                {{ $faculties->links() }}
            </div>
        </div>

     @endsection
