@extends('layouts.template')

@section('content')
    <div>
        <h1>CATEGORIAS</h1>
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Swiper CSS -->
        {{-- <link rel="stylesheet" href="css/swiper-bundle.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('slider/css/styleslider.css') }}">

        <!-- CSS -->
        {{-- <link rel="stylesheet" href="css/style.css"> --}}
        <link rel="stylesheet" href="{{ asset('slider/css/swiper-bundle.min.css') }}">
    </head>

    <body>
        <div class="container">

            <div class="swiper-button-prev"></div>
            <div class="slide-container swiper">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                        @foreach ($categoria as $item)
                            <div class="card swiper-slide">
                                <a href="{{ route('verproductos.show', $item->idcategoria) }}" class="image-content">
                                    {{-- <span class="overlay"></span> --}}

                                    <div class="card-image">
                                        <img src="{{ $item->url }}" alt="" class="card-img" cli>
                                    </div>
                                </a>

                                <div class="card-content">
                                    <h2 class="name">{{ $item->nombre }} </h2>

                                    {{-- <button class="button">Ver productos</button> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                {{-- <div class="swiper-button-next swiper-navBtn" ></div>
                <div class="swiper-button-prev swiper-navBtn" ></div> --}}

                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-next"></div>
        </div>
    </body>
    <!-- Swiper JS -->
    {{-- <script src="js/swiper-bundle.min.js"></script> --}}
    <script src="{{ asset('slider/js/swiper-bundle.min.js') }}"></script>


    <!-- JavaScript -->
    {{-- <script src="js/script.js"></script> --}}
    <script src="{{ asset('slider/js/script.js') }}"></script>

    </html>


    <section class="container mb-5">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators" style="bottom:-50px !important;">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($productos as $item)
                    <div class="carousel-item " data-bs-interval="10000">
                        <div class=" row row-cols-1 g-5">

                            <div class="col-12 col-md-6 col-lg-4 ">
                                <div class="card h-100">
                                    <div class="card-header c-header">
                                        <small class="text-center-">SUPER OFERTA</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="col">

                                            <img src="{{ $item->url }}" class="card-img-top" alt="">

                                        </div>
                                    </div>
                                    <div class="card-footer c-footer">
                                        <small class="text-muted">Last updated 3 </small>
                                    </div>
                                </div>
                            </div>

                        </div>
                @endforeach
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>

    </section>
    <section class="container-sm">
        <div class=" row row-cols-1 g-5">
            @foreach ($productos as $item)
                <div class="col-12 col-md-6 col-lg-4 ">
                    <div class="card h-100">
                        <div class="card-header c-header">
                            <small class="text-center-">SUPER OFERTA</small>
                        </div>
                        <div class="card-body">
                            <div class="col">

                                <img src="{{ $item->url }}" class="card-img-top" alt="">

                            </div>
                        </div>
                        <div class="card-footer c-footer">
                            <small class="text-muted">Last updated 3 </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
