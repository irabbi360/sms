@extends('layouts.app')

@section('title','Update Student')
`
@section('content')

    <div class="card">
        <div class="card-header">Update Student #{{ $data->id }}</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ url('student/update',$data->id) }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $data->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="father_name" class="col-md-4 col-form-label text-md-right">Father's Name</label>

                    <div class="col-md-6">
                        <input id="father_name" type="text" class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" name="father_name" value="{{ $data->father_name }}" required>

                        @if ($errors->has('father_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('father_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mother_name" class="col-md-4 col-form-label text-md-right">Mother's Name</label>

                    <div class="col-md-6">
                        <input id="mother_name" type="text" class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" value="{{ $data->mother_name }}" required>

                        @if ($errors->has('mother_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mother_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $data->phone_number }}" required>

                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="home_number" class="col-md-4 col-form-label text-md-right">Home Nnumber</label>

                    <div class="col-md-6">
                        <input id="home_number" type="text" class="form-control{{ $errors->has('home_number') ? ' is-invalid' : '' }}" name="home_number" value="{{ $data->home_number }}" required>

                        @if ($errors->has('home_number'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('home_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $data->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Present Address</label>

                    <div class="col-md-6">
                        <input id="present_address" type="text" class="form-control{{ $errors->has('present_address') ? ' is-invalid' : '' }}" name="present_address" value="{{ $data->present_address }}" required>

                        @if ($errors->has('present_address'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('present_address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Permanent Address</label>

                    <div class="col-md-6">
                        <input id="permanent_address" type="text" class="form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" name="permanent_address" value="{{ $data->permanent_address }}" required>

                        @if ($errors->has('permanent_address'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('permanent_address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>

                    <div class="col-md-6">
                        <select class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $data->department_id == $department->id ? 'selected' : '' }}>{{ $department->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('department_id'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('department_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="classes_id" class="col-md-4 col-form-label text-md-right">Class</label>

                    <div class="col-md-6">
                        <select class="form-control{{ $errors->has('classes_id') ? ' is-invalid' : '' }}" name="classes_id" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ $data->classes_id == $class->id ? 'selected' : '' }}>{{ $class->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('classes_id'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('classes_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="roll" class="col-md-4 col-form-label text-md-right">Roll</label>

                    <div class="col-md-6">
                        <input id="roll" type="text" class="form-control{{ $errors->has('roll') ? ' is-invalid' : '' }}" name="roll" value="{{ $data->roll }}" required>

                        @if ($errors->has('roll'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('roll') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="roll" class="col-md-4 col-form-label text-md-right">Reg_id</label>

                    <div class="col-md-6">
                        <input id="reg_id" type="text" class="form-control{{ $errors->has('reg_id') ? ' is-invalid' : '' }}" name="reg_id" value="{{ $data->reg_id }}" readonly required>

                        @if ($errors->has('reg_id'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('reg_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection