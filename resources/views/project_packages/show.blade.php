@extends('layouts.frontend')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                @foreach ($project_package->galleries as $gallery)
                <section class="islands swiper-slide">
                    @php
                        $media = $gallery->media_path;
                        $extension = pathinfo($media, PATHINFO_EXTENSION);
                    @endphp
            
                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ Storage::url($media) }}" alt="{{ $gallery->name }}" class="islands__bg" />
                    @elseif (in_array($extension, ['mp4', 'mov', 'avi']))
                        <video class="islands__bg" controls>
                            <source src="{{ Storage::url($media) }}" type="video/{{ $extension }}">
                            Your browser does not support the video tag.
                        </video>
                    @endif
            
                    <div class="islands__container container">
                        <div class="islands__data">
                            <h2 class="islands__subtitle">Project</h2>
                            <h1 class="islands__title">{{ $gallery->name }}</h1>
                        </div>
                    </div>
                </section>
            @endforeach            
            </div>
        </div>

        <!--========== CONTROLS ==========-->
        <div class="controls gallery-thumbs">
            <div class="controls__container swiper-wrapper">
                @foreach ($project_package->galleries as $gallery)
                    @php
                        $media = $gallery->media_path;
                        $extension = pathinfo($media, PATHINFO_EXTENSION);
                    @endphp
                
                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ Storage::url($media) }}" alt="{{ $gallery->name }}" class="controls__img swiper-slide" />
                    @elseif (in_array($extension, ['mp4', 'mov', 'avi']))
                        <video class="controls__img swiper-slide" autoplay muted loop>
                            <source src="{{ Storage::url($media) }}" type="video/{{ $extension }}">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                @endforeach            
            </div>
        </div>
        
        
    </section>

    <section class="blog section" id="blog">
        <div class="blog__container container">
            <div class="content__container">
                <div class="blog__detail">
                    {!! $project_package->description !!}

                    <h3 class="font-weight-bold">Metode Pembayaran Yang Digunakan</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Termin</th>
                                <th scope="col">Dengan nominal per-termin</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $project_package->termin }}</td>
                                <td><span>Rp.</span> {{number_format($project_package->nominal) }} </td>
                                <td>{{ $project_package->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="package-project">
                    <div class="value__accordion-item mb-3">
                        <header class="value__accordion-header">
                            <i class="bx bx-user value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Flow Customer Pemesanan Layanan
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                1. Isi form sesuai format dan yang anda butuhkan<br>
                                <br>
                                2. Tunggu dari admin melalui email atau whatsapp<br>
                                <br>
                                3. Ajak admin berdiskusi tentang layanan yang anda butuhkan<br>
                                <br>
                                4. jika sudah deal dengan apa yang anda inginkan selanjutkan admin akan mengabari anda lagi
                                untuk melakukan survei
                            </p>
                        </div>
                    </div>
                    <h4 class="mb-3">Pesan Layanan Yang Anda Inginkan Sekarang</h4>
                    <div>
                        @auth
                            <form action="{{ route('reservation.store') }}" method="post"
                                class="bg-white p-4 rounded shadow-sm w-100" style="max-width: 800px;">
                                @csrf

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        style="cursor: pointer;">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                        style="cursor: pointer;">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <!-- Form input fields -->
                                <div class="form-group mb-3">
                                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan Nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="number" name="no_telepon" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan No Telepon" value="{{ old('no_telepon') }}" required>
                                    @error('no_telepon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
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
                                <div class="form-group mb-3">
                                    <input placeholder="Pilih Tanggal" class="form-control" type="date" name="tanggal"
                                        id="tanggal" value="{{ old('tanggal') }}" required min="{{ date('Y-m-d') }}">
                                    @error('tanggal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <textarea type="text" name="deskripsi" class="form-control" id="exampleFormControlTextarea1"
                                        placeholder="Deskripsikan Yang Anda Inginkan" rows="4" required>{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="button button-reservation">Send</button>
                            </form>
                        @else
                        <p class="text-white">Anda harus <a href="{{ route('login', ['redirect' => url()->current()]) }}" class="text-decoration-none">login</a> atau <a
                            href="{{ route('register', ['redirect' => url()->current()]) }}" class="text-decoration-none">register</a> terlebih dahulu untuk melakukan reservasi.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">Our Project</span>
            <h2 class="section__title" style="text-align: center">
                Rekomendasi Buat Anda
            </h2>

            <div class="popular__all">
                @foreach ($project_packages as $project_package)
                    <article class="popular__card">
                        <a href="{{ route('project_package.show', $project_package->slug) }}"
                            class="text-decoration-none">
                            <img src="{{ Storage::url($project_package->galleries->first()->images) }}" alt=""
                                class="popular__img" />
                            <div class="popular__data">
                                <h2 class="popular__price"><span>Rp.</span>{{ number_format($project_package->price) }}
                                </h2>
                                <h3 class="popular__title">{{ $project_package->location }}</h3>
                                <p class="popular__description">{{ $project_package->type }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @if (session()->has('message'))
        <div id="alert" class="alert">
            {{ session()->get('message') }}
            <i class='bx bx-x alert-close' id="close"></i>
        </div>
    @endif
@endsection

@push('style-alt')
    <style>
        .alert {
            position: absolute;
            top: 120px;
            left: 0;
            right: 0;
            background-color: var(--second-color);
            color: white;
            padding: 1rem;
            width: 70%;
            z-index: 99;
            margin: auto;
            border-radius: .25rem;
            text-align: center;
        }

        .alert-close {
            font-size: 1.5rem;
            color: #090909;
            position: absolute;
            top: .25rem;
            right: .5rem;
            cursor: pointer;
        }

        blockquote {
            border-left: 8px solid #b4b4b4;
            padding-left: 1rem;
        }

        .blog__detail ul li {
            list-style: initial;
        }
    </style>
@endpush

@push('script-alt')
    <script>
        // Fungsi untuk menghilangkan alert setelah diklik
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua alert yang ada
            var alerts = document.querySelectorAll('.alert');

            // Tambahkan event listener untuk setiap alert
            alerts.forEach(function(alert) {
                alert.addEventListener('click', function() {
                    alert.style.display = 'none'; // Menghilangkan alert saat diklik
                });

                // Hilangkan alert setelah 5 detik
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 5000); // 5000 milidetik = 5 detik
            });
        });
    </script>
    <script>
        // Inisialisasi Swiper untuk galeri thumbnail
        var galleryThumbsSwiper = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 'auto',
            slideToClickedSlide: true,
        });
    
        // Inisialisasi Swiper untuk galeri utama
        var galleryTopSwiper = new Swiper('.gallery-top', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            thumbs: {
                swiper: galleryThumbsSwiper,
            },
        });

        // Ambil semua elemen video di galeri thumbnail
        var videoThumbnails = document.querySelectorAll('.controls__img video');
    
        // Tambahkan event listener untuk setiap video
        videoThumbnails.forEach(function(video) {
            video.addEventListener('click', function() {
                // Ambil indeks data dari video yang diklik
                var index = this.getAttribute('data-index');
    
                // Pergi ke slide utama berdasarkan indeks
                galleryTopSwiper.slideTo(index);
    
                // Mainkan video setelah beralih ke slide
                setTimeout(function() {
                    video.play();
                }, 500); // Delay untuk memastikan swiper sudah beralih
            });
        });
    </script>
@endpush
