<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MD5</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <header class="iniheader">
            <a class="iniheaderlink" href="index.php">Enkripsi Kriptografi</a>
            <hr class="iniruler">
        </header>
        <span class="inicontainer">
            <h2 class="inih2">Encode md5</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"><!--Mengirim data ke halaman ini-->
                <ul class="iniul">
                    <li>
                        <input type="text" name="teks" placeholder="Masukkan sebuah teks" required>    
                    </li>
                    <li>
                        <p class="initext">Metode yang akan digunakan : </p>
                    </li>
                    <li class="radios">
                        <input class="inpradio" type="radio" id="encode" name="pilihan" value="16" required>
                        <label for="encode">Raw 16bit binary format</label><br>
                        <input class="inpradio" type="radio" id="decode" name="pilihan" value="32">
                        <label for="decode">32 character hex</label><br>
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
    </body>
</html>
<?php
    //Deklarasi variabel
    $sebuah_string = $pilihan = "";

    //Mengecek apakah ada inputan dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Jika ada, lalu diisi ke variabel berikut
        $sebuah_string = pemangkas($_POST["teks"]);
        $pilihan = pemangkas($_POST["pilihan"]);
    }
    
    //Untuk memangkas html special character
    function pemangkas($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Untuk mengecek pilihan radio button
    if ($pilihan == "16"){
        $hasil = md5($sebuah_string, TRUE);
    }
    else if($pilihan == "32"){
        $hasil = md5($sebuah_string);
    }
    else{
        $hasil = "";
    }

    //Mengecek apakah variabel $hasil sudah terisi data
    echo "<script>
        document.getElementById('hasil').innerHTML = 'Hasil : ".$hasil."';
    </script>";
?>