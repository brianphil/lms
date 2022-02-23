<?php

class CustomerAutosearch extends Controller
{
    public function customerSearch($term)
    {
        $db = new Database();
        $query = "SELECT * FROM users WHERE fname LIKE '%{'$term'}%' LIMIT 25";
        $result = $db->mysqli->query($query);
        if ($result->num_rows > 0) {
            while ($user = $result->fetch_array) {
                $res[] = $user['fname'] . ' ' . $user['lname'];
            }
        } else {
            $res = array();
        }
        //return json res
        echo json_encode($res);
    }
}
