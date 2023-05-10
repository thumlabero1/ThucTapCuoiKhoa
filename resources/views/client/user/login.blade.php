@extends('client.main')
@section('content')
    <div class="container p-t-50 p-b-50">
        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <h3 class="p-b-30">Đăng Nhập</h3>
                @include('client.alert')
                <form action="{{ route('login.store') }}" method="post">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email') }}" type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu:</label>
                        <input type="password" name="password" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <p style="display: inline-flex">
                            <input type="checkbox" name="remember">
                            <span class="m-l-15">Remember me</span>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="captcha">Captcha</label>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <a href="/register">Chưa có tài khoản?</a>
                    </div>
                    <hr />
                    <ul class="btn-login list_none text-center">
                        <li>Đăng nhập với <a href="{{ route('google.login') }}" class="btn btn-danger"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-google" viewBox="0 0 16 16">
                                    <path
                                        d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                </svg> Google</a></li>
                    </ul>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
