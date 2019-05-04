@extends('admin.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                	<h1 class="card-title">
                		{{ __('Dashboard') }}
                	</h1> 
            	</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Zostałaś/eś poprawnie zalogowany') }}
                </div>
            </div>
        </div>
    </div>

@endsection
