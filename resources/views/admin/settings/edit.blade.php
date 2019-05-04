@extends('admin.app')

@section('content')

        @if ( Session::has('success') )
            <aside class="alert alert-success">
            {{ Session::get('success') }}</h3>
            </aside >
        @endif

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
                <h1 class="card-title">{{ __('Ustawienia') }}</h1>
            </div>

            <div class="card-body">
            {!! Form::model(Auth::user(), ['method' => 'PATCH', 'action'=> ['SettingsController@update', Auth::user()->id ], 'class' => 'form form-6']) !!}
                        
                <div class="form-group">
                    
                    {!! Form::text('name', null,['class' => 'form-control', 'required']) !!}
                    {!! Form::label('name', 'Imię', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('email', null,['class' => 'form-control' ,'required']) !!}
                    {!! Form::label('email', 'E-mail', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" />
                    {!! Form::label('password', 'Nowe hasło', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" />
                    {!! Form::label('password_confirmation', 'Powtórz nowe hasło', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group pt-3 justify-content-end">
                    {!! Form::submit('Zapisz', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>

@endsection
