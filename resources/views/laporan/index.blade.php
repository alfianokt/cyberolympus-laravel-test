@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>Laporan</h3>

      <ul class="mb-3">
        <li>
          <a href="{{ route('laporan.2') }}">b. Laporan jumlah order dari customer</a>
        </li>
        <li>
          <a href="{{ route('laporan.3') }}">c. Laporan Order Agent Oleh Customer Customer</a>
        </li>
      </ul>

      <div class="card mb-3">
        <div class="card-body">
          <h4>h. Top 10 Customer</h4>
          <div class="table-responsive bg-white">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Order Count</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($data['h']) && $data['h']->count())
                @foreach($data['h'] as $key => $value)
                <tr>
                  <td>{{ $value->first_name }}</td>
                  <td>{{ $value->count }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td>Tidak ada data untuk ditampilkan.</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <h4>i. Top 10 Agent</h4>
          <div class="table-responsive bg-white">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Agent Name</th>
                  <th>Ordered Count</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($data['i']) && $data['i']->count())
                @foreach($data['i'] as $key => $value)
                <tr>
                  <td>{{ $value->first_name }}</td>
                  <td>{{ $value->count }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td>Tidak ada data untuk ditampilkan.</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection