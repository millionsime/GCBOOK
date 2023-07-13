@extends('layouts.app')

@section('content')

<h3 class="page-title">Admin Well-come to View requests pages</h3>
    
    <div class="panel panel-default">

        <div class="panel-body">
                    @if (count($repapprequest) > 0)
                    <div class="panel-heading">
                        @lang('quickadmin.list')
                    </div>
                    <table class="table table-bordered table-striped {{ count($repapprequest) > 0 ? 'datatable' : '' }} dt-select">
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
                        @foreach ($repapprequest as $users)
                            <tr data-entry-id="{{ $users->user_id }}">
                                <th  style="text-align:center;"><input type="checkbox" id="select-all" ></th>
                                <td>{{ $users->realuser->email }}</td>
                                <td>{{ $users->realuser->name }}</td>
                                <td>{{ $users->department->title }}</td>
                                <td>
                                    @if($users->status == 1 )
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'POST',
                                            'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                            'route' => ['adminupdatereq', $users->id])) !!}
                                        {!! Form::submit(trans('Approve'), array('class' => 'btn btn-xs btn-info')) !!}
                                        {!! Form::close() !!}
                                    @elseif($users->status == 2)
                                        <p class="btn btn-xs btn-warning">@lang('Approved')</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            @else
                <div class="text text-danger">
                    <td colspan="3">@lang('NO new request for GC book approved by Representatives !!!')</td>
                </div>
            @endif
        </div>
    </div>

@stop