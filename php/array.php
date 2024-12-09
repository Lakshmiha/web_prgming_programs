<?php
	$student=array("Arya","Akhil","Sachin","Rahul","Davis","Dain","Nived","Kiran");
	echo "<h3>Original array:\n</h3>";
	echo "<pre>";
	print_r($student);
	echo "</pre>";

	asort($student);
	echo "<h3>\nSorted array(Ascending):\n</h3>";
	echo "<pre>";
	print_r($student);
	echo "</pre>";

	arsort($student);
	echo "<h3>\nSorted array(descending):\n</h3>";
	echo "<pre>";
	print_r($student);
	echo "</pre>";
?>