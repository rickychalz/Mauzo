<?php include('./includes/dbcon.php') ?>
<?php $title = 'Settings'; ?>
<?php include('topbar.php') ?>
<?php include('sidebar.php') ?>



<div class="main-content transition-all ease-in-out duration-300">
    <div class="page-content dark:bg-zinc-700 min-h-screen">

        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 mb-5">
                <div class="flex items-center justify-between">
                    <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Settings</h4>
                    <!--<nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                <li class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                        Components
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="#" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-500 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Starter Page</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>-->
                </div>
            </div>


        </div>
        <div class="container-fluid px-[0.625rem]">
        <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12">
                        <div class="dark:bg-zinc-800">
                            <div class="flex flex-wrap">
                                <div class="nav-tabs border-b-tabs w-full">
                                    <ul class="nav text-sm font-medium text-center block w-full text-gray-500 sm:flex">
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="tab-full-u-home" class="inline-block w-full p-2 active">Account Details</a>
                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="tab-full-u-Profile" class="inline-block w-full p-2">Notifications</a>
                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="tab-full-u-setting" class="inline-block w-full p-2">Appearance</a>
                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="Categories" class="inline-block w-full p-2">Categories</a>
                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="tab-full-u-Profile" class="inline-block w-full p-2">Transactions</a>
                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="tab-full-u-contact" class="inline-block w-full p-2">Intergrations</a>
                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="tab-full-u-setting" class="inline-block w-full p-2">Privacy & Security</a>
                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="tab-full-u-contact" class="inline-block w-full p-2">Help Support</a>
                                        </li>
                                    </ul>

                                    <div class="card p-4 tab-content mt-5">
                                        <div class="tab-pane hidden" id="Categories">
                                            <h5 class="border-b text-sm font-medium text-center block w-full text-gray-500 sm:flex">Income</h5>
                                            <h5 class="border-b text-sm font-medium text-center block w-full text-gray-500 sm:flex">Expense</h5>
                                            <h5 class="border-b text-sm font-medium text-center block w-full text-gray-500 sm:flex">Products</h5>
                                        </div>
                                        <div class="tab-pane block" id="tab-full-u-Profile">
                                            <p class="mb-0 dark:text-gray-300">
                                                Denim you probably haven't heard of them jean shorts Austin.
                                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                                voluptate nisi qui.
                                            </p>
                                        </div>
                                        <div class="tab-pane hidden" id="tab-full-u-setting">
                                            <p class="mb-0 dark:text-gray-300">
                                                You probably haven't heard of them jean shorts Austin.
                                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                                voluptate nisi qui.
                                            </p>
                                        </div>
                                        <div class="tab-pane hidden" id="tab-full-u-contact">
                                            <p class="mb-0 dark:text-gray-300">
                                                Enim you probably haven't heard of them jean shorts Austin.
                                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                                voluptate nisi qui.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                </div>
        </div>
    </div>




    <?php include('footer.php') ?>