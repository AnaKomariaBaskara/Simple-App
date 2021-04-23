<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>

    <?php
    session_start();
    if ( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }
    require 'conn.php';

    // cek apakah tombol submit sudah ditekan?
    if( isset($_POST["submit"]) ) {
        
        // cek apakah data berhasil ditambahkan
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>  
                ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>  
                ";
        }
    }
    ?>

<body>
	<h1>Tambah data</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" required></li>

			<li>
				<label for="nim">Nama : </label>
				<input type="text" name="nama" id="nama" required></li>

			<li>
				<label for="nim">Email : </label>
				<input type="text" name="email" id="email" required></li>

			<li>
				<label for="nim">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan"></li>

			<li>
				<label for="nim">Semester : </label>
				<input type="text" name="semester" id="semester"></li>

			<li>
				<button type="submit" name="submit">Tambah Data!</button></li>
		</ul>
</form>
</body>
</html>