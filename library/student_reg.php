<?php
include_once "../library/db_connection.php";
class student_schedule
{
    function get_course_terms()
    {
        $conn = new connection_helper("cs340_spring2024");
        if(!$conn)
        {
            die ('Could not connect: '. mysql.error());
        }
        $conn_str = $conn->get_connection_string();
        $sql_dt = "SELECT term FROM tblcourse_schedule ";
        $course_term = array();
        if($qryterm=mysqli_query($conn_str,$sql_dt))
        {
            if(mysqli_num_rows($qryterm)>0)
            {
                while($q_rows = mysqli_fetch_array($qryterm))
                {
                    $course_term[]=$q_rows;
                }
            }
            $conn_str->close();
        }
        return $course_term;
    }
    function register_students($term_select)
    {
        $conn = new connection_helper("cs340_spring2024");
        if(!$conn)
        {
            die ('Could not connect: '. mysql.error());
        }
        $conn_str = $conn->get_connection_string();
        $sql_dt = "SELECT * FROM tblcourse_schedule WHERE term='$term_select'";
        $row_registers = array();
        if($qryschedule=mysqli_query($conn_str,$sql_dt))
        {
            if(mysqli_num_rows($qryschedule)>0)
            {
                while($q_rows = mysqli_fetch_assoc($qryschedule))
                {
                    $row_registers[]=$q_rows;
                }
            }
            $conn_str->close();
        }
        return $row_registers;

    }
    function add_student_course($course_ref_num, $st_id)
    {
        $conn = new connection_helper("cs340_spring2024");
        $conn_str = $conn->get_connection_string();
        $student_ran = rand(0123456,98765432); //get a random number between two numbers
        $studentID = $student_ran;
        $room_numer =1234;
        //students' fileds
        try
        {
            //pull student information
            $qrystudent = "SELECT * FROM tblstudents WHERE student_id='$st_id'";
            $st_stmt = mysqli_query($conn_str,$qrystudent); //set query statement
            $get_st = mysqli_num_rows($st_stmt); //runs query to get the number of rows
            //$get_student = array(); //array of the student record
            $fname;
            $mname;
            $lname;
            $stnumber;
            if($get_st>0)
            {
                while($fieldname = mysqli_fetch_assoc($st_stmt))
                {

                    $fname=$fieldname['first_name'];
                    $mname=$fieldname['middle_name'];
                    $lname=$fieldname['last_name'];
                    $stnumber=$fieldname['student_id'];
                }
            }
            //pull course from the schedule
            $qrysect_stmt = "SELECT * FROM tblcourse_schedule WHERE course_reference='$course_ref_num'";
            $stmt_course = mysqli_query($conn_str,$qrysect_stmt);
            $register = mysqli_num_rows($stmt_course);
            $term;
            $course_name;
            $section_number;
            $course_reference;
            $course_title;
            $start_date;
            $start_time;
            $end_date;
            $end_time;
            $location;
            $modality;
            $faculty_name;
            $faculty_id;
            $credits;
            if($register>0)
            {
                while($fieldname = mysqli_fetch_assoc($stmt_course))
                {
                    $term=$fieldname['term'];
                    $course_name=$fieldname['course_name'];
                    $section_number=$fieldname['section_number'];
                    $course_reference=$fieldname['course_reference'];
                    $course_title=$fieldname['course_title'];
                    $start_date=$fieldname['start_date'];
                    $start_time=$fieldname['start_time'];
                    $end_date=$fieldname['end_date'];
                    $end_time=$fieldname['end_time'];
                    $location=$fieldname['location'];
                    $modality=$fieldname['modality'];
                    $faculty_name=$fieldname['faculty_name'];
                    $faculty_id=$fieldname['faculty_id'];
                    $credits=$fieldname['credits'];
                }
            }
            //while ($fieldinfo = mysqli_fetch_field($result)) {
            if($get_st>0 && $register>0)//if both conditions are true insert course to student schedule
            {
                $insert_rec ="INSERT INTO tblregistration(first_name,middle_name,last_name,student_id,term,course_name,section_number,course_reference,course_title,start_date,start_time,end_date,end_time,location,modality,faculty_name,faculty_id,credits)
					VALUES('$fname','$mname','$lname','$stnumber','$term','$course_name','$section_number','$course_reference','$course_title','$start_date','$start_time','$end_date','$end_time','$location','$modality','$faculty_name','$faculty_id','$credits')";
                mysqli_query($conn_str, $insert_rec);	//run the sql statement
                $conn_str->close();
                header("Location: ../?$course_name$=successfully added.$stnumber$fname");
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

        $conn_str->close();
    }
}
?>

