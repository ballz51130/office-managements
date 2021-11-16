@extends('layouts.login')

@section('content')

            <div class="login-form col-4 float-right">
                <h1 class="text-center"><b style="color:#000066">Log</b> <b style="color:#3333CC">in</b></h1>
                <form>
                   <div class="form-group">
                      <h5><label style="color:#000066">Username</label></h5>
                      <input type="text" class="form-control" placeholder="User Name">
                   </div>
                   <div class="form-group">
                    <h5><label style="color:#000066">Password</label></h5>
                      <input type="password" class="form-control" placeholder="Password">
                   </div>

                  <button type="submit" style="background-color:#FF6666" class="btn btn-lg btn-block text-white">Log in</button>

                </form>
             </div>

@endsection
