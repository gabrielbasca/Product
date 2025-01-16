@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produse</h1>
    <a href="{{ route('produse.create') }}" class="btn btn-primary mb-3">Adaugă Produs</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Monedă</th>
                <th>Preț</th>
                <th>Cantitate</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produse as $produs)
                <tr>
                    <td>{{ $produs->id }}</td>
                    <td>{{ $produs->name }}</td>
                    <td>{{ $produs->currency->name }}</td>
                    <td>{{ $produs->price }}</td>
                    <td>{{ $produs->quantity }}</td>
                    <td>
                        <a href="{{ route('produse.edit', $produs) }}" class="btn btn-warning">Editează</a>
                        <form action="{{ route('produse.destroy', $produs) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Șterge</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
