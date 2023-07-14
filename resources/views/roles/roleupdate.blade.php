@extends('layouts.app')

@section('content')

<h3 class="page-title">Well-come to Manage Previlage Page</h3>
    
    <div class="panel panel-default">

        <div class="panel-body">
                    @if (count($stud) > 0)
                    <div class="panel-heading">
                        @lang('quickadmin.list')
                    </div>
                    <table class="table table-bordered table-striped {{ count($stud) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                            <tr>
                                <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($stud as $users)
                            <tr data-entry-id="{{ $users->user_id }}">
                                <th  style="text-align:center;"><input type="checkbox" id="select-all" ></th>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->department->title }}</td>
                                <td>
                                    @if($users->role_id == 2 )
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'post',
                                            'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                            'route' => ['updatechange', $users->id])) !!}
                                            <input type="hidden" name="dept_id" value="{{$users->department->id}}" class="form-control text text-danger">
                                        {!! Form::submit(trans('Change To Represenative'), array('class' => 'btn btn-xs btn-info')) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            @else
                <div class="text text-danger">
                    <td colspan="3">@lang('No Student Registered for this Department !!!')</td>
                </div>
            @endif
        </div>
    </div>

@stop