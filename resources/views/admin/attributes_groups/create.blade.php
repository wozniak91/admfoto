@extends('admin.app')

@section('content')

@if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    
            @endif

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ __('Nowy grupa zdjęć') }}</h1>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'attributes_groups.store', 'class' => 'form',]) !!}

                <div class="form-group">
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    {!! Form::label('name', 'Nazwa grupy', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('type', ['number' => 'numer', 'select' => 'lista wyboru'], old('type'), ['class' => 'form-control']) !!}
                    {!! Form::label('type', 'Rodzaj grupy', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group justify-content-end">
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>
@endsection
