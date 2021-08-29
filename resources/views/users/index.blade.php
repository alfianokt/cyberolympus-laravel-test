@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- pagination url to call in javascript -->
      <input type="hidden" id="pagination_link" value="{{ route('user') }}">
      <h3>Data User</h3>
      <div class="mb-3">
        <label for="type">Type User</label>
        <select name="type" id="type" class="form-control">
          <option value="customer" {{ $type == 'customer' ? 'selected' : '' }}>Customer</option>
          <option value="agent" {{ $type == 'agent' ? 'selected' : '' }}>Agent</option>
        </select>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Role</th>
              <!-- others column may add in future -->
            </tr>
          </thead>
          <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
            <tr>
              <td>{{ $value->first_name }}</td>
              <td>{{ $value->last_name }}</td>
              <td>{{ $value->email }}</td>
              <td>{{ $value->phone }}</td>
              <td>{{ $value->account_role }}</td>
            </tr>
            @endforeach
            @else
            <tr>
              <td>Tidak ada data untuk ditampilkan.</td>
            </tr>
            @endif
          </tbody>
        </table>
        {!! $data->appends(['type' => $type])->links() !!}
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