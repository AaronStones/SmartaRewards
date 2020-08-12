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
        <form method="get" action="{{url ('company')}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="company" class="form-control" placeholder="Enter Company Name" />
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
                <td>{{ $user->uuid }}</td>
            </tr>
        @endforeach
        </table> </br>


    </div>
</div>
@endsection