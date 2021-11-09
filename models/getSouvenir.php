<?php
require_once '../config/connection.php';

$order_id       = 'NH0921001';
$customer_id    = 'CL21003';
$handphone      = $_POST['phone'];

$sql            = "SELECT * from guests_book where customer_id = '$customer_id' and handphone = '$handphone'";
$retrun         = '';
$result         = mysqli_fetch_assoc(mysqli_query($conn, $sql));
if ($result != null) {
    $retrun = $result;
}
echo json_encode($retrun);
