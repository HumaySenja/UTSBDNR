@extends("layouts.main")
@section('content')
    <!-- Transaction Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Checked Out Date</th>
                                <th scope="col">Products</th>
                                <th scope="col">Shipping To</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pay</th>
                                <th scope="col">Cancel</th>
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
                                    <td>
                                        @if ($r->status !== 'Paid')
                                            <form action="{{ route('transaction.pay') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$r->id}}">
                                                <input type="hidden" name="status" value="Paid">
                                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                                    <i class="fa fa-check text-success"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('transaction.remove', ['transactionId' => $r->id]) }}" method="POST">
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
        </div>
    </div>
    <!-- Transaction Page End -->
@endsection
