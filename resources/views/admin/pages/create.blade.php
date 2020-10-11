@extends('admin.app')

@section('content')
<div class="container">

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
                <h1 class="card-title">{{ __('Nowa strona') }}</h1>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'pages.store', 'class' => 'form']) !!}
                        
                <div class="form-group">
                    {!! Form::text('title', null,['class' => 'form-control', 'required']) !!}
                    {!! Form::label('title', 'Tytuł', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('meta_title', null,['class' => 'form-control', 'required']) !!}
                    {!! Form::label('meta_title', 'Meta tytuł', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('meta_description', null,['class' => 'form-control', 'required']) !!}
                    {!! Form::label('meta_description', 'Meta opis', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('content', null,['class' => 'form-control', 'id' => 'textarea', 'required']) !!}
                    {!! Form::label('content', 'Treść', ['class' => 'form-label']) !!}
                    
                </div>
                <div class="form-group pt-3">
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>
</div>
@endsection
