<?php
include_once "db_connection.php";
class schedule_update
{
	function term_schedule_update($ref_no)
	{
		$conn = new connection_helper("cs340_spring2024");
		if(!$conn)
		{
			die ('Could not connect: '. mysql.error());
		}
		$conn_str = $conn->get_connection_string();
		$sql_dt = "SELECT * FROM tblcourse_schedule WHERE course_reference='$ref_no'";
		static $max_seats= 0;
		static $enrolled_seats= 0;
		static $available_seats= 0;
		$row_reference = array();
		if($qryrefUpdate=mysqli_query($conn_str,$sql_dt))
		{
			if(mysqli_num_rows($qryrefUpdate)>0)
			{
				while($q_rows = mysqli_fetch_assoc($qryrefUpdate))
				{
					$max_seats= $q_rows['max_capacity'];
					$enrolled_seats= $q_rows['enrolled']+1;
					$available_seats= $max_seats-$enrolled_seats;					
				}
			}		
		}
		$update_schedule= "UPDATE tblcourse_schedule SET enrolled='$enrolled_seats', available='$available_seats' WHERE course_reference='$ref_no'";
		$tblupdate=mysqli_query($conn_str,$update_schedule);
		if($tblupdate)
		{
			header("Location: ../?$course_name=has been successfully update"); 
		}
		else
		{
			header("Location: ../?$course_name=has failed to update"); 
		}
		
	}
}