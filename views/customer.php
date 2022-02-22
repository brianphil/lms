<?php
include "partials/header.php";
?>

<body>

    <div class="topnav header" id="myTopnav">
        <a href="home">Home</a>
        <a href="customers" class="active">Customers</a>
        <a href="loans">Loans</a>
        <a href="payments">Payments</a>
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
                <td>Customers</td>
            </tr>
        </table>
        <div style="margin: 1%;">
            <div style="margin-bottom: 10px;" class="row">
                <div style="float: right;" class="col-sm-12">
                    <a href="newcustomer"><button class="btn-secondary" style="width: 20%">Create New</button></a>
                </div>
            </div>
            <div style="background-color: #fff;" class="row">
                <div class="col-sm-12">
                    <?php require_once "datatable.php" ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

</body>

<?php
include "partials/footer.php";
?>