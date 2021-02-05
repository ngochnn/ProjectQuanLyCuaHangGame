@extends('Layouts.main')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">overview</h2>

                        <!-- <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="fa fa-wrench"></i>Edit</button> -->
                        <!-- <a href="/introproducts/{{$introproduct->id}}/edit" class="btn btn-primary" role="button"><i class="fa fa-wrench"></i>   Edit</a> -->
                        <a href="/introproducts/{{$introproduct->id}}/edit" class="au-btn au-btn-icon au-btn--green au-btn--small" role="button"> <i class="fa fa-wrench"></i> Edit</a>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img class="card-img-top" src="{{$introproduct->image}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mb-3">{{$introproduct->product_name}}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title mb-3">{{$introproduct->price}} VNĐ</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title mb-3">Số lượng: {{$introproduct->number}}</h4>
                                </div>
                            </div>
                            <p class="card-text" style="text-align: justify;">{{$introproduct->detail}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">{{$introproduct->product_name}}</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="{{$introproduct->image}}" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1">{{$introproduct->detail}}</h5>
                        <div class="location text-sm-center">
                            <i class="fa fa-map-marker"></i> {{$introproduct->price}}</div>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <a href="#">
                            <i class="iconify fa-3x pr-1" data-icon="fa-brands:nintendo-switch" data-inline="false"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-playstation fa-3x pr-1"></i>

                        </a>
                        <a href="#">
                            <i class="fas fa-desktop fa-3x pr-1"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div> -->
@endsection