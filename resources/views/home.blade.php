@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br/>
                    <br/>
                    <h4>Upload</h4>
                    <form id="upload-form" action="/upload" method="post">
                        <input type="text" name="key" style="display:none;" width="1" height="1" value="{{Auth::user()->apikey}}">
                        <input formenctype="multipart/form-data" name="file" type="file" id="upload-file"><br/><br/>
                        <button class="btn btn-primary" id="upload-button" type="submit" value="Upload">Upload</button>
                    </form><br/>
                    <p id="upload-result"></p><br/>
                    <h4>Your files</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Filename</th>
                            <th>Uploaded at</th>
                        </tr>
                        @foreach($files as $file)
                            <tr>
                                <td>{{$file->filename}}</td>
                                <td>{{$file->created_at}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
