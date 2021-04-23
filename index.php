<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>

    <?php
    session_start();
    if ( !isset($_SESSION["login"]) ) {
	    header("Location: login.php");
	    exit;
    }

    // koneksi ke database
    require 'conn.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");

    // tombol cari ditekan
    if ( isset($_POST["cari"]) ) {
	    $mahasiswa = cari($_POST["keyword"]);
    }
?>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah data mahasiswa</a>
<a href="logout.php">LogOut</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus 
	placeholder="masukkan keyword pencarian..." autocomplete="off">
	<button type="submit" name="cari">Cari</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No. </th>
		<th>Aksi </th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
		<th>Semester</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach($mahasiswa as $row ) : ?> 
	<tr>
		<td><?= $row["id"]; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?')">Hapus</a>
		</td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
		<td><?= $row["semester"]; ?></td>
	</tr>
    <?php endforeach; ?>
    <?php $i++; ?>
	
</table>
</body>
</html>