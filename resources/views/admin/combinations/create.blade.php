@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

@if(count($errors) > 0)
    <aside class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </aside>
@endif

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ __('Nowa kombinacja') }}</h1>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'combinations.store', 'class' => 'form',]) !!}

                <div class="form-group">
                    {!! Form::number('price', (old('price') ? old('price') : 0), ['class' => 'form-control']) !!}
                    {!! Form::label('price', 'Wpływ na cenę', ['class' => 'form-label']) !!}
                </div>

                @foreach ($groups as $group)

                    <div class="form-group">
                        <select name="attributes[]" id="{{ 'group_'.$group->id }}" class="form-control">
                            @foreach ($group->attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->value }}</option>
                            @endforeach
                        </select>
                        {!! Form::label('group_'.$group->id, $group->name, ['class' => 'form-label']) !!}
                    </div>
                @endforeach

                {{-- <div class="form-group">
                    {!! Form::select('type', ['number' => 'numer', 'select' => 'lista wyboru'], old('type'), ['class' => 'form-control']) !!}
                    {!! Form::label('type', 'Rodzaj grupy', ['class' => 'form-label']) !!}
                </div> --}}
                <div class="form-group justify-content-end">
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>
@endsection
