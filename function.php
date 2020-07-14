<?php
//koneksi ke datase
$conn =mysqli_connect("localhost", "root", "", "login");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =$row;
    }
    return $rows;
}

function daftar($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 =  mysqli_real_escape_string($conn, $data["password2"]);

    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo"<script>
        alert('konfirmasi password tidak sesuai!');
        </script>"; 

        return false;

    }

    // encrip password
	// $password1 = password_hash($password1, PASSWORD_DEFAULT);

	// query
	mysqli_query($conn,  "INSERT INTO users VALUES
	('', '$username', '$password')");

    return mysqli_affected_rows($conn);
    
}