@extends('layouts.app')

@section('content')
    <h3 class="page-title">Apply for Gc Book</h3>
   

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block ">          
                    </div>
                <div class="col-lg-7"> 
                    
                    <div class="p-5">
                        <div class="form-group">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif
                        </div>
                        @if($gcbook_check)
                        <P class="text text-success">Request sent</P>
                        @else
                        <p>By sending request you will agree to pay 79,876.00 birr fee for to the gc comitte via your class representative!</p>
                    {!! Form::open(['method' => 'POST', 'route' => ['gcbook']]) !!}
                    {!! Form::submit("Request for Gc Book", ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                        @endif
                </div>
            </div>
        </div>
    </div>
    
    </div>
@stop

