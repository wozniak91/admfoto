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
                <h1 class="card-title">{{ __('Nowy obraz karuzeli') }}</h1>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'slider.store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::file('image', old('image'), ['class' => 'form-control-file', 'required']) !!}
       
                </div>

                <div class="form-group">
                    
                    {!! Form::text('title', null,['class' => 'form-control']) !!}
                    {!! Form::label('title', 'Tytuł', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    
                    {!! Form::text('description', null,['class' => 'form-control']) !!}
                    {!! Form::label('description', 'Krótki opis', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group pt-3">
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>
@endsection
