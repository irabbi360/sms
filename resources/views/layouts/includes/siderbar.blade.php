<div class="col-md-3">
    <div class="card">
        <div class="card-header">Sidebar</div>
        <div class="card-body">
            <a href="{{ url('departments') }}">Departments</a>
        </div>
        <div class="card-body">
            <a href="{{ route('faculties.index') }}">Faculties</a>
        </div>
        <div class="card-body">
            <a href="{{ url('classes') }}">Class</a>
        </div>
        <div class="card-body">
            <a href="{{ url('students') }}">Students</a>
        </div>
    </div>
</div>

{{--
<ul class="list-group">
    <li class="list-group-item active">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Morbi leo risus</li>
    <li class="list-group-item">Porta ac consectetur ac</li>
    <li class="list-group-item">Vestibulum at eros</li>
</ul>--}}
