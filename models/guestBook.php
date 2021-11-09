<?php
require_once '../config/connection.php';

$order_id   = 'NH1021001';
$customer_id = 'CL21005';
$handphone  = $_POST['handphone'];
$guest_name = $_POST['guest_name'];
$instansi   = $_POST['organisasi'];
$address    = $_POST['address'];


$check_sql      = "SELECT * from guests_book where handphone = '$handphone'";
$result_check   = mysqli_num_rows(mysqli_query($conn, $check_sql));

if ($result_check) {
    $row            = mysqli_fetch_assoc(mysqli_query($conn, $check_sql));
    // echo '<pre>';
    // print_r($row);
    // echo '<pre>';
    // exit;
    $return = [
        'status' => 2,
        'msg' => 'Andah Sudah pernah mengisi daftar tamu.',
        'phone' => $row['handphone'],
    ];
    echo json_encode($return);
    return false;
} else {
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO guests_book (customer_id,handphone,guest_name,instansi,`address`,`datetime`) values('$customer_id','$handphone',
    '$guest_name','$instansi','$address','$date')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_error($conn)) {
        $return = [
            'status' => 0,
            'msg' => 'Server Timeout!',
        ];
    } else {
        $return = [
            'status' => 1,
            'msg' => 'Data tamu berhasil disimpan!',
        ];
    }
}

echo json_encode($return);
