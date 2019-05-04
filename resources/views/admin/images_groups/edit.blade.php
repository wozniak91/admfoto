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
            <h1 class="card-title">{{ __('Edytuj grupę') }}</h1>

            {!! Form::model($group, ['method' => 'DELETE', 'action'=> ['ImagesGroupsController@destroy', $group->id ], 'class' => 'card-actions']) !!}
                        
                    <button type="submit" class="card-btn">
                        <i class="material-icons">delete</i>
                    </button>

            {!! Form::close() !!}
        </div>
            <div class="card-body">
            {!! Form::model($group, ['method' => 'PATCH', 'action'=> ['ImagesGroupsController@update', $group->id ], 'class' => 'form']) !!}
                        
                <div class="form-group">
                    
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! Form::label('name', 'Nazwa grupy', ['class' => 'form-label']) !!}
                </div>
                <div class="form-group pt-3 justify-content-end">
                    {!! Form::submit('Zapisz', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>

@endsection
