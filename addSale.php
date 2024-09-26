<?php include('./includes/dbcon.php') ?>
<?php include('./includes/addSalesconn.php') ?>
<?php $title = 'Add Sale'; ?>
<?php include('topbar.php') ?>
<?php include('sidebar.php') ?>

<div class="main-content transition-all ease-in-out duration-300">
    <div class="page-content dark:bg-zinc-700">

        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 mb-5">
                <div class="flex items-center justify-between">
                    <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Add Sale</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="sales.php" class="inline-flex items-center text-sm font-medium text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Sales
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="addSale.php" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-500 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Add
                                        Sale</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>


            <div class="grid grid-cols-1">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <form action="" method="POST">
                        <div class="card-body pb-0">
                            <h6 class="mb-1 text-15 text-gray-700 dark:text-gray-100">Sale Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 lg:col-span-6">

                                    <div class="mb-4">
                                        <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">
                                            Product Name</label>
                                        <select class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100" id="prodName" name="prodName" onchange="fetchProd()" value="">
                                            <option hidden disabled selected value>---Choose Product---</option>
                                            <?php
                                            $sql = "SELECT * FROM `products`";
                                            $result = mysqli_query($db, $sql);
                                            // use a while loop to fetch data
                                            // from the $all_categories variable
                                            // and individually display as an option
                                            while (
                                                $row = mysqli_fetch_array($result)
                                            ) :
                                            ?>
                                                <option value="<?php echo $row["prodName"];
                                                                // The value we usually set is the primary key
                                                                ?>">
                                                    <?php echo $row["prodName"];
                                                    // To show the category name to the user
                                                    ?>
                                                </option>
                                            <?php
                                            endwhile;
                                            // While loop must be terminated
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">
                                            Brand</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" placeholder="Enter product brand" value="" id="prodBrand" name="prodBrand">
                                    </div>
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">
                                            Barcode</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" placeholder="Enter product barcode" id="barCode" value="" name="barCode">
                                    </div>
                                    <div class="mb-4">
                                        <div class="mb-3">
                                            <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">
                                                Category</label>
                                            <select class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100" id="prodCategory" name="prodCategory">
                                                <option hidden disabled selected value>---Choose product category---</option>
                                                <?php
                                                $sql = "SELECT * FROM `categories`";
                                                $result = mysqli_query($db, $sql);
                                                // use a while loop to fetch data
                                                // from the $all_categories variable
                                                // and individually display as an option
                                                while (
                                                    $row = mysqli_fetch_array($result)
                                                ) :
                                                ?>
                                                    <option value="<?php echo $row["categoryName"];
                                                                    // The value we usually set is the primary key
                                                                    ?>">
                                                        <?php echo $row["categoryName"];
                                                        // To show the category name to the user
                                                        ?>
                                                    </option>
                                                <?php
                                                endwhile;
                                                // While loop must be terminated
                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Quantity</label>
                                        <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="number" placeholder="Enter quantity" id="quantity" name="quantity" onkeyup="quantityfunc(this)">
                                    </div>
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Selling Price</label>
                                        <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="text" placeholder="Enter Selling Price" id="salesPrice" name="salesPrice" value="" onkeyup="pricefunc(this)">
                                    </div>
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Discount</label>
                                        <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="number" placeholder="Enter Discount" id="discount" name="discount" onkeyup="discountfunc(this)">
                                    </div>
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Total</label>
                                        <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="number" placeholder="Enter Total Price" id="total" name="salesAmount">
                                    </div>
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Date and time</label>
                                        <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="datetime-local" placeholder="__/__/____ __:__" id="date" name="date" max="<?= date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="btn bg-violet-500 border-transparent text-white font-medium w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50" name="addSale">Add
                                    Sale</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>







            <?php include('footer.php') ?>