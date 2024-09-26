<?php
                    $db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `customers` WHERE id=$id LIMIT 1";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);
                    ?>