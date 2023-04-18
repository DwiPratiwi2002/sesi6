<?php
    include_once("konfigurasi.php");
    $psn = "";
    if(isset($_POST["txNAMA"])){
        $PASS1 = $_POST["txPASS1"];
        $PASS2 = $_POST["txPASS2"];
        
        if($PASS1==$PASS2){
            $nama = $_POST["txNAMA"];
            $email = $_POST["txEMAIL"];
            $user = $_POST["txUSER"];

            $sql = "INSERT INTO tbuser(nama,email,username,passkey,iduser) VALUES('$nama','$email','$user','".md5($PASS1)."','".md5($nama)."');";
            echo $sql;

            $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die("Gagal Koneksi Ke DBMS");
            $hasil = mysqli_query($cnn,$sql);
            if($hasil){
                $psn = "Registrasi User Sukses, Silahkan Login Dengan User Tersebut";
            }else{
                $psn = "Registrasi Gagal, silahkan diulangi";
            }

        }else{
            $psn = "Password 1 Tidak Sama Dengan Konfirmasi Password";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
</head>
<body>

<?php
    if(!$psn==""){
        echo "<div>".$psn."</div>";
    } 
?>
    
<form action="registrasi.php" method="POST">

    <div>
        Nama Lengkap User 
        <input type="text" name="txNAMA">
    </div>

    <div>
        Email
        <input type="email" name="txEMAIL">
    </div>

    <div>
        User Name 
        <input type="text" name="txUSER">
    </div>

    <div>
        Password 
        <input type="password" name="txPASS1">
    </div>

    <div>
        Password<sup>konfirmasi</sup>
        <input type="password" name="txPASS2">
    </div>

    <div>
        <button type="submit">Registrasi</button>
    </div>

</form>


</body>
</html>