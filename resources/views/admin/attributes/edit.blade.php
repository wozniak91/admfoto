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
            <h1 class="card-title">{{ __('Edytuj atrybut') }}</h1>

            {!! Form::model($attribute, ['method' => 'DELETE', 'action'=> ['AttributesController@destroy', $attribute->id ], 'class' => 'card-actions']) !!}
                        
                    <button type="submit" class="card-btn">
                        <i class="material-icons">delete</i>
                    </button>

            {!! Form::close() !!}
        </div>
            <div class="card-body">
            {!! Form::model($attribute, ['method' => 'PATCH', 'action'=> ['AttributesController@update', $attribute->id ], 'class' => 'form']) !!}
                        
                <div class="form-group">
                    <select name="attributes_group_id" id="attributes_group_id" class="form-control">
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" {{ $group->attributes_group_id == $group->id ? 'selected' : ''}}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                    {!! Form::label('attributes_group_id', 'Grupa atrybutu', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('value', old('value'), ['class' => 'form-control']) !!}
                    {!! Form::label('value', 'Wartość', ['class' => 'form-label']) !!}
                </div>

                <div class="form-group justify-content-end">
                    {!! Form::submit('Zmień', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>

             {!! Form::close() !!}
             </div>
    	</div>

@endsection
