@extends('layouts.admin')
@section('main-content')
<div class="col-lg-12 mb-4 p-0">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex align-items-center">
			<h6 class="m-0 mr-3 font-weight-bold text-primary">Product List</h6>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Product</button>
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get"
				action="">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword"
					value="{{$keyword ?? ''}}" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>

    <!-- MODAL -->
		<div class="card-body table-responsive" style="min-height: 400px">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('products.store') }}">
              <div class="modal-body">
                  @csrf

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Product Name:</label>
                    <input type="text" class="form-control" id="product-name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Price:</label>
                    <input type="text" class="form-control" id="price-name" name="price">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </form>
          </div>
      </div>


      <!-- TABLE -->
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