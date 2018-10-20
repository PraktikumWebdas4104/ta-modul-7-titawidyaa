<?php 
if(isset($_POST['ubah'])) {
include 'lihatdata.php';
$nim = $_GET['nim']; 
$conn = mysqli_connect("localhost", "root", "", "dbmahasiswa"); 
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = $nim"); 
$ro = mysqli_fetch_array($query); 
?>
}
<body bgcolor="pink" align="center">
	<h1>FORM REGISTRASI MAHASISWA TELKOM UNIVERSITY</h1>
	<hr>
<form method="POST">
	<br><br>
	<h1>EDIT DATA</h1>
	<table>
		<tr>
			<td>NIM :</td>
			<td><?php echo $nim; ?></td>
		</tr>
		<tr>
			<td>NAMA :</td>
			<td><input type="text" name="nama" value="<?php echo $ro['nama']; ?>"></td>
		</tr>
		<tr>
		<td>Jenis Kelamin :</td>
		<td><input type="radio" name="jk" value="laki-laki" checked>Laki-laki<br><input type="radio" name="jk" value="perempuan">Perempuan<br></td>
	</tr>
	<tr>
		<td>Program Studi :</td>
		<td><select name="prodi" required>
 			<option value="mi">D3 Manajemen Informatika</option>
  			<option value="mp">D3 Manajemen Pemasaran</option>
  			<option value="perhotelan">D3 Perhotelan</option>
  			<option value="tektel">D3 Teknik Telekomunikasi</option>
  			<option value="ka">D3 Komputerisasi Akutansi</option>
  			<option value="if">D3 Teknik Informatika</option>
  			<option value="ilkom">S1 Ilmu Komunikasi</option>
  			<option value="mbti">S1 Manajemen Bisnis Telekomunikasi Informatika</option>
			<option value="dkv">S1 Desain Komunikasi Visual</option>
			<option value="di">S1 Design Interior</option>
			<option value="sisfo">S1 Sistem Informasi</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas :</td>
		<td><select name="fakultas" required>
 			<option value="fit">FAKULTAS ILMU TERAPAN</option>
  			<option value="fik">FAKULTAS INDUSTRI KREATIF</option>
  			<option value="feb">FAKULTAS EKONOMI BISNIS</option>
  			<option value="fkb">FAKULTAS KOMUNIKASI BISNIS</option>
		</td>
	<tr>
    	<td>Asal :</td>
    	<td><input type="text" name="asal" value="<?php echo $ro['asal']; ?>"></td>
   </tr>
   </tr>
		<tr>
		<td>Moto Hidup : </td>
		<td><textarea name="motohidup"><?php echo $ro['motto_hidup']; ?></textarea></td>
	</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="UBAH">
		</tr>
	</table>
</form>

<?php
	if (isset($_POST['submit'])) {
		$koneksi = mysqli_connect("localhost", "root", "", "dbmahasiswa");

		$nim = $_GET['nim'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$prodi = $_POST['prodi'];
		$fakultas = $_POST['fakultas'];
		$asal = $_POST['asal'];
		$motohidup = $_POST['motohidup'];

		$qrySelect = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '".$nim."'");
		$rw = mysqli_fetch_array($qrySelect);

		if ($prodi !== -1) {
			if ($fakultas !== -1) {
				$sql = mysqli_query($koneksi, "UPDATE `mahasiswa` SET `nama` = '".$nama."', `jk` = '".$jk."', `prodi` = '".$prodi."', `fakultas` = '".$fakultas."', `asal` = '".$asal."', `motohidup` = '".$motohidup."' WHERE nim = '".$nim."'");
				echo "DATA BERHASIL DI UBAH<br>";
			}
			else{
				echo "FAKULTAS Tidak Boleh Kosong";
			}
		}
		else{
			echo "PRODI Tidak Boleh Kosong";
		}
	}

?>