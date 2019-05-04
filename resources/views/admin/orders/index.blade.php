@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Zamówienia') }}</h1>
    		<p class="card-description">
    			{{ __('Lista wszystkich zamówień') }}
    		</p>
    	</div>
    	<div class="card-body">
    		<div class="table-fluid">
            <table class="table">
                <thead class="table-header">
                    <th class="table-header--col">#</th>
                    <th class="table-header--col">Imie i nazwisko</th>
                    <th class="table-header--col">E-mail</th>
                    <th class="table-header--col">Data zamówienia</th>
                    <th class="table-header--col">Podgląd</th>
                </thead>
                
                <tbody class="table-body">
                    @foreach($orders as $order)
                    <tr class="table-row">
                        <td class="table-col">{{ $order->id }}</td>
                        <td class="table-col">{{ $order->firstname.' '.$order->lastname }}</td>
                        <td class="table-col">{{ $order->email }}</td>
                        <td class="table-col">{{ $order->created_at }}</td>
                        <td class="table-col"><a href="{{ action('OrdersController@show', $order->id) }}">Zobacz</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $orders->links() }}
    	</div>
    </div>
    

@endsection
