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
                <h1 class="card-title">{{ __('Nowy atrybut') }}</h1>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'attributes.store', 'class' => 'form',]) !!}
                
                <div class="form-group">
                
                <select name="attributes_group_id" id="attributes_group_id" class="form-control">
                    
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach

                </select>
                {!! Form::label('attributes_group_id', 'Grupa atrybutu', ['class' => 'form-label']) !!}


                </div>
                <div class="form-group">
                    {!! Form::text('value', old('value'), ['class' => 'form-control']) !!}
                    {!! Form::label('value', 'Wartość', ['class' => 'form-label']) !!}
                </div>

                <div class="form-group justify-content-end">
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>
@endsection
