<?php include('./includes/dbcon.php'); ?>
<?php include('./includes/addTransconn.php'); ?>
<?php $title = 'Finance'; ?>
<?php include('topbar.php'); ?>
<?php include('sidebar.php'); ?>

<div class="main-content transition-all ease-in-out duration-300">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 mb-5">
                <div class="flex items-center justify-between">
                    <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Finance</h4>
                    <button data-tw-toggle="modal" data-tw-target="#addTransaction" type="button" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent"><i class="bx bx-plus me-1"></i> Add New</button>
                    <div class="modal relative z-50 hidden" id="addTransaction" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="fixed inset-0 z-50 overflow-y-auto">
                            <div class="absolute inset-0 bg-black bg-opacity-50 transition-opacity modal-overlay"></div>
                            <div class="animate-translate p-4 sm:max-w-lg mx-auto">
                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all dark:bg-zinc-600">
                                    <div class="bg-white dark:bg-zinc-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 border-transparent hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 rounded-lg text-sm px-2 py-1 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600" data-tw-dismiss="modal">
                                            <i class="mdi mdi-close text-xl text-gray-500 dark:text-zinc-100/60"></i>
                                        </button>
                                        <div class="p-5">
                                            <h3 class="mb-4 text-xl font-medium text-gray-700 dark:text-gray-100">New Transaction</h3>
                                            <form action="" method="POST">

                                                <div class="card-body">
                                                    <div class="grid grid-cols-12 gap-5">
                                                        <div class="col-span-12">
                                                            <div class="mb-4">
                                                                <div class="mb-3">
                                                                    <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">Transaction Type</label>
                                                                    <select class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100" name="type">
                                                                        <option hidden disabled selected value>--Select Transaction Type--</option>
                                                                        <option>Income</option>
                                                                        <option>Expense</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <div class="mb-3">
                                                                    <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">
                                                                        Category</label>
                                                                    <select class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100" name="prodCategory">
                                                                        <option hidden disabled selected value>---Select category---</option>
                                                                        <?php
                                                                        $sql = "SELECT * FROM `cat_income`";
                                                                        $result = mysqli_query($db, $sql);
                                                                        // use a while loop to fetch data
                                                                        // from the $all_categories variable
                                                                        // and individually display as an option
                                                                        while (
                                                                            $row = mysqli_fetch_array($result)
                                                                        ) :
                                                                        ?>
                                                                            <option value="<?php echo $row["id"];
                                                                                            // The value we usually set is the primary key
                                                                                            ?>">
                                                                                <?php echo $row["name"];
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
                                                            <div class="mb-4">
                                                                <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Sub-Category
                                                                </label>
                                                                <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" placeholder="Sub-Category" id="example-text-input" name="transaction">
                                                            </div>


                                                            <div class="mb-4">
                                                                <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Source</label>
                                                                <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="text" placeholder="Enter source" id="example-email-input" name="source">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Amount</label>
                                                                <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="text" placeholder="Enter amount" id="example-email-input" name="amount">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Date</label>
                                                                <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="date" id="example-date-input" name="date">
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn bg-violet-500 text-white border-transparent w-full" name="addTransaction">Add Transaction</button>
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



            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 lg:col-span-8">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100 ">
                        <div class="card-body pb-0">
                            <div class="flex flex-wrap items-center mb-2">
                                <div class="flex flex-col gap-2">
                                    <h5 class="text-15 mr-2 text-gray-800 dark:text-gray-100 ">Total Balance</h5>

                                    <div class="flex flex-col gap-3 items-center">
                                        <span class="text-xl text-gray-800 font-bold  dark:text-gray-100">Tsh. 25,000,000</span>
                                        <div>
                                            <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                                20%</span>
                                            <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                                week</span>
                                        </div>

                                    </div>
                                </div>


                                <div class="ltr:ml-auto rtl:mr-auto flex gap-1">
                                    <!--<button type="button"
                                            class="btn py-1 px-2 text-13 bg-violet-50/50 border-transparent text-violet-500 hover:bg-violet-500 hover:text-white focus:bg-violet-500 focus:text-white dark:bg-violet-500/20 dark:text-violet-200 dark:hover:bg-violet-500 dark:hover:text-white">ALL</button>
                                        <button type="button"
                                            class="btn py-1 px-2 text-13 bg-gray-50/50 border-transparent text-gray-500 hover:bg-gray-500 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">1M</button>
                                        <button type="button"
                                            class="btn py-1 px-2 text-13 bg-gray-50/50 border-transparent text-gray-500 hover:bg-gray-500 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">6M</button>
                                        <button type="button"
                                            class="btn py-1 px-2 text-13 bg-gray-50/50 border-transparent text-gray-500 hover:bg-gray-500 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-gray-100 dark:hover:bg-gray-500 dark:hover:text-white">1Y</button>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="col-span-12">
                                <div id="account-balance" data-colors='["#5156be", "#34c38f"]' class="apex-charts" dark:border-zinc-700"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 ">
                        <div class="card-body ">
                            <div>
                                <div class="grid grid-cols-12 gap-5 items-center">
                                    <div class="col-span-6">
                                        <span class="text-gray-700 dark:text-zinc-100">Revenue</span>
                                        <?php
                                        $sql = "SELECT SUM(amount) FROM `transactions` WHERE transType = 'income'";
                                        $results = mysqli_query($db, $sql);
                                        while ($rows = mysqli_fetch_array($results)) { ?>
                                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                                <span class="counter-value" data-target="100">Tsh.<?php echo $rows['SUM(amount)'] ?></span>

                                            </h4>
                                        <?php }
                                        ?>
                                    </div>
                                    <!--<div class="col-span-6">
                                            <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                        </div>-->
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                    20 Sales</span>
                                <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                    week</span>
                            </div>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 ">
                        <div class="card-body ">
                            <div>
                                <div class="grid grid-cols-12 gap-5 items-center">
                                    <div class="col-span-6">
                                        <span class="text-gray-700 dark:text-zinc-100">Expense</span>
                                        <?php
                                        $sql = "SELECT SUM(amount) FROM `transactions` WHERE transType = 'expense'";
                                        $results = mysqli_query($db, $sql);
                                        while ($rows = mysqli_fetch_array($results)) { ?>
                                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                                <span class="counter-value" data-target="100">Tsh.<?php echo $rows['SUM(amount)'] ?></span>

                                            </h4>
                                        <?php }
                                        ?>
                                    </div>
                                    <!--<div class="col-span-6">
                                            <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                        </div>-->
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                    20 Sales</span>
                                <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                    week</span>
                            </div>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 ">
                        <div class="card-body ">
                            <div>
                                <div class="grid grid-cols-12 gap-5 items-center">
                                    <div class="col-span-6">
                                        <span class="text-gray-700 dark:text-zinc-100">Net Income</span>
                                        <?php
                                        $sql = "SELECT (SELECT SUM(amount) FROM transactions WHERE transType = 'income') - (SELECT SUM(amount) FROM transactions WHERE transType = 'expense') AS incomeDiff";
                                        $results = mysqli_query($db, $sql);
                                        while ($rows = mysqli_fetch_array($results)) { ?>


                                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                                <span class="counter-value" data-target="100">Tsh.<?php echo $rows['incomeDiff'] ?></span>

                                            </h4>
                                        <?php }
                                        ?>

                                    </div>
                                    <!--<div class="col-span-6">
                                            <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                        </div>-->
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">+
                                    20 Sales</span>
                                <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Since last
                                    week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 lg:col-span-8">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                        <div class="card-body pb-0">
                            <div class="flex flex-wrap items-center mb-2">
                                <h5 class="text-15 mr-2 text-gray-800 dark:text-gray-100 ">Income & Expense</h5>
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
                                <div id="income_expense" data-colors='["#5156be", "#34c38f"]' class="apex-charts dark:border-zinc-700"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 w-full card-h-100">
                        <div class="card-body flex flex-wrap items-center pb-0">
                            <h5 class="text-15 mr-2 text-gray-800 dark:text-gray-100 ">Highest Expenses</h5>
                            <!--<div class="ltr:ml-auto rtl:mr-auto">
                                    <div class="dropdown">
                                        <a class="btn p-0 border-0 dropdown-toggle cursor-pointer"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="text-gray-600 text-xs dark:text-gray-100">Sort By:</span> <span
                                                class="font-medium dark:text-gray-100">World<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a>

                                        <ul class=" dropdown-menu min-w-max absolute bg-white z-50 float-left py-2 list-none text-left
                                            rounded-lg shadow-lg hidden bg-clip-padding border-none"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-zinc-100 hover:bg-gray-50/50 dark:hover:bg-zinc-600/80/50"
                                                    href="#">Action</a>
                                            </li>
                                            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap
                                                bg-transparent text-gray-700 dark:text-zinc-100 hover:bg-gray-50/50 dark:hover:bg-zinc-600/80/50"
                                                    href="#">Another action</a>
                                            </li>
                                            <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent
                                                text-gray-700 dark:text-zinc-100 hover:bg-gray-50/50 dark:hover:bg-zinc-600/80/50"
                                                    href="#">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->

                        </div>
                        <div class="card-body">
                            <div id="sales-by-locations" class="w-full" data-colors='["#5156be"]'></div>
                            <?php
                            $sql5 = "SELECT (amount / (SELECT SUM(amount) FROM transactions  WHERE transType = 'expense')) * 100 AS percentage, transactions FROM transactions  WHERE transType = 'expense' ORDER BY transType DESC LIMIT 8 ";
                            $result5 = mysqli_query($db, $sql5);
                            while (
                                $row = mysqli_fetch_array($result5)

                            ) { ?>
                                <div class="px-2 py-2">
                                    <p class="mb-1 text-gray-700 dark:text-zinc-100"><?php echo $row['transactions']; ?>
                                        <span class="float-right"><?php echo round($row['percentage']); ?> </span>
                                    </p>
                                    <div class="bg-gray-50 rounded-full mt-2 dark:bg-zinc-700" style="height: 6px;">
                                        <div class="bg-violet-500 progress-bar-striped h-[6px] ltr:rounded-l rtl:rounded-r overflow-hidden" role="progressbar" style="width: <?php echo $row['percentage']; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                                        </div>
                                    </div>

                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1">




                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body pb-0">
                        <div class="flex flex-wrap items-center mb-2">
                            <h5 class="text-15 mr-2 text-gray-800 dark:text-gray-100">Transactions</h5>
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
                    <div class="card-body px-0">
                        <div class="card-body relative overflow-x-auto">
                            <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                <thead>
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <!--<th class="relative text-start p-4 dark:text-gray-100">
                                        <input type="checkbox" value="" id="checkall" class="w-4 h-4 ring-0 border-gray-100 rounded checked:bg-violet-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:checked:bg-violet-500 dark:border-zinc-500">
                                    </th>-->
                                        <th class="relative text-start p-4 dark:text-gray-100 hidden">id</th>
                                        <th class="relative text-start p-4 dark:text-gray-100">Transaction</th>
                                        <th class="relative text-start p-4 dark:text-gray-100">Category</th>
                                        <th class="relative text-start p-4 dark:text-gray-100">Type</th>
                                        <th class="relative text-start p-4 dark:text-gray-100">Source</th>
                                        <th class="relative text-start p-4 dark:text-gray-100">Amount</th>
                                        <th class="relative text-start p-4 dark:text-gray-100">Date</th>

                                        <!--<th class="relative text-start p-4 dark:text-gray-100">Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `transactions`";
                                    $result = mysqli_query($db, $sql);
                                    while (
                                        $row = mysqli_fetch_array($result)
                                    ) { ?>

                                        <tr class="border-b border-gray-50 text-gray-600 dark:border-zinc-600">
                                            <!--<td>
                                            <div class="p-4">
                                                <input type="checkbox" value="<?php echo $row['id']; ?>" id="checkItem" name="check[]" class="w-4 h-4 ring-0 border-gray-100 rounded checked:bg-violet-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:checked:bg-violet-500 dark:border-zinc-500">
                                            </div>
                                        </td>-->
                                            <td class="px-4 py-3 text-sm hidden"><?php echo $row['id']; ?>
                                            <td class="p-4 dark:text-zinc-50"><?php echo $row['transactions']; ?></td>

                                            <td class="p-4 dark:text-zinc-50"><?php echo $row['category']; ?></td>
                                            <td class="p-4 dark:text-zinc-50">
                                                <?php
                                                if ($row['transType'] == "expense") {
                                                    echo '<span class=" py-[1px] px-1 bg-red-50/60 text-red-500 rounded dark:bg-red-500/30">Expense</span>';
                                                } else {
                                                    echo '<span class="py-[1px] px-1 bg-green-50/60 text-green-500 rounded dark:bg-green-500/30">Income</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="p-4 dark:text-zinc-50"><?php echo $row['source']; ?></td>
                                            <td class="p-4 text-red-500 dark:text-zinc-50">
                                                <?php
                                                $amount = $row['amount'];
                                                if ($row['transType'] == "expense") {
                                                    echo "<span class='py-[1px] px-1  text-red-500 rounded'>$amount</span>";
                                                } else {
                                                    echo "<span class='py-[1px] px-1  text-green-500 rounded' >$amount</span>";
                                                }
                                                ?>
                                            </td>

                                            <td class="p-4  dark:text-zinc-50"><?php echo $row['date']; ?></td>
                                            <!--<td>
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
                                                        href="./editProd.php? id=<?= $row['id']; ?>" title="Edit" name="editProduct">Edit</a>
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
                                            </td>-->
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
    </div>

    <?php include('footer.php') ?>