
<?php
   //ID 1 to 6 are general search subjects. ID 7 is refine search. ID 8 is to get contact information
   $id = $_GET['id'];
   $mysqli = mysqli_connect("localhost", "root", "", "isearch");
   $targetID;
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
        $temp = "<li>" . "<b>" . $in1 . "</b>" . "<br>" . $in2 . "</li>";
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
            $in2 = "-----> No smoking accomodations.";
        }
        else{
            $in2 = "----->" . $in2;
        }
        if($in3 == "true"){
            $in3 = "-----> Yes.";}            
        else if($in3 == "false"){
            $in3 = "-----> No.";            
        }
        else{
            $in3 = "n/a";
        }
        if($in4 == NULL){
            $in4 = "n/a";
        }
        $in1 = "Organization: " . $in1 . "<br>";
        $in2 = "Are there accomodations for smoking? " . $in2 . "<br>";
        $in3 = "Are residents required to abstain from alcohol and drugs? " . $in3 . "<br";
        $in4 = "Level of drug and alcohol tolerence: ". $in4 . "<br>";
        $temp = $in1 . $in2 . $in3 . $in4;
        array_push($rArray3, $temp);
    }
    $size = sizeof($rArray3);
    for ($i = 0; $i < $size; $i++){       
        echo $rArray3[$i], "<br>";
        echo "_______________________________ <br>"; //<- TEMP
    }
    
}
if ($id == 4){
    
}
if ($id == 5){
    
}
if ($id == 6){
    
}
if ($id == 7){
    
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
