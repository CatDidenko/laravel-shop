@extends('app')

@section('title')
    {{ ucfirst($slug) }}
@endsection

@section('main-content')

        <div class="col-lg-9">
            <div class="control-group">
                <span>&#8645;</span>
                 <select class="custom-select-sm" name="category" onchange="location = this.value; ">
                     <option value="" selected="selected">Ordinary</option>
                     <option value=@sortablelink('title')>Title</option>
                     <option value=@sortablelink('created_at')>Date of create</option>
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
                     <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="title" value="{{ $product->title }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="submit" class="btn btn-primary" value="Add to Cart">
                    </form>
                </div>
              </div>
            </div>
    @endforeach

          </div>

          {!! $products->appends(\Request::except('page'))->render() !!}

        </div>

@endsection
