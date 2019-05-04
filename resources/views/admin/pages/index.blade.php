@extends('admin.app')

@section('content')

@if ( Session::has('success') )
    <aside class="alert alert-success">
    {{ Session::get('success') }}</h3>
    </aside >
@endif

    <div class="card">
    	<div class="card-header">
    		<h1 class="card-title">{{ __('Lista stron') }}</h1>
    		<p class="card-description">
    			{{ __('Lista wszystkich dostepnych podstron') }}
    		</p>
    		<div class="card-actions">
    			<a href="{{ route('pages.create') }}" class="card-btn"><i class="material-icons">add</i></a>
    		</div>
    	</div>
    	<div class="card-body">
    		<div class="table-fluid">
            <table class="table">
                <thead class="table-header">
                    <th class="table-header--col">#</th>
                    <th class="table-header--col">Tytuł</th>
                    <th class="table-header--col">Treść</th>
                    <th class="table-header--col">Edycja</th>
                </thead>
                
                <tbody class="table-body">
                    @foreach($pages as $page)
                    <tr class="table-row">
                        <td class="table-col">{{ $page->id }}</td>
                        <td class="table-col">{{ $page->title }}</td>
                        <td class="table-col">{{ str_limit($page->content, 80) }}</td>
                        <td class="table-col"><a href="{{ action('PagesController@edit', $page->id ) }}">Edytuj</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
    	</div>
    </div>
    

@endsection
