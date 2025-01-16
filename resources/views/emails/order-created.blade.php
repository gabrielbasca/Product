<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comanda a fost creată</title>
</head>
<body>
    <h1>Comanda a fost creată!</h1>
    <p>Comanda ta cu ID-ul {{ $order->id }} a fost înregistrată cu succes.</p>
    <p>Total: {{ $order->total }}</p>
    <p>Adresă de livrare: {{ $order->shipping_address }}</p>
</body>
</html>
