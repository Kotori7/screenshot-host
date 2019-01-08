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
