@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            Total Student: {{ $student }}<br>
                Department
                @foreach($departments as $department)
                    <li>{{ $department->title }} - {{ $department->student_count }}</li>
                @endforeach
                <br>
            Class:
            @foreach($classes as $class)
                    <li>{{ $class->title }} - {{ $class->student_count }}</li>
                @endforeach

        </div>
    </div>
@endsection
