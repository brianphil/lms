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
            </ul>
            <div class="row" style="margin: 1%;">
                <div class="col-sm-12" style="margin-right: auto; margin-left: auto; width:auto">
                    <form class="form-control" style="margin: 10%;">
                        <label class="form-label">Search customer</label>
                        <input placeholder="Jane Wekesa" type="text" name="search" class="form-control">
                        <br><br>
                        <input type="submit" name="submit" value="Request Schedule" class="form-control btn-primary" style="width: 100%;">
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1%;">
            <div class="col-sm-12" style="margin-right: auto; margin-left: auto; width:auto">
                <h5>Payment schedule for <span style="color:darkgreen">Jane Wekesa</span></h5>

            </div>
        </div>

        <div class="row" style="margin: 1%;">
            <div class="col-sm-12" style="margin-left: auto; margin-right: auto; width: auto;">
                <table class="table" id="payment-schedule">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10/03/2022</td>
                            <td>1,500</td>
                            <td>878</td>
                            <td>5,000</td>
                        </tr>
                        <tr>
                            <td>17/03/2022</td>
                            <td>1,500</td>
                            <td>878</td>
                            <td>4,500</td>
                        </tr>
                        <tr>
                            <td>24/03/2022</td>
                            <td>1,500</td>
                            <td>878</td>
                            <td>4,000</td>
                        </tr>
                        <tr>
                            <td>10/03/2022</td>
                            <td>3,500</td>
                            <td>878</td>
                            <td>3,500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" style="margin: 1%;">
                <div class="col-sm-12" style="margin-right: auto; margin-left: auto; width:auto">
                    <button onclick="downloadPDFWithjsPDF();" class="btn-success" style="margin-bottom: 20px; width: 100%">Export PDF</button>

                </div>
            </div>

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
                doc.setLineWidth(2);
                doc.text(200, y = y + 30, "Payment Schedule for Jane Wekesa");
                doc.autoTable({
                    html: '#payment-schedule',
                    startY: 70,
                    theme: 'grid',
                    columnStyles: {
                        0: {
                            cellWidth: 120,
                        },
                        1: {
                            cellWidth: 120,
                        },
                        2: {
                            cellWidth: 120,
                        },
                        3: {
                            cellWidth: 120,
                        }
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
</body>

<?php
include "partials/footer.php";
?>