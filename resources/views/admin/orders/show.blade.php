@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

<div class="card">
	<div class="card-body">
  		<h1 class="card-title">Zamówienie numer: {{ $order->id }}</h1>
    </div>
</div>

  <section class="row">
	<div class="col-6">
	  <article class="card">
			<div class="card-header">
				<h3 class="card-title">
					{{ __('Dane kontaktowe') }}
				</h3>
			</div>
	  	<div class="card-body">
	  		<table class="table">
	            <tbody class="table-body">
	                
	                <tr class="table-row">
		                <td class="table-col">Imię i nazwisko</td>
		                <td class="table-col">{{ $order->firstname.' '.$order->lastname }}</td>
	                </tr>
	                <tr class="table-row">
		                <td class="table-col">E-mail</td>
		                <td class="table-col">{{ $order->email }}</td>
	                </tr>
			            <tr class="table-row">
		                <td class="table-col">Numer telefonu</td>
		                <td class="table-col">{{ $order->phone_number }}</td>
	                </tr>
	            </tbody>
	  		</table>	
	  	</div>
	  </article>
	</div>
  	<div class="col-6">
	  <article class="card">
		<div class="card-header">
			<h3 class="card-title">{{ __('Status realizacji') }}</h3>
		</div>

	  	<div class="card-body">
				{!! Form::model($order, ['method' => 'PATCH', 'action'=> ['OrdersController@update', $order->id ], 'class' => 'form']) !!}
					<div class="form-group">
						{!! Form::select('status_id', ['1' => 'Nowe zamówienie', '2' => 'W realizacji', '3' => 'Wykonane'], $order->status_id, ['class' => 'form-control']) !!}
						{!! Form::label('status_id', 'Zamień status zamówienia', ['class' => 'form-label']) !!}
					</div>
					
					<div class="form-group pt-3 justify-content-end">
              {!! Form::submit('Zmień', ['class' => 'btn btn-primary']) !!}
          </div>

				{!! Form::close() !!}
	  	</div>
	  </article>
	</div>


  </section>

<div class="card">
	<div class="card-body">
  		<h1 class="card-title">Zdjęcia <small>({{ count($images) }})</small></h1>
    </div>
</div>

  <section class="row">
	@foreach ($images as $image)
	<div class="col-3">
		<div class="card">
			<img src="{{ '/storage/images/orders/'.$order->id.'/'.$image->name }}" class="card-image"/>
			<div class="card-body">

				@foreach ($image->combination->attributes as $attribute)

				<p class="card-text">{{ $attribute->value }}</p>

				@endforeach

				<p class="card-text">ilość: {{ $image->qty }}</p>
				<p class="card-text">Cena: {{ $order->displayPrice($order->getImagePrice($image)) }}</p>
			</div>
		</div>
	</div>
	@endforeach	

</section>

<div class="card card-secondary">
		<div class="card-body text-right">
				<span class="totalPrice">{{ __('Do zapłaty: ').$order->displayPrice($order->getTotalPrice()) }}</span>
		</div>
</div>

@endsection
