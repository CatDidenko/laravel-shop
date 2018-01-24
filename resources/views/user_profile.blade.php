@extends('app')

@section('main-content')

<div class="container">
        <!--/col-3-->
        <div class="col-lg-10">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">Information</a></li>
                <li><a href="#orders" data-toggle="tab">Orders</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane" id="home">

                    <h2></h2>

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Profile</li>
                        <li class="list-group-item text-left"><b>Username:</b> {{ $user->name }}</li>
                        <li class="list-group-item text-left"><b>Email:</b> {{ $user->email }}</li>
                        <li class="list-group-item text-left"><b>Date of registration:</b> {{ $user->created_at }}</li>
                    </ul>

                </div>

                <div class="tab-pane active" id="orders">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Number of order</th>
                                    <th>Products</th>
                                    <th>Count</th>
                                    <th>Created date</th>
                                </tr>
                            </thead>
                            <tbody id="items">
                              @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                       <td>
                                           <ul>
                                        @foreach($order->products as $product)
                                        <li><a href="{{ url('/products', [$product->slug]) }}">{{ $product->title }}</a></li>
                                        @endforeach
                                        </ul>
                                       </td>
                                       <td>
                                        <ul>
                                        @foreach($order->count as $count)
                                        <li>{{ $count }}</li>
                                        @endforeach
                                        </ul>
                                       </td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                            </div>
                        </div>
                    </div>
                    <!--/table-resp-->
                    <hr>
                </div>
            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->
</div>


@endsection
