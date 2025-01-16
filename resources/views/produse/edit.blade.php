@extends('layouts.app')

@section('title', 'Editare Produs')

@section('content')
<div class="container">
    <h1>Editare Produs</h1>
    <form action="{{ route('produse.update', $produse->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nume Produs</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $produse->name }}" required>
        </div>

        <div class="mb-3">
            <label for="currency_id" class="form-label">Monedă</label>
            <select name="currency_id" id="currency_id" class="form-select" required>
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}" 
                        {{ $produse->currency_id == $currency->id ? 'selected' : '' }}>
                        {{ $currency->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preț</label>
            <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ $produse->price }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantitate</label>
            <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $produse->quantity }}" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvează Modificările</button>
            <a href="{{ route('produse.index') }}" class="btn btn-secondary">Anulează</a>
        </div>
    </form>
</div>
@endsection
