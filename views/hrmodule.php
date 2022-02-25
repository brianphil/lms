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
                <td>Employees</td>
            </tr>
        </table>
    </div>
    <div class="row" style="margin: 1%;">
        <h5>Payments</h5>
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span style="color:darkgreen;">Employees</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registernewemployee">Register New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Payroll</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">New Payroll</a>
                </li>
            </ul>
            <div class="row" style="margin: 1%;">
                <div class="col-sm-12">
                    <table id="users" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>ID Number</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th>Date Registered</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $db = new Database();
                            $r_query = "SELECT * FROM users WHERE delete_flag ='0'";
                            $result = $db->mysqli->query($r_query);
                            if ($result->num_rows > 0) {
                                while ($r = mysqli_fetch_assoc($result)) {
                                    $role_id = $r['role_id'];
                                    if ($role_id == 1) {
                                        $role_id = 'Admin';
                                    } elseif ($role_id == 2) {
                                        $role_id = 'Branch Manager';
                                    } elseif ($role_id == 3) {
                                        $role_id = 'Staff';
                                    }
                                    $fname = $r['fname'];
                                    $mname = $r['mname'];
                                    $lname = $r['lname'];
                                    $phone = $r['phone_number'];
                                    $id = $r['id_number'];
                                    $date = $r['date_created'];
                                    $customer_id = $r['id'];
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $fname . ' ' . $mname . ' ' . $lname;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $phone;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $id;
                                    echo '</td>';
                                    echo '<td>';
                                    echo $role_id;
                                    echo '</td>';
                                    echo '<td>';
                                    echo  $date;
                                    echo '</td>';
                                    echo '<td>';
                                    echo  '<button class="btn-primary" style="margin: 2px;">Edit</button>';
                                    echo  '<button class="btn-danger" style="margin: 2px;">Delete</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                    
                                }
                            }
                            ?>
                        </tbody>
                    </table>
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
   <script>
        $(document).ready(function() {
            $('#users').DataTable({
                responsive: true,
                stateSave: true,
                "bDestroy": true
            });
        });
    </script>
</body>

<?php
include "partials/footer.php";
?>