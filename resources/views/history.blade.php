@extends("layouts.main")
@section('content')
    <!-- Transaction Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <form action="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Checked Out Date</th>
                                <th scope="col">Products</th>
                                <th scope="col">Shipping To</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $r)
                                <tr>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $r->created_at }}</p>
                                    </td>
                                    <td>
                                        @foreach ($r->products as $p)
                                            <p class="mb-0">{{ $p["name"] }}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $r->shipping_address["address_line"] }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">Rp{{ number_format($r->total_price, 0, ',', '.') }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $r->status }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!-- Transaction Page End -->
@endsection
