<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Card Slider</title>

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
                            <a href="{{ $item->nombre }}" class="image-content">
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
