@extends('layouts.template')

@section('content')
    <section class="container-sm">
            <div id="carouselExampleControls"  class="carousel carousel-dark slide car-out" data-ride="carousel"{{--  data-bs-ride="carousel" --}}>
                <div class="carousel-inner">
                    @foreach ($b as $item)   
                    <div class="carousel-item active" data-bs-interval="5000" >
                        <div class="cards-wrapper" >
                            <div class="card" style="background-color: #E3E9E6">
                                <div class=" row row-cols-1 g-5">
                                    @foreach ($item as $item1)
                                        <div class="col-12 col-md-6 col-lg-4 ">
                                            <div class="card h-100">
                                                <div class="card-header c-header">
                                                    <h5 class="text-center" style="color: white">SUPER OFERTA</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col text-center" style="color:black">
                                                        <img src="{{$item1->url}}" class="card-img-top" alt="">
                                                        <h5 class=""> {{$item1->nombre}} <h2>
                                                        <h5 class="" > {{$item1->descripcion}} <h2>
                                                    </div>
                                                </div>
                                                <div class="card-footer c-footer d-flex justify-content-evenly" text-center">
                                                    <s style="color:#5D5D5D"><h4>Bs.{{$item1->precio}}</h4></s>
                                                    <h4 style="color:black"><b>Bs.{{$item1->preciodesc}}</b></h4>
                                                </div>
                                            </div>
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