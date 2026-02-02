@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="container-fluid px-4">

  <h1 class="mt-4">👨‍🎓 Data Mahasiswa</h1>
  <p class="text-muted">Daftar mahasiswa yang terdaftar dalam sistem</p>

  <!-- SEARCH -->
  <form method="GET" class="mb-3">
    <div class="row g-2">
      <div class="col-md-4">
        <input
          type="text"
          name="search"
          class="form-control"
          placeholder="Cari nama atau NIM..."
          value="{{ request('search') }}"
        >
      </div>
      <div class="col-auto">
        <button class="btn btn-primary">Cari</button>
      </div>
    </div>
  </form>

  <!-- TABLE -->
  <div class="card">
    <div class="card-body">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($mahasiswa as $item)
            <tr>
              <!-- <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nim }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->prodi }}</td> -->

              <td>{{ "tes" }}</td>
              
              <td>
                <a href="#" class="btn btn-sm btn-outline-info">
                  Detail
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted">
                Data mahasiswa belum tersedia
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      {{ $mahasiswa->links() }}
    </div>
  </div>

</div>
@endsection