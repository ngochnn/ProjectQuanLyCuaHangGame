@extends('Layouts.main')

@section('content')


<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Table User</h2>
                        @if ($message = Session::get('delete'))
                        <div class="alert alert-success">
                            <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                            <x-package-alert type="success" message="{{ $message }}" />
                        </div>
                        @endif
                        @if ($message = Session::get('successuser'))
                        <div class="alert alert-success">
                            <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                            <x-package-alert type="success" message="{{ $message }}" />
                        </div>
                        @endif
                        @if ($message = Session::get('successpro'))
                        <div class="alert alert-success">
                            <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                            <x-package-alert type="success" message="{{ $message }}" />
                        </div>successpro
                        @endif
                        <!-- <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>   Add</button> -->
                        <a href="/users/create" class="au-btn au-btn-icon au-btn--green au-btn--small" role="button"> <i class="zmdi zmdi-plus"></i> add User</a>

                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Delete</th>
                                    <th>Add</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href="/profiles/{{$user->id}}">{{$user->name}}</a> </td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <form class="user" action="users/{{ $user->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" onclick="return confirm('Are you sure')" class="btn btn-danger" value="Delete"></input>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="/profiles/create" class="au-btn au-btn-icon au-btn--green au-btn--small" role="button"> Add</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">

            </div>
        </div>
    </div>
</div>

@endsection