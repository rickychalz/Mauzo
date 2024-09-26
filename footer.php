<?php
?>
<!-- Footer Start -->
<footer class="footer fixed bottom-0 right-0 left-0 border-t border-gray-50 py-5 px-5 bg-white dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-200">
    <div class="flex flex-row justify-center">
        <div>
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> Mauzo
        </div>
        <!--<div class="hidden md:inline-block text-end">Design & Develop by <a href="" class="text-violet-500 underline">Mauzo</a></div>-->
    </div>
</footer>
<!-- end Footer -->
</div>


<script src="assets/libs/@popperjs/core/umd/popper.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/libs/metismenujs/metismenujs.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<script src="assets/js/pages/nav&tabs.js"></script>

<script src="./assets/libs/swiper/swiper-bundle.min.js"></script>

<script src="assets/js/pages/login.init.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- dropzone js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- Table Editable plugin -->
<script src="assets/libs/table-edits/build/table-edits.min.js"></script>

<script src="assets/js/pages/table-editable.int.js"></script>

<!-- Sweet Alerts js 
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

Sweet alert init js
<script src="assets/js/pages/sweetalert.init.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->



<script src="assets/js/pages/nav&tabs.js"></script>


<script src="assets/js/app.js"></script>



<script>
    function quantityfunc(q) {
        var priceValue = q.parentElement.parentElement.children[1].children[1].value;
        q.parentElement.parentElement.children[3].children[1].value = q.value * priceValue;
    }

    function pricefunc(p) {
        var quantityValue = p.parentElement.parentElement.children[0].children[1].value;
        p.parentElement.parentElement.children[3].children[1].value = p.value * quantityValue;
    }

    function discountfunc(d) {
        var totalValue = d.parentElement.parentElement.children[0].children[1].value * d.parentElement.parentElement.children[1].children[1].value;
        d.parentElement.parentElement.children[3].children[1].value = totalValue - d.value;

    }
</script>

<script>
    function fetchProd() {

        var prodName = document.getElementById('prodName').value;

        $.ajax({
            type: "POST",
            url: './includes/getProd.php',
            data: {
                prodName: prodName
            },
            dataType: 'json',

            success: function(data) {

                document.getElementById("prodBrand").value = data.brand;
                document.getElementById("barCode").value = data.barcode;
                document.getElementById("salesPrice").value = data.price;
                //document.getElementById("prodBrand").setAttribute('readonly'.true);
                //document.getElementById("barCode").setAttribute('readonly'.true);
                //document.getElementById("salesPrice").setAttribute('readonly'.true);


            }
        })
    }
</script>

<script>
    function fetchProd2() {

        var prodName = document.getElementById('prodName').value;

        $.ajax({
            type: "POST",
            url: './includes/getProd.php',
            data: {
                prodName: prodName
            },
            dataType: 'json',

            success: function(data) {

                document.getElementById("prodBrand").value = data.brand;
                document.getElementById("barCode").value = data.barcode;
                //document.getElementById("salesPrice").value = data.price;
                //document.getElementById("prodBrand").setAttribute('readonly'.true);
                //document.getElementById("barCode").setAttribute('readonly'.true);
                //document.getElementById("salesPrice").setAttribute('readonly'.true);


            }
        })
    }
</script>

<script>
    //   revenue-expense
    var splneAreaColors = getChartColorsArray("#revenue-expense");
    var options = {
        chart: {
            redrawOnWindowResize: true,

            height: 350,
            noData: {
                        text: "No data text",
                        align: "center",
                        verticalAlign: "middle",
                    },

            type: 'area',
            toolbar: {
                show: false,
            }
        },

        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 3,
        },
        series: [{
            name: 'Expense',
            data: [34, 40, 28, 52, 42, 109, 100]
        }, {
            name: 'Revenue',
            data: [32, 60, 34, 46, 34, 52, 41]
        }],
        colors: splneAreaColors,
        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
        },
        grid: {
            borderColor: '#f1f1f1',
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#revenue-expense"),
        options
    );

    chart.render();
</script>


<script>
    // Sales Trend
    fetch('./includes/getSalesData.php')
        .then(response => response.json())
        .then(data => {
            var columnDatalabelColors = getChartColorsArray("#sales-trend");
            var options = {
                chart: {
                    height: 400,
                    type: 'bar',
                    noData: {
                        text: "No data text",
                        align: "center",
                        verticalAlign: "middle",
                    },
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 5,
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    offsetY: -22,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                series: [{
                    name: 'Daily Sales',
                    data: data
                }],

                colors: columnDatalabelColors,
                grid: {
                    borderColor: '#f1f1f1',
                },
                xaxis: {
                    type: 'date',
                    categories: data.map(item => item.x),
                    position: 'bottom',
                    labels: {
                        offsetY: -5,

                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        offsetY: -35,
                    }
                },

                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function(val) {
                            if (data === undefined || data.length === 0)
                                return 'No data'
                            else
                                return "Tsh" + val;

                        }
                    }

                },



            }

            var chart = new ApexCharts(
                document.querySelector("#sales-trend"),
                options
            );

            chart.render();
        })
</script>

<script>
    fetch('./includes/getMostSellingData.php')
        .then(response => response.json())
        .then(jsonData => {
            // most selling products
            var pieColors = getChartColorsArray("#mostsellingproduct");
            var options = {
                chart: {
                    height: 400,
                    type: 'pie',
                },
                series: jsonData.map(item => item.count),
                labels: jsonData.map(item => item.prodCategory),
                colors: pieColors,
                legend: {
                    show: true,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    verticalAlign: 'middle',
                    floating: false,
                    fontSize: '14px',
                    offsetX: 0,
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            show: false
                        },
                    }
                }]

            }

            var chart = new ApexCharts(
                document.querySelector("#mostsellingproduct"),
                options
            );

            chart.render();
        })
</script>
<script>
    //income&expense
    var columnColors = getChartColorsArray("#income_expense");
    var options = {
        chart: {
            events: {
                mounted: (chart) => {
                    chart.windowResizeHandler();
                }
            },
            height: 350,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Revenue',
            data: [46, 57, 59, 54, 62, 58, 64, 60, 66]
        }, {
            name: 'Expense',
            data: [74, 83, 102, 97, 86, 106, 93, 114, 94]
        }, {
            name: 'Net Income',
            data: [37, 42, 38, 26, 47, 50, 54, 55, 43]
        }],
        colors: ['#50C878', '#FA5F55', '#5D3FD3'],
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
            title: {
                text: '$ (thousands)',
                style: {
                    fontWeight: '500',
                },
            }
        },
        grid: {
            borderColor: '#f1f1f1',
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#income_expense"),
        options
    );

    chart.render();
</script>
<script>
    //   account-balance
    var splneAreaColors = getChartColorsArray("#account-balance");
    var options = {
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 3,
        },
        series: [{
            name: 'Revenue',
            data: [34, 40, 28, 52, 42, 109, 100]
        }],
        colors: splneAreaColors,
        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
        },
        grid: {
            borderColor: '#f1f1f1',
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 200,
                    width: '100%'
                },
                legend: {
                    show: false
                },
                transition: {

                }
            }
        }]
    }

    var chart = new ApexCharts(
        document.querySelector("#account-balance"),
        options
    );

    chart.render();
</script>


</body>

</html>