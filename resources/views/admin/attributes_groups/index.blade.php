@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Grupy atrybutów') }}</h1>
    		<p class="card-description">
    			{{ __('Lista dostępnych grup atrybutów dla zdjęć') }}
    		</p>
    		<div class="card-actions">
    			<a href="{{ route('attributes_groups.create') }}" class="card-btn"><i class="material-icons">add</i></a>
    		</div>
    	</div>
    		  
      <div class="card-body">
        <div class="table-fluid">
            <table class="table">
                <thead class="table-header">
                    <th class="table-header--col">#</th>
                    <th class="table-header--col">Nazwa grupy</th>
                    <th class="table-header--col">Typ grupy</th>
                    <th class="table-header--col">Podgląd / Edycja</th>
                </thead>
                
                <tbody class="table-body">
                    @foreach($groups as $group)
                    <tr class="table-row">
                        <td class="table-col">{{ $group->id }}</td>
                        <td class="table-col">{{ $group->name }}</td>
                        <td class="table-col">{{ $group->type == 'select' ? 'Lista wyboru' : 'Numer' }}</td>
                        <td class="table-col"><a href="{{ action('AttributesGroupsController@show', $group->id ) }}">Zobacz</a><a href="{{ action('AttributesGroupsController@edit', $group->id ) }}">Edytuj</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $groups->links() }}
      </div>

    </div>
    

@endsection
