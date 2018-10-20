<?php
include "koneksi.php";
$query = mysqli_query($conn,"SELECT * FROM mahasiswa ORDER BY nim ASC");
?>
<body bgcolor="pink" align="center">
<h1><b>LIHAT DATA MAHASISWA TELKOM UNIVERSITY</b></h1><hr/>
<form action="" method="post">
    <table border="1" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>AKSI</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr align="center">
            <td><?php echo $no ?></td>
            <td><?php echo $data["nim"];?></td>
            <td><?php echo $data["nama"];?></td>
            <td>
                <input type="submit" name="hapus" value="hapus">|
                <input type="submit" name="ubah" value="ubah">
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
<br><input type="submit" name="tambahdata" value="INPUT DATA MAHASISWA BARU">
</form>
<?php 
    if(isset($_POST['tambahdata'])){
        header("location: registrasi.php");
    }
?>

<form class="form-horizontal" role="search" method="post">
<div class="col-md-8 col-xs-12">
    <input type="text" name="nim" class="form-control" placeholder="Cari Data Mahasiswa Disini">
</div>
<div class="col-md-4">
    <button class="btn btn-default" type="submit" name="cari">Cari Akun</button>
</div>
</form>

<?php
    if(isset($_POST['cari'])) {
    include "koneksi.php";
    $nim1 = $_POST['nim'];
    $query1 = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim1'");
    while($data1 = mysqli_fetch_array($query1)){
        echo "<b>NIM MAHASISWA :</b>".$data1["nim"];
        echo "<br>";
        echo "<b>NAMA MAHASISWA :</b>".$data1["nama"];
        echo "<br>";
        echo "<b>JURUSAN :</b>".$data1["prodi"];
        echo "<br>";
        echo "<b>FAKULTAS :</b>".$data1["fakultas"];
        echo "<br>";
        echo "<b>ASAL DAERAH :</b>".$data1["asal"];
        echo "<br>";
        echo "<b>MOTO HIDUP :</b>".$data1["motohidup"];
    }
    }
?>

<?php
    if(isset($_POST['hapus'])) {
    include "koneksi.php";
    $nim1 = $_POST['nim'];
    $query1="DELETE from mahasiswa where nim='$nim1'";
    mysqli_query($conn, $query1);
}
?>