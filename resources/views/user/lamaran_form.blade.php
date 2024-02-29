@extends('layouts.guestlte')

@section('title','Register')

@section('content')
 <x-auth-session-status class="mb-4" :status="session('status')" />

<div class="min-vh-100 d-flex justify-content-center align-items-center wrapper" >
  <div class="register-box col-md-6 mb-5 mt-2">
    <div class="register-logo mt-5">
      <img src="{{ asset('dist/img/energeek-nobg.png') }}" alt="" height="75" srcset="">
    </div>
    <div class="card radius10">
      <div class="card-body register-card-body radius10">
        <p class="login-box-msg" style="font-size: 24px;">Apply Lamaran</p>
        <form action="{{ route('proses') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="labelnama" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
          </div>
          <div class="form-group mb-3">
            <label for="labeljabatan" class="form-label">Jabatan</label>
            <select class="form-control select2" name="jabatan" data-placeholder="Pilih Jabatan" style="width: 100%;">
              @foreach ($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="labelnama" class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" placeholder="Telepon">
          </div>
          <div class="mb-3">
            <label for="labelnama" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="mb-3">
            <label for="tahun_lahir" class="form-label">Tahun Lahir</label>
            <select class="form-control" id="tahun" name="tahun" placeholder="Tahun Lahir">
                @php
                    $tahun_sekarang = date('Y');
                    $tahun_awal = 1970; // Tahun awal yang ingin ditampilkan
                @endphp
                @for ($tahun = $tahun_sekarang; $tahun >= $tahun_awal; $tahun--)
                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                @endfor
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="skillset" class="form-label">Skill Set</label>
            <select class="select2" multiple="multiple" name="skillset[]" data-placeholder="Pilih Skill" style="width: 100%;">
              @foreach ($skills as $skill)
                  <option value="{{ $skill->id }}">{{ $skill->name }}</option>
              @endforeach
          </select>          
          </div>
          <div class="col-4 mx-auto">
            <button type="submit" class="btn btn-danger btn-block">Apply</button>
          </div>
        </form>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div><!-- /.register-box -->
</div><!-- /.min-vh-100 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        Swal.fire({
            title: "Error",
            text: `{!! session('error') !!}`, // Gunakan backticks (`) untuk string literals
            icon: "error"
        });
    </script>
@endif


@endsection
