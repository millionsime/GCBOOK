@extends('layouts.app')

@section('content')

<h3 class="page-title">Please Select Department to assign Represenative</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block "></div>
            <div class="col-lg-7"> 
                <div class="form-group">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                </div>
                <div class="p-5">
                  
                    {!! Form::open(['method' => 'POST', 'route' => ['updaterole']]) !!} 
                                      @csrf()
                             {!! Form::label('Section', 'Department*', ['class' => 'control-label fa']) !!}
                        <select name="dept"  id="" class="form-control">
                            @foreach ($dept as $users)
                                <option value= {{$users->id}}>{{$users->title}}</option>
                            @endforeach
    
                           
                        </select>
                </div>
            </div>
        </div>
    </div> 
    {!! Form::submit(trans('Next'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
</div>
    
@stop

