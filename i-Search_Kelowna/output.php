
<?php
if (isset($_POST['op1'])){
   $in = "";
   $size = 0;
   $mysqli = mysqli_connect("localhost", "root", "", "i-searchkelownadb");
   $sql = "SELECT DISTINCT(COL10)
           FROM tableone";
   $sql2 = "SELECT DISTINCT(COL12)
           FROM tableone";
   $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
   $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
   $rArray = array();
   $rArray2 = array();
    while ($info = mysqli_fetch_array($result)){       
       $in = stripslashes($info["COL10"]);
       array_push($rArray, $in);
    }
    while ($info = mysqli_fetch_array($result2)){       
       $in = stripslashes($info["COL12"]);
       array_push($rArray2, $in);
    }
    $size = sizeof($rArray);
    for ($i = 1; $i < $size; $i++) {
    echo $rArray[$i], "<br>";
    $temp = $rArray2[$i];
    echo "Description:", $temp, "<br>";
    }
}

if (isset($_POST['op2'])){
    
}
if (isset($_POST['op3'])){
    
}
if (isset($_POST['op4'])){
    
}
if (isset($_POST['op5'])){
    
}
