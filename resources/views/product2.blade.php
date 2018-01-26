@extends('app')

@section('title')
    {{ $product->title }}
@endsection

@section('main-content')

	<div class="col-lg-9">
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="{{ route('home') }}">Home</a> <span class="divider">/</span></li>
    <li><a href="{{ route('category', ['slug' => $product->category->slug]) }}">{{ $product->category->name }}</a> <span class="divider">/</span></li>
    <li class="active">{{ $product->title }}</li>
    </ul>
	<div class="row">
			<div id="gallery" class="span3">
                            <img src="{{ asset("$product->image") }}" style="width:100%"/>
			<div id="differentview" class="moreOptopm carousel slide">
                        </div>
			</div>
			 <div class="col-md-8">
                            <h3>{{ $product->title }}</h3>
				<h4>${{ $product->price }}</h4>
                                    <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="title" value="{{ $product->title }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="submit" class="btn btn-info btn-lg" value="Add to Cart">
                                    </form>

                                <form action="{{ url('/wishlist') }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="title" value="{{ $product->title }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="submit" class="btn btn-success btn-lg" value="Add to Wishlist">
                            </form>


				<hr class="soft"/>
				<h4>{{ $product->count }} items in stock</h4>
				<hr class="soft clr"/>
				<p> {{ $product->content }}</p>
			</div>

            @if($product->attributes != "")
            <div class="span9">
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane active in" id="detail">
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
                                @foreach($product->attributes as $attribute)
				<tr class="techSpecRow"><td class="techSpecTD1">{{ $attribute['name'] }}</td><td class="techSpecTD2">{{ $attribute['desc'] }}</td></tr>
                                @endforeach
				</tbody>
		</table>
              </div>

          </div>

	</div>
            @endif
</div>
</div>
</div>

@endsection
