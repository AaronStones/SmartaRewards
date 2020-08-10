@extends('layouts.app')

@section('content')

<!--
    //name: Aaron Stones
    //task: Smarta Rewards Interview
    //date: 09/08/2020
-->

<?php
    session_start();
    if(isset($_GET['uuid'])){
        $company = $_GET['uuid'];
        $results = DB::table('companies')->where('uuid', $company)->first();
        //$notes = DB::select('select * from compNotes where compID = :id', ['id' => $results->compID]); //setup an array of company and a company's notes
        $notes = DB::table('compNotes')->where('compID', $results->compID)->get();
    }
    else {
        header('Location: http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/');
        exit;
    }
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
    <div class="row justify-content-center"> <!-- start a card -->
        <div class="col-md-8">
           <div style="color:black;" class="col-md-12">
           <h1><?=$results->name?></h1>
           <h2><?=$results->uuid?></h2>

                <div class='w3-container'>
                    <?php 
                        for($i =0; $i<sizeof($notes); $i++){
                            echo "
                            <div class='w3-card-4' style='width:100%'>
                            <header class='w3-container w3-light-grey'>
                            <h3>" . $results->name . "</h3></header> 
                            <div class='w3-container'>
                            <p>" . $notes[$i]->note . "</p>
                            </div>
                            </div>
                            </br>";
                        }
                    ?>    
                </div>

           </div> <!-- end all cards -->
           <form method="GET">
                <input type="hidden" name="ident" value="that">
                <label for="fname">Note:</label><br>
                <textarea type="text" id="fname" name="note" required></textarea><br><br>
                <input type="submit" value="Submit">
            </form> <!-- form for submitting notes on companies -->
        </div>
    </div>
</div>

<?php
    if(isset($_GET['ident'])){
        insertNote();
    }

    function insertNote(){
        $note = $_GET['note'];
        if (strlen($note) > 254){
            echo "<h1 style='color:red;'>Failed - characters</h1>"; //if a note is greater than 254 output an error
        }
        else{
            DB::insert('insert into compNotes (note, compID) values (?, ?)', [$_GET['note'], $results->compID]); //else enter it to the db
        }
    }
?>
@endsection
