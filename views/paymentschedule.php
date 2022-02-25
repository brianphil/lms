<?php
include "partials/header.php";
?>

<body>

    <div class="topnav header" id="myTopnav">
        <a href="home">Home</a>
        <a href="customers">Customers</a>
        <a href="loans">Loans</a>
        <a href="payments" class="active">Payments</a>
        <a href="missedpayments">Missed Payments</a>
        <a href="reports">Reports</a>
        <a href="hrmodule">HR Module</a>
        <a href="branchmanager">Branch Manager</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div style="margin-top:4%; padding-left:16px; background: #eee">
        <table>
            <tr>
                <td>Home</td>
                <td>/</td>
                <td>Payments</td>
            </tr>
        </table>
    </div>
    <div class="row" style="margin: 1%;">
        <h5>Payments</h5>
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="payments">All Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span style="color:darkgreen;">Payment Schedule</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Application Fee</a>
                </li>
            </ul>
            <div class="row" style="margin: 1%;">
                <div class="col-sm-12" style="margin-right: auto; margin-left: auto; width:auto">
                    <form class="form-control" style="margin: 10%;" method="post">
                        <label class="form-label">Search customer</label>
                        <input placeholder="Search name..." type="text" id="autocomplete-search" name="search" class="form-control">
                        <br><br>
                        <input type="submit" name="submit" value="Request Schedule" class="form-control btn-primary" style="width: 100%;">
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST["submit"])) :
            /**instantiate the db */
            $db = new Database();

            /**extract customer id */
            $search = $_POST['search'];
            $temp_id = explode('-', $search);
            $id = $temp_id[0];
            /**end extraction */
            /**only fetch the last loan */
            $pquery = "SELECT * FROM loans WHERE customer_id = '$id' ORDER BY loan_id DESC LIMIT 1";
            $res = $db->mysqli->query($pquery);
            if ($res->num_rows > 0) :
                $data = mysqli_fetch_assoc($res);
        ?>
                <div class="row" style="margin: 1%;">
                    <div class="col-sm-12" style="margin-right: auto; margin-left: auto; width:auto">
                        <h5>Payment schedule for <span style="color:darkgreen"><?= $temp_id[1];  ?></span></h5>

                    </div>
                </div>

                <div class="row" style="margin: 1%;">
                    <div class="col-sm-12" style="margin-left: auto; margin-right: auto; width: auto;">
                        <table class="table" id="payment-schedule">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <!-- <th scope="col">Interest</th> -->
                                    <th scope="col">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                /**generate schedule */
                                $atp = (int)$data["repayment_amount"];
                                $psd = $data["repayment_start_date"];
                                $tp = (int)$data["term"];
                                /**calculate each istallment */
                                $install = $atp / $tp;
                                $in_day = 0;
                                /**generate schedule for each installment */
                                for ($i = $tp; $i > 0; $i--) {
                                    $atp -= $install;


                                    $psd = date("d M Y", strtotime($psd . '+ ' . "$in_day" . ' days'));
                                    echo '<tr><td>' . $psd . '</td><td>' . $install . '</td><td>' . $atp . '</td></tr>';
                                    $in_day += 7;
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="margin: 1%;">
                        <div class="col-sm-12" style="margin-right: auto; margin-left: auto; width:auto">
                            <button id="pdf-name" onclick="downloadPDFWithjsPDF();" class="btn-success form-control" style="margin-bottom: 20px; width: 100%" value="<?= $temp_id[1]; ?>">Export PDF</button>
                             
                        </div>
                    </div>
            <?php
            endif;
        endif;
            ?>
                </div>
                <script>
                    function downloadPDFWithjsPDF() {
                        var doc = new jsPDF('p', 'pt', 'a4');
                        var htmlstring = '';
                        var tempVarToCheckPageHeight = 0;
                        var pageHeight = 0;
                        pageHeight = doc.internal.pageSize.height;
                        specialElementHandlers = {
                            // element with id of "bypass" - jQuery style selector  
                            '#bypassme': function(element, renderer) {
                                // true = "handled elsewhere, bypass text extraction"  
                                return true
                            }
                        };
                        margins = {
                            top: 150,
                            bottom: 60,
                            left: 40,
                            right: 40,
                            width: 600
                        };
                        var y = 20;
                        var pdf_name = document.getElementById("pdf-name").value;
                        doc.setLineWidth(2);
                        doc.text(200, y = y + 30, "Payment Schedule for "+pdf_name);
                        doc.autoTable({
                            html: '#payment-schedule',
                            startY: 70,
                            theme: 'grid',
                            columnStyles: {
                                0: {
                                    cellWidth: 160,
                                },
                                1: {
                                    cellWidth: 160,
                                },
                                2: {
                                    cellWidth: 160,
                                },
                            },
                            styles: {
                                minCellHeight: 40
                            }
                        })
                        doc.save('payment_schedule.pdf');
                    }

                    // document.querySelector('#jsPDF').addEventListener('click', downloadPDFWithjsPDF);

                    function myFunction() {
                        var x = document.getElementById("myTopnav");
                        if (x.className === "topnav") {
                            x.className += " responsive";
                        } else {
                            x.className = "topnav";
                        }
                    }
                </script>

                <script type="text/javascript">
                    $(function() {
                        $("#autocomplete-search").autocomplete({
                            source: 'customerautosearch',
                        });
                    });
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
</body>

<?php
include "partials/footer.php";
?>