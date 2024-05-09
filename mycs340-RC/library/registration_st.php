<?php
//database connection
include_once '../library/db_connection.php';

//new instance
$connection = new connection_helper("cs340_spring2024");

//string connection
$conn = $connection->get_connection_string();

//submission form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //data from table
    $fname = $_POST['first_name'];
    $mname = $_POST['middle_name'];
    $lname = $_POST['last_name'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zip = $_POST['zip_code'];
    $mobile = $_POST['mobile_phone'];
    $home = $_POST['home_phone'];
    $major = $_POST['major'];

    //generate student ID based on first and last name
    function StudentID($first_name, $last_name) {
        $initials = strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1));
        $rand_ID = mt_rand(345678, 987654);
        return $initials . $rand_ID;
    }

    $student_id = StudentID($fname, $lname);

    //inserting data to table
    $sql = "INSERT INTO tblstudents (first_name, middle_name, last_name, student_id, address, state, city, zip_code, mobile_phone, home_phone, major)
            VALUES('$fname','$mname','$lname', '$student_id', '$address','$state','$city','$zip','$mobile','$home','$major');";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//closing connection
$conn->close();
?>
