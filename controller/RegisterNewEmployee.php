<?php
class RegisterNewEmployee extends Controller
{
    public function registerNew($fname, $mname, $lname, $id_no, $phone, $uname, $pswd, $role)
    {
        $db = new Database();
        $insert_query = "INSERT INTO users (fname, mname, lname, id_number, phone_number, username, password, role_id) VALUES('$fname', '$mname', '$lname', '$id_no', '$phone', '$uname', '$pswd', '$role')";

        $res = $db->mysqli->query($insert_query);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
