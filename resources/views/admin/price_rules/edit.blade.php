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
            <h1 class="card-title">{{ __('Edytuj kombinacje') }}</h1>
            
            {!! Form::model($rule, ['method' => 'DELETE', 'action'=> ['PriceRulesController@destroy', $combination_id, $rule->id ], 'class' => 'card-actions']) !!}
                        
                    <button type="submit" class="card-btn">
                        <i class="material-icons">delete</i>
                    </button>

            {!! Form::close() !!}
        </div>

        <div class="card-body">
        
            {!! Form::model($rule, ['method' => 'PATCH', 'action'=> ['PriceRulesController@update', $combination_id, $rule->id ], 'class' => 'form']) !!}
                {!! Form::hidden('combination_id', $combination_id) !!}
                <div class="form-group">
                    {!! Form::number('price', old('price'), ['class' => 'form-control']) !!}
                    {!! Form::label('price', 'Cena', ['class' => 'form-label']) !!}
                </div>

                <div class="form-group">
                    {!! Form::number('min_images_count', old('min_images_count'), ['class' => 'form-control']) !!}
                    {!! Form::label('min_images_count', 'Minimalna ilość zdjęć', ['class' => 'form-label']) !!}
                </div>

                <div class="form-group">
                    {!! Form::number('max_images_count', old('max_images_count'), ['class' => 'form-control']) !!}
                    {!! Form::label('max_images_count', 'Maksymalna ilość zdjęć', ['class' => 'form-label']) !!}
                </div>

                <div class="form-group justify-content-end">
                    {!! Form::submit('Zapisz', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>

        </div>

@endsection
