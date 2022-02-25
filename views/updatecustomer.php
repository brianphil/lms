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

    <div style="margin-top:4%; padding-left:1px; background: #eee">
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
                    <a href="customers"><button class="form-control btn-secondary" style="width: 20%">Back</button></a>
                </div>
            </div>

            <?php
            $db = new Database();
            $message = "Updating...";
            if (isset($_POST['submit'])) {
                $fname = $_POST["fname"];
                $mname = $_POST["mname"];
                $lname = $_POST["lname"];
                $id_number = $_POST["id_number"];
                $phone_number = $_POST["phone_number"];
                $gfname = $_POST["gfname"];
                $glname = $_POST["glname"];
                $gphone = $_POST["gphone"];
                $gidnumber = $_POST["gidnumber"];
                $cid = $_POST["id"];
                $u_query = "UPDATE customers SET fname='$fname', mname='$mname', lname='$lname', id_number='$id_number', phone_number='$phone_number', gfname='$gfname', glname='$glname', gphone='$gphone', gidnumber='$gidnumber' WHERE id='$cid'";
                $u_res = $db->mysqli->query($u_query);
                if ($u_res)
                    echo $message = '<div style="margin-top: 5px;" class="alert alert-success" role="alert">Customer updated successfully.</div>';
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $c_query = "SELECT * FROM customers WHERE id='$id'";
                $res = $db->mysqli->query($c_query);
                if ($res->num_rows > 0) {
                    $data = $res->fetch_array();
                    if (isset($_GET['deleteCustomer'])) {
                        if ($_GET['deleteCustomer'] == "delete") {
                            $d_query = "UPDATE customers SET delete_flag='1' WHERE id='$id'";
                            $d_res = $db->mysqli->query($d_query);
                            if ($d_res) {
                                echo '<div style="margin-top: 5px;" class="alert alert-danger" role="alert">Customer deleted successfully.</div>';
                            }
                        }
                    }
                    if (isset($_GET['updateCustomer'])) :
                        echo $message;
            ?>

                        <form method="post" action="updatecustomer" class="form-control">
                            <input type="hidden" class="form-control" name="id" value="<?= $data["id"]; ?>">
                            <h5>Customer details</h5>
                            <table class="table" style="float: left;">
                                <thead>
                                    <tr>
                                        <th>Fisrt Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>ID No</th>
                                        <th>Phone No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-control" name="fname" value="<?= $data["fname"]; ?>"></td>
                                        <td><input class="form-control" name="mname" value="<?= $data["mname"]; ?>"></td>
                                        <td><input class="form-control" name="lname" value="<?= $data["lname"]; ?>"></td>
                                        <td><input class="form-control" name="id_number" value="<?= $data["id_number"]; ?>"></td>
                                        <td><input class="form-control" name="phone_number" value="<?= $data["phone_number"]; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5>Guarantor details</h5>
                            <table class="table" style="float: left;">
                                <thead>
                                    <tr>
                                        <th>Guarantor Fisrt Name</th>
                                        <th>Guarantor Last Name</th>
                                        <th>Guarantor Phone No</th>
                                        <th>Guarantor ID No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-control" name="gfname" value="<?= $data["gfname"]; ?>"></td>
                                        <td><input class="form-control" name="glname" value="<?= $data["glname"]; ?>"></td>
                                        <td><input class="form-control" name="gphone" value="<?= $data["gphone"]; ?>"></td>
                                        <td><input class="form-control" name="gidnumber" value="<?= $data["gidnumber"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="margin-left: auto; margin-right: auto; width: 130px">
                                            <input type="submit" name="submit" value="Update" class="form-control btn-success">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </form>
            <?php
                    endif;
                }
            }
            ?>
        </div>
    </div>
</body>
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