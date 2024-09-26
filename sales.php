<?php include('./includes/dbcon.php') ?>

<?php $title = 'Sales'; ?>
<?php include('topbar.php') ?>
<?php include('sidebar.php') ?>

<div class="main-content transition-all ease-in-out duration-300">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 mb-5">
                <div class="flex items-center justify-between">
                    <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Sales</h4>
                    <div class="ltr:ml-auto rtl:mr-auto">
                        <select class="form-select form-select-md rounded py-0.5 ltr:pl-3 rtl:pr-3 border-gray-50 bg-gray-50/20 dark:border-zinc-600 dark:text-gray-100 dark:bg-zinc-700">
                            <option value="Today" selected="">Today</option>
                            <option value="Yesterday">Yesterday</option>
                            <option value="Last Week">Last Week</option>
                            <option value="Last Month">Last Month</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body ">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class="text-gray-700 dark:text-zinc-100">Total Sales</span>

                                    <?php
                                    $sql = "SELECT * FROM Sales";

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
                        <div class="flex items-center">
                            <?php
                            include('./includes/difference.php');

                            if ($thisWeekCount < $lastWeekCount) {
                                echo " <span class='text-xs py-[1px] px-1 bg-red-50/60 text-red-500 rounded font-medium dark:bg-red-500/30'>
                                    $difference sales</span>";
                            } else {
                                echo "<span class='text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30'>$difference Sales</span>";
                            }
                            ?>

                            <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                week</span>
                        </div>
                    </div>
                </div>
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class="text-gray-700 dark:text-zinc-100">Sales Revenue</span>

                                    <?php
                                    $sql = "SELECT SUM(salesAmount) FROM `Sales`";
                                    $results = mysqli_query($db, $sql);
                                    while ($rows = mysqli_fetch_array($results)) { ?>
                                        <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                            <span class="counter-value" data-target="865.2">Tsh.<?php echo $rows['SUM(salesAmount)'] ?></span>

                                        </h4>
                                    <?php }
                                    ?>

                                </div>
                                <!-- <div class="col-span-6">
                                        <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>-->
                            </div>
                        </div>
                        <div class="flex items-center">
                            <?php
                            include('./includes/differenceSum.php');

                            if ($thisWeekSum < $lastWeekSum) {
                                echo " <span class='text-xs py-[1px] px-1 bg-red-50/60 text-red-500 rounded font-medium dark:bg-red-500/30'>
                                    Tsh. $difference </span>";
                            } else {
                                echo "<span class='text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30'>Tsh.$difference</span>";
                            }
                            ?>

                            <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                week</span>
                        </div>
                    </div>
                </div>
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class="text-gray-700 dark:text-zinc-100">Discounts</span>
                                    <?php
                                    $sql = "SELECT SUM(discount) FROM `Sales`";
                                    $results = mysqli_query($db, $sql);
                                    while ($rows = mysqli_fetch_array($results)) { ?>
                                        <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                            <span class="counter-value" data-target="865.2">Tsh.<?php echo $rows['SUM(discount)'] ?></span>

                                        </h4>
                                    <?php }
                                    ?>

                                </div>
                                <!--<div class="col-span-6">
                                        <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>-->
                            </div>
                        </div>
                        <div class="flex items-center">
                            <?php
                            include('./includes/differenceDiscount.php');

                            if ($thisWeekSum < $lastWeekSum) {
                                echo "<span class='text-xs py-[1px] px-1 bg-red-50/60 text-red-500 rounded font-medium dark:bg-red-500/30'>
                                    Tsh. $difference </span>";
                            } else {
                                echo "<span class='text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30'>Tsh.$difference</span>";
                            }
                            ?>
                            <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                week</span>
                        </div>
                    </div>
                </div>
                <div class="card  dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div>
                            <div class="grid grid-cols-12 gap-5 items-center">
                                <div class="col-span-6">
                                    <span class="text-gray-700 dark:text-zinc-100">Profit</span>
                                    <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                        <span class="counter-value" data-target="865.2">Tsh.150000</span>

                                    </h4>
                                </div>
                                <!--<div class="col-span-6">
                                        <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div>-->
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                2.95%</span>
                            <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                week</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                        <div class="card-body pb-0">
                            <div class="flex flex-wrap items-center mb-2">
                                <h5 class="text-15 mr-2 text-gray-800 dark:text-gray-100 ">Sales Trend</h5>
                                <div class="ltr:ml-auto rtl:mr-auto flex gap-1">
                                    <button type="button" class="btn py-1 px-2 text-13 bg-violet-50/50 border-transparent text-violet-500 hover:bg-violet-500 hover:text-white focus:bg-violet-500 focus:text-white dark:bg-violet-500/20 dark:text-violet-200 dark:hover:bg-violet-500 dark:hover:text-white">ALL</button>
                                    <button type="button" class="btn py-1 px-2 text-13 bg-gray-50/50 border-transparent text-gray-500 hover:bg-gray-500 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">1M</button>
                                    <button type="button" class="btn py-1 px-2 text-13 bg-gray-50/50 border-transparent text-gray-500 hover:bg-gray-500 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">6M</button>
                                    <button type="button" class="btn py-1 px-2 text-13 bg-gray-50/50 border-transparent text-gray-500 hover:bg-gray-500 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">1Y</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="col-span-12">
                                <div id="sales-trend" data-colors='["#5156be", "#34c38f"]' class="apex-charts dark:border-zinc-700"></div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body pb-0">
                        <div class="flex flex-wrap items-center mb-2  justify-between">
                            <h5 class="text-15 mr-2 text-gray-800 dark:text-gray-100">Sales Transactions</h5>
                            <a href="addSale.php" type="button" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent"><i class="bx bx-plus me-1"></i> Add Sale</a>

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
                                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Quantity</th>
                                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Selling Price(Tsh.)</th>
                                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Discount(Tsh.)</th>
                                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Total Price(Tsh.)</th>
                                    <th class="p-4 pr-8 border rtl:border-l border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM Sales";
                                $result = mysqli_query($db, $sql);
                                while (
                                    $row = mysqli_fetch_array($result)
                                ) { ?>

                                    <tr>
                                        <!-- <td ><?php echo $row['id']; ?></td>-->
                                        <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600"><?php echo $row['prodName']; ?></td>
                                        <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600"><?php echo $row['prodBrand']; ?></td>
                                        <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600"><?php echo $row['barCode']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['prodCategory']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['quantity']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['salesPrice']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" value="0"><?php echo $row['discount']; ?></td>
                                        <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['salesAmount']; ?></td>
                                        <td class="p-4 pr-8 border rtl:border-l border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"><?php echo $row['date']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('footer.php') ?>