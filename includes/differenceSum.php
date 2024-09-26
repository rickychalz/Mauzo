<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Connect to your MySQL database (replace 'db_username', 'db_password', and 'db_name' with your actual credentials)
$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

// Calculate the date range for this week and last week
$today = date('Y-m-d');
$thisWeekStart = date('Y-m-d', strtotime('this week'));
$lastWeekStart = date('Y-m-d', strtotime('last week'));

// Query to get the sum of values for this week
$thisWeekQuery = "SELECT SUM(salesAmount) AS this_week_sum FROM Sales WHERE `date` BETWEEN '$thisWeekStart' AND '$today'";
$thisWeekResult = mysqli_query($db, $thisWeekQuery);
$thisWeekData = mysqli_fetch_assoc($thisWeekResult);
$thisWeekSum = $thisWeekData['this_week_sum'];

// Query to get the sum of values for last week
$lastWeekQuery = "SELECT SUM(salesAmount) AS last_week_sum FROM Sales WHERE `date` BETWEEN '$lastWeekStart' AND '$thisWeekStart'";
$lastWeekResult = mysqli_query($db, $lastWeekQuery);
$lastWeekData = mysqli_fetch_assoc($lastWeekResult);
$lastWeekSum = $lastWeekData['last_week_sum'];

// Calculate the difference
$difference = $thisWeekSum - $lastWeekSum;

?>