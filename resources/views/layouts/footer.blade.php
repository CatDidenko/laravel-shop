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

    <script>
       $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                getProducts(url);
                window.history.pushState("", "", url);
            });

            $('#pricde-desc').on('click', function(e){
                e.preventDefault();
                var
            })

            function getProducts(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('body').html(data);
                }).fail(function () {
                    alert('Products could not be loaded.');
                });
            }
        });
        </script>
