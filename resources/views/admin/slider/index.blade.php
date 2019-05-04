@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Karuzela') }}</h1>
    		<p class="card-description">
    			{{ __('Karuzela zdjęć na głównej stronie') }}
    		</p>
    		<div class="card-actions">
    			<a href="{{ route('slider.create') }}" class="card-btn"><i class="material-icons">add</i></a>
    		</div>
    	</div>
    	<div class="card-body">
    		
            <div class="images">

            @foreach($slides as $slide)
                <article class="image">
                     {!! Form::model($slide, ['method' => 'DELETE', 'action'=> ['SliderController@destroy', $slide->id ], 'class' => 'form']) !!}
                        
                        <button type="submit" class="image-remove">
                          <i class="material-icons">
                          delete
                          </i>  
                        </button>

                     {!! Form::close() !!}
                      <figure class="image-container">
                          <img src="{{ $slide->image_link }}" class="img-fluid"/>
                      </figure>  
                </article>
            @endforeach
            </div>
    	</div>
    </div>
    

@endsection
