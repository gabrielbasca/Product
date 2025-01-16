@extends('layouts.app')

@section('title', 'Creează Comandă')

@section('content')
<div class="container">
    <h1>Creează o Nouă Comandă</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">ID Utilizator</label>
            <input type="number" name="user_id" class="form-control" id="user_id" placeholder="Introduceți ID-ul utilizatorului" required>
        </div>

        <div class="mb-3">
            <label for="shipping_address" class="form-label">Adresă de Livrare</label>
            <input type="text" name="shipping_address" class="form-control" id="shipping_address" placeholder="Introduceți adresa de livrare" required>
        </div>

        <h3>Produse</h3>
        <div id="product-list">
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="product_1" class="form-label">Produs</label>
                    <select name="products[0][id]" id="product_1" class="form-select" required>
                        <option value="">Selectați un produs</option>
                        @foreach ($produse as $produs)
                            <option value="{{ $produs->id }}">{{ $produs->name }} - {{ $produs->price }} {{ $produs->currency->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="quantity_1" class="form-label">Cantitate</label>
                    <input type="number" name="products[0][quantity]" id="quantity_1" class="form-control" placeholder="Cantitate" min="1" required>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-danger mt-4 remove-product" disabled>Șterge</button>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-success" id="add-product">Adaugă Produs</button>
        </div>

        <button type="submit" class="btn btn-primary">Creează Comandă</button>
    </form>
</div>

<script>
    let productCount = 1;

    document.getElementById('add-product').addEventListener('click', function() {
        const productList = document.getElementById('product-list');
        const newProductRow = document.createElement('div');
        newProductRow.className = 'row mb-2';
        newProductRow.innerHTML = `
            <div class="col-md-6">
                <label for="product_${productCount}" class="form-label">Produs</label>
                <select name="products[${productCount}][id]" id="product_${productCount}" class="form-select" required>
                    <option value="">Selectați un produs</option>
                    @foreach ($produse as $produs)
                        <option value="{{ $produs->id }}">{{ $produs->name }} - {{ $produs->price }} {{ $produs->currency->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="quantity_${productCount}" class="form-label">Cantitate</label>
                <input type="number" name="products[${productCount}][quantity]" id="quantity_${productCount}" class="form-control" placeholder="Cantitate" min="1" required>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger mt-4 remove-product">Șterge</button>
            </div>
        `;
        productList.appendChild(newProductRow);

        // Enable "Șterge" buttons
        document.querySelectorAll('.remove-product').forEach(button => {
            button.disabled = false;
            button.addEventListener('click', function() {
                this.closest('.row').remove();
            });
        });

        productCount++;
    });
</script>
@endsection
