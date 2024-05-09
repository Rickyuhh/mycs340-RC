<?php
include_once "../library/student_reg.php";
$course_list = new student_schedule();
//term list on database
$term_schedule = array();
$term_selected = array();
$term_schedule = $course_list->get_course_terms();
foreach($term_schedule as $thelist)
{
    $term_selected[] = $thelist['term'];
}
$unique_term = array();
$unique_term = array_unique($term_selected);
//schedule for selected term
//$_POST['term_select']='';
$student_registration = array();
//$course_ref=10;
$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
if(!isset($_POST['term_select']))
{
    //do nothing
}
else
{
    $term_value= $_POST['term_select'];
    $student_registration = $course_list->register_students($term_value);
}
try
{
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    $url.= $_SERVER['REQUEST_URI'];
    $course_ref = explode("=",$url);
    if(isset($course_ref))
    {
        if(sizeof($course_ref)>1)
        {
            $course_list->add_student_course($course_ref[1],$student_id);
        }
    }
}
catch (Exception $e)
{
    echo $e->getMessage();
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minmum-scale=1.0">
    <meta http-equiv="X-AU-compatible" content="ie=edge">
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/table_format.css"/>
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
<div class="head_registration">
    <h3 id="h3_register">Barry University Student Registartion Portal</h3></br>
</div>
<div class="term_selection"></br></br>
    <h4>Semester Registration</h4><br/><br/>
    <form class="frm_registration" method="POST" onsubmit="return true">
        <label>Enter Student ID</label><input type="text" id="txt_st_id" name="student_id"></input>
        <select id="term_select"  name="term_select" onChange="this.form.submit();">
            <option id="txtfields">Select a Term</option>
            <?php
            foreach($unique_term as $term)
            {
                ?>
                <option id="txtfields"><?php echo $term;?></option>
                <?php
            }
            ?>
        </select>
    </form>
</div>


<div>
    <form class="addCourse" id="addCourse" method="POST" onsubmit="return true">
        <table class="student_schedule_tbl">
            <thead class="tbl_column">
            <tr>
                <th></th>
                <th>Term</th>
                <th>Status</th>
                <th>Course Name</th>
                <th>Course Title</th>
                <th>Dates</th>
                <th>Times</th>
                <th>Location</th>
                <th>Instructional Methods</th>
                <th>Faculty</th>
                <th>Faculty ID</th>
                <th>Maximum Capacity</th>
                <th>Number Enrolled</th>
                <th>Available Seats</th>
                <th>Credits</th>
                <th>Academic Level</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($student_registration as $registration)
            {
                ?>
                <tr>
                    <td><?php echo '<a class="btn_add" href="registration.php?$course_reference='.$registration['course_reference'].'">Add</a>';?>
                    </td>
                    <td><?php echo $registration['term'];?></td>
                    <td><?php echo $registration['status'];?></td>
                    <td><?php echo $registration['course_name'].'-' .$registration['section_number'];?></td>
                    <td><?php echo $registration['course_title'];?></td>
                    <td><?php echo $registration['start_date'].'-' .$registration['end_date'];?></td>
                    <td><?php echo $registration['start_time'].'-' .$registration['end_time'];?></td>
                    <td><?php echo $registration['location'];?></td>
                    <td><?php echo $registration['modality'];?></td>
                    <td><?php echo $registration['faculty_name'];?></td>
                    <td><?php echo $registration['faculty_id'];?></td>
                    <td><?php echo $registration['max_capacity'];?></td>
                    <td><?php echo $registration['enrolled'];?></td>
                    <td><?php echo $registration['available'];?></td>
                    <td><?php echo $registration['credits'];?></td>
                    <td><?php echo $registration['academic_level'];?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>