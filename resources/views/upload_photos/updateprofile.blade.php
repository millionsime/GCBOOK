@extends('layouts.app')

@section('content')
<h3 class="page-title">Update Images that appear in your Year book</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-2 d-none d-lg-block "></div>
            <div class="col-lg-7"> 
            <div class="form-group">
    </div>
                <div class="p-5">
                  
                    {!! Form::open(['method' => 'POST', 'route' => ['imagesupdate',$images->id], 'enctype'=>'multipart/form-data']) !!} 
                                      @csrf()
                        <div class="row no-gutters align-items-center">
                        </div>
                        <div class="row no-gutters align-items-center">         
                       </div>
                       <div class="row no-gutters align-items-center">  
                        <table>
                        <tr>
                            <td>
                                <div class="row mr-2">   
                                <img width="45" height="45" class = "rounded ml-1" src="{{ "/storage/$images->image" }}" alt="Profile Image" />
                                </div> 
                            </td> 
                            <td>  
                                <div class="col-lg-7 mr-2">
                                    {!! Form::label('profiles', ' Select profile picture*', ['class' => 'control-label fa fa-upload']) !!}
                                    <input type="file" name = "image" class="form-control"/>
                                    <p class="help-block"></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                {{ Form::hidden('type', $images->pic_type) }}
                                <div class="col-lg-5">
                                {!! Form::label('access', ' Visible for*', ['class' => 'control-label fa fa-edit']) !!}
                                    <select name="visible" class="form-control">
                                    <option value= "1">Everyone</option>
                                    <option value= "2">Only Me</option>
                                    <option value= "3">My Class Mates</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        </table>
                   </div>
                   <div class="row no-gutters align-items-center">         
               </div>
                            
                </div>
            </div>
        </div>
    </div> 
    {!! Form::submit(trans('Update'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@stop

