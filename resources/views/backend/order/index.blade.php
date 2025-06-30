@extends('layouts.backend')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Data Orders
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataOrder">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Code</th>
                                        <th>User</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>Rp. {{ number_format($order->total_price, 0, '.', '.') }}</td>
                                            <td>
                                            @if($order->status == 'pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif($order->status == 'completed')
                                                <span class="badge bg-success text-dark">Success</span>
                                            @else
                                            <span class="badge bg-danger text-dark">Canceled</span>
                                            @endif
                                            </td>
                                            <td> {{ $order->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('backend.orders.show', $order->id) }}"
                                                    class="btn btn-sm btn-info">Detail</a>
                                                    <form action="{{ route('backend.orders.destroy', $order->id)}}" method="post"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Yakin ingin menghapus order ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection