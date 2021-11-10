<?php
require_once '../config/connection.php';
require_once '../models/timesince.php';

$customer_id = 'CL10001';
$sql    = "SELECT * FROM guests_book where customer_id ='$customer_id' order by id ASC";
$data   = mysqli_query($conn, $sql, 0);
$guest  = mysqli_fetch_object($data);
$html   = '';
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script src="../assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<div class="table-resposive" style="padding: 20px;">
    <h2 for="Data Tamu" class="text-danger text-center">Data Tamu</h2>
    <hr>
    <table id="example" class="table table-bordered text-gray">
        <thead class="text-gray">
            <tr>
                <th>No</th>
                <th>Nama Tamu</th>
                <th>Tlp</th>
                <th>Instansi/Orgganisasi</th>
                <th>Alamat</th>
                <th>Waktu Datang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 0;
            foreach ($data as $guest) : $n++; ?>
                <tr>
                    <td><?= $n; ?></td>
                    <td><?= $guest['guest_name']; ?></td>
                    <td><?= $guest['handphone']; ?></td>
                    <td><?= $guest['instansi']; ?></td>
                    <td><?= $guest['address']; ?></td>
                    <td><?= $guest['datetime']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>