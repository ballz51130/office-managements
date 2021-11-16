@extends('layouts.login')

@section('content')

            <div class="login-form col-4 float-right">
                <h1 class="text-center"><b style="color:#000066">Log</b> <b style="color:#3333CC">in</b></h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                   <div class="form-group">
                      <h5><label style="color:#000066">Username</label></h5>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                   </div>
                   <div class="form-group">
                    <h5><label style="color:#000066">Password</label></h5>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   </div>

                  <button type="submit" style="background-color:#FF6666" class="btn btn-lg btn-block text-white">Log in</button>
                </form>
             </div>
     
@endsection
