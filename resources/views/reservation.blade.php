@extends('layouts.frontend')
@vite(['resources/sass/app.scss','resources/js/app.js'])

@section('content')

<section>
    <div class="swiper-container">
        <div>
            <!--========== ISLANDS 1 ==========-->
            <section class="islands position-relative ">
                <img src="{{ asset('frontend/assets/img/cons1.jpg') }}" alt="Hero Image" class="islands__bg w-100" />
                <div class="bg__overlay d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 100px);">
                    @auth
                    <form action="{{ route('reservation.store') }}" method="post" class="bg-white p-4 rounded shadow-sm w-100" style="max-width: 800px;">
                    @csrf

                    @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">No Telepon</label>
                            <input type="number" name="no_telepon" class="form-control" id="exampleFormControlInput1" placeholder="Masukan No Telepon">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlSelect1">Layanan</label>
                            <select name="layanan" class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled value=''>Layanan Yang Anda Inginkan</option>
                                <option value="bangun baru">Bangun Baru</option>
                                <option value="renovasi">Renovasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Tanggal Konsultasi</label>
                            <input placeholder="Pilih Tanggal" class="form-control" type="text" name="tanggal" onfocus="(this.type='date')" id="tanggal" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" id="exampleFormControlTextarea1" placeholder="Deskripsikan Yang Anda Inginkan" rows="4"></textarea>
                        </div>
                        <button type="submit" class="button button-reservation">Send</button>
                    </form>
                    @else
                    <p>Anda harus <a href="{{ route('login') }}">login</a> atau <a href="{{ route('register')}}">register</a> terlebih dahulu untuk melakukan reservasi.</p>
                  @endauth
                </div>
            </section>
        </div>
    </div>
</section>