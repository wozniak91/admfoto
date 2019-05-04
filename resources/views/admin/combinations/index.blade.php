@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Kombinacje') }}</h1>
    		<p class="card-description">
    			{{ __('Lista dostępnych kombinacji zdjęć') }}
    		</p>
    		<div class="card-actions">
    			<a href="{{ route('combinations.create') }}" class="card-btn"><i class="material-icons">add</i></a>
    		</div>
    	</div>
    		  
      <div class="card-body">
        <div class="table-fluid">
            <table class="table">
                <thead class="table-header">
                    <th class="table-header--col">#</th>
                    <th class="table-header--col">Nazwa</th>
                    <th class="table-header--col">Cena</th>
                    <th class="table-header--col text-center">Domyślna</th>
                    <th class="table-header--col">Edycja</th>
                </thead>
                
                <tbody class="table-body">
                    @foreach($combinations as $combination)
                    <tr class="table-row">
                        <td class="table-col">{{ $combination->id }}</td>
                        <td class="table-col">
                        @foreach($combination->attributes as $attribute)
                        {{ $attribute->value.'-'}}
                        @endforeach
                        </td>
                        <td class="table-col">{{ $combination->price }}</td>
                        <td class="table-col text-center">
                            @if ($combination->default)
                                <i class="material-icons text-success">check</i>
                            @else
                                <i class="material-icons text-danger">close</i>
                            @endif
                        </td>
                        <td class="table-col"><a href="{{ action('CombinationsController@edit', $combination->id ) }}">Edytuj</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $combinations->links() }}
      </div>

    </div>
    

@endsection
