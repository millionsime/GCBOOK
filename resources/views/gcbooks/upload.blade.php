@extends('layouts.app')

@section('content')
<h3 class="page-title">Upload Images that appear in your Year book</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-2 d-none d-lg-block "></div>
            <div class="col-lg-7"> 
            <div class="form-group">
        @if(session()->has('done'))
        <div class="alert alert-success">
            {{ session()->get('done') }}
        </div>
        @endif
    </div>
    <?php
    use App\Uploadpicture;
    $uploadedprof = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', "profile_picture")->first();
    $uploadedcov = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', "cover_picture")->first();
    $uploadedday = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', "day_picture")->first();
    $uploadedfav = Uploadpicture::where('user_id', Auth::user()->id)->where('pic_type', "favorite_picture")->first();
    ?>
            <div class="p-5 ml-7">
                <div class="row ml-5 ml-7">
                    <div class="row card shadow mr-5 h-100 py-2" style="width: 28%">
                        <div class="ml-2">
                            @if(!$uploadedprof)
                                <a href="{{ route('uploadprofpic') }}"><img width="100" height="100" class = "rounded ml-1" src="{{"/storage/pre_images/graduation-cap-1301194_640.png"}}" alt="Profile Image" /></a><br/>
                                <h6 class="ml-1">Profile Picture</h6>
                            @else
                                <a href="{{ route('updateprofile',$uploadedprof->id) }}"><img width="100" height="100" class = "rounded ml-1" src="{{ "/storage/$uploadedprof->image" }}" alt="Profile Image" /></a><br/>
                                <h6 class="ml-1">Profile Picture</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row card shadow ml-5 h-100 py-2" style="width: 28%">
                        <div class="center ml-2">
                            @if(!$uploadedcov)
                                <a href="{{ route('uploadcovpic') }}"><img width="100" height="100" class = "rounded ml-1" src="{{ "/storage/pre_images/cover.jpg" }}" alt="Cover Image" /></a><br/>
                                <h6 class="ml-1">Cover Picture</h6>
                            @else
                                <a href="{{ route('updatecover', $uploadedcov->id) }}"><img width="100" height="100" class = "rounded ml-1" src="{{ "/storage/$uploadedcov->image" }}" alt="Cover Image" /></a><br/>
                                <h6 class="ml-1">Cover Picture</h6>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider m-4" width="76%">
                <div class="row ml-5">     
                    <div class="row card shadow mr-5  h-100 py-2" style="width: 28%">
                        <div class="center ml-2">
                            @if(!$uploadedday)
                                <a href="{{ route('uploaddaypic') }}"><img width="100" height="100" class = "rounded mb-1" src="{{ "/storage/pre_images/days.jpg"  }}" alt="Cover Image" /></a><br/>
                                <h6 class="ml-1">Day Picture</h6>
                            @else
                                <a href="{{ route('updateday', $uploadedday->id) }}"><img width="100" height="100" class = "rounded mb-1" src="{{ "/storage/$uploadedday->image" }}" alt="Cover Image" /></a><br/>
                                <h6 class="ml-1">Day Picture</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row card ml-5 shadow h-100 py-2" style="width: 28%">
                        <div class="center ml-2" >
                            @if(!$uploadedfav)
                                <a href="{{ route('uploadfavpic') }}"><img width="100" height="100" class = "rounded mb-1" src="{{ "/storage/pre_images/favorite.png" }}" alt="Cover Image" /></a><br/>
                                <h6 class="ml-1">Favorite Picture</h6>
                            @else
                                <a href="{{ route('updatefavorite', $uploadedfav->id) }}"><img width="100" height="100" class = "rounded mb-1" src="{{ "/storage/$uploadedfav->image" }}" alt="Cover Image" /></a><br/>
                                <h6 class="ml-1">Favorite Picture</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
</div>
@stop

