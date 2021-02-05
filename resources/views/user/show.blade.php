@extends('Layouts.main')

	@section('content')
<div class="row m-t-100 m-l-20">

    <p>{{$user->name}}</p>

    <p>{{$user->email}}</p>

    <p>{{$user->created_at}}</p>
</div>
    @endsection