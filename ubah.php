<html>
<head>
	<title>Ubah Data Mahasiswa</title>
</head>

    <?php
    session_start();
    if ( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }
    require 'conn.php';

    // ambil data di URL
    $id = $_GET["id"];

    // query data mahasiswa berdasarkan id
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    // cek apakah tombol submit sudah ditekan?
    if( isset($_POST["submit"]) ) {

        // cek apakah data berhasil ditambahkan
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil diupdate!');
                    document.location.href = 'index.php';
                </script>  
                ";
        } else {
            echo "
                <script>
                    alert('data gagal diupdate!');
                    document.location.href = 'index.php';
                </script>  
                ";
        }
    }
    ?>

<body>
	<h1>Ubah data</h1>
	<form method="post">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" required 
				value="<?= $mhs["nim"]; ?>"></li>

			<li>
				<label for="nim">Nama : </label>
				<input type="text" name="nama" id="nama" required
				value="<?= $mhs["nama"]; ?>"></li>

			<li>
				<label for="nim">Email : </label>
				<input type="text" name="email" id="email" required
				value="<?= $mhs["email"]; ?>"></li>

			<li>
				<label for="nim">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan"
				value="<?= $mhs["jurusan"]; ?>"></li>

			<li>
				<label for="nim">Semester : </label>
				<input type="text" name="semester" id="semester"
				value="<?= $mhs["semester"]; ?>"></li>

			<li>
				<button type="submit" name="submit">Ubah Data!</button></li>
		</ul>
</form>
</body>
</html>