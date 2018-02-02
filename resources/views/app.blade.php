<!DOCTYPE html>
<html lang="en">

  <head>
      @include('layouts/head')
  </head>

  <body>
   @include('layouts/header')
   <div class="container">
   <div class="row">

       @if(Request::is('search'))
        @include('layouts/search_filter')
       @else
        @include('layouts/categories')
       @endif

        @section('search')
        
        @show
      
        @section('main-content')

        @show
   </div>
   </div>

    @include('layouts/footer')

  </body>

</html>
