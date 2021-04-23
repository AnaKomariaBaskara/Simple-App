<html>
<head>
	<title>Halaman Admin</title>
</head>

    <?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    // ambil data dari tabel mahasiswa / query data
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");

    // ambil data (fetch) mahasiswa dari object result
    // mysqli_fetch_row()
    // mysqli_fetch_assoc()
    // mysqli_fetch_array()
    // mysqli_fetch_object()
    ?>

<body>

<h1>Daftar Mahasiswa</h1>
<table border = "1" cellpadding="10" cellspacing="0">
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
	<?php while ( $row = mysqli_fetch_assoc($result) ) : ?> 
	<tr>
		<td><?= $row["id"]; ?></td>
		<td>
			<a href="">Ubah</a>
			<a href="">Hapus</a>
		</td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
		<td><?= $row["semester"]; ?></td>
	</tr>
    <?php endwhile; ?>
    <?php $i++; ?>
	
</table>
</body>
</html>