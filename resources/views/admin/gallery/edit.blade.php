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
            <div class="card-body">
            {!! Form::model($slider, ['method' => 'PATCH', 'action'=> ['PagesController@update', $slider->id ], 'class' => 'form']) !!}
                        
                <div class="form-group">
                    
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! Form::label('title', 'Tytuł', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('description', null,['class' => 'form-control', 'id' => 'textarea']) !!}
                    {!! Form::label('description', 'Opis', ['class' => 'form-label']) !!}
                    
                </div>
                <div class="form-group pt-3 justify-content-end">
                    {!! Form::submit('Zapisz', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>

@endsection
