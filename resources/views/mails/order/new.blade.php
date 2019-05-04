<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nowe zamówienie</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400');
    
    .header {
        padding: 1rem;
        text-align: center;
        border-bottom: 1px solid #ccc;
    }
    .content {
        max-width: 768px;
        padding: 0 1rem;
        display: block;
        margin: 0 auto;
    }
    .content-body {
        padding: 1.5rem 0;
    }
    .heading {
        font-size: 1.5rem;
        font-weight: 300;
        text-align: center;
        text-transform: uppercase;
        max-width: 100%;
        padding: 1rem 0;
        border-bottom: 1px solid black;
        line-height: 1;
    }
    .lead {
        font-size: 1rem;
        font-weight: 300;
        margin: 0 0 0 1rem 0;
        font-family: "Montserrat", sans-serif;
        text-align: center;
    }

    .table {
        width: 100%;
    }
    .td {
        height: 100%;
        width: 100%;
        display: block;
        vertical-align: top;
    }
    @media (min-width: 768px) {
        .td {
            display: table-cell;
            width: 50%;
        }
    }
    .table, 
    .tr, 
    .td {
        border: none;
    }

    .card {
        display: block;
        padding: 1rem;
        border: 1px solid #ccc;
        height: 100%;
    }
    .card-title {
        font-size: 1.1rem;
        margin: 0 0 1rem 0;
        font-weight: 300;
        color: black;
        border-bottom: 1px solid #ccc;
        padding-bottom: .2rem;
    }
    .card-text {
        font-size: .9rem;
        margin: 0 0 .5rem 0;
        color: black;
        line-height: 1;
    }
    .footer {
        padding: 1rem;
        border-top: 1px solid #ccc;
        font-size: .9rem;
        color: #777;
        text-align: center;
    }

    </style>
</head>
<body>



<div class="content">
    <div class="header">
        <img class="header-img" src="{{ URL::asset('/public/img/logo.png') }}" width="240" alt="{{ config('app.name', 'Laravel') }}"/>
    </div>

    <h1 class="heading">Nowe zamówienie nr #{{ $order->id }}</h1>

    <div class="content-body">

        <table class="table">
            <tbody>
                <tr class="tr">
                    <td class="td">
                        <div class="card">
                            <h2 class="card-title">Dane zamawiającego</h2>
                            <p class="card-text">Imię: {{ $order->firstname }} </p>
                            <p class="card-text">Nazwisko: {{ $order->firstname }}</p>
                            <p class="card-text">Email: {{ $order->email }}</p>
                            <p class="card-text">Tel: {{ $order->phone_number }}</p>
                        </div>
                    </td>
                    <td class="td">
                        <div class="card">
                            <h2 class="card-title">Metoda płatnośći</h2>
                            @if ($order->payment_id == 1)
                            <p class="card-text">Płatność przy odbiorze</p>
                            @elseif ($order->payment_id == 2)
                            <p class="card-text">Przedpłata na konto</p>
                            @endif
                            <p class="card-text">Do zapłaty: <strong>{{ $order->displayPrice($order->total_price) }}</strong></stron></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="footer">
        © Fotoadamski Fotografia 2019 | Zdjęcia ślubne | Fotograf Kępno
    </div>

</div>
</body>
</html>