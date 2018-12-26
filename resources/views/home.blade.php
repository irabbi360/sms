@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Sidebar</div>

                <div class="card-body">
                   <a href="">Students</a>
                </div>
                <div class="card-body">
                   <a href="">Staffs</a>
                </div>
                <div class="card-body">
                   <a href="">Class</a>
                </div>
                <div class="card-body">
                   <a href="">Department</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
