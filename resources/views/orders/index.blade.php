@extends('layouts.app')

@section('title', 'Listă Comenzi')

@section('content')
<div class="container">
    <h1>Listă Comenzi</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($orders->isEmpty())
        <p>Nu există comenzi înregistrate.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilizator</th>
                    <th>Total</th>
                    <th>Adresă Livrare</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>
                        <a href="{{ route('orders.pdf', ['id' => $order->id]) }}" class="btn btn-primary">
                            Afisare PDF
                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
