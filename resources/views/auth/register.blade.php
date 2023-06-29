<!doctype html>
<html lang="en">

<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->

@include('layouts.landing_header')
    <body class="page page-home preload">
  @include('layouts.landing_nav')
    <section class=" center-tablet overlay-hero">
      <div class="full-screen -margin-bottom middle padding padding-top-tablet">
        <div class="row max-width-l">
          <div class="col-one-half middle">
            <div>
              <h1 class="hero">Pass All Ethiopian Exit Exams</h1>
              <p class="lead">Advanced, Orignal and well Organised Exit exam Questions.</p>
              <a href="{{ route('question') }}" class="button button-primary space-top" role="button">Get Started</a>
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
        <section class="row no-gutter reverse-order">
            <div class="middle">
              <div class="max-width-s">
                <h5>Welcome!</h5>
                <p class="paragraph">Enter your details to create an account.</p>
                {!! Form::open(['url'=>'save']) !!}
                <div class="form-group">
                        <form method="POST" action="{{ route('save') }}">
                            @csrf
                
                            <div class="form-group">
                                <label for="name" class="form-group col-form-label text-md-end">{{ __('Name') }}</label>
                
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="email" class="form-group col-form-label text-md-end">{{ __('Email Address') }}</label>
                
                                <div class="form-group">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="department" class="form-group col-form-label text-md-end">{{ __('Department') }}</label>
                              <div class="form-group">
                                  <select id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>
                                    @foreach($departments as $department) 
                                <option value= "{{ $department->id }}"> {{ $department->title }} </option>
                                    @endforeach
                                </select>
                                  @error('department')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                            <div class="form-group">
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
                
                            <div class="form-group">
                                <div class="form-group offset-md-4">
                                    <button type="submit" class="button button-primary full-width">
                                        {{ __('save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
              </div>
              <div class="center max-width-s space-top">
                <span class="muted">By creating an account, you agree to our </span><a href="#">Terms</a><span class="muted">.</span>
              </div>
              <div class="center max-width-s">
                <span class="muted">Already have an account? </span><a href="{{ route('home') }}">Log In</a>
              </div>
            </div>
          </section>
      
          </div>
        </div>
      </div>
      <div class="padding">
        <div class="row margin-bottom max-width-l">
          <div class="col-one-half middle">
            <h3>For Every Department</h3>
            <p class="paragraph">Get ready and test your performance.</p>
          </div>
          <div class="col-one-half">
            {{-- yetachnyaw --}}
            <img class="rounded shadow-l" src="{{ asset('opal/media/content/editor.png') }}" srcset="{{ asset('opal/media/content/editor.png 1x, opal/media/content/editor@2x.png 2x')}}" alt="Editor">
          </div>
        </div>
        <div class="row max-width-l reverse-order">
          <div class="col-one-half">
            {{-- the middle one --}}
            <img class="rounded shadow-l" src="{{ asset('opal/media/content/sketch.png') }}" srcset="{{ asset('opal/media/content/sketch.png 1x, opal/media/content/sketch@2x.png 2x')}}" alt="Sketch">
          </div>
          <div class="col-one-half middle">
            <h3>Prepared By</h3>
            <p class="paragraph">Doctors, Assistant professors and Lecturer Form the University.</p>
          </div>
        </div>
      </div>
    </section>
  <script src="{{ asset('opal/js/main.js') }}"></script>
</body>

<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->
</html>