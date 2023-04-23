<?php
    include_once("konfigurasi.php");
    $psn = "";
    if(isset($_POST["txUSER"])){
        $pass = $_POST["txPASS"];
            $user = $_POST["txUSER"];
            
            $sql = "INSERT INTO tbuser(username, passkey) VALUES('$user', '".md5($pass)."');";
            
            $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Gagal koneksi ke dbms");
            $hasil = mysqli_query($cnn, $sql);
            if($hasil){
                $psn = "Login Sukses";
            }else{
                $psn = "Login gagal, silakan diulangi";
            }

        }else{
            $psn = "Password tidak sama dengan Konfirmasi Password";
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
</head>
<body>

<?php
    if(!$psn==""){
        echo "<div>".$psn."</div>";
    } 
?>
    
<form action="formlogin.php" method="POST">
        <div>
            Username 
            <input type="text" name="txUSER">
        </div>

        <div>
            Password <br>
            <input type="password" name="txPASS">
        </div>

        <div><br>
            <button type="submit">Login</button>
        </div>

        <div><br>
            <button type ="submit"><a href="registrasi.php">Registrasi</button>
        </div>

        
    </form>
</body>
</html>

   