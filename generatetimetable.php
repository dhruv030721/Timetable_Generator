<?php

include 'database.php';

function generateDaySchedule(&$remaining_subjects, $labs, $labtime, &$combination_array) {
    $daySchedule = array();
    for ($i = 0; $i < 4 && count($remaining_subjects) > 0; $i++) {
        $rand_num = rand(0, count($remaining_subjects) - 1);
        while (in_array($remaining_subjects[$rand_num], $combination_array)){
            $rand_num = rand(0, count($remaining_subjects) - 1);
        }
        $daySchedule[$i] = $remaining_subjects[$rand_num];
        array_push($combination_array, $remaining_subjects[$rand_num]);
        unset($remaining_subjects[$rand_num]);
        $remaining_subjects = array_values($remaining_subjects);
    }
    
    return $daySchedule;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $subjects = array();
    $labs = array();
    $comb_monday = array();
    $comb_tuesday = array();
    $comb_wednesday = array();
    $comb_thursday = array();
    $comb_friday = array();

    $monday = array();
    $tuesday = array(); 
    $wednesday = array(); 
    $thursday = array();
    $friday = array();

    for ($i=0; $i < 5; $i++) { 
        for ($j=0; $j < $_POST['lecture_hour'][$i]; $j++) { 
            $subjects[] = $_POST['subject'][$i]; 
        }
    }

    $remaining_subjects = $subjects;

    $monday = generateDaySchedule($remaining_subjects, $labs, 2, $comb_monday);
    $tuesday = generateDaySchedule($remaining_subjects, $labs, 0, $comb_tuesday);
    $wednesday = generateDaySchedule($remaining_subjects, $labs, 0, $comb_wednesday);
    $thursday = generateDaySchedule($remaining_subjects, $labs, 2, $comb_thursday);
    $friday = generateDaySchedule($remaining_subjects, $labs, 2, $comb_friday);

    // print_r($monday);
    // print_r($tuesday);
    // print_r($wednesday);
    print_r($thursday);
    // print_r($friday);
    print_r($remaining_subjects);
}

    echo '
    <head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="output.css">
    </head>
    <body>
        <center>
        <div class="border-2 table-container font-poppins mt-10 timetable-container">
            <table border="2" class="font-bold">
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
                <tr>
                    <td><b>09:15 to 10:10</b></td>
                    <td>
                        <center><span>'.$monday[0].'</span></center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($tuesday[0] as $value){
                            echo $value . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($wednesday[0] as $value){
                            echo $value . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td>
                        <center>'.$thursday[0].'</center>
                    </td>
                    <td>
                        <center>'.$friday[0].'</center>
                    </td>
                    <td rowspan="2">
                        <center>Unit Test / <br> Extra Lecture</center>
                    </td>
                </tr>
                <tr>
                    <td><b>10:10 to 11:05</b></td>
                    <td>
                        <center>'.$monday[1].'</center>
                    </td>
                    <td>
                        <center>'.$thursday[1].'</center>
                    </td>
                    <td>
                        <center>'.$friday[1].'</center>
                    </td>
                </tr>
                <tr>
                    <td><b>11:05 to 11:15</b></td>
                    <td colspan="6">
                        <center><b>RECESS</b></center>
                    </td>
                </tr>
                <tr>
                    <td><b>11:15 to 12:10</b></td>
                    <td rowspan="2">
                        <center>';
                        foreach($monday[2] as $value){
                            echo $value . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td>
                        <center>'.$tuesday[1].'</center>
                    </td>
                    <td>
                        <center>'.$wednesday[1].'</center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($thursday[2] as $value){
                            echo $value . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($friday[2] as $value){
                            echo $value . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td rowspan="2">
                        <center>Unit Test / <br> Extra Lecture</center>
                    </td>
                </tr>
                <tr>
                    <td><b>12:10 to 01:05</b></td>
                    <td>
                        <center>'.$tuesday[2].'</center>
                    </td>
                    <td>
                        <center>'.$wednesday[2].'</center>
                    </td>
                </tr>
                <tr>
                    <td><b>01:05 to 01:45</b></td>
                    <td colspan="6">
                        <center><b>RECESS</b></center>
                    </td>
                </tr>
                <tr>
                    <td><b>02:00 to 02:55</b></td>
                    <td>
                        <center>'.$monday[3].'</center>
                    </td>
                    <td>
                        <center>'.$tuesday[3].'</center>
                    </td>
                    <td>
                        <center>'.$wednesday[3].'</center>
                    </td>
                    <td>
                        <center>'.$thursday[3].'</center>
                    </td>
                    <td>
                        <center>Student Counselling</center>
                    </td>
                    <td rowspan="2">
                        <center>Sports</center>
                    </td>
                </tr>
                <tr>
                    <td><b>02:55 to 03:50</b></td>
                    <td>
                        <center>'.$monday[4].'</center>
                    </td>
                    <td>
                        <center>'.$tuesday[4].'</center>
                    </td>
                    <td>
                        <center>Library</center>
                    </td>
                    <td>
                        <center>'.$thursday[4].'</center>
                    </td>
                    <td>
                        <center>'.$friday[4].'</center>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: end;" class="font-bold">Developed By : Noob Coder </td>
                </tr>
            </table>
        </div>
        </center>
    </body>  
    ';
?>


