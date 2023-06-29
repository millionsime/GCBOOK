@extends('layouts.app')

@section('content')
    <h3 class="page-title">Reset Password</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($studs) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Section</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($studs) > 0)
                        @foreach ($studs as $users)
                            <tr data-entry-id="{{ $users->email }}">
                                <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                                <td>{{  $users->email }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->department->title }}</td>
                                <td>{{ $users->section }}</td>
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['welcome.destroy', $users->id])) !!}
                                    {!! Form::submit('Reset', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('roles.mass_destroy') }}';
    </script>
@endsection