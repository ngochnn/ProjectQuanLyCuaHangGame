@extends('Layouts.main')

@section('content')

<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Order Data</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Order</th>
									<th>Customer</th>
									<th>Address</th>
									<th>Create At</th>
									<th>Products</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($articles as $article)
								<tr>
									<td>{{$article->id}}</td>
									<td><a href="/profiles/{{$article->user_id}}">{{$article->user->name}}</a></td>

									<td>{{$article->title}}</td>
									<td>{{$article->created_at}}</td>
									<td style="text-align: justify;">
										@foreach($article->tags as $tag)
										<a href="#">{{$tag->tag}} </a>,
										@endforeach
									</td>
									<td style="text-align: center;">
											{{$article->status}}
											<a href="/articles/{{$article->id}}/edit" class="btn btn-primary" role="button">Edit</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection