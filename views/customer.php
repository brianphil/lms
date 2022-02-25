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
                    <a style="text-decoration: none;" href="newcustomer"><button class="btn-secondary form-control" style="width: 20%">Create New</button></a>
                </div>
            </div>
            <div style="background-color: #fff;" class="row">
                <div class="col-sm-12">
                    <table id="customers" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>ID Number</th>
                                <th>Phone Number</th>
                                <th>Date Registered</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $db = new Database();
                            $r_query = "SELECT * FROM customers WHERE delete_flag ='0'";
                            $result = $db->mysqli->query($r_query);
                            if ($result->num_rows > 0) {
                                while ($r = mysqli_fetch_assoc($result)) {

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
                                    echo date('d M Y', $date);
                                    echo '</td>';
                                    echo '<td>';
                                    echo  '<form id="update-action" action="updatecustomer"><button id="edit-action" class="btn-primary" style="margin: 2px;" value="update" name="updateCustomer">Edit</button>';
                                    echo  '<input type="hidden" name="id" value="' . $customer_id . '">
                                    <button name="deleteCustomer" id="delete-action"  onclick="confirmDelete()" class="btn-danger" style="margin: 2px;">Delete</button></form>';
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
    </div>
    <script>
        function confirmDelete() {
            let text = "Are you sure you want to delete this customer?\nEither OK or Cancel.";
            if (confirm(text) == true) {
                document.getElementById("delete-action").value = "delete";
                document.getElementById("delete-action").submit();

            } else {
                location.reload();
            }
            // document.getElementById("delete-action").innerHTML = text;
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
    <script>
        $(document).ready(function() {
            $('#customers').DataTable({
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