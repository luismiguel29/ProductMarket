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
    </head>

    <body>

        <br>
        <h1 class="titulo">CATEGORÍAS</h1>
        <div class="container container-categoria">

            <div class="swiper-button-prev"></div>
            <div class="slide-container swiper">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                        @foreach ($categoria as $item)
                            <a style="text-decoration: none" href="{{ route('verproductos.show', $item->idcategoria) }}" class="card swiper-slide  cardCategorias">
                                <div class="image-content">
                                    {{-- <span class="overlay"></span> --}}

                                    <div class="card-image">
                                        <img src="{{ $item->url }}" alt="" class="card-img" cli>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <h2 class="name">{{ $item->nombre }} </h2>

                                    {{-- <button class="button">Ver productos</button> --}}
                                </div>
                            </a>
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


    <!--------------------------------------------------->
    <link rel="stylesheet" href="{{ asset('slider/css/swiper-bundle.min.css') }}">

    <section class="container-sm">

        <div>
            <h1 class="titulo titulo1">NOVEDADES</h1>
        </div>
        <div class="container container-novedades">
            <div class="swiper-button-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            </div>
            <div id="carouselExampleControls" class="carousel  slide "
                data-ride="carousel"{{--  data-bs-ride="carousel" --}}>
                <div class="carousel-inner">
                    @foreach ($a as $item)
                        <div class="carousel-item active" data-bs-interval="5000">
                            <div class="cards-wrapper">
                                <div class="card" style="background-color: #E3E9E6; border:#E3E9E6" >
                                    <div class=" row {{-- row-cols-1 --}} g-5">
                                        @foreach ($item as $item1)
                                            <div class="col-12 col-md-6 col-lg-4 ">
                                                <a style="text-decoration: none; color: black" href="{{ route('info', $item1->idproducto) }}" class="card h-100" {{-- style="width: 15rem; " --}}>
                                                    <div class="card-header c-header">
                                                        <h5 class="text-center" style="color: white">SUPER OFERTA</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col text-center" style="color:black">
                                                            <img src="{{ $item1->url }}" class="card-img-top"
                                                                alt="" style="width:80%">
                                                            <h5 class=""> {{ $item1->nombre }} <h2>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer c-footer d-flex justify-content-evenly card-footer-Nov"
                                                        text-center">
                                                        <span style="color:#5D5D5D">Antes
                                                            <s>Bs.{{ $item1->precio }}</s></span>
                                                        <span>Ahora <strong>Bs.{{ $item1->preciodesc }}</strong></span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> --}}
            </div>
            <div class="swiper-button-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" style="color: black" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </div>
            
        </div>
        
    </section>



    {{-- ---------------------------------------------------------------- --}}
@endsection
