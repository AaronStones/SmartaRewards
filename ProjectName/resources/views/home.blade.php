@extends('layouts.app')

@section('content')

<!--
    //name: Aaron Stones
    //task: Smarta Rewards Interview
    //date: 09/08/2020
-->

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div style="color:black;" class="col-md-12"> <!-- start the company field-->
                <h1>Companies</h1>
                <div class='w3-container'>
                    <?php 
                        $results = DB::select('select * from companies');
                        for($i =0; $i<sizeof($results); $i++){
                            echo "
                            <div class='w3-card-4' style='width:100%'>
                            <header class='w3-container w3-light-grey'>
                            <h3>" . $results[$i]->name . "</h3></header> 
                            <div class='w3-container'>
                            <p>" . countOccurencesComp($results[$i]) . "</p> 
                            </div>
                            <button onclick=location.href='http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/company?uuid=" . $results[$i]->uuid . "' class=w3-button w3-block w3-dark-grey>View Company</button>
                            </div>
                            </br>";
                        }
                    ?>    
                </div>
                <form method="GET">
                    <input type="hidden" name="company" value="companies">
                    <input type="hidden" id="uuid" name="uuid" value="<?=uniqid()?>">
                    <label for="fname">Company Name:</label><br>
                    <input type="text" id="fname" name="name" hint="Smarta Rewards" required><br><br>
                    <input type="submit" value="Submit">
                </form> 
           </div> <!--end of company field -->


           <div style="color:black;" class="col-md-12"> <!-- start of person's field -->
                <h1>People</h1>
                <div class='w3-container'>
                <?php 
                        $results = DB::table('people')->where('1', '=', 1)->get();
                        for($i =0; $i<sizeof($results); $i++){
                            echo "<div class='w3-card-4' style='width:100%'>
                            <header class='w3-container w3-light-grey'>
                            <h3>" . $results[$i]->name . "</h3></header> 
                            <div class='w3-container'>
                            <p>" . $results[$i]->email . "</p>
                            <p>" . countOccurencesPeep($results[$i]) . "</p>
                            </div>
                            <button onclick=location.href='http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/people?person=" . $results[$i]->peepID . "' class=w3-button w3-block w3-dark-grey>View Person</button>
                            </div>
                            </br>";
                        }
                    ?>    
                </div>     
                <form method="GET">
                    <input type="hidden" name="people" value="people">
                    <label for="fname">Name:</label><br>
                    <input type="text" id="fname" name="name" hint="John Smith" required><br>
                    <label for="lname">Email:</label><br>
                    <input type="text" id="email" name="email" hint="example@example.com" required><br><br>
                    <input type="submit" value="Submit">
                </form>     
            </div>         
        </div>
    </div>
</div> <!-- end of person's field -->

<?php
if(isset($_GET['company'])){ //if a new company entered 
    insertCompanies();
}
if(isset($_GET['people'])){ //if a new person is enetered
    insertPeople();
}
function insertCompanies(){
    DB::insert('insert into companies (name, uuid) values (?, ?)', [$_GET['name'], $_GET['uuid']]); //enter a new company
}
function insertPeople(){
    $result = DB::table('people')->where('email', $_GET['email'])->get();
    //$result = DB::select('select * from people where email = :id LIMIT 1', ['id' => $_GET['email']]); //check if an email exists
    if ($result == null ){
        DB::insert('insert into people (name, email) values (?, ?)', [$_GET['name'], $_GET['email']]);//email is unique enter into database
    }
    else {
        echo "<h1 style=color:red;>this has failed</h1>";
    }
}
function countOccurencesComp($results){
    $num = DB::select('select * from compNotes where compID = :id', ['id' => $results->compID]); //count the occurences of company notes
    echo "There are " . sizeof($num) . " notes";
}
function countOccurencesPeep($results){
    $num = DB::select('select * from peepNotes where peepID = :id', ['id' => $results->peepID]); //count the occurences of peoples notes
    echo "There are " . sizeof($num) . " notes";
}
?>
@endsection
