<?php
include_once '../library/db_connection.php';


$selected_student_id = "";
$course_list = array();
$student_name = "";
$course_name = "";
$student_found = false;
$error_message = "";

//Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Get student ID
    $selected_student_id = $_POST["selected_student_id"];

    //Get list of courses
    $conn = new connection_helper("cs340_spring2024");
    $conn_str = $conn->get_connection_string();
    $query = "SELECT course_name FROM tblregistration WHERE student_id = ?";
    $stmt = $conn_str->prepare($query);
    $stmt->bind_param("s", $selected_student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    //check if there are courses for students
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_list[] = $row["course_name"];
        }
        $student_found = true;

        //Get students name from tblstudents
        $query_student = "SELECT first_name, middle_name, last_name FROM tblstudents WHERE student_id = ?";
        $stmt_student = $conn_str->prepare($query_student);
        $stmt_student->bind_param("s", $selected_student_id);
        $stmt_student->execute();
        $result_student = $stmt_student->get_result();

        //Check if student is found
        if ($result_student->num_rows > 0) {
            $row_student = $result_student->fetch_assoc();
            $first_name = $row_student["first_name"];
            $middle_name = $row_student["middle_name"];
            $last_name = $row_student["last_name"];
            $student_name = trim($first_name . " " . ($middle_name ? $middle_name . " " : "") . $last_name);
        } else {
            $error_message = "Student number {$selected_student_id} is not found.";
        }
        $stmt_student->close();
    } else {
        //If the student ID isn't found, check if it's a valid student ID
        $query_student = "SELECT * FROM tblstudents WHERE student_id = ?";
        $stmt_student = $conn_str->prepare($query_student);
        $stmt_student->bind_param("s", $selected_student_id);
        $stmt_student->execute();
        $result_student = $stmt_student->get_result();

        if ($result_student->num_rows == 0) {
            $error_message = "Student number {$selected_student_id} is not found.";
        } else {
            //If there is a student ID found but there is no courses display this message
            $error_message = "Student number {$selected_student_id} is not registered with any courses.";
        }
        $stmt_student->close();
    }
    $stmt->close();

    $conn_str->close();

    // Collect course name from the form
    if (isset($_POST["course_name"])) {
        $course_name = $_POST["course_name"];
    }

    // Insert data into tblgrade_report table
    if ($student_found && !empty($course_name)) {
        // Collect assignment, project, and exam scores from the form
        $assignment1 = $_POST["assignment1"];
        $assignment2 = $_POST["assignment2"];
        $assignment3 = $_POST["assignment3"];
        $assignment4 = $_POST["assignment4"];
        $assignment5 = $_POST["assignment5"];
        $assignment6 = $_POST["assignment6"];
        $midterm_project = $_POST["midterm_project"];
        $midterm_exam = $_POST["midterm_exam"];
        $final_project = $_POST["final_project"];
        $final_exam = $_POST["final_exam"];

        // Connect to the database
        $conn = new connection_helper("cs340_spring2024");
        $conn_str = $conn->get_connection_string();

        // Prepare and execute SQL statement to insert data into tblgrade_report table
        $term = "Spring 2024";
        $insert_query = "INSERT INTO tblgrade_report (first_name, middle_name, last_name, student_id, term, course_name, assignment1, assignment2, assignment3, assignment4, assignment5, assignment6, midterm_project, midterm_exam, final_project, final_exam) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn_str->prepare($insert_query);
        $stmt_insert->bind_param("ssssssdddddddddd", $first_name, $middle_name, $last_name, $selected_student_id, $term, $course_name, $assignment1, $assignment2, $assignment3, $assignment4, $assignment5, $assignment6, $midterm_project, $midterm_exam, $final_project, $final_exam);
        $stmt_insert->execute();
        // Check if the data is inserted successfully
        if ($stmt_insert->affected_rows > 0) {
            echo "<script>alert('Data inserted successfully!');</script>";
        } else {
            echo "<script>alert('Error: Data insertion failed!');</script>";
        }

        // Close the prepared statement and database connection
        $stmt_insert->close();
        $conn_str->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grade Entry Form</title>
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
<h2>Grade Entry Form</h2>
<?php if (!empty($error_message)) : ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div>
        <label for="selected_student_id">Enter Student ID:</label>
        <input type="text" name="selected_student_id" id="selected_student_id" required>
        <input type="submit" value="OK">
    </div>
    <?php if ($student_found) : ?>
        <div>
            <label for="course_name">Select Course:</label>
            <select name="course_name" id="course_name">
                <?php foreach ($course_list as $course) : ?>
                    <option value="<?php echo $course; ?>" <?php echo ($course_name == $course) ? "selected" : ""; ?>><?php echo $course; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="student_name">Student Name:</label>
            <input type="text" name="student_name" id="student_name" value="<?php echo $student_name; ?>" readonly>
        </div>
        <!-- Add the following labels and textboxes for data entry -->
        <div>
            <label for="assignment1">Assignment 1:</label>
            <input type="text" name="assignment1" id="assignment1">
        </div>
        <div>
            <label for="assignment2">Assignment 2:</label>
            <input type="text" name="assignment2" id="assignment2">
        </div>
        <div>
            <label for="assignment3">Assignment 3:</label>
            <input type="text" name="assignment3" id="assignment3">
        </div>
        <div>
            <label for="assignment4">Assignment 4:</label>
            <input type="text" name="assignment4" id="assignment4">
        </div>
        <div>
            <label for="assignment5">Assignment 5:</label>
            <input type="text" name="assignment5" id="assignment5">
        </div>
        <div>
            <label for="assignment6">Assignment 6:</label>
            <input type="text" name="assignment6" id="assignment6">
        </div>
        <div>
            <label for="midterm_project">Midterm Project:</label>
            <input type="text" name="midterm_project" id="midterm_project">
        </div>
        <div>
            <label for="midterm_exam">Midterm Exam:</label>
            <input type="text" name="midterm_exam" id="midterm_exam">
        </div>
        <div>
            <label for="final_project">Final Project:</label>
            <input type="text" name="final_project" id="final_project">
        </div>
        <div>
            <label for="final_exam">Final Exam:</label>
            <input type="text" name="final_exam" id="final_exam">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    <?php endif; ?>
</form>
</body>
</html>