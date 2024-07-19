@extends('layouts.frontend')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container">
            <div>
                <!--========== ISLANDS 1 ==========-->
                <section class="islands">
                    <img src="{{ asset('frontend/assets/img/4.jpg') }}" alt="" class="islands__bg" />
                    <div class="bg__overlay">
                        <div class="islands__container container">
                            <div class="islands__data" style="z-index: 99; position: relative">
                                <h2 class="islands__subtitle">
                                    Explore
                                </h2>
                                <h1 class="islands__title">
                                    RNA Contractor
                                </h1>
                                <p class="islands__description">
                                    It's the perfect time project and
                                    enjoy the <br />
                                    beauty of the world.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <section style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <!-- Pricing Table -->
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-6">
                    <div class="panel text-center price-panel panel-blue">
                        <div class="panel-body">
                            <p class="lead big-lead"><strong>Renovasi dan Bangun Baru</strong></p>
                        </div>
                        <div class="panel-body">
                            <p class="lead small-lead">Rp. 3.000.000/m²</p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-check text-success"></i>Pondasi Cakar Ayam</li>
                            <li class="list-group-item"><i class="fa fa-times text-danger"></i>Dinding Bata Ringan</li>
                            <li class="list-group-item"><i class="fa fa-times text-danger"></i>Lantai Granit Tile</li>
                            <li class="list-group-item"><i class="fa fa-check text-success"></i>Plafond Gypsum</li>
                            <li class="list-group-item"><i class="fa fa-times text-danger"></i>Rangka Atap Baja Ringan</li>
                            <li class="list-group-item"><i class="fa fa-times text-danger"></i>Kusen Jendela Aluminium</li>
                        </ul>
                        <div class="panel-footer my-3">
                            <a href="{{ route('reservation') }}" class="btn btn-lg btn-block btn-custom">Pesan Sekarang!</a>
                            <p class="small text-muted mt-2">* Harga dapat berubah sesuai dengan spesifikasi dan permintaan tambahan.</p>
                        </div>
                    </div>
                </div>

            <!-- Estimation Calculator -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="card panel text-center price-panel panel-blue">
                    <div class="card-body">
                        <h5 class="card-title text-center">Kalkulator Estimasi Harga</h5>
                        <form id="estimationForm">
                            <div class="form-group">
                                <label for="area">Luas Area (m²):</label>
                                <input type="number" class="form-control" id="area" placeholder="Masukkan luas area">
                            </div>
                            <div class="form-group">
                                <label for="pricePerMeter">Harga per Meter (Rp):</label>
                                <input type="text" class="form-control" id="pricePerMeter" readonly>
                            </div>
                            <button type="button" class="btn btn-custom btn-block" onclick="calculateEstimation()">Hitung Estimasi</button>
                        </form>
                        <div class="result mt-4 text-center">
                            <h6>Estimasi Harga:</h6>
                            <p id="estimationResult">Rp. 0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================== POPULAR ====================-->
    <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">Best Our Project</span>
            <h2 class="section__title" style="text-align: center">Popular Project</h2>

            <div class="popular__container swiper">
                <div class="swiper-wrapper">
                    @foreach ($project_packages as $project_package)
                    <article class="popular__card swiper-slide">
                        <a href="{{ route('project_package.show', $project_package->slug) }}" class="text-decoration-none">
                            @php
                                $media = $project_package->galleries->first()->media_path;
                                $extension = pathinfo($media, PATHINFO_EXTENSION);
                            @endphp
                
                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ Storage::url($media) }}" alt="{{ $project_package->location }}" class="popular__img" />
                            @elseif (in_array($extension, ['mp4', 'mov', 'avi']))
                                <video width="100" controls class="popular__img">
                                    <source src="{{ Storage::url($media) }}" type="video/{{ $extension }}">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                            
                            <div class="popular__data">
                                <h2 class="popular__price">
                                    <span>Rp. </span>{{ number_format($project_package->price) }}
                                </h2>
                                <h4 class="popular__title">
                                    {{ $project_package->location }}
                                </h4>
                                <p class="popular__description">{{ $project_package->type }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach                
                </div>

                <div class="swiper-button-next">
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="bx bx-chevron-left"></i>
                </div>
            </div>
        </div>
    </section>


    <!--==================== VALUE ====================-->
    <section class="value section" id="value">
        <div class="value__container container grid">
            <div class="value__images">
                <div class="value__orbe"></div>

                <div class="value__img">
                    <img src="{{ asset('frontend/assets/img/team.jpg') }}" alt="" />
                </div>
            </div>

            <div class="value__content">
                <div class="value__data">
                    <span class="section__subtitle">Why Choose Us</span>
                    <h2 class="section__title">
                        Experience That We Promise To You
                    </h2>
                    <p class="value__description">
                        We always ready to serve by providing the best
                        service for you. We make a good choices to
                        project around the world.
                    </p>
                </div>

                <div class="value__accordion">
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-shield-x value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Best places in the world
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                We provides the best places around the
                                world and have a good quality of
                                service.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-x-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Affordable price for you
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                We try to make your budget fit with the
                                destination that you want to go.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-bar-chart-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Best plan for your time
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                Provides you with time properly.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-check-square value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Security guarantee
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>

                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                We make sure that our services have a
                                good of security
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blog -->
    <section class="blog section" id="blog">
        <div class="blog__container container">
            <span class="section__subtitle" style="text-align: center">Our Blog</span>
            <h2 class="section__title" style="text-align: center">
                The Best Tips For You
            </h2>

            <div class="blog__content grid">
                @foreach ($blogs as $blog)
                    <article class="blog__card">
                        <div class="blog__image">
                            <img src="{{ Storage::url($blog->image) }}" alt="" class="blog__img" />
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog__button">
                                <i class="bx bx-right-arrow-alt"></i>
                            </a>
                        </div>

                        <div class="blog__data">
                            <h2 class="blog__title">
                                {{ $blog->title }}
                            </h2>
                            <p class="blog__description">
                                {{ $blog->excerpt }}
                            </p>

                            <div class="blog__footer">
                                <div class="blog__reaction">
                                    {{ date('d M Y', strtotime($blog->created_at)) }}
                                </div>
                                <div class="blog__reaction">
                                    <i class="bx bx-show"></i>
                                    <span>{{ $blog->reads }}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <style>
        .big-lead {
            font-size: 40px;
        }

        .price-panel,
        .price-panel>.panel-heading {
            -webkit-transition: all .3s ease;
            -moz-transition: all .3s ease;
            -o-transition: all .3s ease;
            transition: all .3s ease;
        }

        .price-panel:hover {
            box-shadow: 0 0 30px rgba(0, 0, 0, .2);
        }

        .price-panel:hover>.panel-heading {
            box-shadow: 0 0 30px rgba(0, 0, 0, .2) inset;
        }

        .price-panel>.panel-heading {
            color: white;
            text-shadow: 0 3px 0 rgba(50, 50, 50, .6);
            border-radius: 0;
            box-shadow: 0 5px 0 rgba(50, 50, 50, .2) inset;
        }

        .price-panel>.panel-body {
            color: white;
            text-shadow: 0 3px 0 rgba(50, 50, 50, .3);
        }

        .price-panel>.list-group {
            font-weight: 600;
        }

        .price-panel>.panel-footer {
            box-shadow: 0 3px 0 rgba(0, 0, 0, .3);
        }

        .panel-blue>.panel-heading {
            background-color: #390050;
            border-color: #78aee1;
        }

        .panel-blue>.panel-body {
            background-color: #390050;
        }

        .btn-custom {
            color: #fff;
            /* Warna teks */
            background-color: #390050;
            /* Warna latar belakang */
            border-color: #390050;
            /* Warna border */
        }

        .btn-custom:hover,
        .btn-custom:focus,
        .btn-custom:active,
        .btn-custom.active {
            background-color: #fff;
            /* Warna latar belakang saat hover */
            border-color: #2e003d;
            /* Warna border saat hover */
            color: #390050;
        }
    </style>

<script>
    // Function to format number to Indonesian currency (Rupiah)
    function formatRupiah(angka) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang diinput sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp. ' + rupiah + '/m²';
    }

    // Set initial value for pricePerMeter input
    document.getElementById("pricePerMeter").value = formatRupiah(3000000);

    // Function to calculate estimation
    function calculateEstimation() {
        var area = document.getElementById("area").value;
        var pricePerMeter = 3000000; // Harga per meter persegi dalam angka (tanpa format Rupiah)
        var estimation = area * pricePerMeter;
        document.getElementById("estimationResult").innerText = "Estimasi Harga: Rp. " + estimation.toLocaleString();
    }
</script>
@endsection
