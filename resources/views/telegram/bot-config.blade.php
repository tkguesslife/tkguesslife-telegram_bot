
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Telegram bot configurations</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                            <form class="form-horizontal" method="POST" action="{{ route('update_bot_config') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('bot_token') ? ' has-error' : '' }}">
                                    <label for="bot_token" class="col-md-4 control-label">Telegram token</label>

                                    <div class="col-md-6">
                                        <input id="bot_token" type="text" class="form-control" name="bot_token" value="{{ old('bot_token') }}" required autofocus>

                                        @if ($errors->has('bot_token'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('bot_token') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('default_currency') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Default currency</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="default_currency" value="{{ old('default_currency') }}" required autofocus>

                                        @if ($errors->has('default_currency'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('default_currency') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('webhook_url') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Web hook</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="webhook_url" value="{{ old('webhook_url') }}" required autofocus>

                                        @if ($errors->has('webhook_url'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('webhook_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
