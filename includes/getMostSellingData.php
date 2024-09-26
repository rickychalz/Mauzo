<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

                                // Get the results and store them in an array
                                $query = "SELECT prodCategory, COUNT(prodCategory) AS count FROM Sales GROUP BY prodCategory ORDER BY count DESC;";
                                $result = mysqli_query($db, $query);

                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }

                                header('Content-Type: application/json');
                                echo json_encode($data);

                                
?>