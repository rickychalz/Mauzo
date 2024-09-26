<?php include('./includes/dbcon.php') ?>
<?php $title = 'Purchases'; ?>
<?php include ('topbar.php') ?>
<?php include ('sidebar.php') ?>

<div class="main-content transition-all ease-in-out duration-300">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Purchases</h4>
                        <a href="addPurchase.php" type="button" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent"><i class="bx bx-plus me-1"></i> Add Purchase</a>
                    </div>
                </div>



                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body pb-0">
                            <div class="flex flex-wrap items-center mb-2">
                                <div class="ltr:ml-auto rtl:mr-auto">
                                    <select
                                        class="form-select form-select-md rounded py-0.5 ltr:pl-3 rtl:pr-3 border-gray-50 bg-gray-50/20 dark:border-zinc-600 dark:text-gray-100 dark:bg-zinc-700">
                                        <option value="Today" selected="">Today</option>
                                        <option value="Yesterday">Yesterday</option>
                                        <option value="Last Week">Last Week</option>
                                        <option value="Last Month">Last Month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body relative overflow-x-auto">
                            <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                <thead>
                                    <tr>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-y-2 border-gray-50 dark:border-zinc-600">Product</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-y-2 border-gray-50 dark:border-zinc-600">Brand</th>
                                        <th class="p-4 pr-8 border rtl:border-l-0 border-y-2 border-gray-50 dark:border-zinc-600">Barcode</th>
                                        <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Category</th>
                                        <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Supplier</th>
                                        <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Quantity</th>
                                        <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Purchase Cost(Tsh)</th>
                                        <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Total Cost(Tsh)</th>
                                        <th class="p-4 pr-8 border rtl:border-l border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $sql = "SELECT * FROM `Purchases`";
                                        $result = mysqli_query($db, $sql);
                                        while (
                                            $row = mysqli_fetch_array($result)
                                        ) { ?>
                                    <tr>
                                        <!--<td ><?php echo $row['id']; ?></td>-->
                                        <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600"><?php echo $row['prodName']; ?></td>
                                        <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600"><?php echo $row['prodBrand']; ?></td>
                                        <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600"><?php echo $row['barCode']; ?></td>
                                        <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600"><?php echo $row['prodCategory']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['supplier']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['quantity']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['purchCost']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['totalAmount']; ?></td>
                                        <td class="p-4 pr-8 border rtl:border-l border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['date']; ?></td>
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

<?php include ('footer.php') ?>