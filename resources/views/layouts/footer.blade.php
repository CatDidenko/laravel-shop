<!-- Footer -->
    <nav class="py-4 bg-dark fixed-bottom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; E-Shop 2018</p>
      </div>
      <!-- /.container -->
    </nav>


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('vendor/bootstrap/js/price-range.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <!--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>-->

    @yield('extra-js')

<!--    <script>
       $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                getProducts(url);
                window.history.pushState("", "", url);
            });

//            $('body').on('click', '#price a', function(e) {
//                e.preventDefault();
//                var url = $(this).attr('href');
//                getSortingProducts(url);
//                window.history.pushState("", "", url);
//            });
//
//            $('body').on('click', '#title a', function(e) {
//                e.preventDefault();
//                var url = $(this).attr('href');
//                getSortingProducts(url);
//                window.history.pushState("", "", url);
//            });
//
//            $('body').on('click', '#created_at a', function(e) {
//                e.preventDefault();
//                var url = $(this).attr('href');
//                getSortingProducts(url);
//                window.history.pushState("", "", url);
//            });

            function getProducts(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('body').html(data);
                }).fail(function () {
                    alert('Products could not be loaded.');
                });
            }

            function getSortingProducts(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('body').html(data);
                }).fail(function () {
                    alert('Products could not be loaded.');
                });
            }
        });
        </script>-->
