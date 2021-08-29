@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>Data Order</h3>
      <div class="table-responsive bg-white">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Order Name</th>
              <th>Customer Name</th>
              <th>Agent Name</th>
              <th>Jumlah Item</th>
              <th>Qty</th>
              <!-- others column may add in future -->
            </tr>
          </thead>
          <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
            <tr>
              <td>{{ $value->name }}</td>
              <td>{{ $value->customer->first_name }}</td>
              <td>{{ $value->agent->first_name }}</td>
              <td>{{ $value->order_detail->order->product_name }}</td>
              <td>{{ $value->order_detail->qty }}</td>
              <!-- <td>{{ $value->countQty() }}</td> -->
              <!-- todo: still ambigous about item and qty -->
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
<script>
  const type = document.querySelector('#type');
  const pagination_link = document.querySelector('#pagination_link');

  type.addEventListener('change', () => {
    console.log(pagination_link, type)
    window.location.href = `${pagination_link.value}?type=${type.value}`
  })
</script>
@endsection