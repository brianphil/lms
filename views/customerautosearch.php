<?php
$customer = new  CustomerAutosearch();

$term = mysqli_real_escape_string($customer->mysqli,$_GET['term']);

$sql = "SELECT * FROM customers WHERE fname LIKE '$term%'  OR lname LIKE '$term%' OR mname LIKE '$term%'";

$query = mysqli_query($customer->mysqli, $sql);

$result = [];

while($data = mysqli_fetch_array($query))
{
    $result[] = $data['id'].'-'. $data['fname'].' '.$data['lname'].' '.$data['mname'];
}
echo json_encode($result);