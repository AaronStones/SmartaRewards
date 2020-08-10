@extends('layouts.app')

@section('content')

<!--
    //name: Aaron Stones
    //task: Smarta Rewards Interview
    //date: 09/08/2020
-->

<?php
    session_start();
    if(isset($_GET['person'])){
        $person = $_GET['person'];
        $results = DB::table('people')->where('peepID', $person)->first();
        $notes = DB::table('peepNotes')->where('peepID', $results->peepID)->get();
        //$notes = DB::select('select * from peepNotes where peepID = :id', ['id' => $results->peepID]); //set two arrays person's details and a persons notes
    }
    else {
        header('Location: http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/');
        exit;
    }
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!--start of a card -->
           <div style="color:black;" class="col-md-12">
           <h1><?=$results->name?></h1>
           <h2><?=$results->email?></h2> 

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

           </div> <!--end of cards -->
           <form method="GET">
                <input type="hidden" name="ident" value="that">
                <label for="fname">Note:</label><br>
                <textarea type="text" id="fname" name="note" required></textarea><br><br>
                <input type="submit" value="Submit">
            </form> <!--form for submitting notes--> 
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
            echo "<h1 style='color:red;'>Failed - characters</h1>"; //check the size of the note
        }
        else{
            DB::insert('insert into peepNotes (note, peepID) values (?, ?)', [$_GET['note'], $results->peepID]); //enter the data into the notes db
        }
    }
?>
@endsection
