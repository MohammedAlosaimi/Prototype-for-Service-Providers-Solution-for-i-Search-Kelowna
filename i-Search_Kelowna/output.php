<?php
if (isset($_POST['op1'])){
   $in = "";
   $mysqli = mysqli_connect("localhost", "root", "", "i-searchkelownadb");
   $sql = "SELECT "COL' '10"
           FROM tableone";
   $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
   $rArray = array();
   $counter = 0;
   while ($info = mysqli_fetch_array($result)){
       $in = stripslashes($info["COL' '10"]);    
                array_push($rArray, $in);
            }
            echo $counter;
}

if (isset($_POST['op2'])){
    
}
if (isset($_POST['op3'])){
    
}
if (isset($_POST['op4'])){
    
}
if (isset($_POST['op5'])){
    
}
