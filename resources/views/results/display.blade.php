@extends('layouts.app')

@section('content')
    @if (count($results) > 0)
    <h3 class="page-title">{{$exams->exam_name}}</h3>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
             <a href="{{ route('results.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                   
                        <th>Name</th>
                        <th>Id</th>
                        <th>Result</th>
                      
                    </tr>
                </thead>

                <tbody>
                    @if (count($results) > 0)
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->user->name}}</td>
                                <td>{{ $result->user->email}}</td>
                                <td>{{ $result->correct }}</td>
                               
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
