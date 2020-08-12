@extends('layouts.app')

@section('content')

<!--
    //name: Aaron Stones
    //task: Smarta Rewards Interview
    //date: 09/08/2020
-->

<div class="row">
        <div class="col-md-12">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <form method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="company" class="form-control" placeholder="Enter Company Name" />
            </div>
            <div class="form-group">
                <input type="hidden" name="uuid" class="form-control" value="<?=uniqid(), PHP_EOL;?>"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
            </div>
        </div>

        <table style="color:black;" border = "1">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>UUID</td>
            </tr>
        @foreach ($users as $user)

            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->company }}</td>
                <td><a href="http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/company?u={{ $user->uuid }}">{{ $user->uuid }}</a></td>
            </tr>
        @endforeach
        </table> </br>

@endsection
