<?php
include "partials/header.php";
?>

<body>

    <div class="topnav header" id="myTopnav">
        <a href="home">Home</a>
        <a href="customers">Customers</a>
        <a href="loans" class="active">Loans</a>
        <a href="payments">Payments</a>
        <a href="missedpayments">Missed Payments</a>
        <a href="reports">Reports</a>
        <a href="hrmodule">HR Module</a>
        <a href="branchmanager">Branch Manager</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div style="margin-top:4%; padding-left:1px; background: #eee">
        <table>
            <tr>
                <td>Home</td>
                <td>/</td>
                <td>New Loan</td>
            </tr>
        </table>
    </div>
    <div class="row" style="margin: 1%;">
        <div class="col-sm-12" style="margin-bottom: 5px;">
            <a style="text-decoration: none;" href="loans"><button class="btn-secondary form-control" style="width: 20%;">Back</button></a>
        </div>
        <?php
        $message = '';
        if (isset($_POST['submit'])) {

            /**instantiate the db */
            $db = new Database();

            /**extract customer id */
            $search = $_POST['search'];
            $temp_id = explode('-', $search);
            $id = $temp_id[0];
            /**end extraction */
            $amount = $_POST['amount'];
            $term = $_POST['term'];
            $repaymentStartDate = $_POST['repaymentStartDate'];
            $paymentAmount = $_POST['paymentAmount'];
            $l_query = "INSERT INTO loans (customer_id, amount_applied, repayment_amount, term, repayment_start_date, loan_balance, added_by) VALUES('$id', '$amount', '$paymentAmount', '$term', '$repaymentStartDate', '$paymentAmount', '1')";
            $res = $db->mysqli->query($l_query);
            if($res){
                $message = '<div style="margin-top: 5px; text-align:center; margin-right:auto; margin-left:auto;" class="alert alert-success" role="alert">Loan created successfully!</div>';
            }
            else{
                $message = '<div style="margin-top: 5px; text-align:center; margin-right:auto; margin-left:auto;" class="alert alert-danger" role="alert">An error occured while creating loan!</div>';    
            }
        }
        ?>

        <div class="row" style="margin-bottom: 50px;">
            <div class="col-sm-12" style="margin-left: auto; margin-right: auto; width: auto;">
                <h5 style="color: #282; text-align:center;">Create new loan</h5>
                <?= $message ?>
                <form class="form-control" style="margin: 10%" method="post">
                    <label style="color: #228;" class="form-label">Customer Name <span style="color: red">*</span></label>
                    <input class="form-control" id="autocomplete-search" type="text" name="search" placeholder="Search name..." />
                    <label style="color: #228;" class="form-label">Loan amount (Ksh) <span style="color: red">*</span></label>
                    <input id="amount" class="form-control" type="text" name="amount" placeholder="5000" />
                    <label style="color: #228;" class="form-label">Term (in weeks) <span style="color: red">*</span></label>
                    <input id="term" class="form-control" type="text" name="term" placeholder="4" />
                    <label style="color: #228;" class="form-label">Repayment start date <span style="color: red">*</span></label>
                    <input class="form-control" placeholder="<?= date('d/m/Y');  ?>" type="date" name="repaymentStartDate" /><br>
                    <button type="button" onclick="calculateRate(); return false;" id="calculate" name="calculate" style="width: 50%;" class="btn-success form-control">Calculate</button><br><br>
                    <label style="color: #228;" class="form-label">Amount to repay (Ksh)</label>
                    <input id="amount-to-pay" class="form-control" type="text" name="paymentAmount" placeholder="0.00" readonly />
                    <p>
                        <input id="submit" class="form-control btn-primary" type="submit" value="Submit" name="submit" style="margin-top: 10px; width: 100%;" disabled />
                    </p>

                </form>
            </div>

        </div>

    </div>
    <script>
        function calculateRate() {
            if (document.getElementById("amount").value > 0 && document.getElementById("term").value > 0) {
                var y = document.getElementById("submit").disabled = false;
                var total = document.getElementById("amount").value * Math.pow((1 + 0.0678), document.getElementById("term").value)
                var amount = document.getElementById("amount-to-pay").value = Math.floor(total);
            } else {
                alert("Please enter the required loan amount and the term period first!");
            }
        }

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

<?php
include "partials/footer.php";
?>