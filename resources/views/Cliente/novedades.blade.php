@extends('layouts.template')

@section('content')
    <div>
        <h1>CATEGORIAS</h1>

    </div>
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



   {{--  OFICIAL  SHIFT + ALT + A --}}
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
