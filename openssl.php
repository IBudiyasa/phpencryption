<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OpenSSL</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <header class="iniheader">
            <a class="iniheaderlink" href="index.php">Home</a>
            <hr class="iniruler">
        </header>
        <span class="inicontainer">
            <h2 class="inih2">Decode & Encode OpenSSL</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"><!--Mengirim data ke halaman ini-->
                <ul class="iniul">
                    <li>
                        <input type="text" name="teks" placeholder="Masukkan sebuah teks" required>    
                    </li>
                    <li>
                        <input type="text" name="key" placeholder="Masukkan key" required>
                    </li>
                    <li>
                        <p class="initext">Metode yang akan digunakan : </p>
                    </li>
                    <li class="radios">
                        <input type="radio" id="encode" name="pilihan" value="encode" required>
                        <label for="encode">Encode</label><br>
                        <input type="radio" id="decode" name="pilihan" value="decode">
                        <label for="decode">Decode</label><br>
                    </li>
                    <li>
                        <input class="inibtn" type="submit" value="Submit">
                    </li>
                    <li>
                        <p class="initext" id="hasil">Hasil : </p>
                    </li>
                </ul>
            </form>
        </span>
        <footer class="inifooter">
            <p class="initext">I Gede Budiyasa</p>     
        </footer>
    </body>
</html>
<?php
    //Deklarasi variabel
    $sebuah_string = $key = $pilihan = "";

    //Mengecek apakah ada inputan dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Jika ada, lalu diisi ke variabel berikut
        $sebuah_string = pemangkas($_POST["teks"]);
        $key = pemangkas($_POST["key"]);
        $pilihan = pemangkas($_POST["pilihan"]);
    }
    
    //Untuk memangkas html special character
    function pemangkas($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //tipe encode & decode
    $ciphering = "AES-128-CTR";

    // Menggunakan metode OpenSSl Encryption 
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options   = 0;

    // Non-NULL Initialization Vector untuk Encode 
    $encryption_iv = '1234567891011121';
    
    //Mengecek apakah user akan melakukan encoding atau sebaliknya
    if($pilihan == "encode"){
        //Jika melakukan encoding
        $hasil = openssl_encrypt($sebuah_string, $ciphering, $key, $options, $encryption_iv);
    }

    else{
        //Jika melakukan decoding
        $hasil = openssl_decrypt($sebuah_string, $ciphering, $key, $options, $encryption_iv);
    }

    //Mengecek apakah variabel $hasil sudah terisi data
    echo "<script>
        document.getElementById('hasil').innerHTML = 'Hasil : ".$hasil."';
    </script>";
?>