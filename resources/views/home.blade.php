@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Url</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('save_url') }}" method="POST" enctype="multipart/form-data">
 
                    @csrf
                    <div class= "form-group">
                        <label for="exampleInputEmail1">Url</label>
                        <input type="text" class="form-control" required name="url"placeholder="Enter URL">
                        <small id="emailHelp" class="form-text text-muted">Enter Your URL</small>
                    </div>
                    
                    <div class= "form-group">
                        <label for="exampleInputEmail1">Maximum Click Limit</label>
                        <input type="number" min=0  class="form-control" required name="maximum_limit"placeholder="Maximum Click Limit">
                        <small id="emailHelp" class="form-text text-muted">Enter Your URL</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of URL</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">URL</th>
                                <th scope="col">Maximum Clicks</th>
                                <th scope="col">No. of Clicks</th>
                                <th scope="col">New URL</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($urls as $key=> $url)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$url->url}}</td>
                                <td>{{$url->maximum_limit}}</td>
                                <td>{{$url->clicked}}</td>
                                <td>{{$url->short_url}}</td>
                                <td>{{isset($url->user->name) ? $url->user->name : '' }}</td>
                                <td></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection