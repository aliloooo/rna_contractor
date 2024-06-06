@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img src="{{ asset('frontend/assets/img/cons2.jpg') }}" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Explore</h2>
                  <h1 class="islands__title">Our Project</h1>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <!--==================== POPULAR ====================-->
      <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">All</span>
            <h2 class="section__title" style="text-align: center">Our Project</h2>
    
            <div class="popular__all">
                @foreach($project_packages as $project_package)
                    <article class="popular__card">
                        <a href="{{ route('project_package.show', $project_package->slug) }}" class="text-decoration-none">
                            <img src="{{ Storage::url($project_package->galleries->first()->images) }}" alt="" class="popular__img" />
                            <div class="popular__data">
                                <h2 class="popular__price"><span>Rp. </span>{{ number_format($project_package->price,2) }}</h2>
                                <h3 class="popular__title">{{ $project_package->location }}</h3>
                                <p class="popular__description">{{ $project_package->type }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection