
<?php
   //ID 1 to 6 are general search subjects. ID 7 is refine search. ID 8 is to get contact information
   $id = $_GET['id'];
   $mysqli = mysqli_connect("localhost", "root", "", "isearch");
   $targetID;
   $allArray = array(array());
   $allSearch = "SELECT DISTINCT id, title, description, layer_title, 
                                 Building_Type, Services_Provided, Other_Services, 
                                 Building_Accommodated_Individuals_with_Disabilities, 
                                 Monthly_Cost_Calculation, Building_is_Pet_Friendly, 
                                 Accommodations_For_Smoking, Residents_are_required_to_abstain_from_alcohol_and_drugs,
                                 Level_of_Drugs_and_Alcohol_Tolerence, Demographic_Served,
                                 Search_Keywords
                 FROM isearch";
   $allResult = mysqli_query($mysqli, $allSearch) or die(mysqli_error($mysqli));
    while ($info = mysqli_fetch_array($allResult)){  
        $in1 = stripslashes($info["title"]);
        $in2 = stripslashes($info["description"]);
        $in3 = stripslashes($info["layer_title"]);
        $in4 = stripslashes($info["Building_Type"]);
        $in5 = stripslashes($info["Services_Provided"]);
        $in6 = stripslashes($info["Other_Services"]);
        $in7 = stripslashes($info["Building_Accommodated_Individuals_with_Disabilities"]);
        $in8 = stripslashes($info["Monthly_Cost_Calculation"]);
        $in9 = stripslashes($info["Building_is_Pet_Friendly"]);
    }
if ($id == 1){  
   $sql = "SELECT DISTINCT title, description, id
           FROM isearch";
   $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
   $rArray = array();
    while ($info = mysqli_fetch_array($result)){  
        $temp = "";
        $in1 = stripslashes($info["title"]);
        $in2 = stripslashes($info["description"]);
        if($in2 == NULL){
            $in2 = "";
        }
        $temp = "<li>" . "<b>" . $in1 . "</b>" . " | ". "<a onclick = 'contactInfo.js' href = 'javascript:void(0);' >Contact Info</a>" . "</li>";
        array_push($rArray, $temp);
    }
    $size = sizeof($rArray);
    for ($i = 0; $i < $size; $i++){       
        echo $rArray[$i], "<br>", "<br>";
    }
}
if ($id == 2){
    
}
if ($id == 3){
    $sqlOp3 = "SELECT DISTINCT title, Accommodations_For_Smoking, Residents_are_required_to_abstain_from_alcohol_and_drugs, Level_of_Drugs_and_Alcohol_Tolerence  
               FROM isearch";
   $result3 = mysqli_query($mysqli, $sqlOp3) or die(mysqli_error($mysqli));
   $rArray3 = array();
    while ($info = mysqli_fetch_array($result3)){  
        $temp = "";
        $in1 = stripslashes($info["title"]);
        $in2 = stripslashes($info["Accommodations_For_Smoking"]);
        $in3 = stripslashes($info["Residents_are_required_to_abstain_from_alcohol_and_drugs"]);
        $in4 = stripslashes($info["Level_of_Drugs_and_Alcohol_Tolerence"]);
        if($in2 == NULL){
           $in2 = "A) No smoking accomodations.";
        }
        else{
           $in2 = "A) " . $in2;  
        }
        if($in3 == "true"){
            $in3 = "A) Yes.";}            
        else if($in3 == "false"){
            $in3 = "A) No.";}
        else{
            $in3 = "n/a";}
        if($in4 == NULL){
            $in4 = "n/a";
        }
        $in2 = "Q) Are there accomodations for smoking? " . $in2 . "<br>";
        $in3 = "Q) Are residents required to abstain from alcohol and drugs? " . $in3 . "<br";
        $in4 = "Q) Level of drug and alcohol tolerence: ". $in4 . "<br>";
        $temp = "<li>" . "<b>" . $in1 . "</b>" . " | ". "<a onclick = 'contactInfo.js' href = 'javascript:void(0);' >Contact Info</a>" . "</li>" . $in2 . $in3 . $in4 . "<br>";
        array_push($rArray3, $temp);
    }
    $size = sizeof($rArray3);
    for ($i = 0; $i < $size; $i++){       
        echo $rArray3[$i], "<br>";
    }
    
}
if ($id == 4){
    
}
if ($id == 5){
    
}
if ($id == 6){
    
}
if ($id == 7){
    $buildingType = "SELECT title, layer_title
                    FROM isearch
                    WHERE layer_title = ''";
}
if ($id == 8){    
    $ContactInfo = "SELECT title, contact_person, phone_number, email
                    FROM isearch
                    WHERE id = '$targetID'";                
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

