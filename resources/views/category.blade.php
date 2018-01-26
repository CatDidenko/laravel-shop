@extends('app')

@section('title')
    {{ ucfirst($slug) }}
@endsection

@section('main-content')

        <div class="col-lg-9">
            <div class="control-group">
                <span>&#8645;</span>
                 <select class="custom-select-sm" name="category" onchange="location = this.value; ">
                     <option selected="selected">Ordinary</option>
                     <option value=@sortablelink('title') selected="">Title</option>
                     <option value=@sortablelink('created_at') selected="">Date of create</option>
                 </select>
            </div>
            
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

          {!! $products->appends(\Request::except('page'))->render() !!}

        </div>

@endsection
