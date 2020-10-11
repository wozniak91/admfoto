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
                <h1 class="card-title">{{ __('Edytuj stronę') }}</h1>
            </div>
            <div class="card-body">
            {!! Form::model($page, ['method' => 'PATCH', 'action'=> ['PagesController@update', $page->id ], 'class' => 'form']) !!}
                        
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
                    {!! Form::textarea('content', null,['class' => 'form-control', 'id' => 'textarea','required']) !!}
                    {!! Form::label('content', 'Treść', ['class' => 'form-label']) !!}
                    
                </div>
                <div class="form-group pt-3 justify-content-end">
                    {!! Form::submit('Zapisz', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>

@endsection
