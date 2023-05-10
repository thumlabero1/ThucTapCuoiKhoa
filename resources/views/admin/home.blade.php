@extends('admin.main')
@section('content')
    <!-- Small boxes (Stat box) -->
    @php
        $tongtien = 0;
        $donhang = 0;
        $dagiao = 0;
        $khachhang = 0;
        if (!empty($thongke)) {
            foreach ($thongke as $value) {
                $tongtien += $value['doanhthu'];
                $donhang += $value['donhang'];
                $dagiao += $value['soluong'];
            }
        }
        if (!empty($user)) {
            $khachhang = count($user);
        }
    @endphp
    <div class="row mt-3">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>${{ number_format($tongtien, 0) }}</h3>

                    <p>Doanh thu</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $donhang }}</h3>

                    <p>Đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $khachhang }}</h3>

                    <p>Người dùng
                    <p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $dagiao }}</h3>

                    <p>Đã giao</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row my-3 p-b-50">
        <div class="col-md-6 mt-3 mt-md-0">
            <div class="card">
                <div class="card-header">Charts</div>
                <div class="card-body">
                    <p>Thống kê doanh thu:
                        <span>
                            <select class="select-date" id="">
                                <option value="7">7 ngày qua</option>
                                <option value="28">28 ngày qua</option>
                                <option value="90">90 ngày qua</option>
                                <option value="365">365 ngày qua</option>
                            </select>
                        </span>
                    </p>

                    <div id="chart" style="height: 250px; max-width: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3 mt-md-0">
            <div class="card">
                <div class="card-header">Charts</div>
                <div class="card-body">
                    <div id="chartD" style="height: 250px; max-width: 100%;">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script></script>
@endsection
