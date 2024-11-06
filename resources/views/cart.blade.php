@extends("layouts.main")
@section('content')
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/img/' . $cartItem->product->images) }}"
                                            class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                            alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $cartItem->product->name }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp{{ number_format($cartItem->product->price, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">

                                        <input type="text" class="form-control form-control-sm text-center border-0"
                                            id="quantity-{{ $cartItem->id }}" value="{{ $cartItem->quantity }}" readonly>
                                    </div>
                                </td>

                                <td>
                                    <p class="mb-0 mt-4 total-price">
                                        Rp{{ number_format($cartItem->product->price * $cartItem->quantity, 0, ',', '.') }}
                                    </p>
                                </td>                                
                                
                                <td>
                                    <form action="{{ route('cart.remove', ['cartId' => $cartItem->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-md rounded-circle bg-light border mt-4">
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">Rp{{ number_format($total, 0, ',', '.') }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div>
                                    <p class="mb-0">Flat rate: Rp3,000</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to Indonesia</p>
                        </div>

                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">Rp{{ number_format($total + 3000, 0, ',', '.') }}</p>
                        </div>
                        <a href="{{ route('checkout') }}"
                            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proceed Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection


