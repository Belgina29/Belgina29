@extends("admin.layouts.template")

@section('contenu')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des produits</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Photo1</th>
                    <th>Photo2</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
@forelse ($products as $product)
<tr>
  <td><img width="100" src="{{ asset('images/products/'.$product->photo1) }}"></td>
  <td><img width="100" src="{{ asset('images/products/'.$product->photo2) }}"></td>
  <td>{{ $product->name}}</td>
  <td>{{ $product->description}}</td>
  <td>{{ $product->price}}</td>
  <td>{{ $product->category->name}}</td>
  <td>
    <a href="{{ route('products.edit', $product->id) }}"> <button class="btn btn-success">Modifier</button></a>
    <form class="d-inline" action="{{ route('products.destroy',$product->id) }}" method="post">
      @csrf
      @method("DELETE")
    <button type="submit" onclick="return confirm('etes vous sure de vouloir supprimer?')"class="btn btn-danger">Delete</button>
  </td>
</tr>
@empty
<tr><td colspan="6">No data found</td></tr>
@endforelse

                  
</tbody>
<tfoot>
 <tr>
  <th>Name</th>
  <th>Action</th>
  </tr>
  </tfoot>
</table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection