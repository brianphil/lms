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
                <td>Create new customer</td>
            </tr>
        </table>
        <div style="margin: 1%;">
            <div style="margin-bottom: 10px;" class="row">
                <div style="float: right;" class="col-sm-12">
                    <a style="text-decoration: none;"  href="customers"><button class="btn-secondary form-control" style="width: 20%">Back</button></a>
                </div>
            </div>
            <?php
            $message = '';
            if (isset($_POST['submit'])) {
                $customer = new RegisterNewCustomer();
                
                $firstName = $_POST['firstName'];
                $middletName = $_POST['middletName'];
                $lastName = $_POST['lastName'];
                $phone = $_POST['phone'];
                $idNumber = $_POST['idNumber'];
                $gFirstName = $_POST['gfirstName'];
                $glastName = $_POST['glastName'];
                $gphone = $_POST['gphone'];
                $gidNumber = $_POST['gidNumber'];
                if ($customer->registerNewCustomer($firstName, $middletName, $lastName, $phone, $idNumber, $gFirstName, $glastName, $gphone,$gidNumber)) {
                    $message = '<div style="margin-top: 5px;" class="alert alert-success" role="alert">Customer has been succesfuly registered</div>';
                }
            }


            ?>
            <div style="background-color: #fff;" class="row">
                <div class="col-sm-12" style="margin-left: auto; margin-right: auto; width: auto;">
                <?php echo $message; ?>
                    <form class="form-control" style="margin: 10%" method="post" action="newcustomer">

                        <h4 style="color: #282">Register new customer</h4>
                        <p> <label>Please fill in the information bellow (fields marked red are compulsory):</label></p>
                        <p>
                        <h5 style="color: #228">Cunstomer Information</h5>
                        <label class="form-label">First Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Joel" name="firstName" class="form-control" />
                        <label class="form-label">Middle Name</label>
                        <input type="text" placeholder="Kiptoo" name="middletName" class="form-control" />
                        <label class="form-label">Last Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Ruto" name="lastName" class="form-control" />
                        <label class="form-label">Phone Number <span style="color: red">*</span></label>
                        <input type="text" placeholder="0722100100" name="phone" class="form-control" />
                        <label class="form-label">ID Number <span style="color: red">*</span></label>
                        <input type="text" placeholder="12345678" name="idNumber" class="form-control" />
                        <p>
                        <h5 style="color: #228">Guarantor Information</h5>
                        <label class="form-label">First Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Mike" name="gfirstName" class="form-control" />
                        <label class="form-label">Last Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Toroitich" name="glastName" class="form-control" />
                        <label class="form-label">Phone Number <span style="color: red">*</span></label>
                        <input type="text" placeholder="0722100100" name="gphone" class="form-control" />
                        <label class="form-label">ID Number <span style="color: red">*</span></label>
                        <input type="text" placeholder="12345678" name="gidNumber" class="form-control" />
                        </p>
                        <input type="submit" name="submit" value="Register" class="btn-primary form-control" style="width: 100%" /><br>

                        </p>

                    </form>
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