@extends('admin.app')

@section('content')

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Newsletter') }}</h1>
    		<p class="card-description">
    			{{ __('Wyślij newsletter do swoich klientów') }}
    		</p>
    	</div>

        
    	<div class="card-body">
            @if (count($orders) > 0)
            {!! Form::model($newsletter, ['route' => 'newsletter.store', 'class' => 'form form-newsletter']) !!}
            <div class="form-group">
                <h3 class="form-title">{{ __('Wybierz subskrybentów:') }}</h3>
                <select name="subscribes[]" id="subscribes" multiple class="form-control">
                    @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->email }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
               
                {!! Form::text('title', null,['class' => 'form-control','id' => 'title','required']) !!}
                {!! Form::label('title', 'Tytuł wiadomości', ['class' => 'form-label']) !!}
            </div>
            <div class="form-group">
                <h3 class="form-title">{{ __('Szablon wiadomości:') }}</h3>
                {!! Form::textarea('content', null,['class' => 'form-control', 'id' => 'textarea','required']) !!}
            </div>

                {!! Form::submit('Wyślij', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}

            {!! Form::close() !!}
            @else

                <p class="lead text-center">{{ __('Brak subskrybentów') }}</p>

            @endif
    	</div>
        

         
    </div>


@endsection
