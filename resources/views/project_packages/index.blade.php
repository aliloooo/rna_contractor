@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
  <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <!--========== ISLANDS 1 ==========-->
      <section class="islands swiper-slide">
        <img
          src="{{ asset('frontend/assets/img/10.jpg') }}"
          alt=""
          class="islands__bg"
        />
        <div class="bg__overlay">
          <div class="islands__container container">
            <div class="islands__data">
              <h2 class="islands__subtitle">Explore</h2>
              <h1 class="islands__title">Project Kami</h1>
            </div>
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