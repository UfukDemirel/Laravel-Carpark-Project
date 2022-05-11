@extends('Login.app')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <div align="center"><img src="/resources/images/favicon.png" height="100" alt="logo"></div>
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" action="{{route('registerpost')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="name" value="{{old('name')}}" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="surname" value="{{old('surname')}}" placeholder="Surname">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="email" value="{{old('email')}}" placeholder="E-Mail">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" value="{{old('password')}}" placeholder="Password">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check"></div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
