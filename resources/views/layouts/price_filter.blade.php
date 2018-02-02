                <div data-role="header">
                 <h4>Price range</h4>
               </div>
             <form method="post" action="{{ action('CategoryController@getCategoryProducts', ['slug'=> $slug ]) }}">
                 <div data-role="rangeslider">
                    {!! csrf_field() !!}
                  <input type="number" name="price_min" id="price-min" value="3" min="0" max="1000">
                  <input type="number" name="price_max" id="price-max" value="100" min="0" max="1000">
                  <input type="submit" data-inline="true" value="Search">
                </div>
            </form>
