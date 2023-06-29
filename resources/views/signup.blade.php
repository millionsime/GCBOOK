<!doctype html>
<html lang="en">

<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->

@include('layouts.landing_header')
    <body class="page page-home preload">
  {{-- @include('layouts.landing_nav') --}}
  <section class=".bg-light">
      <div class="full-screen -margin-bottom middle padding padding-top-tablet">
        <div class="row max-width-l">
          <div class="col-one-half middle">
            <div>
              <h1 class="hero">Model Exit Exam Assesment</h1>
              <a href = "www.mwu.edu.et" class="hero"><p class="lead">Madda Walabu University</p></a>
              <a href="{{ route('login') }}" class="button button-primary" role="button">{{ __('Login') }} </a>
            </div>
          </div> 
          <div class="col-one-half middle">
            {{-- //here --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were problems with input:
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($email))
    <div class="alert alert-warning alert-dismissible" role="alert">
        Halo <strong>{{$email}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">$times;</span>
        </button>
    </div>
    @endif
        <section class="row no-gutter reverse-order overlay-hero">
            <div class="middle">
              <div class="max-width-s">
                <h5>Welcome!</h5>
                <p class="paragraph">Enter your details to create an account.</p>
                {!! Form::open(['url'=>'show']) !!}
                <div class="form-group">
                  @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
                        <form method="POST" action="{{ route('show') }}">
                            @csrf
                
                            <div class="form-group">
                                <label for="email" class="form-group col-form-label text-md-end">{{ __('ID Number') }}</label>
                
                                <div class="form-group">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>
                
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- <div class="form-group">
                                <label for="password" class="form-group col-form-label text-md-end">{{ __('Password') }}</label>
                
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="password-confirm" class="form-group col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                 --}}
                            <div class="form-group">
                                <div class="form-group offset-md-4">
                                    <button type="submit" class="button button-primary full-width fa fa-chevron-right">
                                        {{ __('Next') }}
                                    </button>
                                </div>
                            </div>
                        </form>
              </div>
             
              <div class="center max-width-s">
                <span class="muted">Already have an account? </span><a href="{{ route('login') }}">Log In</a>
              </div> 
              <div class="center max-width-s space-top">
                <span class="muted"></span><a href="#"></a><span class="muted">.</span>
              </div>
            </div>
            
          
          <div class="row max-width-l">
            <div class="col-one-half middle">
          </div>
        </div>
      </div>
    </section>
  <script src="{{ asset('opal/js/main.js') }}"></script>
</body>

<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->
</html>