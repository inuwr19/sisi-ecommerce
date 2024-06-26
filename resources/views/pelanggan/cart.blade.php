@extends('komponen.index')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="/">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="align-middle">
                            <img src="{{ $cartItem->product->image }}" alt="" style="width: 50px;">
                            {{ $cartItem->product->name }}
                        </td>
                        <td class="align-middle">{{ "Rp." .number_format($cartItem->product->price, 2, ",", ".") }}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                    value="{{ $cartItem->qty }}">
                            </div>
                        </td>
                        <td class="align-middle">{{ "Rp." .number_format($cartItem->product->price * $cartItem->qty, 2, ",", ".") }}</td>
                        <td class="align-middle">
                            <form action="{{ route('removecart', ['id' => $cartItem->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button>
                            </form>

                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">{{"Rp." .number_format($subtotal, 2, ",", ".") }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">Rp.10.000,00</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{"Rp." .number_format($total, 2, ",", ".") }}</h5>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-block btn-primary my-3 py-3">Proceed To
                        Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
