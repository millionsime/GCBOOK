@extends('layouts.app')

@section('content')
    <h3 class="page-title">Colleges</h3>

    <p>
        <a href="{{ route('colleges.create') }}" class="btn btn-primary"> Add New College</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($colleges) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"></th>
                        <th>@lang('quickadmin.roles.fields.title')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($colleges) > 0)
                        @foreach ($colleges as $college)
                            <tr data-entry-id="{{ $college->id }}">
                                <td></td>
                                <td>{{ $college->title }}</td>
                                <td>
                                    <a href="{{ route('colleges.show',[$college->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('colleges.edit',[$college->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                  
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