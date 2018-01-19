@extends('app')

@section('main-content')

<div class="container">

      <div class="row">

        <div class="col-lg-3">

          <div class="list-group">
        @foreach($categories as $category)
                <a href="{{asset("/category/$category->slug")}}" class="list-group-item">{{$category->name}}</a>
        @endforeach
          </div>
        </div>
<!--         /.col-lg-3 -->

        <div class="col-lg-9">
            <button class="btn btn-info" id='price-desc'>Price</button>
            <div class="row">

    @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <img class="card-img-top" src="{{ asset("$product->image") }}" alt="">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="{{ asset("products/$product->slug") }}">{{$product->title}}</a>
                  </h4>
                  <h5>{{$product->price}} $</h5>
                  <p class="card-text">{{$product->content}}</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary col-xs-6 col-sm-12">Add to cart</button>
                </div>
              </div>
            </div>
    @endforeach


          </div>
          <!-- /.row -->

          {{ $products->links() }}

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>

@endsection
