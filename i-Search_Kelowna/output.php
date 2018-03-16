
<?php
//ID 1 to 6 are general search subjects. ID 7 is refine search. ID 8 is to get contact information
/*FIELDS TO USE: title, description, layer_title, Building_Type, Services_Provided, Other_Services, 
Building_Accommodated_Individuals_with_Disabilities, Monthly_Cost_Calculation, Building_is_Pet_Friendly, 
Accommodations_For_Smoking, Residents_are_required_to_abstain_from_alcohol_and_drugs,
Level_of_Drugs_and_Alcohol_Tolerence, Demographic_Served,Search_Keywords, id, Gender_Served, 
Primary_Target_Resident, Other_Services*/
//$data_to_be_pass=$_POST['dataString'];

//$res="Data Passed Successfully: ".$data_to_be_pass;
//echo json_encode($res);

$id = $_GET['id'];    
$keywords;
$ageDemo;
$rent;
$buildingType;
$gender;
$alcohol;
$disAcc;
$pets;
$mysqli = mysqli_connect("localhost", "root", "", "isearch");
   
if ($id == 1){ 
    //title, description
    $arrayOne = array(array());
    $sqlOne = "SELECT DISTINCT title, description
               FROM isearch";
    $resultOne = mysqli_query($mysqli, $sqlOne) or die(mysqli_error($mysqli));
    $inner = 0;
    $outer = 0;
    while($info = mysqli_fetch_array($resultOne)){
        $in1 = stripslashes($info["title"]);
        $arrayOne[$outer][$inner] = $in1;
        $in2 = stripslashes($info["description"]);
        $arrayOne[$outer][$inner + 1] = $in2;
        $outer++;
    }
    $numOfRows = count($arrayOne);
    $numOfCols = count($arrayOne[0]);
    for($i = 0; $i < $numOfRows; $i++){
        echo $arrayOne[$i][0] . "<br>";
        if($arrayOne[$i][1] != NULL){       
            echo $arrayOne[$i][1] . "<br>";
        }
        echo "<br>";
    }
}
if ($id == 2){
    //title, layer title, building type
    $arrayTwo = array(array());
    $sqlTwo = "SELECT DISTINCT title, layer_title, building_type 
               FROM isearch";
    $resultTwo = mysqli_query($mysqli, $sqlTwo) or die(mysqli_error($mysqli));
    $inner = 0;
    $outer = 0;
    while($info = mysqli_fetch_array($resultTwo)){
        $in1 = stripslashes($info["title"]);
        $arrayTwo[$outer][$inner] = $in1;
        $in2 = stripslashes($info["layer_title"]);
        $arrayTwo[$outer][$inner + 1] = "Service type: " . $in2;
        $in3 = stripslashes($info["building_type"]);
        $arrayTwo[$outer][$inner + 2] = "Building type: " . $in3;
        $outer++;
    }
    $numOfRows = count($arrayTwo);
    $numOfCols = count($arrayTwo[0]);
    for($i = 0; $i < $numOfRows; $i++){
        if($arrayTwo[$i][1] != NULL && $arrayTwo[$i][2] != NULL){ 
            echo $arrayTwo[$i][0] . "<br>";       
            echo $arrayTwo[$i][1] . "<br>";
            echo $arrayTwo[$i][2] . "<br>";
            echo "<br>";
       }
    }
}
if ($id == 3){
    //Title, Accommodations_For_Smoking, Residents_are_required_to_abstain_from_alcohol_and_drugs
    $arrayThree = array(array());
    $sqlThree = "SELECT DISTINCT title, Accommodations_For_Smoking, 
                                 Residents_are_required_to_abstain_from_alcohol_and_drugs
                 FROM isearch";
    $resultThree = mysqli_query($mysqli, $sqlThree) or die(mysqli_error($mysqli));
    $inner = 0;
    $outer = 0;
    while($info = mysqli_fetch_array($resultThree)){
        $in1 = stripslashes($info["title"]);
        $arrayThree[$outer][$inner] = $in1;
        $in2 = stripslashes($info["Accommodations_For_Smoking"]);
        if($in2 == NULL){
            $in2 = "No smoking accomodations at this location.";
        }
        else{
            $in2 = "Smoking accommodations: " . $in2;
        }
        $arrayThree[$outer][$inner + 1] = $in2;
        $in3 = stripslashes($info["Residents_are_required_to_abstain_from_alcohol_and_drugs"]);
        if($in3 == "false"){
            $in3 = "Residents who stay at this location ARE NOT required to abstain from alcohol and drugs.";
        }
        else if($in3 == "true"){
            $in3 = "Residents who stay at this location ARE required to abstain from alcohol and drugs.";
        }
        $arrayThree[$outer][$inner + 2] = $in3;
        $outer++;
    }
    $numOfRows = count($arrayThree);
    $numOfCols = count($arrayThree[0]);
    for($i = 0; $i < $numOfRows; $i++){
        if($arrayThree[$i][1] != NULL || $arrayThree[$i][2] != NULL){ 
            echo $arrayThree[$i][0] . "<br>";       
            echo $arrayThree[$i][1] . "<br>";
            echo $arrayThree[$i][2] . "<br>";
            echo "<br>";
       }
    }
}
if ($id == 4){
    //title, Demographic_Served, Gender_Served, Primary_Target_Resident 
    $arrayFour = array(array());
    $sqlFour = "SELECT DISTINCT title, Demographic_Served, Gender_Served, Primary_Target_Resident
                FROM isearch";
    $resultFour = mysqli_query($mysqli, $sqlFour) or die(mysqli_error($mysqli));
    $inner = 0;
    $outer = 0;
    while($info = mysqli_fetch_array($resultFour)){
        $in1 = stripslashes($info["title"]);
        $arrayFour[$outer][$inner] = $in1;
        $in2 = stripslashes($info["Demographic_Served"]);
        if($in2 == NULL){
            $in2 = "No preference";
        }
        $arrayFour[$outer][$inner + 1] = "Age demographic served: " . $in2;
        $in3 = stripslashes($info["Gender_Served"]);
        if($in3 == NULL){
            $in3 = "No preference";
        }
        $arrayFour[$outer][$inner + 2] = "Gender Served: " . $in3;
        $in4 = stripslashes($info["Primary_Target_Resident"]);
        if($in4 == NULL){
            $in4 = "No preference";
        }
        $arrayFour[$outer][$inner + 3] = "Target resident: ". $in4;
        $outer++;
    }
    $numOfRows = count($arrayFour);
    $numOfCols = count($arrayFour[0]);
    for($i = 0; $i < $numOfRows; $i++){
            echo $arrayFour[$i][0] . "<br>";       
            echo $arrayFour[$i][1] . "<br>";
            echo $arrayFour[$i][2] . "<br>";
            echo $arrayFour[$i][3] . "<br>";
            echo "<br>";
    }
}
if ($id == 5){
    //title, Services_Provided, Other_Services
    $arrayFive = array(array());
    $sqlFive = "SELECT DISTINCT title, Services_Provided, Other_Services               
                FROM isearch";
    $resultFive = mysqli_query($mysqli, $sqlFive) or die(mysqli_error($mysqli));
    $inner = 0;
    $outer = 0;
    while($info = mysqli_fetch_array($resultFive)){
        $in1 = stripslashes($info["title"]);
        $arrayFive[$outer][$inner] = $in1;
        $in2 = stripslashes($info["Services_Provided"]);
        if($in2 != NULL){
            $in2 = "Primary Services: " . $in2;
        }
        $arrayFive[$outer][$inner + 1] = $in2;
        $in3 = stripslashes($info["Other_Services"]);
        if($in3 != NULL){
            $in3 = "Additional services: " . $in3;  
        }
        $arrayFive[$outer][$inner + 2] = $in3;
        $outer++;
    }
    $numOfRows = count($arrayFive);
    $numOfCols = count($arrayFive[0]);
    for($i = 0; $i < $numOfRows; $i++){
        if($arrayFive[$i][1] != NULL){
            echo $arrayFive[$i][0] . "<br>";       
            echo $arrayFive[$i][1] . "<br>";
            echo $arrayFive[$i][2] . "<br>";
            echo "<br>";
        }
    }
}
if ($id == 6){
    
}
if ($id == 7){

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

