@extends('layouts.app')

@section('content')

<!--
    //name: Aaron Stones
    //task: Smarta Rewards Interview
    //date: 09/08/2020
-->

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
                <td>{{ $user->uuid }}</td>
            </tr>
        @endforeach
        </table> </br>
    </div>
</div>
@endsection