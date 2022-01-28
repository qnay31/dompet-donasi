<?php  
require '../function.php';
session_start();
error_reporting(0);

if(isset($_POST["data_id"])){
	$data_id = $_POST["data_id"];
	$q = mysqli_query($conn, "SELECT * FROM donasi WHERE id = '$data_id'");
    
    $sql = $q;
    while($data = mysqli_fetch_array($sql))
    {
        $output .= '  
        <table>
            <tr p-5>
                <th style="text-align: left">Nama :</th>
                <td style="text-align: right">'.$data["nama_donatur"].'</td>
            </tr>
            <tr>
                <th style="text-align: left">Berdonasi :</th>
                <td style="text-align: right">'.ucwords($data["jenis"]).'</td>
            </tr>
            <tr>
                <th style="text-align: left">Via :</th>
                <td style="text-align: right">'.$data["via"].'</td>
            </tr>

            <tr>
                <th style="text-align: left">Kode Unik :</th>
                <td style="text-align: right">'.$data["kode_unik"].'</td>
            </tr>

            <tr>
                <th style="text-align: left">Jumlah Donasi :</th>
                <td style="text-align: right">Rp. '.number_format($data["jumlah_donasi"],0,"." , ".").'</td>
            </tr>

            <tr>
                <th style="text-align: left">Status :</th>
                <td style="text-align: right">'.$data["status"].'</td>
            </tr>
        </table>
        ';    
    }

    echo $output;  
    }

?>