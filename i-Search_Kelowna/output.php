
<?php
   //ID 1 to 6 are general search subjects. ID 7 is refine search. ID 8 is to get contact information
   //make an array of currently selected options, numbers which corespond to them, nested for echo where array contains $j 
 //$data = $_POST['data']; 
 //echo $data;
 
$id = $_GET['id'];
echo $id;
   $keywords;
   $ageDemo;
   $rent;
   $buildingType;
   $gender;
   $alcohol;
   $disAcc;
   $pets;
   $mysqli = mysqli_connect("localhost", "root", "", "isearch");
   $allArray = array(array());
   $allSearch = "SELECT DISTINCT title, description, layer_title, 
                                 Building_Type, Services_Provided, Other_Services, 
                                 Building_Accommodated_Individuals_with_Disabilities, 
                                 Monthly_Cost_Calculation, Building_is_Pet_Friendly, 
                                 Accommodations_For_Smoking, Residents_are_required_to_abstain_from_alcohol_and_drugs,
                                 Level_of_Drugs_and_Alcohol_Tolerence, Demographic_Served,
                                 Search_Keywords, id, Gender_Served, Primary_Target_Resident, Other_Services
                 FROM isearch";
   $allResult = mysqli_query($mysqli, $allSearch) or die(mysqli_error($mysqli));
   $inner = 0;
   $outer = 0;
    while ($info = mysqli_fetch_array($allResult)){  
        $in1 = stripslashes($info["title"]);
            $allArray[$outer][$inner] = $in1;
        $in2 = stripslashes($info["description"]);
            $allArray[$outer][$inner + 1] = $in2;
        $in3 = stripslashes($info["layer_title"]);
            $allArray[$outer][$inner + 2] = $in3;
        $in4 = stripslashes($info["Building_Type"]);
            $allArray[$outer][$inner + 3] = $in4;
        $in5 = stripslashes($info["Services_Provided"]);
            $allArray[$outer][$inner + 4] = $in5;
        $in6 = stripslashes($info["Other_Services"]);
            $allArray[$outer][$inner + 5] = $in6;
        $in7 = stripslashes($info["Building_Accommodated_Individuals_with_Disabilities"]);
            $allArray[$outer][$inner + 6] = $in7;
        $in8 = stripslashes($info["Monthly_Cost_Calculation"]);
            $allArray[$outer][$inner + 7] = $in8;
        $in9 = stripslashes($info["Building_is_Pet_Friendly"]);
            $allArray[$outer][$inner + 8] = $in9;
        $in10 = stripslashes($info["Accommodations_For_Smoking"]);
            $allArray[$outer][$inner + 9] = $in10;
        $in11 = stripslashes($info["Residents_are_required_to_abstain_from_alcohol_and_drugs"]);
            $allArray[$outer][$inner + 10] = $in11;
        $in12 = stripslashes($info["Level_of_Drugs_and_Alcohol_Tolerence"]);
            $allArray[$outer][$inner + 11] = $in12;
        $in13 = stripslashes($info["Demographic_Served"]); 
            $allArray[$outer][$inner + 12] = $in13;
        $in14 = stripslashes($info["Search_Keywords"]);
            $allArray[$outer][$inner + 13] = $in14;
        $in15 = stripslashes($info["id"]);
            $allArray[$outer][$inner + 14] = $in15;
        $in16 = stripslashes($info["Gender_Served"]);
            $allArray[$outer][$inner + 15] = $in16;
        $in17 = stripslashes($info["Primary_Target_Resident"]);
            $allArray[$outer][$inner + 16] = $in17;
        $in18 = stripslashes($info["Other_Services"]);
            $allArray[$outer][$inner + 17] = $in18;
        $outer ++;
    } 
    $numOfRows = count($allArray);
    $numOfCols = count($allArray[0]);   
if ($id == 1){     
   for($i = 0; $i < $numOfRows; $i ++){
        echo $allArray[$i][0] . "<br>"; 
        echo "<br>";
    } 
}
if ($id == 2){
    for($i = 0; $i < $numOfRows; $i ++){
        echo $allArray[$i][0] . "<br>";
        echo $allArray[$i][3] . "<br>";
        echo $allArray[$i][4] . "<br>";
        echo "<br>";
    }
}
if ($id == 3){
    for($i = 0; $i < $numOfRows; $i ++){
        echo $allArray[$i][0] . "<br>";
        echo $allArray[$i][9] . "<br>";
        echo $allArray[$i][10] . "<br>";  
        echo "<br>";
    }
}
if ($id == 4){
    for($i = 0; $i < $numOfRows; $i ++){
        echo $allArray[$i][0] . "<br>";
        echo $allArray[$i][12] . "<br>";
        echo $allArray[$i][15] . "<br>";
        echo $allArray[$i][16] . "<br>";
        //echo $allArray[$i][17] . "<br>";
        echo "<br>";
    }    
}
if ($id == 5){
    
}
if ($id == 6){
    
}
if ($id == 7){
    for($i = 0; $i < $numOfRows; $i ++){
        for($j = 0; $j < $numOfCols; $j ++){
            
        }
    }
}
if ($id == 8){    
    $ContactInfo = "SELECT title, contact_person, phone_number, email
                    FROM isearch
                    WHERE id = $targetID";                
        $result2 = mysqli_query($mysqli, $ContactInfo) or die(mysqli_error($mysqli));
        $rArray2 = array();
        while ($info = mysqli_fetch_array($result2)){
            $in1 = stripslashes($info["title"]);
            $in2 = stripslashes($info["contact_person"]);
            if($in2 == NULL){
                $in2 = "n/a";
            }
            $in3 = stripslashes($info["phone_number"]);
            if($in3 == NULL){
                $in3 = "n/a";
            }
            $in4 = stripslashes($info["email"]);
            if($in4 == NULL){
                $in4 = "n/a";
            }
            $temp = $in1 . "<br>" . "Contact Person: " . $in2 . "<br>". "Phone Number: " . $in3 . "<br>" . "email: " . $in4;
            array_push($rArray2, $temp);
        }
        $size = sizeof($rArray2);
        for ($i = 0; $i < $size; $i++){
            echo $rArray2[$i], "<br>";
        }
}

