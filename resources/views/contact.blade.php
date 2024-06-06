@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <!--========== ISLANDS 1 ==========-->
            <section class="islands swiper-slide">
              <img
                src="{{ asset('frontend/assets/img/contact-hero.jpg') }}"
                alt=""
                class="islands__bg"
              />
              <div class="bg__overlay">
                <div class="islands__container container">
                  <div class="islands__data">
                    <h2 class="islands__subtitle">Butuh Konsultasi</h2>
                    <h1 class="islands__title">Hubungi Kami</h1>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
      <!--==================== CONTACT ====================-->
      <section class="contact section" id="contact">
        <div class="contact__container container grid">
          <div class="contact__images">
            <div class="contact__orbe"></div>

            <div class="contact__img">
              <img src="{{ asset('frontend/assets/img/contact.jpg') }}" alt="" />
            </div>
          </div>

          <div class="contact__content">
            <div class="contact__data">
              <span class="section__subtitle">Butuh Bantuan</span>
              <h2 class="section__title">Don't hesitate to contact us</h2>
              <p class="contact__description">
                Is there a problem finding places for yout next trip? Need a
                guide in first trip or need a consultation about projecting? just
                contact us.
              </p>
            </div>

            <div class="contact__card">
              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-instagram-alt"></i>
                  <div>
                    <h3 class="contact__card-title">Instagram</h3>
                    <p class="contact__card-description">@alrahmaniimmortal</p>
                  </div>
                </div>

                <a href="https://www.instagram.com/alrahmaniimmortal/" target="_blank" class="button contact__card-button text-decoration-none d-block mx-auto text-center">Go to Instagram</a>
              </div>
              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-whatsapp"></i>
                  <div>
                    <h3 class="contact__card-title">Whatsapp</h3>
                    <p class="contact__card-description">0896-0219-9903</p>
                  </div>
                </div>

                <a href="https://api.whatsapp.com/send?phone=089602199903" target="_blank" class="button contact__card-button text-decoration-none d-block mx-auto text-center">Go to WhatsApp</a>
              </div>
              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-facebook-circle"></i>
                  <div>
                    <h3 class="contact__card-title">Facebook</h3>
                    <p class="contact__card-description">Al Rahmani</p>
                  </div>
                </div>

                <a href="https://www.facebook.com/Al Rahmani" target="_blank" class="button contact__card-button text-decoration-none d-block mx-auto text-center">Go to Facebook</a>

              </div>
              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-tiktok"></i>
                  <div>
                    <h3 class="contact__card-title">Tiktok</h3>
                    <p class="contact__card-description">@aalliilloo</p>
                  </div>
                </div>

                <a href="https://www.tiktok.com/@aalliilloo" target="_blank" class="button contact__card-button text-decoration-none d-block mx-auto text-center">Go to TikTok</a>

              </div>
            </div>
          </div>
        </div>
      </section>
@endsection