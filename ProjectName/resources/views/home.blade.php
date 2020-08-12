@extends('layouts.app')

@section('content')

<!--
    //name: Aaron Stones
    //task: Smarta Rewards Interview
    //date: 09/08/2020
-->

<div class="container-fluid">
    <div class="col-md-12">
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
    </div>
    <div class="col-md-12">
    <a href="http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/companies">
        <button>Visit Companies</button>
    </a>     
    <a href="http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/people">
        <button>Visit People</button>
    </a>    
</div>





@endsection