@extends('Layouts.main')

@section('js')
<script>
    $('#image').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1"></h2>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Product</h3>
                                <!-- lấy thông tin thông báo đã thêm vào session để hiển thị -->
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                                    <x-package-alert type="success" message="{{ $message }}" />
                                </div>
                                @endif

                                <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                                    <li>{{ $message }} </li>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <x-package-alert type="danger" message="{{ $error }}" />
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <hr>
                            <form class="user" action="{{ route('products.update',['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- khai báo này dùng để thiết lập phương thức PUT 
									nếu không khai báo thì khi submit không thiết lập HttpPUT -->
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product_name</label>
                                    <input type="text" name="product_name" class="form-control form-control-user" id="product_name" placeholder="Product_name" value="{{$product->product_name}}">
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Number</label>
                                            <input type="text" class="form-control form-control-user" name="number" id="number" placeholder="number" value="{{$product->number}}">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Price</label>
                                            <input type="text" class="form-control form-control-user" name="price" id="price" placeholder="price" value="{{$product->price}}">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " id="image" name="image">
                                        <label for="avatar" class="custom-file-label">{{$product->image}}</label>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-paper-plane"></i>&nbsp;
                                            <span id="payment-button-amount">Save</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                    <!-- <input type="submit" class="btn btn-primary" value="Update"> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection