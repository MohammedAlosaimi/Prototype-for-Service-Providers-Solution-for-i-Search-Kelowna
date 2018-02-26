
<?php
   $mysqli = mysqli_connect("localhost", "root", "", "i-searchkelownadb");
if (isset($_POST['op1'])){  
   $sql = "SELECT DISTINCT(COL10)
           FROM tableone";
   $sql2 = "SELECT DISTINCT(COL12)
           FROM tableone";
   $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
   $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
   $rArray = array();
   $rArray2 = array();
   $finalArray = array(array());
    while ($info = mysqli_fetch_array($result)){       
        $in = stripslashes($info["COL10"]);
        array_push($rArray, $in);
    }
    while ($info = mysqli_fetch_array($result2)){       
        $in = stripslashes($info["COL12"]);      
        array_push($rArray2, $in);
    }
    $size = sizeof($rArray);
    for ($i = 1; $i < $size; $i++){
        echo $rArray[$i], "<br>";
        echo "Description: ", $rArray2[$i], "<br>";
    }
}
if (isset($_POST['op2'])){
    //WHERE ( ... php generated where list based on the input form)
    $sqlOp2 = "SELECT title, contact_person, phone_number, email
    FROM isearch.istable	
    ORDER BY (Number_of_Dormitory_Beds +
              Number_of_Shared_Bedroom_Beds +
	      Number_of_Single_Bedroom_Beds +
              Number_of_Studio/Bachelor_Units +
              Number_of_1_Bedroom_Units +
              Number_of_2_Bedroom_Units +
              Number_of_3_Bedroom_Units +
              Number_of_4_Bedroom_Units +
              Number_of_Other_Type_Bedroom_Units +
              Number_Beds_in_house_with_shared_bedroom(s) +
              Number_of_Beds_in_House_with_Individual_Rooms +
              Number_of_Apartment_Studio_Units +
              Number_of_1_Bedroom_Apartment_Units +
              Number_of_2_and_3_Bedroom_Apartment_Units +
              Number_of_Other_Units +
              Number_of_Beds_in_Shared_Accommodation_House +
              Number_of_Units_in_Secondary_House_Suite +
              Number_of_Duplex_Units +
              Number_of_Fourplex_Units +
              Number_of_Townhouse_Units)";                
        $result3 = mysqli_query($mysqli, $sqlOp2) or die(mysqli_error($mysqli));
        $rArray3 = array();
        while ($info = mysqli_fetch_array($result)){
            $temp = "";
            $in1 = stripslashes($info["title"]);
            $in2 = stripslashes($info["contact_person"]);
            $in3 = stripslashes($info["phone_number"]);
            $in4 = stripslashes($info["email"]);
            $temp = $in1 + "\n" + $in2 + "\n" + $in3 + "\n" + $in4 + "\n";
            //make 4d array?
            array_push($rArray3, $temp);
        }
        for ($i = 1; $i < $size; $i++){
        echo $rArray[$i], "<br>";
        echo "Description: ", $rArray2[$i], "<br>";
        }
}
if (isset($_POST['op3'])){
    
}
if (isset($_POST['op4'])){
    
}
if (isset($_POST['op5'])){
    
}
if (isset($_POST['op6'])){
    
}