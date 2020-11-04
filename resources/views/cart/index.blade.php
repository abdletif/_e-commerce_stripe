
@include('partials._header')
@include('partials._nav')

<div class="container my-5 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <form action="{{ route("cart.deleteAll") }}" method="post">

                   <h3>{{ Cart::count() }} item(s) in your cart</h3>

                    @csrf
                    @method("DELETE")

                    <button type="submit" class="btn btn-sm btn-danger float-right" >Reset Cart</button>
                </form>
                @if(session('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success_message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (Cart::instance('default')->content() as $item)
                            <tr>
                                <td><img style="width: 50px; height: 50px;" src="{{ asset('storage/images/PC-HP.png') }}" /> </td>
                                <td>
                                    <a class="text-decoration-none" href="{{ route('products.show',$item->model->slug) }}">{{ $item->model->title }}</a>
                                </td>
                                <td align="center">{{ $item->qty }}</td>
                                <td class="text-right">{{ '$'.$item->model->price }}</td>
                                <td class="text-right">
                                    <form action="{{ route("cart.destroy",$item->rowId ) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger mb-2">Remove</button><br>
                                    </form>
                                    <form action="{{ route('cart.saveForLater',$item->rowId) }}" method="post">
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-dark">Save for later</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <td colspan="5" align="center">
                                    Your cart is empty ! <a href="{{ route('shop.index') }}" class="text-decoration-none">Continue shopping &lArr;</a>
                                </td>
                            @endforelse
                        <tr><td colspan="7"></td></tr>
                        <tr><td colspan="7"></td></tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Subtotal</td>
                            <td class="text-right text-bold h5">${{ Cart::subtotal() }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Tax(13%)</strong></td>
                            <td class="text-right"><strong>${{ Cart::tax() }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>${{ Cart::total() }}</strong></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col my-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ url("/") }}" class="btn btn-lg btn-block btn-success">Continue Shopping</a>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <a href="{{ route('confirmation.index') }}" class="btn btn-lg btn-block btn-primary text-decoration-none text-uppercase">Checkout</a>
                        </div>
                    </div>
                </div>
                <h4>Item(s) saved  for later</h4>
                <table class="table table-striped"><hr>
                    @forelse (Cart::instance('saveForLater')->content() as $item)
                        <tr>
                            <td><img style="width: 50px; height: 50px;" src="{{ asset('storage/images/PC-HP.png') }}" /> </td>
                            <td>
                                <a class="text-decoration-none" href="{{ route('products.show',$item->model->slug) }}">{{ $item->model->title }}</a>
                            </td>
                            <td align="center">{{ $item->qty }}</td>
                            <td class="text-right">{{ '$'.$item->model->price }}</td>
                            <td class="text-right">
                                <form action="{{ route("cart.destroySaveLater",$item->rowId ) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger mb-2">Remove</button><br>
                                </form>
                                <form action="{{ route('cart.MoveToCart',$item->rowId) }}" method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-info text-white">Move To Cart</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5">No item(s) saved for later</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>

@include('partials._footer',['check'=> false])
