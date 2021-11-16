@extends('layouts.user_login')

@section('content')
    <div class="container ">
    <div class="row">
        <div class="d-flex justify-content-center">
        <div class="col-md-7 col-12">
            
                <div class="card" style="background-color:#0D0D66;" >
                    <div class="d-flex justify-content-center">
                        <img class="banner" src="{{ asset('images/header-white.png') }}" style="height: 40px;width:auto">
                    </div>
                   
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                  
                    @csrf
                    <div class="container mb-2">
                        <div class="row">
                            <div class="col-md-12 mt-3 text-white">
                                <h2 class="text-center" style="font-size: 3rem;">Login</h2>
                            </div>

                            <div class="col-md-10  mx-auto">
                                <label for="email" class="font-weight-bold float-left ml-2 mt-4 mb-3 text-white" style="font-size: 1.5rem;"> Username</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-10 mx-auto">
                                <label for="password" class="font-weight-bold float-left ml-2 mt-3 mb-3 text-white" style="font-size: 1.5rem;"> Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="d-grid gap-2 col-10 mx-auto mt-5">
                            <button type="submit" style="background-color:#DD0006" class="btn btn-lg btn-block text-white mt-3 mb-2 ">Log in</button>
                            </div>
                        </div>
                    </div>
                    </form>
                        <img class="imgbuttom mt-1" src="{{ asset('images/mubile_login.png') }}">
                </div>

        </div>
        </div>
    </div>
    </div>

@endsection
