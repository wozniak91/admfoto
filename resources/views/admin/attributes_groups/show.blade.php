@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Grupa').' '.$group->name }}</h1>
    		<p class="card-description">
    			{{ $group->type }}
    		</p>
    		<div class="card-actions">
    			<a href="{{ route('attributes.create') }}" class="card-btn"><i class="material-icons">add</i></a>
    		</div>
    	</div>
    		  
      <div class="card-body">
        <div class="table-fluid">
            <table class="table">
                <thead class="table-header">
                    <th class="table-header--col">#</th>
                    <th class="table-header--col">Wartość</th>
                    <th class="table-header--col">Edycja</th>
                </thead>
                
                <tbody class="table-body">
                    @foreach($attributes as $attribute)
                    <tr class="table-row">
                        <td class="table-col">{{ $attribute->id }}</td>
                        <td class="table-col">{{ $attribute->value }}</td>
                        <td class="table-col"><a href="{{ action('AttributesController@edit', $attribute->id ) }}">Edytuj</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div>

    </div>
    

@endsection
