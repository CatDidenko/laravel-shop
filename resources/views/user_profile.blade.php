@extends('app')

@section('title', 'User profile')

@section('main-content')


<div class="container">
        <!--/col-3-->
        <div class="col-lg-8">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">Information</a></li>
                <li><a href="#orders" data-toggle="tab">Orders</a></li>
                <li><a href="#edit" data-toggle="tab">Edit user information</a></li>
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
                    <div class="tab-pane" id="edit">
                    <h2></h2>
                    <form class="" method="POST" action="">
                        <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" placeholder="Enter username">
                      </div>
                        <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="emai1" value="{{ Auth::user()->email }}" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" autocomplete="new-password" placeholder="Password">
                      </div>
                        <div class="form-group">
                    <button type="submit" class="btn btn-info">Update</button>
                        </div>
                   </form>
                </div>
            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->
</div>


@endsection
