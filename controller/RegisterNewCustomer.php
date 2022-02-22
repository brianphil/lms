<?php
class RegisterNewCustomer extends Controller
{
    public function registerNewCustomer($fname, $mname, $lname, $id_no, $phone, $gfname, $glname, $gid_no, $gphone)
    {
        $db = new Database();
        $date = time();
        $insert_query = "INSERT INTO customers (fname, mname, lname, id_number, phone_number, gfname, glname, gphone, gidnumber,date_created) VALUES('$fname', '$mname', '$lname', '$id_no', '$phone', '$gfname', '$glname', '$gid_no', '$gphone', '$date')";

        $res = $db->mysqli->query($insert_query);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
