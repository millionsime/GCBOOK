@extends('layouts.app')

@section('content')
    <h3 class="page-title">My Profilet</h3>

    <div class="form-group">
        @if(session()->has('done'))
        <div class="alert alert-success">
            {{ session()->get('done') }}
        </div>
        @endif
    </div>
    <div class="panel panel-default">
       

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                @if (count($users) > 0)
                        @foreach ($users as $users)  
                <tr>
                    <td>Name</td>
                    <td>{{ $users->name }}</td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>{{ $users->department->title }}</td>
                </tr>
                 <tr>
                    <td>Email</td>
                    <td>{{ $users->email }}</td>
                </tr>
               
                <tr>
                    <td><a href="{{ route('profiles.edit',[$users->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a></td>
                </tr>
               
                @endforeach 
                @endif
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('roles.mass_destroy') }}';
    </script>
@endsection