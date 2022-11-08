<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <form action="{{ route('categoria.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nombre" id="">
            <input type="file" name="file" id="">
            <button type="submit" class="btn btn-primary">Registrar</button>
    </div>




    {{-- <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($productos as $item)
            <div class="col">
                <div class="card">
                    <img src="{{ $item->url }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nombre }}</h5>
                        <p class="card- text">{{ $item->precio }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
