<?php
include "partials/header.php";
?>

<body>

    <div class="topnav header" id="myTopnav">
        <a href="home">Home</a>
        <a href="customers">Customers</a>
        <a href="loans">Loans</a>
        <a href="payments">Payments</a>
        <a href="missedpayments">Missed Payments</a>
        <a href="reports">Reports</a>
        <a href="hrmodule" class="active">HR Module</a>
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
                <td>HR Module</td>
                <td>/</td>
                <td>Employees</td>
                <td>/</td>
                <td>Register New</td>
            </tr>
        </table>
    </div>
    <div class="row" style="margin: 1%;">
        <h5>Payments</h5>
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="hrmodule"><span>Employees</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color:darkgreen;" aria-current="page" href="#">Register New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Payroll</a>
                </li>
            </ul>
            <?php
            $message = '';
            if (isset($_POST['submit'])) {
                $employee = new RegisterNewEmployee();
                $firstName = $_POST['firstName'];
                $middletName = $_POST['middletName'];
                $lastName = $_POST['lastName'];
                $phone = $_POST['phone'];
                $idNumber = $_POST['idNumber'];
                $password = sha1($_POST['password']);
                $username = $_POST['username'];
                $role = $_POST['role'];
                if ($employee->registerNew($firstName, $middletName, $lastName, $phone, $idNumber, $username, $password, $role)) {
                    $message = '<div style="margin-top: 5px;" class="alert alert-success" role="alert">Employee has been succesfuly registered</div>';
                }
            }


            ?>
            <div class="row" style="margin: 1%;">
                <div class="col-sm-12" style="margin-left: auto; margin-right: auto; width: auto;">
                    <?php echo $message; ?>
                    <form style="margin: 10%;" class="form-control" method="post" action="registernewemployee">
                        <h3>Register new employee</h3>
                        <p>
                            Enter employee details bellow (All fields marked red are mandatory)
                        </p>
                        <label style="color:darkblue;" class="form-label">First Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Joel" name="firstName" class="form-control" />
                        <label style="color:darkblue;" class="form-label">Middle Name</label>
                        <input type="text" placeholder="Kiptoo" name="middletName" class="form-control" />
                        <label style="color:darkblue;" class="form-label">Last Name <span style="color: red">*</span></label>
                        <input type="text" placeholder="Ruto" name="lastName" class="form-control" />
                        <label style="color:darkblue;" class="form-label">Phone Number <span style="color: red">*</span></label>
                        <input type="text" placeholder="0722100100" name="phone" class="form-control" />
                        <label style="color:darkblue;" class="form-label">ID Number <span style="color: red">*</span></label>
                        <input type="text" placeholder="12345678" name="idNumber" class="form-control" />
                        <label style="color:darkblue;" class="form-label">Usernamer <span style="color: red">*</span></label>
                        <input type="text" placeholder="kiptoo" name="username" class="form-control" />
                        <label style="color:darkblue;" class="form-label">User role<span style="color: red">*</span></label>
                        <select name="role" class="form-control">
                            <option selected>--Select role--</option>
                            <option value="1">Admin</option>
                            <option value="2">Branch Manager</option>
                            <option value="3">Staff</option>
                        </select>
                        <label style="color:darkblue;" class="form-label">Password <span style="color: red">*</span></label>
                        <input type="password" name="password" class="form-control" />
                        <label style="color:darkblue;" class="form-label">Re-enter password <span style="color: red">*</span></label>
                        <input type="password" name="password1" class="form-control" />
                        </p>
                        <input type="submit" name="submit" value="Register" class="btn-primary" style="width: 100%" /><br>

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