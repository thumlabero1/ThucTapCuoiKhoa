@extends('client.main')
@section('content')
    <div class="container p-t-50 p-b-50">
        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <h3 class="p-b-30">Đăng Ký</h3>
                @include('client.alert')
                <form action="/register" method="post">
                    <div class="form-group">
                        <label for="name">Họ tên: </label>
                        <input value="{{ old('name') }}" type="name" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                            id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu:</label>
                        <input type="password" name="password" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại: </label>
                        <input value="{{ old('phone') }}" type="text" name="phone" class="form-control"
                            id="phone">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ </label>
                        <input value="{{ old('address') }}" type="text" name="address" class="form-control"
                            id="address">
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                        <a href="/login ">Đã có tài khoản?</a>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
