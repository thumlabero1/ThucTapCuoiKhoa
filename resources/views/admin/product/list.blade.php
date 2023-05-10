@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <p style="padding: 10px">
        <a href="#nhap" class="btn btn-warning" data-toggle="modal" data-target="#importModal"><i class="fa fa-download"
                aria-hidden="true"></i>
            Nhập
            từ Excel</a>
        <a href="{{ route('sanpham.xuat') }}" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i> Xuất ra
            Excel</a>
    </p>
    <table class="table data-table" id="myTable">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>giá gốc</th>
                <th>giá khuyến mãi</th>
                <th>Active</th>
                <th>Update</th>
                <th>Cài đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->menu->name }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ number_format($product->price_sale, 2) }}</td>
                    <td> {!! \App\Helpers\Helper::isActive($product->active) !!}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/products/edit/{{ $product->id }}"><i
                                class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="#"
                            onclick="removeRow({{ $product->id }},'/admin/products/destroy')"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('sanpham.nhap') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>

                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-0">
                            <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
                            <input type="file" class="form-control" id="file_excel" name="file_excel" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"
                                aria-hidden="true"></i>
                            Hủy bỏ</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-keyboard-o" aria-hidden="true"></i>
                            Nhập dữ liệu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
