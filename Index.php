<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table Generator</title>
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="index.css">
</head>

<body class="font-poppins">
    <div>
        <h1 class="text-center text-4xl mt-5 font-poppins font-bold">Time Table Generator</h1>
    </div>
    <section>
        <div class="mt-10 ml-10 flex flex-col">
            <div>
                <h2 class="font-bold mb-10 text-center text-xl">► Add Lectures and Labs data : </h2>
            </div>
            <form action="generatetimetable.php" method="POST" id="timetableForm">
                <div class="border-2 table-container">
                    <table class="font-bold">
                        <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject</th>
                                <th>Lecture Hours</th>
                                <th>Lab Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $input_values = array('s1', 's2', 's3', 's4', 's5');

                            foreach ($input_values as $input) {
                                echo '
                                <tr>
                                <td>
                                    <input type="text" id="subject_code['.$input.']" name="subject_code[]"
                                        class="focus:outline-none rounded px-2 bg-gray-200" required>
                                </td>
                                <td>
                                    <input type="text" id="subject['.$input.']" name="subject[]"
                                        class="focus:outline-none rounded px-2 bg-gray-200" required>
                                </td>
                                <td>
                                <input type="number" id="lecture_hour['.$input.']" name="lecture_hour[]" max="99" oninput="this.value = this.value.slice(0, 2)"
                                class="focus:outline-none rounded px-2 bg-gray-200" required>
                                </td>
                                <td>
                                <input type="number" id="lab_hour['.$input.']" name="lab_hour[]" max="99" oninput="this.value = this.value.slice(0, 2)"
                                class="focus:outline-none rounded px-2 bg-gray-200" required>
                                </td>
                            </tr>   
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="flex btn-container">
                <button class="mt-10 border-2 font-bold btn" type="submit" onclick="FormSubmission()">Generate</button>
            </div>
        </div>
    </section>
</body>

<script src="index.js"></script>

</html>