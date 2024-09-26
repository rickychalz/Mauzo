<?php include('./includes/dbcon.php') ?>
<?php include('./includes/addProdconn.php'); ?>
<?php $title = 'Edit Product'; ?>
<?php include('topbar.php') ?>
<?php include('sidebar.php') ?>

<div class="main-content transition-all ease-in-out duration-300">
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">
            <div class="grid grid-cols-1 mb-5">
                <div class="flex items-center justify-between">
                    <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Edit Product</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="products.php" class="inline-flex items-center text-sm font-medium text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Inventory
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="addProd.php" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-500 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Edit
                                        Product</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <?php
                    $db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `products` WHERE id=$id LIMIT 1";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <form action="" method="POST">
                        <div class="card-body pb-0">
                            <h6 class="mb-1 text-15 text-gray-700 dark:text-gray-100">Product Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Product
                                            Name</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" placeholder="Enter product name" id="example-text-input" name="prodName" value="<?= $row['prodName']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">
                                            Brand</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" placeholder="Enter product brand" id="example-text-input" name="prodBrand" value="<?= $row['prodBrand']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">
                                            Barcode</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" placeholder="Enter product barcode" id="example-text-input" name="barCode" value="<?= $row['barCode']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <div class="mb-3">
                                            <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">
                                                Category</label>
                                            <?php
                                            $sql2 = "SELECT `prodCategory` FROM `products` WHERE id = $id";
                                            $result2 = mysqli_query($db, $sql2);

                                            if ($result2->num_rows > 0) {
                                                while ($row2 = $result2->fetch_assoc()) {
                                                    $prodCategory = $row2['prodCategory'];
                                                }
                                            } else {
                                                echo "No data found.";
                                            }
                                            ?>
                                            <select class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100" name="prodCategory">
                                                <!--<option hidden disabled selected value>---Choose product category---</option>-->
                                                <?php
                                                $sql3 = "SELECT categoryName FROM categories";
                                                $result3 = $db->query($sql3);
                                                $columnValues = array();

                                                if ($result3->num_rows > 0) {
                                                    while ($row3 = $result3->fetch_assoc()) {
                                                        $columnValues[] = $row3['categoryName'];
                                                    }
                                                } else {
                                                    echo "No data found.";
                                                }
                                                foreach ($columnValues as $option) {
                                                    if ($prodCategory == $option) {
                                                ?>
                                                        <option selected value="<?php echo $option;
                                                                                // The value we usually set is the primary key
                                                                                ?>">
                                                            <?php echo $option;
                                                            // To show the category name to the user
                                                            ?>
                                                        </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $option;
                                                                        // The value we usually set is the primary key
                                                                        ?>">
                                                            <?php echo $option;
                                                            // To show the category name to the user
                                                            ?>
                                                        </option>
                                                <?php
                                                    }
                                                }                                              
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--<div class="mb-4">
                                            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Quantity</label>
                                            <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="text" placeholder="Enter quantity" id="example-email-input" name="quantity" value="<?= $row['quantity']; ?>">
                                        </div>-->
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Selling Price</label>
                                        <input class="w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="text" placeholder="Enter Selling Price" id="example-email-input" name="sellPrice" value="<?php echo $row['sellPrice']; ?>">
                                    </div>
                                </div>
                                <div class=" col-span-12 lg:col-span-6">
                                    <div class="mb-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Product
                                            Image</label>
                                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and
                                                    drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or
                                                    GIF (MAX. 800x400px)</p>
                                            </div>
                                            <input id="dropzone-file" type="file" class="hidden" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="btn bg-violet-500 border-transparent text-white font-medium w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50" name="editProduct">Edit
                                    Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['editProduct'])) {
                $prodName     =    $_POST['prodName'];
                $prodBrand   =  $_POST['prodBrand'];
                $prodCategory  =    $_POST['prodCategory'];
                $barCode  =    $_POST['barCode'];
                $sellPrice  =    $_POST['sellPrice'];

                $query = "UPDATE `products` SET `prodName`='$prodName',`prodBrand`='$prodBrand',`prodCategory`='$prodCategory',`barCode`=' $barCode',`sellPrice`=' $sellPrice' WHERE id=$id";
                $sql = mysqli_query($db, $query);

                // register user if there are no errors in the form
                if ($sql == 1) {
                    echo "<script>alert('Edited Successfully'); window.location.href='./products.php';</script>";
                } else {
                    echo '<script>alert("Failed to add new product")</script>';
                }
            }
            ?>
            <?php include('footer.php') ?>