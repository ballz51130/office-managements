@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body text-center">
                    <a href="/login/admin" class="btn btn-primary mr-3"> Admin Login</a>
                    <a href="/login/user" class="btn btn-primary"> User Login </a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
         </div>
    </div>
</div>


@endsection
