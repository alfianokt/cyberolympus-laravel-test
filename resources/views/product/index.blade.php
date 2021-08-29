@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>Data Product</h3>
      <div class="table-responsive bg-white">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Category</th>
              <th>Weight</th>
              <th>Price Sell</th>
              <!-- others column may add in future -->
            </tr>
          </thead>
          <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
            <tr>
              <td>{{ $value->product_name }}</td>
              <td>{{ $value->product_category->name }}</td>
              <td>{{ $value->weight }}</td>
              <td>{{ $value->price_sell }}</td>
            </tr>
            @endforeach
            @else
            <tr>
              <td>Tidak ada data untuk ditampilkan.</td>
            </tr>
            @endif
          </tbody>
        </table>
        {!! $data->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection