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
            <div id="carouselExampleControls"  class="carousel carousel-dark slide car-out" data-ride="carousel"{{--  data-bs-ride="carousel" --}}>
                <div class="carousel-inner">
                    @foreach ($a as $item)
                    <div class="carousel-item active" data-bs-interval="5000" >
                        <div class="cards-wrapper" >
                            <div class="card" style="background-color: #E3E9E6" style="width: 15rem;">
                                <div class=" row row-cols-1 g-5">
                                    @foreach ($item as $item1)
                                        <div class="col-12 col-md-6 col-lg-4 ">
                                            {{-- <div class="card" > --}}
                                                <div class="card-header c-header">
                                                    <h5 class="text-center" style="color: white">SUPER OFERTA</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col text-center" style="color:black">
                                                        <img src="{{$item1->url}}" class="card-img-top" alt="" style="">
                                                        <h6 class=""> {{$item1->nombre}} </h6>
                                                        <h6 class="" > {{$item1->descripcion}} </h6>
                                                    </div>
                                                </div>
                                                <div class="card-footer c-footer d-flex justify-content-evenly" text-center">
                                                    <s style="color:#5D5D5D"><h4>Bs.{{$item1->precio}}</h4></s>
                                                    <h4 style="color:black"><b>Bs.{{$item1->preciodesc}}</b></h4>
                                                </div>
                                            {{-- </div> --}}
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                   @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
</section>
@endsection
