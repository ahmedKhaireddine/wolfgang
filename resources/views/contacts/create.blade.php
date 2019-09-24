@extends('layouts.index', ['title' => 'Contactez-nous'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                <h2 class="m-4">Contactez nous</h2>
            </div>
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                <form action="{{ route('messages.store') }}" method="POST" >
                    {{-- novalidate une methode qui nous permet de blocker la validation coté client--}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="firstName" class="control-label sr-only">Prénom</label>
                        <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Entrer votre prénom..." required="required" value="{{ old('firstName') }}">
                        {!! $errors->first('firstName', '<small class="error">:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="control-label sr-only">Nom</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Entrer votre nom..." required="required" value="{{ old('lastName') }}">
                        {!! $errors->first('lastName', '<small class="error">:message</small>') !!}
                    </div>
                    <div class="form-group ">
                        <label for="email" class="control-label sr-only">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Entrer votre email..." required="required" value="{{ old('email') }}">
                        {!! $errors->first('email', '<small class="error">:message</small>') !!}
                    </div>
                    <div class="form-group ">
                        <label for="phone" class="control-label sr-only">Tel</label>
                        <input type="phone" name="phone" class="form-control" id="phone" placeholder="Entrer votre télèphone..." required="required" value="{{ old('phone') }}">
                        {!! $errors->first('phone', '<small class="error">:message</small>') !!}
                    </div>
                    <div class="form-group ">
                        <label for="content" class="control-label sr-only">Message</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Entrer votre demande..." required="required">{{ old('content') }}</textarea>
                        {!! $errors->first('content', '<small class="error">:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Valider la demande &raquo;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop