@extends('Layouts.main')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Product table</h3>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                        <x-package-alert type="success" message="{{ $message }}" />
                    </div>
                    @endif
                    @if ($message = Session::get('successuppro'))
                    <div class="alert alert-success">
                        <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                        <x-package-alert type="success" message="{{ $message }}" />
                    </div>
                    @endif
                    @if ($message = Session::get('deletepro'))
                    <div class="alert alert-success">
                        <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                        <x-package-alert type="success" message="{{ $message }}" />
                    </div>
                    @endif
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">

                        </div>

                        <div class="table-data__tool-right">
                            <a href="/products/create" class="au-btn au-btn-icon au-btn--green au-btn--small" role="button"> <i class="zmdi zmdi-plus"></i> add item</a>


                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)

                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        <span class="block-email"><img src="{{$product->image}}" /> </span>
                                    </td>
                                    <td> <a href="/introproducts/{{$product->id}}">{{$product->product_name}}</a></td>
                                    <td class="desc">{{$product->price}}</td>
                                    <td>
                                        @if(strval($product->number) < 55) <span class="" style="color:red">{{$product->number}}</span>

                                            @else
                                            <span class="status--process">{{$product->number}}</span>

                                            @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                                <a href="/products/{{$product->id}}/edit" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="zmdi zmdi-edit"></i></a>

                                            </button>
                                            <form class="user" action="products/{{ $product->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure')" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <!-- <input type="submit" onclick="return confirm('Are you sure')" class="btn btn-danger" value="Delete"></input> -->
                                            </form>

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection