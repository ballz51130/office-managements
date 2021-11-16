@extends('layouts.login')

@section('content')
@include('sweetalert::alert')
@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-sm-8">
        <img class="banner" src="{{ asset('images/login.png') }}">
    </div>
    <div class="col-sm-4">
        <div class="login-form" style="background-color:#4658C9">
            <center><img class="header mt-5" src="{{ asset('images/header-white-2.png') }}" height="70px" width="auto"></center>

            <p class="text-center mt-5" style="color: #FBFBFD; font-size:2rem;">Welcome!</p>
            <p class="text-center" style="color: #c6c6dd; font-size:1.2rem;">Sign in to your account</p>
            @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        @csrf

               <div class="form-group">
                  <h5><label class="float-left" style="color:#FBFBFD; font-size:1.2rem;"><i class="fas fa-user"></i> Username</label></h5>
                  <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?: 'admin@gmail.com' }}" required autocomplete="email" autofocus>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
               </div>

               <div class="form-group">
                <h5><label class="form-password float-left" style="color:#FBFBFD; font-size:1.2rem;"><i class="fas fa-lock"></i> Password</label></h5>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="12345678" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
               </div>

              <button type="submit" style="background-color:#E33249;" class="btn btn-md btn-block text-white"><i class="fas fa-sign-in-alt"></i> Login</button>
            </form>
         </div>
    </div>
</div>


@endsection
