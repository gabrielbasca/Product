@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adaugă Produs</h1>
    <form action="{{ route('produse.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nume</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="currency_id" class="form-label">Monedă</label>
            <select name="currency_id" class="form-control" id="currency_id" required>
                @foreach ($currencies as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Preț</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Cantitate</label>
            <input type="number" name="quantity" class="form-control" id="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvează</button>
    </form>
</div>
@endsection
