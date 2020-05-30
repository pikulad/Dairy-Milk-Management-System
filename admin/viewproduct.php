	<?php require_once "data/slidebar.php"; ?><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">View Product</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Product Details</h1>
                </div>
            </div><!--/.row-->
            <?php
                $sqlvp="select * from tblproduct";
                $resultvp=$connection->query($sqlvp);
            ?>

            <div class="panel panel-default col-md-8">
                <div class="panel-heading">
                    <?php echo "Product Details"; ?>
                </div>

                <div class="panel-body">
                    <div class="col-md-10" style="margin-left: 50px;">
                        <div>
                        <?php
                        echo "<table class='table table-bordered'>";
                        echo "<tr><th>Product Name</th><th>Measurement</th><th>Price</th><th>Manufacture Date</th><th>Expire Date</th></tr>";
                        while ($rowvp=$resultvp->fetch_array())
                        {
                            echo "<tr>";
                            $pci=$rowvp['productcategoryid'];
                            $pc="select * from tblproductcategory where id=$pci";
                            $resultvp1=$connection->query($pc);
                            while ($rowvp1=$resultvp1->fetch_array())
                            {
                                echo "<td>".$rowvp1['name']."</td>";
                            }
                            $msi=$rowvp['measurementid'];
                            $ms="select * from tblmeasurement where id=$msi";
                            $resultvp2=$connection->query($ms);
                            while ($rowvp2=$resultvp2->fetch_array())
                            {
                                echo "<td>".$rowvp2['type']."</td>";
                            }
                            echo "<td>".$rowvp['price']."</td>";
                            echo "<td>".$rowvp['manufacture_date']."</td>";
                            echo "<td>".$rowvp['expire_date']."</td>";
                        }
                        echo "</tr>";
                        echo "</table>";
                        ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>
        <script>
            window.onload = function () {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };
        </script>

    </body>
</html>
<?php
ob_end_flush();
?>

