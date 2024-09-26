<?php include('./includes/dbcon.php') ?>
<?php $title = 'Products'; ?>
<?php include('topbar.php') ?>
<?php include('sidebar.php') ?>

<div class="main-content transition-all ease-in-out duration-300">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 mb-5">
                <div class="flex items-center justify-between">
                    <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Products</h4>
                    <a href="addProd.php" type="button" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent"><i class="bx bx-plus me-1"></i> Add Product</a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body ">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class="text-gray-700 dark:text-zinc-100">Listed Products</span>

                                    <?php
                                    $sql = "SELECT * FROM products";

                                    if ($result = mysqli_query($db, $sql)) {

                                        //Return thr number of rows in result set

                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    ?>

                                    <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                        <span class="counter-value" data-target="100"><?php echo $rowcount ?></span>

                                    </h4>
                                </div>
                                <!--<div class="col-span-6">
                                        <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>-->
                            </div>
                        </div>
                        <!--<div class="flex items-center">
                                <span
                                    class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                    20 Sales</span>
                                <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                    week</span>
                            </div>-->
                    </div>
                </div>
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class="py-[1px] px-1 bg-green-50/60 text-green-500 rounded  dark:bg-green-500/30">In-Stock</span>

                                    <?php
                                    $sql = "SELECT * FROM products WHERE quantity > 0";

                                    if ($result = mysqli_query($db, $sql)) {

                                        //Return thr number of rows in result set

                                        $inStock = mysqli_num_rows($result);
                                    }
                                    ?>

                                    <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                        <span class="counter-value" data-target="865.2"><?php echo $inStock ?></span>

                                    </h4>
                                </div>
                                <!--<div class="col-span-6">
                                        <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>-->
                            </div>
                        </div>
                        <!--<div class="flex items-center">
                                <span
                                    class="text-xs py-[1px] px-1 bg-red-50/60 text-red-500 rounded font-medium dark:bg-red-500/30">-
                                    Tsh.29k </span>
                                <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                    week</span>
                            </div>-->
                    </div>
                </div>
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class="py-[1px] px-1 bg-yellow-50 text-yellow-500 rounded dark:bg-yellow-500/30">Low-Stock</span>
                                    <?php
                                    $sql = "SELECT * FROM products WHERE quantity <= 5 AND quantity != 0";

                                    if ($result = mysqli_query($db, $sql)) {

                                        //Return thr number of rows in result set

                                        $lowStock = mysqli_num_rows($result);
                                    }
                                    ?>
                                    <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                        <span class="counter-value" data-target="865.2"><?php echo $lowStock ?></span>

                                    </h4>
                                </div>
                                <!--<div class="col-span-6">
                                        <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>-->
                            </div>
                        </div>
                        <!--<div class="flex items-center">
                                <span
                                    class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                    Tsh.2.8k</span>
                                <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                    week</span>
                            </div>-->
                    </div>
                </div>
                <div class="card  dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class=" py-[1px] px-1 bg-red-50/60 text-red-500 rounded  dark:bg-red-500/30">Out-of Stock</span>
                                    <?php
                                    $sql = "SELECT * FROM products WHERE quantity = 0";

                                    if ($result = mysqli_query($db, $sql)) {

                                        //Return thr number of rows in result set

                                        $outofStock = mysqli_num_rows($result);
                                    }
                                    ?>
                                    <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                        <span class="counter-value" data-target="865.2"><?php echo $outofStock ?></span>

                                    </h4>
                                </div>
                                <!--<div class="col-span-6">
                                        <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>-->
                            </div>
                        </div>
                        <!--<div class="flex items-center">
                                <span
                                    class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                    2.95%</span>
                                <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                    week</span>
                            </div>-->
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                    <div class="card-body relative overflow-x-auto">
                        <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                            <thead>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th class="relative text-start p-4 dark:text-gray-100">
                                        <input type="checkbox" value="" id="checkall" class="w-4 h-4 ring-0 border-gray-100 rounded checked:bg-violet-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:checked:bg-violet-500 dark:border-zinc-500">
                                    </th>
                                    <th class="relative text-start p-4 dark:text-gray-100 hidden">id</th>
                                    <th class="relative text-start p-4 dark:text-gray-100">Product</th>
                                    <th class="relative text-start p-4 dark:text-gray-100">Brand</th>
                                    <th class="relative text-start p-4 dark:text-gray-100">Category</th>
                                    <th class="relative text-start p-4 dark:text-gray-100">Barcode</th>
                                    <th class="relative text-start p-4 dark:text-gray-100">Quantity</th>
                                    <th class="relative text-start p-4 dark:text-gray-100">Status</th>
                                    <th class="relative text-start p-4 dark:text-gray-100">Selling Price(Tsh)</th>                                    
                                    <th class="relative text-start p-4 dark:text-gray-100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `products`";
                                $result = mysqli_query($db, $sql);
                                while (
                                    $row = mysqli_fetch_array($result)
                                ) { ?>

                                    <tr class="border-b border-gray-50 text-gray-600 dark:border-zinc-600">
                                        <td>
                                            <div class="p-4">
                                                <input type="checkbox" value="<?php echo $row['id']; ?>" id="checkItem" name="check[]" class="w-4 h-4 ring-0 border-gray-100 rounded checked:bg-violet-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:checked:bg-violet-500 dark:border-zinc-500">
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm hidden"><?php echo $row['id']; ?>
                                        <td class="p-4 dark:text-zinc-50"><?php echo $row['prodName']; ?></td>
                                        <td class="p-4 dark:text-zinc-50"><?php echo $row['prodBrand']; ?></td>
                                        <td class="p-4 dark:text-zinc-50"><?php echo $row['prodCategory']; ?></td>
                                        <td class="p-4 dark:text-zinc-50"><?php echo $row['barCode']; ?></td>
                                        <td class="p-4 dark:text-zinc-50"><?php echo $row['quantity']; ?></td>
                                        <td class="p-4 dark:text-zinc-50">
                                            <?php
                                            if ($row['quantity'] <= "0"){
                                                echo '<span class=" py-[1px] px-1 bg-red-50/60 text-red-500 rounded  dark:bg-red-500/30">Out-Of-Stock</span>';
                                            } elseif ($row['quantity'] > "5"){
                                                echo '<span class="py-[1px] px-1 bg-green-50/60 text-green-500 rounded  dark:bg-green-500/30">In-Stock</span>';
                                            }elseif ($row['quantity'] <= "5" || $row['quantity'] != "0"){
                                                echo  '<span class="py-[1px] px-1 bg-yellow-50 text-yellow-500 rounded dark:bg-yellow-500/30"> Low-Stock </span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="p-4 dark:text-zinc-50"><?php echo $row['sellPrice']; ?></td>
                                        <td>
                                            <div class="dropdown relative">
                                                <a class="btn border-transparent py-1 text-16 text-gray-500 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" id="dropdownMenu123" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <ul class=" dropdown-menu min-w-max absolute bg-white z-50 float-left py-2 -top-2 list-none text-left -left-5 w-32 dark:bg-zinc-600 dark:text-gray-100 
                                                    rounded-lg shadow-lg hidden bg-clip-padding border-none" aria-labelledby="dropdownMenu123">
                                                    <li>
                                                        <form action="" method="POST">
                                                        <a
                                                        class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-100 hover:bg-gray-50/50 dark:hover:bg-zinc-500/50"
                                                        href="./editProd.php? id=<?= $row['id'];?>" title="Edit" name="editProduct">Edit</a>
                                                        </form>
                                                    </li>
                                                    <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap
                                                        bg-transparent text-gray-700 dark:text-gray-100 hover:bg-gray-50/50 dark:hover:bg-zinc-500/50" href="#">Disable</a >
                                                    </li>
                                                    <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent
                                                        text-gray-700 dark:text-gray-100 hover:bg-gray-50/50 dark:hover:bg-zinc-500/50" href="./includes/delProd.php? id=<?= $row['id']; ?>" type="button" name="delete">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php include('footer.php') ?>