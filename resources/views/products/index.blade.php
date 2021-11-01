@extends('layouts.admin')
@section('main-content')
<div class="col-lg-12 mb-4 p-0">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex align-items-center">
			<h6 class="m-0 font-weight-bold text-primary">Product List</h6>
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get"
				action="">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword"
					value="{{$keyword ?? ''}}" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
		<div class="card-body table-responsive" style="min-height: 400px">
			<table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Name</th>
						<th>Price</th>
						<th>Created</th>
					</tr>
				</thead>
				<tbody>

          @foreach($products as $product)
					<tr>
            <td class="align-middle h6">{{ $product['name'] }}</td>
						<td class="align-middle h6">{{ $product['price'] }}</td>
						<td class="align-middle h6">{{ $product['created_at'] }}</td>
          </tr>
          @endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection