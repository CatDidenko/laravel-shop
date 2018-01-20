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
            <div data-role="header">
                <h4>Price range</h4>
              </div>
            <form method="post" action="{{ action('CategoryController@getCategoryProducts', ['slug'=> $category->slug ]) }}">
                <div data-role="rangeslider">
                   {!! csrf_field() !!}
                  <input type="number" name="price_min" id="price-min" value="3" min="0" max="1000">
                  <input type="number" name="price_max" id="price-max" value="100" min="0" max="1000">
                  <input type="submit" data-inline="true" value="Search">
                </div>
            </form>
        </div>

        <div class="col-lg-9">
            <button class="btn btn-info" id="price">@sortablelink('price')</button>
            <button class="btn btn-info" id="title">@sortablelink('title')</button>
            <button class="btn btn-info" id="created_at">@sortablelink('created_at')</button>
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

          {!! $products->appends(\Request::except('page'))->render() !!}

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>

@endsection
