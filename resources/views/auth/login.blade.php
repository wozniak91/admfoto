@extends('admin.app')

@section('content')
<div class="content">
    <div class="row justify-center">
        <div class="col-6">
            <img class="img-fluid login-logo" src="/img/logo.png">
            <p class="login-text">Panel logowania</p>
            <div class="card">
                {{-- <div class="card-header">
                    <h1 class="card-title">{{ __('Panel logowania') }}</h1>
                </div> --}}
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="form">
                         @csrf
                        <div class="form-group">
                            {!! Form::email('email', old('email'),['class' => 'form-control', 'required']) !!}
                            {!! Form::label('email', 'E-mail', ['class' => 'form-label']) !!}

                        @if ($errors->has('email'))
                            <span class="form-error" role="alert">
                                 {{ $errors->first('email') }}
                            </span>
                        @endif
                        </div>

                        <div class="form-group">
                            {!! Form::input('password', 'password', old('password'), ['class' => 'form-control', 'required']) !!}
                            {!! Form::label('password', 'Hasło', ['class' => 'form-label']) !!}

                        @if ($errors->has('password'))
                            <span class="form-error" role="alert">
                                 {{ $errors->first('password') }}
                            </span>
                        @endif
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">{{ __('Pozostań zalogowany') }}</label>
                        </div>

                       <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">{{ __('Zaloguj') }}</button>
                        </div>
                        
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a class="btn-link" href="{{ route('password.request') }}">{{ __('Zapomniałeś hasła?') }}</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
