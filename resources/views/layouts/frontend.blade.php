<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    @stack('style-alt')
    <title>RNA CONTRACTOR</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container d-flex justify-content-between align-items-center">
            <a href="{{ route('homepage') }}" class="nav__logo text-decoration-none d-flex align-items-center">
                RNA <img src="{{ asset('frontend/assets/img/property1.png') }}" style="height: 30px;" alt="RNA Logo">
                CONTRACTOR
            </a>
    
            <div class="nav__menu px-1">
                <ul class="nav__list d-flex align-items-center">
                    <li class="nav__item">
                        <a href="{{ route('homepage') }}"
                            class="nav__link {{ request()->is('/') ? 'active-link' : '' }} text-decoration-none fs-5">
                            <i class="bx bx-home-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('project_package.index') }}"
                            class="nav__link {{ request()->is('project-packages') || request()->is('project-packages/*') ? 'active-link' : '' }} text-decoration-none fs-5">
                            <i class="bx bx-building-house"></i>
                            <span>Project</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('blog.index') }}"
                            class="nav__link {{ request()->is('blogs') || request()->is('blogs/*') ? 'active-link' : '' }} text-decoration-none fs-5">
                            <i class="bx bx-award"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('contact') }}"
                            class="nav__link {{ request()->is('contact') ? 'active-link' : '' }} text-decoration-none fs-5">
                            <i class="bx bx-phone"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('reservation') }}"
                            class="nav__link {{ request()->is('reservation') ? 'active-link' : '' }} text-decoration-none fs-5">
                            <i class="bx bx-book"></i>
                            <span>Reservasi</span>
                        </a>
                    </li>
    
                    <!-- Admin dropdown -->
                    @auth
                        <li class="nav-item dropdown px-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center fs-5" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-user"></i>
                                {{-- <span>{{ Auth::user()->name }}</span> --}}
                                {{-- <i class="bx bx-chevron-down ml-2"></i> --}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->is_admin == '1')
                                    <a class="dropdown-item d-flex align-items-center fs-5"
                                        href="{{ route('admin.dashboard') }}">
                                        <i class="bx bx-dashboard mr-2"></i>
                                        Dashboard
                                    </a>
                                @else
                                    <a class="dropdown-item d-flex align-items-center fs-5" href="{{ url('/') }}">
                                        <i class="bx bx-home mr-2"></i>
                                        Homepage
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item d-flex align-items-center fs-5"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="bx bx-log-out mr-2"></i>
                                        Logout
                                    </a>
                                </form>
                            </div>
                        </li>
                    @endauth
    
                    <!-- Guest links -->
                    @guest
                        <li class="nav__item">
                            <a href="{{ route('login') }}"
                                class="nav__link text-decoration-none d-flex align-items-center fs-5">
                                <i class="bx bx-log-in"></i>
                                <span>Login</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('register') }}"
                                class="nav__link text-decoration-none d-flex align-items-center fs-5">
                                <i class="bx bx-user-plus"></i>
                                <span>Register</span>
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    

    <!--==================== MAIN ====================-->
    <main class="main">
        @yield('content')
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div>
                <a href="{{ route('homepage') }}" class="nav__logo text-decoration-none">
                    RNA <img src="{{ asset('frontend/assets/img/property1.png') }}"
                        style="height: 30px; margin-bottom: 5px;" alt="RNA Logo"> CONTRACTOR
                </a>
                <p class="footer__description">
                    Our vision is to help people find the <br />
                    best places to project with high security
                </p>
            </div>

            <div class="footer__content">
                <div>
                    <h3 class="footer__title">About</h3>
                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link text-decoration-none">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link text-decoration-none">Features</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link text-decoration-none">News & Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Company</h3>
                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link text-decoration-none">How We Work?</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link text-decoration-none">Capital</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link text-decoration-none">Security</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Support</h3>
                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link text-decoration-none">FAQs</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link text-decoration-none">Support Center</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link text-decoration-none">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Follow Us</h3>
                    <ul class="footer__social">
                        <li>
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-facebook-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-instagram-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-whatsapp"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer__info container">
            <span class="footer__copy">&#169; RNA CONTRACTOR. All rights reserved.</span>
            <div class="footer__privacy">
                <a href="#" class="text-decoration-none">Terms & Agreements</a>
                <a href="#" class="text-decoration-none">Privacy Policy</a>
            </div>
        </div>
    </footer>


    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @stack('script-alt')
</body>

</html>
