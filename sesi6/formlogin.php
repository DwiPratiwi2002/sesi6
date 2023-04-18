<?php
    include_once("formlogin.php");
    $psn = "";
    if(isset($_POST["txUSER"])){
        $PASS1 = $_POST["txPASS1"];
        
        if($PASS1){
            $user = $_POST["txUSER"];
            $pass = $_POST["txPASS"];

            $sql = "INSERT INTO tbuser(username,passkey) VALUES('$user','".md5($PASS)."');";
            echo $sql;

            $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die("Gagal Koneksi Ke DBMS");
            $hasil = mysqli_query($cnn,$sql);
            if($hasil){
                $psn = "Login User Sukses, Silahkan Login Dengan User Tersebut";
            }else{
                $psn = "Login Gagal, silahkan diulangi";
            }
        }
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
        User Name 
        <input type="text" name="txUSER">
    </div>

    <div>
        Password 
        <input type="password" name="txPASS">
    </div>

    <div>
        <button type="submit">Login</button>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>

</form>


</body>
</html>