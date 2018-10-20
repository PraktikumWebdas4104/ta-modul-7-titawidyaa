<body bgcolor="pink" align="center">
	<h1>FORM REGISTRASI MAHASISWA TELKOM UNIVERSITY</h1>
	<hr>
<form method="POST">
<table>
	<tr>
		<td>NIM :</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>NAMA :</td>
		<td><input type="text" name="nama"></td>
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
    	<td><input type="text" name="asal"></td>
   </tr>
   </tr>
		<tr>
		<td>Moto Hidup : </td>
		<td><textarea name="motohidup"></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="DAFTAR"></td>
	</tr>
</table>
</form>
</body>



<?php 
	if(isset($_POST['submit'])){
		include 'koneksi.php';
		$nama=$_POST['nama'];
		$nim=$_POST['nim'];
		$jk=$_POST['jk'];
		$prodi=$_POST['prodi'];
		$fakultas=$_POST['fakultas'];
		$asal=$_POST['asal'];
		$motohidup=$_POST['motohidup'];

		$sql=$conn->query("INSERT INTO `mahasiswa`(`nama`,`nim`,`jk`,`prodi`,`fakultas`,`asal`,`motohidup`) VALUES('$nama','$nim','$jk','$prodi','$fakultas','$asal','$motohidup')");
		echo "Data berhasil dimasukkan"."<br>";
		echo "<a href ='loginn.php'>Klik</a> untuk lanjut";

		header("location: lihatdata.php");
	}
 ?>