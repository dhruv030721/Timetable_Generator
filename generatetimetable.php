<?php

include 'database.php';

function generateDaySchedule($subjects, $labs, $labtime) {
    $daySchedule = array();
    
    for ($i = 0; $i < 5; $i++) {
        $rand_num = rand(0, count($subjects) - 1);
        $daySchedule[$i] = $subjects[$rand_num];
        
        if ($i == $labtime) {
            $daySchedule[$i] = array();
            for ($j = 0; $j < 3; $j++) {
                $rand_num = rand(0, count($labs) - 1);
                $daySchedule[$i][$j] = $labs[$rand_num];
            }
        }
    }
    
    return $daySchedule;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $subjects = array();
    $labs = array();
    $lab_index = 0;

    for ($i=0; $i < 5; $i++) { 
        $subjects[$i] = array(
            "subject_code" => $_POST['subject_code'][$i], 
            "subject" => $_POST['subject'][$i],
            "faculty" => $_POST['faculty'][$i],
            "lecture_hour" => $_POST['lecture_hour'][$i],
            "lab_hour" => $_POST['lab_hour'][$i],
        );
        if($_POST['lab_hour'][$i] != 0){
            $labs[$lab_index++] = array(
            "subject_code" => $_POST['subject_code'][$i], 
            "subject" => $_POST['subject'][$i],
            "faculty" => $_POST['faculty'][$i],
            "lecture_hour" => $_POST['lecture_hour'][$i],
            "lab_hour" => $_POST['lab_hour'][$i],
            "0" => false,
            "1" => false,
            "2" => false
            );
        }
    }

    $monday = generateDaySchedule($subjects, $labs, 2);
    $tuesday = generateDaySchedule($subjects, $labs, 0);
    $wednesday = generateDaySchedule($subjects, $labs, 0);
    $thurday = generateDaySchedule($subjects, $labs, 2);
    $friday = generateDaySchedule($subjects, $labs, 2);


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
                    <th>Thurday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
                <tr>
                    <td><b>09:15 to 10:10</b></td>
                    <td>
                        <center><span>'.$monday[0]['subject'].'</span></center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($tuesday[0] as $value){
                            echo $value['subject'] . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($wednesday[0] as $value){
                            echo $value['subject'] . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td>
                        <center>'.$thurday[0]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$friday[0]['subject'].'</center>
                    </td>
                    <td rowspan="2">
                        <center>Unit Test / <br> Extra Lecture</center>
                    </td>
                </tr>
                <tr>
                    <td><b>10:10 to 11:05</b></td>
                    <td>
                        <center>'.$monday[1]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$thurday[1]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$friday[1]['subject'].'</center>
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
                            echo $value['subject'] . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td>
                        <center>'.$tuesday[1]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$wednesday[1]['subject'].'</center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($thurday[2] as $value){
                            echo $value['subject'] . '<br>';
                        }
                    echo'</center>
                    </td>
                    <td rowspan="2">
                        <center>';
                        foreach($friday[2] as $value){
                            echo $value['subject'] . '<br>';
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
                        <center>'.$tuesday[2]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$wednesday[2]['subject'].'</center>
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
                        <center>'.$monday[3]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$tuesday[3]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$wednesday[3]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$thurday[3]['subject'].'</center>
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
                        <center>'.$monday[4]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$tuesday[4]['subject'].'</center>
                    </td>
                    <td>
                        <center>Library</center>
                    </td>
                    <td>
                        <center>'.$thurday[4]['subject'].'</center>
                    </td>
                    <td>
                        <center>'.$friday[4]['subject'].'</center>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: end;" class="font-bold">Developed By : D2M2 </td>
                </tr>
            </table>
        </div>
        </center>
    </body>  
    ';

}
?>


