@extends('layouts.app')

@section('content')
    <h3 class="page-title">Students</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Id</th>
                            <th>Name</th>
                                <th>section</th></tr>
                    <tr><td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->section }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('add_stud.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop