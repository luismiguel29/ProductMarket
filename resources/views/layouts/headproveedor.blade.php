<!DOCTYPE html>
<html>
   <head>
    <!-- Just an image -->
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    @yield ('style')

   <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
         <img src="{{ asset('imagenes/Group 33.png') }}" width="80" height="80" alt="logoProductmarket">
      </a>
   </nav>
   </head>
   <body>

      @yield('body')
   </body>
   <footer class="bg-light text-center text-lg-start">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: #FFD507;">
      
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
  </footer>
</html>

