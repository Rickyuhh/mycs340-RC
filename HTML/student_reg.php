<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Entry Form</title>
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
<h4>Student Registration</h4><br/><br/>
<div>
    <form action="../library/registration_st.php" method="POST" onsubmit="return true">
                <label>first name</label>
                <input type="text" name="first_name" id="first_name" ><br>
                <label>middle name</label>
                <input type="text" name="middle_name" id="middle_name"><br>
                <label>last name</label>
                <input type="text" name="last_name" id="last_name"><br>
                <label>address</label>
                <input type="text" name="address" id="address"><br>
                <label>state</label>
                <input type="text" name="state" id="state"><br>
                <label>city</label>
                <input type="text" name="city" id="city"><br>
                <label>zip code</label>
                <input type="text" name="zip_code" id="zip_code"><br>
                <label>mobile phone</label>
                <input type="text" name="mobile_phone" id="mobile_phone"><br>
                <label>home phone</label>
                <input type="text" name="home_phone" id="home_phone"><br>
                <label>major</label>
                <input type="text" name="major" id="major"><br>
            <input type="submit" value="Submit">
    </form>
