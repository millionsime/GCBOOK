<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- Page level plugin CSS-->
 
 <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
</head>

<body class="page-header-fixed">

    {!! Form::open(['method' => 'GET', 'route' => ['welcome.show', $departments->id]]) !!} 

<div class="panel panel-default">
    <div class="panel-heading">
            @lang('Select Your Department')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <select name="department"  id="" class="form-control">
                        @foreach($departments as $department) 
                    <option value= "{{ $department->id }}"> {{ $department->title }} </option>
                        @endforeach
                    </select>
                    {!! Form::submit(trans('Go'), ['class' => 'btn btn-save']) !!}
                    {!! Form::close() !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>   
    </div>
</div>

   

</body>
</html>
