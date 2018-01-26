 <div class="col-lg-3">
          <div class="list-group">
        @foreach($categories as $category)
            @if(isset($slug) && $category->slug == $slug)
                <a href="{{asset("/category/$category->slug")}}" class="list-group-item active">{{$category->name}}</a>
            @else
                <a href="{{asset("/category/$category->slug")}}" class="list-group-item">{{$category->name}}</a>
            @endif
        @endforeach
          </div>
<!--     <div class="price-range">
		<div class="well text-center">
                    <div class="slider slider-horizontal" style="width: 174px;">
                        <div class="slider-track">
                            <div class="slider-selection" style="left: 25.8333%; width: 40%;"></div>
                            <div class="slider-handle round left-round" style="left: 25.8333%;"></div>
                            <div class="slider-handle round" style="left: 65.8333%;"></div>
                        </div>
                            <div class="tooltip top" style="top: -30px; left: 47.25px;">
                                <div class="tooltip-arrow"></div>
                                <div class="tooltip-inner">155 : 405</div>
                            </div>
                        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" style="">
                    </div>
                    <br>
			<b class="pull-left">$ 0</b>
                        <b class="pull-right">$ 600</b>
		</div>
     </div>-->
     </div>
