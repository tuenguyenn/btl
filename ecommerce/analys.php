<?php include('include/admin/header.php'); ?>
<section>
    <div class="container">
        <div class="row">
            <?php include('include/admin/sidebar.php'); ?>
            <div class="col-sm-9 padding-right">
                <h2 class="title text-center">Báo cáo doanh thu</h2>

                <!-- Báo cáo doanh thu trong 7 ngày gần nhất -->
                <h3>Doanh thu trong 7 ngày gần nhất</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tuần</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $last7DaysRevenue = $jim->generateLast7DaysRevenueReport();
                        echo "<tr>";
                        echo "<td>" . $last7DaysRevenue['start_date'] . " - " . $last7DaysRevenue['end_date'] . "</td>";
                        echo "<td>" . $last7DaysRevenue['revenue'] . "</td>";
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>

                <!-- Báo cáo doanh thu trong 30 ngày gần nhất -->
                <h3>Doanh thu trong 30 ngày gần nhất</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tuần</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $last30DaysRevenue = $jim->generateLast30DaysRevenueReport();
                        echo "<tr>";
                        echo "<td>" . $last30DaysRevenue['start_date'] . " - " . $last30DaysRevenue['end_date'] . "</td>";
                        echo "<td>" . $last30DaysRevenue['revenue'] . "</td>";
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include('include/admin/footer.php'); ?>
