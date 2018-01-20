<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; E-Shop 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

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
