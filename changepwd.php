<?php include('./includes/dbcon.php'); ?>
<?php $title = 'Password Recovery'; ?>
<?php include('./includes/resetPwd.php') ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Recover Password - Mauzo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Sales and Inventory Management System" name="description" />
    <meta content="" name="Mauzo" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />


    <link rel="stylesheet" href="./assets/libs/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="assets/css/icons.css" />
    <link rel="stylesheet" href="assets/css/tailwind.css" />



</head>

<body data-mode="light" data-sidebar-size="lg">



    <div class="container-fluid">
        <div class="h-screen md:overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-12 ">
                <div class="col-span-12 md:col-span-7 lg:col-span-5 xl:col-span-4 relative z-50">
                    <div class="w-full bg-white xl:p-12 p-10 dark:bg-zinc-800">
                        <div class="flex h-[90vh] flex-col">
                            <div class=" mx-auto">
                                <a href="dashboard.php" class="">
                                    <img src="assets/images/logo-sm.svg" alt="" class="h-8 inline"> <span class="text-xl align-middle font-medium ltr:ml-2 rtl:mr-2 dark:text-white">Mauzo</span>
                                </a>
                            </div>

                            <div class="my-auto mx-auto">
                                <div class="text-center mb-4">
                                    <h5 class="text-gray-600 dark:text-gray-100">Reset Password</h5>
                                    <p class="text-gray-500 mt-1 dark:text-zinc-100/60">Enter your new password</p>
                                </div>
                                <?php
                                if (isset($errorMessage)) {
                                    echo "<div class='relative px-5 py-3 border-2 bg-red-50 text-red-700 border-red-100 rounded text-center'>
            <p>$errorMessage</p>
        </div>";
                                } else if (isset($successMessage)) {
                                    echo "<div class='relative px-5 py-3 border-2 bg-green-50 text-green-700 border-green-100 rounded mb-3 text-center'>
            <p>$successMessage</p>
        </div>";
                                }
                                ?>
                                <form class="mt-4 pt-2" action="" method="POST">
                                    <div class="mb-6">
                                        <label class="text-gray-600 font-medium mb-2 block dark:text-gray-100">New Password</label>
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

                                    <div class="mb-4 flex flex-row justify-center">
                                        <button class="btn border-transparent bg-violet-500 w-48 py-2.5 text-white w-100 waves-effect waves-light shadow-md shadow-violet-200 dark:shadow-zinc-600" type="submit" name="reset">Change Password</button>
                                    </div>
                                </form>

                                <div class="mt-12 text-center">
                                    <p class="text-gray-500 dark:text-zinc-100">Back to <a href="index.php" class="text-violet-500 font-semibold"> Login </a> </p>
                                </div>
                            </div>

                            <div class=" text-center">
                                <p class="text-gray-500 relative mb-5 dark:text-gray-100">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> Mauzo <!--. Crafted with <i class="mdi mdi-heart text-red-400"></i> by Themesbrand</p>-->
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

                        <div class="grid grid-cols-12 content-center h-screen">

                        </div>

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