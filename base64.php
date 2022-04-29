<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Base64</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <header class="iniheader">
            <a class="iniheaderlink" href="index.php">Enkripsi Kriptografi</a>
            <hr class="iniruler">
        </header>
        <span class="inicontainer">
            <h2 class="inih2">Decode & Encode Base64</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"><!--Mengirim data ke halaman ini-->
                <ul class="iniul">
                    <li>
                        <input type="text" name="teks" placeholder="Masukkan sebuah teks" required>    
                    </li>
                    <li>
                        <p class="initext">Metode yang akan digunakan : </p>
                    </li>
                    <li class="radios">
                        <input class="inpradio" type="radio" id="encode" name="pilihan" value="encode" required>
                        <label for="encode">Encode</label><br>
                        <input class="inpradio" type="radio" id="decode" name="pilihan" value="decode">
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
    </body>
</html>
<?php
    //Deklarasi Variabel
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

    //Mengecek apakah melakukan encode atau decode
    if ($pilihan == "encode"){//Bila pilihan = Encode
        $hasil = base64_encode($sebuah_string);
    }
    else{//Sebaliknya
        $hasil = base64_decode($sebuah_string);
    }

    echo "<script>
        document.getElementById('hasil').innerHTML = 'Hasil : ".$hasil."';
    </script>";

?>