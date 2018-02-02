@extends('app')

@section('title', 'Main')

@section('main-content')

        <div class="col-lg-9">
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
            @if(Request::is('search'))
             {!! $products->appends(request()->query())->links() !!}
            @endif
        </div>

@endsection