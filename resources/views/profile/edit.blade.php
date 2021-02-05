@extends('Layouts.main')

@section('js')
<script>
	$('#avatar').on('change', function() {
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
						<!-- <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>   Add</button> -->
						<!-- <a href="/profiles/create" class="btn btn-primary" role="button"> <i class="zmdi zmdi-plus"></i> Add</a> -->

					</div>
				</div>
			</div>
			<div class="row m-t-25">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header"></div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Edit User</h3>
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
							<form class="user" action="{{ route('profiles.update',['profile' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<!-- khai báo này dùng để thiết lập phương thức PUT 
									nếu không khai báo thì khi submit không thiết lập HttpPUT -->
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Full-Name</label>
									<input type="text" name="full_name" class="form-control form-control-user" id="full_name" placeholder="Full Name" value="{{$profile->full_name}}">
								</div>
								<div class="form-group has-success">
									<label for="cc-name" class="control-label mb-1">Address</label>
									<input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address" value="{{$profile->address}}">
									<span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
								</div>
								<div class="form-group">
									<label for="cc-number" class="control-label mb-1">Birthday</label>
									<input type="date" class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday" value="{{$profile->birthday}}">
									<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="cc-exp" class="control-label mb-1">Gender</label>
											<input type="text" class="form-control form-control-user" name="gender" id="gender" placeholder="gender" value="{{$profile->gender}}">
											<span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
										</div>
									</div>
									<div class="col-6">
										<label for="x_card_code" class="control-label mb-1">User-id</label>
										<div class="input-group">
											<input type="number" class="form-control form-control-user" name="user_id" id="user_id" placeholder="user_id" value="{{$profile->user_id}}" disabled>

										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="cc-number" class="control-label mb-1">Avatar</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input " id="avatar" name="avatar">
										<label for="avatar" class="custom-file-label">{{$profile->avatar}}</label>
									</div>
								</div>
								<div style=" background-image:url({{$profile->avatar}}); height:84vh;width:auto">

								</div>
								<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
									<i class="fa fa-paper-plane"></i></i>&nbsp;
                                        <span id="payment-button-amount">Save </span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection