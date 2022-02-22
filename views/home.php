<?php
include "partials/header.php";
?>

<body>
    <div class="header">
        <div class="topnav" id="myTopnav">
            <a href="home" class="active">Home</a>
            <a href="customers">Customers</a>
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
    </div>
    <div style="margin-top:4%; padding-left:16px; background: #eee">
        <table>
            <tr>
                <td>Home</td>
                <td>/</td>
                <td>Dashboard</td>
            </tr>
        </table>
        <div class="row" style="margin: 4%;">
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">My Wallet</label>
                    <p style="margin: 10px;">Current Ballance</p>
                    <h1 style="margin: 5px;">KES 34,000</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">Pending Loans</label>
                    <p style="margin: 10px;">Loans awaiting approval</p>
                    <h1 style="margin: 5px;">KES 14,000</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">Total Customers</label>
                    <p style="margin: 10px;">Total number of customers</p>
                    <h1 style="margin: 5px;">340</h1>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 4%;">
            <div class="col-sm-12">
                <div class="card"><label style="margin: 10px; padding: 10px;">Today's Payments</label>
                    <?php require_once "datatable.php"  ?>

                </div>
            </div>
        </div>
        <div class="row" style="margin: 4%;">
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">My Wallet</label>
                    <p style="margin: 10px;">Current Ballance</p>
                    <h1 style="margin: 5px;">KES 34,000</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">Pending Loans</label>
                    <p style="margin: 10px;">Loans awaiting approval</p>
                    <h1 style="margin: 5px;">KES 14,000</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">Total Customers</label>
                    <p style="margin: 10px;">Total number of customers</p>
                    <h1 style="margin: 5px;">340</h1>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 4%;">
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">My Wallet</label>
                    <p style="margin: 10px;">Current Ballance</p>
                    <h1 style="margin: 5px;">KES 34,000</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">Pending Loans</label>
                    <p style="margin: 10px;">Loans awaiting approval</p>
                    <h1 style="margin: 5px;">KES 14,000</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card"><label style="margin: 10px;">Total Customers</label>
                    <p style="margin: 10px;">Total number of customers</p>
                    <h1 style="margin: 5px;">340</h1>
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
    <?php
    include "partials/footer.php";
    ?>