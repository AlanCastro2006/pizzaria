<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Administração</h3>
                    </div>
                    <div class="card-body text-center">
                        <p>Escolha uma categoria para gerenciar:</p>
                        <div class="d-grid gap-3">
                            <a href="{{ route('bebidas_adm.bebidas') }}" class="btn btn-primary">Bebidas</a>
                            <a href="{{ route('pizzas_adm.pizzas') }}" class="btn btn-success">Pizzas</a>
                            <a href="{{ route('promo_adm.promo') }}" class="btn btn-warning">Promoções</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
