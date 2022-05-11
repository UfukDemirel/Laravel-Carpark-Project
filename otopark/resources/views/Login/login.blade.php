@extends('Login.app')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <div align="center"><img src="/resources/images/logo.svg" height="100" alt="logo"></div>
                        </div>
                        <div align="center">
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                        </div>
                        <form class="pt-3" action="{{route('loginpost')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="email" value="{{old('email')}}" placeholder="@gmail.com">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" name="password" value="{{old('password')}}" placeholder="Password">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check"></div>
                                <a href="{{route('forget.password.get')}}" class="auth-link text-black">Forgot password?</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
