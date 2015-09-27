<?php
	if(!isset($_SESSION['a_user']))
	{
		exit("<script>alert('This admin area. Please login');window.location='index.php';</script>");
	}
?>