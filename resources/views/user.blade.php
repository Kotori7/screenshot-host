@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Dashboard</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        {{--<div class="section">--}}
                            {{--<h4>User Details</h4>--}}
                            {{--<div class="alert alert-warning">this doesn't work lmao</div>--}}
                            {{--<form action="/user" method="post">--}}
                                {{--@csrf--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="email">Email:</label>--}}
                                    {{--<input type="email" class="form-control" id="email" placeholder="Email (required)" name="email" value="{{$email}}">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="current-pwd">Current password:</label>--}}
                                    {{--<input type="password" class="form-control" id="current-pwd" placeholder="Current password (required)" name="current-pwd">--}}
                                {{--</div>--}}
                                {{--<a data-toggle="collapse" data-target="#change-pwd">Change password?</a>--}}
                                {{--<div id="change-pwd" class="collapse">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="new-pwd">New password:</label>--}}
                                        {{--<input type="password" class="form-control" id="new-pwd" placeholder="New password (optional)" name="new-pwd">--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="new-pwd-confirm">Confirm new password:</label>--}}
                                        {{--<input type="password" class="form-control" id="new-pwd-confirm" placeholder="Confirm new password (optional)" name="new-pwd-confirm">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<br/>--}}
                                {{--<br/>--}}
                                {{--<button class="btn btn-success" type="submit" value="Submit changes">Submit changes</button>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<br/>--}}
                        {{--<br/>--}}
                        <div class="section">
                            <h4>API Key</h4>
                            <div class="alert-warning">Remember to always keep your API key secret!</div>
                            <div class="form-group">
                                <label for="apikey">Your API Key:</label>
                                <input type="text" class="form-control" id="apikey" value="{{$apikey}}" name="apikey">
                            </div>
                            <br/>
                            <p>Reset API Key</p>
                            <div class="alert-danger">When you click this button, your API key will be reset <b>immediately!</b><br/>
                            You'll need to change the configuration of any apps that are using it.</div>
                            <form action="/user/apikey" method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit" value="Reset API Key">Reset API Key</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection