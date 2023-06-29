<!doctype html>
<html lang="en">

<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->

@include('layouts.landing_header')
    <body class="page page-home preload overlay-hero">
  {{-- @include('layouts.landing_nav') --}}
    <section class=" center-tablet">
      <div class="full-screen -margin-bottom middle padding padding-top-tablet">
        <div class="row max-width-l">
          <div class="col-one-half middle">
            <div>
              <h1 class="hero">Model Exit Exam Assesment</h1>
              <a href = "www.mwu.edu.et"><p class="lead">Madda Walabu University</p></a>
          <a  href="{{ route('signup') }}" class="button button-primary space-top" role="button">{{ __('Register') }} </a>
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
            <form role="form"
            method="POST"
            action="{{ url('login') }}">
          <input type="hidden"
                 name="_token"
                 value="{{ csrf_token() }}">
              <div class="form-group">
                @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
                <label for="email">Email:</label>
                <input id="email" type="email" name="email"
                class="form-control"
                                       value="{{ old('email') }}"
                >
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" type="password"
                                       class="form-control"
                                       name="password">
                                       {{-- {{ route('auth.password.reset') }} --}}
                                       <a href="#" class="form-help">Forgot password</a>
              </div>
              <div class="form-group">
                <input id="remember-me" type="checkbox" name="remember-me">
                <label for="remember-me" name="remember" class="checkbox">Remember Me</label>
              </div>
              <button type="submit"
              class="button button-primary full-width" role="button">
               Login
              </button> 
            </form>
          </div>
        </div>
      </div>
      <div class="padding">
        
      </div>
    </section>
    {{-- @include('modal') --}}
  <script src="{{ asset('opal/js/main.js') }}"></script>
</body>

<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->
</html>

<!doctype html>
<html lang="en">
