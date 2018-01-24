 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">E-Shop</a>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                     <li>
                                        <a href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                        @endguest
                    </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ action('ProductController@search')}}">
                {!! csrf_field() !!}
                <input class="form-control mr-sm-2" type="text" name="search" value="" placeholder="Search">
                <div class="form-group mr-sm-2">
                    <select class="custom-select" name="category">
                      <option value="">In all categories</option>
                      <option value="clothes">Clothes</option>
                      <option value="toys">Toys</option>
                    </select>
                  </div>
            <input class="btn btn-info my-2 my-sm-0" type="submit" value="Search">
            </form>
            </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{ Request::is('wishlist') ? 'active' : '' }}"><a href="{{ url('/wishlist') }}">Wishlist ({{ Cart::instance('wishlist')->count(false) }})</a></li>
            <li class="{{ Request::is('cart') ? 'active' : '' }}"><a href="{{ url('/cart') }}">Cart ({{ Cart::instance('default')->count(false) }})</a></li>
        </ul>
      </div>
    </nav>