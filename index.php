<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_POST['login'])) {

    // Connect to the database 
    $mysqli = new mysqli('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

    // Check for errors 
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and bind the SQL statement 
    $stmt = $mysqli->prepare("SELECT userId, userPwd FROM users WHERE userName = ?");
    $stmt->bind_param("s", $name);

    // Get the form data 
    $name = $_POST['userName'];
    $password = $_POST['pwd'];

    // Execute the SQL statement 
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists 
    if ($stmt->num_rows > 0) {

        // Bind the result to variables 
        $stmt->bind_result($id, $hashed_password);

        // Fetch the result 
        $stmt->fetch();

        // Verify the password 
        if (password_verify($password, $hashed_password)) {

            // Set the session variables 
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['userName'] = $name;

            // Redirect to the user's dashboard 
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

    // Close the connection 
    $stmt->close();
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Login - Mauzo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Sales and Inventory Management System" name="description" />
    <meta content="" name="Mauzo" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <link rel="stylesheet" href="./assets/libs/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/icons.css" />
    <link rel="stylesheet" href="assets/css/tailwind.css" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body data-mode="light" data-sidebar-size="lg">

    <div class="container-fluid">
        <div class="h-screen md:overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-12 ">

                <div class="col-span-12 md:col-span-7 lg:col-span-5 xl:col-span-4 relative z-50 ">

                    <div class="w-full bg-white xl:p-12 p-10 dark:bg-zinc-800 ">
                        <div class="flex h-[90vh] flex-col">
                            <div class="mx-auto ">
                                <a href="dashboard.php" class="">
                                    <img src="assets/images/logo-sm.svg" alt="" class="h-8 inline"> <span class="text-xl align-middle font-medium ltr:ml-2 rtl:mr-2 dark:text-white">Mauzo</span>
                                </a>
                            </div>

                            <div class="my-auto mx-auto">
                                <div class="text-center">
                                    <h5 class="text-gray-600 dark:text-gray-100">Welcome Back !</h5>
                                    <p class="text-gray-500 dark:text-gray-100/60 mt-1">Login to continue to Mauzo.</p>
                                </div>

                                <form class="mt-4 pt-2" action="#" method="POST">
                                    <div class="mb-4">
                                        <label class="text-gray-600 dark:text-gray-100 font-medium mb-2 block">Username</label>
                                        <input type="text" class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60" id="username" placeholder="Enter username" name="userName">
                                    </div>
                                    <div class="mb-3">
                                        <div class="flex">
                                            <div class="flex-grow-1">
                                                <label class="text-gray-600 dark:text-gray-100 font-medium mb-2 block">Password</label>
                                            </div>
                                            <div class="ltr:ml-auto rtl:mr-auto">
                                                <a href="recover.php" class="text-gray-500 dark:text-gray-100">Forgot password?</a>
                                            </div>
                                        </div>

                                        <div class="flex">
                                            <input type="password" class="w-full rounded ltr:rounded-r-none rtl:rounded-l-none placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" name="pwd" id="pwd">
                                            <button class="bg-gray-50 px-4 rounded ltr:rounded-l-none rtl:rounded-r-none border border-gray-100 ltr:border-l-0 rtl:border-r-0 dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100" type="button" id="showPwd" onclick="revealPwd()"><i class="mdi mdi-eye-outline"></i></button>
                                            <script>
                                                function revealPwd() {
                                                    var x = document.getElementById("pwd");
                                                    if (x.type === "password") {
                                                        x.type = "text";
                                                    } else {
                                                        x.type = "password";
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <div class="col">
                                            <div>
                                                <input type="checkbox" class="h-4 w-4 border border-gray-300 rounded bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain ltr:float-left rtl:float-right ltr:mr-2 rtl:ml-2 cursor-pointer focus:ring-offset-0" checked id="exampleCheck1">
                                                <label class="align-middle text-gray-600 dark:text-gray-100 font-medium">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="flex flex-row justify-center mb-3">
                                        <button class="btn border-transparent bg-violet-500 w-48 py-2.5 text-white w-100 waves-effect waves-light shadow-md shadow-violet-200 dark:shadow-zinc-600" type="submit" name="login">Login</button>
                                    </div>
                                </form>

                                <!--<div class="mt-4 pt-2 text-center">
                                    <div>
                                        <h6 class="text-14 mb-3 text-gray-500 dark:text-gray-100 font-medium">- Sign in with -</h6>
                                    </div>

                                    <div class="flex justify-center gap-3">
                                        <a href="" class="h-9 w-9 bg-violet-500 leading-[2.9] rounded-full">
                                            <i class="mdi mdi-facebook text-lg text-white"></i>
                                        </a>
                                        <a href="" class="h-9 w-9 bg-sky-500 leading-[2.9] rounded-full">
                                            <i class="mdi mdi-twitter text-lg text-white"></i>
                                        </a>
                                        <a href="" class="h-9 w-9 bg-red-400 leading-[2.9] rounded-full">
                                            <i class="mdi mdi-google text-lg text-white"></i>
                                        </a>
                                    </div>
                                </div>-->

                                <div class="mt-12 text-center">
                                    <p class="text-gray-500 dark:text-gray-100">Don't have an account ? <a href="register.php" class="text-violet-500 font-semibold">Register</a> </p>
                                </div>
                            </div>


                            <div class=" text-center">
                                <p class="text-gray-500 dark:text-gray-100 relative mb-5">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> Mauzo <!--Crafted with <i class="mdi mdi-heart text-red-400"></i> by Themesbrand</p>-->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="hidden md:block col-span-5 lg:col-span-7 xl:col-span-8">
                    <div class="h-screen relative p-5">
                        <div class="absolute inset-0 bg-violet-500/90"></div>

                        <ul class="bg-bubbles absolute top-0 left-0 w-full h-full overflow-hidden animate-square">
                            <li class="h-10 w-10 rounded-3xl bg-white/10 absolute left-[10%] "></li>
                            <li class="h-28 w-28 rounded-3xl bg-white/10 absolute left-[20%]"></li>
                            <li class="h-10 w-10 rounded-3xl bg-white/10 absolute left-[25%]"></li>
                            <li class="h-20 w-20 rounded-3xl bg-white/10 absolute left-[40%]"></li>
                            <li class="h-24 w-24 rounded-3xl bg-white/10 absolute left-[70%]"></li>
                            <li class="h-32 w-32 rounded-3xl bg-white/10 absolute left-[70%]"></li>
                            <li class="h-36 w-36 rounded-3xl bg-white/10 absolute left-[32%]"></li>
                            <li class="h-20 w-20 rounded-3xl bg-white/10 absolute left-[55%]"></li>
                            <li class="h-12 w-12 rounded-3xl bg-white/10 absolute left-[25%]"></li>
                            <li class="h-36 w-36 rounded-3xl bg-white/10 absolute left-[90%]"></li>
                        </ul>

                        <!--<div class="grid grid-cols-12 content-center h-screen">
                            <div class="col-span-8 col-start-3">
                                
                                    
                                        <div class="swiper-slide">
                                            
                                            <h3 class="text-white text-22">“I feel confident imposing change on myself. It's a lot more progressing fun than looking back. That's why I ultricies enim at malesuada nibh diam on tortor neaded to throw curve balls.”</h3>

                                        </div>

                            </div>
                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <script src="./assets/libs/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/pages/login.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>