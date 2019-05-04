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
            <h1 class="card-title">{{ __('Edytuj kombinacje') }}</h1>
            
            {!! Form::model($combination, ['method' => 'DELETE', 'action'=> ['CombinationsController@destroy', $combination->id ], 'class' => 'card-actions']) !!}
                        
                    <button type="submit" class="card-btn">
                        <i class="material-icons">delete</i>
                    </button>

            {!! Form::close() !!}
        </div>
            <div class="card-body">
            {!! Form::model($combination, ['method' => 'PATCH', 'action'=> ['CombinationsController@update', $combination->id ], 'class' => 'form']) !!}
                        
                <div class="form-group">
                    {!! Form::number('price', old('price'), ['class' => 'form-control']) !!}
                    {!! Form::label('price', 'Wpływ na cenę', ['class' => 'form-label']) !!}
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="default" id="default" value="1"{{ $combination->default ? ' checked disabled' : '' }}>
                    <label class="form-check-label" for="default">{{ __('Ustaw kombinację jako domyślną') }}</label>
                </div>
                <div class="form-group justify-content-end">
                    {!! Form::submit('Zapisz', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
                </div>
             {!! Form::close() !!}
             </div>
    	</div>

        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title">{{ __('Reguły cenowe') }}</h1>
                <div class="card-actions">
    			    <a href="{{ route('price_rule.create', ['id_combination' => $combination->id]) }}" class="card-btn"><i class="material-icons">add</i></a>
    		    </div>
            </div>
            <div class="card-body">
             
                <div class="table-fluid">
                    <table class="table">
                        <thead class="table-header">
                            <th class="table-header--col">#</th>
                            <th class="table-header--col">Cena</th>
                            <th class="table-header--col">Minimalna ilość zdjęć</th>
                            <th class="table-header--col">Maksymalna ilość zdjęć</th>
                            <th class="table-header--col">Edycja</th>
                        </thead>
                        
                        <tbody class="table-body">
                            @foreach($combination->priceRules as $rule)
                            <tr class="table-row">
                                <td class="table-col">{{ $rule->id }}</td>
                                <td class="table-col">{{ $rule->price }}</td>
                                <td class="table-col">{{ $rule->min_images_count }}</td>
                                <td class="table-col">{{ $rule->max_images_count }}</td>
                                <td class="table-col"><a href="{{ route('price_rule.edit', ['id_combination' => $combination->id, 'price_rule' => $rule->id]) }}">{{ __('Edytuj') }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>

@endsection
