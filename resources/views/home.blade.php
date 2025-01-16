@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <h1>Bine ai venit!</h1>
    <p>Alege una dintre opțiunile din meniu pentru a continua:</p>

    <div class="list-group">
        <a href="{{ route('produse.index') }}" class="list-group-item list-group-item-action">
            <strong>Produse</strong> - Administrare produse
        </a>
        <a href="{{ route('orders.create') }}" class="list-group-item list-group-item-action">
            <strong>Creează Comandă</strong> - Adaugă o comandă nouă
        </a>
        <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">
            <strong>Listă Comenzi</strong> - Vizualizează comenzile existente
        </a>
    </div>
</div>
@endsection
