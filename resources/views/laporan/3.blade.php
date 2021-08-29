@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- pagination url to call in javascript -->
      <input type="hidden" id="pagination_link" value="{{ route('laporan.2') }}">
      <h3>Laporan Jumlah Order Customer</h3>

      <div class="d-flex mb-3">
        <div class="mr-1">
          <label for="date_start">Dari Tanggal</label>
          <input type="date" class="form-control" id="date_start" value="{{ $date_start ?? '' }}">
        </div>
        <div class="ml-1">
          <label for="date_end">Sampai Tanggal</label>
          <input type="date" class="form-control" id="date_end" value="{{ $date_end ?? '' }}">
        </div>
      </div>
      <div class="mb-3" id="submit">
        <button class="btn btn-primary">Submit</button>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Agent Name</th>
              <th>Order Count</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
            <tr>
              <td>{{ $value->customer->first_name }}</td>
              <td>{{ $value->customer->order->count() }}</td>
            </tr>
            @endforeach
            @else
            <tr>
              <td>Tidak ada data untuk ditampilkan.</td>
            </tr>
            @endif
          </tbody>
        </table>
        {!! $links !!}
      </div>
    </div>
  </div>
  <script>
    const pagination_link = document.querySelector('#pagination_link');
    const date_start = document.querySelector('#date_start');
    const date_end = document.querySelector('#date_end');
    const submit = document.querySelector('#submit');

    submit.addEventListener('click', () => {
      if (date_start.value && date_end.value) {
        window.location.href = `${pagination_link.value}?date_start=${date_start.value}&date_end=${date_end.value}`
      }
    });
  </script>
  @endsection