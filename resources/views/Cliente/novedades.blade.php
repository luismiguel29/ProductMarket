@extends('layouts.template')


@section('content')
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
       {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/> --}}
       {{--  <link rel="stylesheet" href="{{ asset('novedades/novedades.css') }}"> --}}
    </head>

    <body>
        <br>
        <h1 style="text-align: center">Categorias</h1>
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

                {{-- <div class="swiper-pagination"></div> --}}
            </div>
            <div class="swiper-button-next"></div>
        </div>
        <br>
    </body>
    <!-- Swiper JS -->
    {{-- <script src="js/swiper-bundle.min.js"></script> --}}
    <script src="{{ asset('slider/js/swiper-bundle.min.js') }}"></script>


    <!-- JavaScript -->
    {{-- <script src="js/script.js"></script> --}}
    <script src="{{ asset('slider/js/script.js') }}"></script>

    </html>

    <section class="container-sm">
        <div>
            <h1 style="text-align: center; padding:40px;">Novedades</h1>
        </div>
        <div id="carouselExampleControls" class="carousel carousel-dark slide car-out"
            data-ride="carousel"{{--  data-bs-ride="carousel" --}}>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <div class="carousel-inner">
                @foreach ($a as $item)
                    <div class="carousel-item active" data-bs-interval="5000">
                        <div class="cards-wrapper">
                            {{-- <div class="card" style="background-color: #E3E9E6"> --}}
                            <div class=" row {{-- row-cols-2  --}}g-3">
                                @foreach ($item as $item1)
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="col">
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-header" style="background-color: #000000">
                                                    <h6 class="text-center" style="color: white">SUPER OFERTA</h6>
                                                </div>
                                                <div class="col text-center" style="color:black">
                                                    <img class="card-img-top" src="{{ $item1->url }}" alt="Card image cap"
                                                        style="width:80%">
                                                    <p class="card-text"><strong>{{ $item1->nombre }}</strong></p>
                                                    {{-- <p class="card-text"><strong>{{ $item1->descripcion }}</strong></p> --}}

                                                </div>
                                                <div class="card-footer overflow-hidden d-flex justify-content-evenly"
                                                    text-center"" style="background-color: #FFD507">
                                                    <span style="color:#5D5D5D">Antes <s>Bs.{{ $item1->precio }}</s> </span>
                                                    <span>Ahora <strong>Bs.{{ $item1->preciodesc }}</strong></span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endforeach
                            </div>

                            {{--  </div> --}}

                        </div>
                    </div>
                @endforeach

            </div>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!--------------------------------------------------->
    {{-- <section>

        <div class="swiper mySwiper container">
            <div class="swiper-wrapper content">






                <!------------------------------------------>
                <div class="swiper-slide card">
                    <div class="card-content">
                        <div class="image">
                            <!--<img src="images/img9.jpg" alt="">-->
                        </div>

                        <div class="media-icons">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-github"></i>
                        </div>

                        <div class="name-profession">
                            <span class="name">Someone Name</span>
                            <span class="profession">Web Developer</span>
                        </div>

                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <div class="button">
                            <button class="aboutMe">About Me</button>
                            <button class="hireMe">Hire Me</button>
                        </div>
                    </div>
                </div>
                <!------------------------------------------>



            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </section>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script> --}}
@endsection
