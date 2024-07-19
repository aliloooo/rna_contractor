@extends('layouts.frontend')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')
    <section>
        <div class="swiper-container">
            <div>
                <!--========== ISLANDS 1 ==========-->
                <section class="islands position-relative">
                    <img src="{{ asset('frontend/assets/img/8.jpg') }}" alt="Hero Image" class="islands__bg w-100" />
                    <div class="bg__overlay d-flex justify-content-center align-items-center"
                        style="min-height: calc(100vh - 100px);">
                        @auth
                        <form action="{{ route('reservation.store') }}" method="post"
                        class="bg-white p-3 rounded shadow-sm w-100 mt-5" style="max-width: 600px;">
                      @csrf
                  
                      @if (session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif
                  
                      <div class="form-group mb-2">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                          placeholder="Masukan Nama" value="{{ old('nama') }}" required>
                      @error('nama')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                      </div>
                      <div class="form-group mb-2">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                      </div>
                      <div class="form-group mb-2">
                        <label for="no_telepon">No Telepon</label>
                        <input type="number" name="no_telepon" class="form-control" id="exampleFormControlInput1"
                        placeholder="Masukan No Telepon" value="{{ old('no_telepon') }}" required>
                    @error('no_telepon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                      </div>
                      <div class="form-group mb-2">
                          <label for="layanan">Layanan</label>
                          <select name="layanan" class="form-control" id="exampleFormControlSelect1" required>
                            <option selected disabled value=''>Layanan Yang Anda Inginkan</option>
                            <option value="bangun baru">Bangun Baru</option>
                            <option value="renovasi">Renovasi</option>
                            <option value="design">Design</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        @error('layanan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group mb-2">
                          <label for="tanggal">Kapan anda membutuhkan layanan</label>
                          <input placeholder="Pilih Tanggal" class="form-control" type="date" name="tanggal"
                                        id="tanggal" value="{{ old('tanggal') }}" required min="{{ date('Y-m-d') }}">
                                    @error('tanggal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                      </div>
                      <div class="form-group mb-2">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" id="exampleFormControlTextarea1"
                        placeholder="Deskripsikan Yang Anda Inginkan" rows="4" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Send</button>
                  </form>
                  
                        @else
                            <p class="text-white">Anda harus <a href="{{ route('login') }}" class="text-decoration-none">login</a> atau <a
                                    href="{{ route('register') }}" class="text-decoration-none">register</a> terlebih dahulu untuk melakukan reservasi.</p>
                        @endauth
                    </div>
                </section>
            </div>
        </div>
    </section>  
@endsection
