@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif


    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Grupy zdjęć') }}</h1>
    		<p class="card-description">
    			{{ __('Lista dostępnych grup zdjęć') }} <small>({{ __('Tagi na stronie głównej') }})</small>
    		</p>
    		<div class="card-actions">
    			<a href="{{ route('groups.create') }}" class="card-btn"><i class="material-icons">add</i></a>
    		</div>
    	</div>
    		  
      <div class="card-body">
        <div class="table-fluid">
            <table class="table">
                <thead class="table-header">
                    <th class="table-header--col">#</th>
                    <th class="table-header--col">Nazwa grupy</th>
                    <th class="table-header--col">Edycja</th>
                </thead>
                
                <tbody class="table-body">
                    @foreach($groups as $group)
                    <tr class="table-row">
                        <td class="table-col">{{ $group->id }}</td>
                        <td class="table-col">{{ $group->name }}</td>
                        <td class="table-col"><a href="{{ action('ImagesGroupsController@edit', $group->id ) }}">Zobacz</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $groups->links() }}
      </div>

    </div>
    

@endsection
