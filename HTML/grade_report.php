<?php

include_once '../library/db_connection.php';

$connection = new connection_helper("cs340_spring2024");

//database connection
$conn = $connection->get_connection_string();


//Check if the form is submitted to fetch courses taught by faculty
if (isset($_POST['submit_faculty_id'])) {
    //getting faculty ID
    $faculty_id = $_POST['faculty_id'];

    // Fetch courses taught by the faculty
    $courses = fetch_courses($faculty_id);
}

//Check if the form is submitted to display student grades
if (isset($_POST['submit_course'])) {
    $faculty_id = $_POST['faculty_id'];
    $selected_course = $_POST['course'];

    //Get student scores for selected course
    $student_scores = fetch_student_scores($faculty_id, $selected_course);
}

//Find courses taught by specific faculty
function fetch_courses($faculty_id) {
    global $conn;
    $sql = "SELECT DISTINCT course_name, course_title FROM tblcourse_schedule WHERE faculty_id = '$faculty_id'";
    $result = $conn->query($sql);
    $courses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }
    return $courses;
}

//Find student scores for selected course
function fetch_student_scores($faculty_id, $course_name) {
    global $conn;
    $sql = "SELECT tblstudents.first_name, tblstudents.last_name, tblgrade_report.assignment1, tblgrade_report.assignment2, tblgrade_report.assignment3, tblgrade_report.assignment4, tblgrade_report.assignment5, tblgrade_report.assignment6, tblgrade_report.midterm_exam, tblgrade_report.midterm_project, tblgrade_report.final_exam, tblgrade_report.final_project FROM tblgrade_report INNER JOIN tblregistration ON tblgrade_report.student_id = tblregistration.student_id INNER JOIN tblstudents ON tblgrade_report.student_id = tblstudents.student_id WHERE tblregistration.faculty_id = '$faculty_id' AND tblregistration.course_name = '$course_name'";
    $result = $conn->query($sql);
    $student_scores = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_scores[] = $row;
        }
    }
    return $student_scores;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Scores and Grades</title>
</head>
<nav class="nav_menu">
    <ul class="nav_list">
        <li class="nav_list_logo">
            <p> LOGO </p>
        </li>
        <li class="nav_list_li"><a href="../index.php" title="Home page">Home</a></li>
                <li><a href="registration.php">Course Schedule</a></li>
                <li><a href="student_reg.php">Student Admission</a></li>
                <li><a href="assignments.php">Assignments</a></li>
                <li><a href="grade_report.php">Grade Report</a></li>
        <li class="nav_list_li"><a href="#" title="About Us">Help</a></li>
    </ul>
</nav>
<body>
<div>
    <h2>Faculty ID</h2>
    <form method="post" action="">
        <label for="faculty_id">Enter Faculty ID:</label>
        <input type="text" name="faculty_id" id="faculty_id" required>
        <button type="submit" name="submit_faculty_id">OK</button>
    </form>
</div>
<?php if (isset($courses)): ?>
    <?php if (empty($courses)): ?>
<!--        //Display when no faculty ID is found and also display which ID was entered to display message.-->
        <div>
            <p>Faculty ID <?php echo $_POST['faculty_id']; ?> is not found.</p>
        </div>
    <?php else: ?>
        <div>
            <h2>Course Selection</h2>
            <form method="post" action="">
                <input type="hidden" name="faculty_id" value="<?php echo $_POST['faculty_id']; ?>">
                <select name="course">
<!--                    Look over each course-->
                    <?php foreach ($courses as $course): ?>
                        <option value="<?php echo $course['course_name']; ?>"><?php echo $course['course_title']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="submit_course">Select Course</button>
            </form>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if (isset($student_scores)): ?>
    <div>
        <h2>Student Grades</h2>
        <?php if ($student_scores): ?>
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Assignment 1</th>
                    <th>Assignment 2</th>
                    <th>Assignment 3</th>
                    <th>Assignment 4</th>
                    <th>Assignment 5</th>
                    <th>Assignment 6</th>
                    <th>Midterm Exam</th>
                    <th>Midterm Project</th>
                    <th>Final Exam</th>
                    <th>Final Project</th>
                    <th>Average</th>
                    <th>Grade</th>
                </tr>
                <?php foreach ($student_scores as $student): ?>
                    <tr>
                        <td><?php echo "{$student['first_name']} {$student['last_name']}"; ?></td>
                        <?php
                        //Find the average and the grade for each student
                        $average = ($student['assignment1'] + $student['assignment2'] + $student['assignment3'] + $student['assignment4'] + $student['assignment5'] + $student['assignment6']) / 6 * 0.2 + ($student['midterm_exam'] * 0.15) + ($student['midterm_project'] * 0.15) + ($student['final_exam'] * 0.25) + ($student['final_project'] * 0.20);
                        $grade = ($average >= 90) ? 'A' : (($average >= 80) ? 'B' : (($average >= 70) ? 'C' : (($average >= 60) ? 'D' : 'F')));
                        ?>
                        <td><?php echo $student['assignment1']; ?></td>
                        <td><?php echo $student['assignment2']; ?></td>
                        <td><?php echo $student['assignment3']; ?></td>
                        <td><?php echo $student['assignment4']; ?></td>
                        <td><?php echo $student['assignment5']; ?></td>
                        <td><?php echo $student['assignment6']; ?></td>
                        <td><?php echo $student['midterm_exam']; ?></td>
                        <td><?php echo $student['midterm_project']; ?></td>
                        <td><?php echo $student['final_exam']; ?></td>
                        <td><?php echo $student['final_project']; ?></td>
                        <td><?php echo "$average"; ?></td>
                        <td><?php echo "$grade"; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
<!--            //If no students were found then display message-->
        <?php else: ?>
            <p>No student was found for the selected class.</p>
        <?php endif; ?>
    </div>
<?php endif; ?>
</body>
</html>
