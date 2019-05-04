@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Galeria') }}</h1>
    		<p class="card-description">
    			{{ __('Zdjęcia galerii na stronie głównej') }}
    		</p>
    		<div class="card-actions">
    			<a href="{{ route('gallery.create') }}" class="card-btn"><i class="material-icons">add</i></a>
    		</div>
    	</div>
    	<div class="card-body">
    		  
            @foreach($images as $image)
                
                <article class="image">

                    {!! Form::model($image, ['method' => 'DELETE', 'action'=> ['GalleriesController@destroy', $image->id ], 'class' => 'form']) !!}
                            
                            <button type="submit" class="image-remove">
                            <i class="material-icons">
                            delete
                            </i>  
                            </button>

                        {!! Form::close() !!}


                      <figure class="image-container">
                          <img src="{{ $image->image_link }}" class="img-fluid"/>
                      </figure>  
                </article>

            @endforeach

    	</div>
    </div>
    

@endsection
