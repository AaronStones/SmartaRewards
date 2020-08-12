@extends('layouts.app')

@section('content')

<!--
    //name: Aaron Stones
    //task: Smarta Rewards Interview
    //date: 09/08/2020
-->

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Data</h3>
  <br />
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
            <input type="text" name="name" class="form-control" placeholder="Enter Customer's Name" />
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="example@example.com"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" />
        </div>
        </form>
        </div>
        </div>

        <table style="color:black;" border = "1">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
            </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </table> </br>
    </div>
</div>
@endsection