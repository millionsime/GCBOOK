
<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->

@include('layouts.landing_header')
    <body class="page page-home preload">
  {{-- @include('layouts.landing_nav') --}}
  <section class=".bg-light">
      <div class="full-screen -margin-bottom middle padding padding-top-tablet">
        <div class="row max-width-l">
          <div class="col-one-half middle">
            <div class="mb-5">
           
              <h1 class="hero" align="center">Congratulation!</h1>
            </div>
            <div class="mb-3">
              <h1 class="hero mt-3">Wel-Come to GC Book</h1>
              <h6 class="hero" align="center"><b>Please login to Request for GC Book</b></h6>
              
    
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
                @csrf <!-- {{ csrf_field() }} -->
          <input type="hidden"
                 name="_token"
                 value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="email">Id/Email:</label>
                <input id="email" autofocus type="text" name="email"
                class="form-control"
                value="{{ old('email') }}">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input id="password"  type="password"
                                       class="form-control"
                                       name="password">
                                       {{-- {{ route('auth.password.reset') }} --}}
                                       
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
        <div class="row margin-bottom max-width-l">
          <div class="col-one-half middle">
            {{-- <h3>Excelece</h3>
            <p class="paragraph">Get ready and test your performance.</p> --}}
          </div>
          <div class="col-one-half">
            {{-- yetachnyaw --}}
            {{-- <img class="rounded shadow-l" src="{{ asset('opal/media/fa.jpg') }}" srcset="{{ asset('opal/media/bg/mwu.jpg 1x, opal/media/bg/mwu@2x.jpg 2x')}}" alt="Editor"> --}}
          </div>
        </div>
        <div class="row max-width-l reverse-order">
          <div class="col-one-half">
            {{-- the middle one --}}
            {{-- <img class="rounded shadow-l" src="{{ asset('opal/media/bg/mwu.jpg') }}" srcset="{{ asset('opal/media/bg/mwu.jpg 1x, opal/media/bg/mwu@2x.jpg 2x')}}" alt="Editor"> --}}
          </div>

        </div>
      </div>
    </section>
    {{-- @include('modal') --}}
  <script src="{{ asset('opal/js/main.js') }}"></script>
</body>

<!-- Mirrored from preview.uiuxassets.com/opalin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 08:59:08 GMT -->
</html>