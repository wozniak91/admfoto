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
                <h1 class="card-title">{{ __('Nowy zdjęcie galerii') }}</h1>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'gallery.store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::file('image', old('image'), ['class' => 'form-control-file', 'required']) !!}
                </div>

                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                        
                        {!! Form::text('title', null,['class' => 'form-control']) !!}
                        {!! Form::label('title', 'Tytuł', ['class' => 'form-label']) !!}
                        </div>
                        <div class="form-group">
                            
                            {!! Form::text('description', null,['class' => 'form-control']) !!}
                            {!! Form::label('description', 'Krótki opis', ['class' => 'form-label']) !!}
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                        
                        <h3 class="form-title">{{ __('Wybierz grupy zdjęć:') }}</h3>

                        <select name="groups[]" id="groups" multiple class="form-control">
                            @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                        </div> 
                    </div>



                </div>

                <div class="form-group justify-content-end">
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>
@endsection
