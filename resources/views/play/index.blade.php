@extends('layouts.app')

@section('content')
    <style>
        html, body {
            margin: 0;
        }
    </style>

    <nav class="shadow-sm navbar navbar-expand-lg background-main navbar-dark py-3" id="mainNav" style="z-index: -999;">
        <div class="container pb-1">
            <img alt="logo" class="img-fluid" height="200px" width="200px" src="{{ asset('img/logo.png') }}">
        </div>
    </nav>

    <div class="container-fluid height-100" id="app">
        <div class="row height-100">
            <div class="col-md-10 border">
                <h1 class="text-white">Game</h1>
            </div>
            <div class="col-md-2 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body" v-chat-scroll="{always: false}">
                        @if(!empty(Auth::user()))
                            <chat-messages :auth_user="{{Auth::user()}}" :messages="messages"></chat-messages>
                        @else
                            <chat-messages :auth_user="null" :messages="messages"></chat-messages>
                        @endif
                    </div>
                    <div class="panel-footer">
                        @if(!empty(Auth::user()))
                            @if (Auth::user()->isMuted())
                                <input id="btn-input" type="text" name="message" class="form-control input-sm"
                                       placeholder="You have been muted" readonly disabled>
                            @else
                                <chat-form
                                    v-on:messagesent="addMessage"
                                    :user="{{ Auth::user() }}"
                                ></chat-form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
