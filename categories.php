<?php include('./includes/dbcon.php') ?>
<?php include('./includes/addCatconn.php');?>
<?php $title = 'Categories'; ?>
<?php include ('topbar.php') ?>
<?php include ('sidebar.php') ?>

<div class="main-content ">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Categories</h4>
                        <a data-tw-toggle="modal" data-tw-target="#addCategory" type="button" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent"><i class="bx bx-plus me-1"></i> Add Category</a>
                        <div class="modal relative z-50 hidden" id="addCategory" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="fixed inset-0 z-50 overflow-y-auto">
                            <div class="absolute inset-0 bg-black bg-opacity-50 transition-opacity modal-overlay"></div>
                            <div class="animate-translate p-4 sm:max-w-lg mx-auto">
                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all dark:bg-zinc-600">
                                    <div class="bg-white dark:bg-zinc-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 border-transparent hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 rounded-lg text-sm px-2 py-1 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600" data-tw-dismiss="modal">
                                            <i class="mdi mdi-close text-xl text-gray-500 dark:text-zinc-100/60"></i>
                                        </button>
                                        <div class="p-5">
                                            <h3 class="mb-4 text-xl font-medium text-gray-700 dark:text-gray-100">Add Category</h3>
                                            <form action="" method="POST">

                                                <div class="card-body">
                                                    <div class="grid grid-cols-12 gap-5">
                                                        <div class="col-span-12">
                                                            <div class="mb-4">
                                                                <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Category
                                                                    Name</label>
                                                                <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" placeholder="Enter category name" id="example-text-input" name="categoryName">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn bg-violet-500 text-white border-transparent w-full" name="addCategory">Add Category</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 ">
                        <div class="card-body relative overflow-x-auto px-8">

                            <table class="w-full mx-auto ">
                                <thead class="border-b border-gray-50 cursor-pointer dark:border-zinc-600">
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <th class="relative text-start p-4 dark:text-gray-100">
                                            <input type="checkbox" value="" class="w-4 h-4 ring-0 border-gray-100 rounded checked:bg-violet-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:checked:bg-violet-500 dark:border-zinc-500">
                                        </th >
                                        <th class="relative text-start p-4 dark:text-gray-100">Category  
                                        </th>
                                        <th class="relative w-28 text-start p-4 dark:text-gray-100">Action

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $sql = "SELECT * FROM `categories`";
                                        $result = mysqli_query($db, $sql);
                                        while (
                                            $row = mysqli_fetch_array($result)
                                        ) { ?>
                                    <tr class="border-b border-gray-50 text-gray-600 dark:border-zinc-600">
                                        <td>
                                            <div class="p-4">
                                                <input type="checkbox" value="" class="w-4 h-4 ring-0 border-gray-100 rounded checked:bg-violet-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:checked:bg-violet-500 dark:border-zinc-500">
                                            </div>
                                        </td>
                                        <td class="inline-flex items-center p-4">
                                            <a href="#" class="text-gray-700 dark:text-gray-100"><?php echo $row['categoryName']; ?></a>
                                        </td>
                                        <td>
                                            <div class="dropdown relative">
                                                <a class="btn border-transparent py-1 text-16 text-gray-500 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" id="dropdownMenu123" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <ul class=" dropdown-menu min-w-max absolute bg-white z-50 float-left py-2 -top-2 list-none text-left -left-5 w-32 dark:bg-zinc-600 dark:text-gray-100 
                                                    rounded-lg shadow-lg hidden bg-clip-padding border-none" aria-labelledby="dropdownMenu123">
                                                    <li><a
                                                        class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-100 hover:bg-gray-50/50 dark:hover:bg-zinc-500/50"
                                                        href="#">Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap
                                                        bg-transparent text-gray-700 dark:text-gray-100 hover:bg-gray-50/50 dark:hover:bg-zinc-500/50" href="#">Print</a >
                                                    </li>
                                                    <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent
                                                        text-gray-700 dark:text-gray-100 hover:bg-gray-50/50 dark:hover:bg-zinc-500/50" href="./includes/delCat.php? id=<?= $row['id']; ?>" type="button" name="delete">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }
                                        ?>
                                </tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php') ?>