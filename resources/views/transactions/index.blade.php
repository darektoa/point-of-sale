@extends('layouts.admin')
@section('main-content')
<div class="col-lg-12 mb-4 p-0">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex align-items-center">
			<h6 class="m-0 mr-3 font-weight-bold text-primary">Transaction List</h6>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTransactionModal"><i class="fas fa-plus mr-2"></i>Transaction</button>
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get"
				action="">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword"
					value="{{$keyword ?? ''}}" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
		<div class="card-body table-responsive" style="min-height: 400px">


      <!-- ADD MODAL -->
      <div class="modal fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addTransactionModalLabel">Add Transaction</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="name" class="col-form-label">Product Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="price" class="col-form-label">Price:</label>
                  <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- EDIT MODAL -->
      <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="name" class="col-form-label">Product Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="price" class="col-form-label">Price:</label>
                  <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- TABLE -->
			<table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Name</th>
						<th>Price</th>
						<th>Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
{{-- 
          @foreach($products as $product)
					<tr>
            <td class="align-middle h6">{{ $product->name }}</td>
						<td class="align-middle h6">{{ $product->price }}</td>
						<td class="align-middle h6">{{ $product->created_at->format('d/m/y') }}</td>
						<td class="align-middle h6" style="white-space: nowrap">
              <button class="btn btn-warning edit-product" data-product="{{ $product }}" data-toggle="modal" data-target="#editProductModal">
                <i class="fas fa-edit"></i>
              </button>

              <form action="{{ route('products.destroy', [$product->id]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach --}}

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	const editProductButtons = document.querySelectorAll('button.edit-product');

	editProductButtons.forEach((item) => {
		item.addEventListener('click', () => {
			const editForm	    = document.querySelector('#editProductModal form');
			const nameField     = editForm.querySelector('#name');
			const priceField    = editForm.querySelector('#price');
			const productData 	= JSON.parse(item.dataset.product);
			const endpoint	    = `{{ route('products.update', ['']) }}/${productData.id}`;
			editForm.action     = endpoint;
			nameField.value     = productData.name;
			priceField.value    = productData.price;
		});
	});
</script>
@endsection