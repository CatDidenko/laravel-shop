<!DOCTYPE html>
<html lang="en">

  <head>
      @include('layouts/head')
  </head>

  <body>
   @include('layouts/header')
   <div class="container">
   <div class="row">

        @include('layouts/categories')
      
        @section('main-content')

        @show
   </div>
   </div>

    @include('layouts/footer')

  </body>

</html>
