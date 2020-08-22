<?php 
// Pustaka
include 'math.php';
// Start My Logic >.<
if(isset($_POST['submit'])){
    $data = $_POST['data'];
    $operasi = $_POST['operator'];
    $hasil = "";
// First, Cek data dan sistem operasi.
    $a = cekdata($data);
    if ($a[0] == true) {
        $hasil = printr($a[1])." = ";
        $result = "";
        switch ($operasi) {
            case 'Mean':
            $result = mean($a[1]);
            break;
            case 'Modus':
            $result = modus($a[1]);
            break;
            case 'Max':
            $result = max($a[1]);
            break;
            case 'Min':
            $result = min($a[1]);
            break;
            default:
                # code...
            break;
        }
        if(isset($_POST['submit'])){
            if(isset($_COOKIE['result'])) {
                $l_cookie = count($_COOKIE['result']);
                if($l_cookie == 7){
                    for ($i=1; $i < 8; $i++) { 
                        if($i == 7){
                            setcookie("result[6]",$operasi.$hasil.$result);
                        }else{
                            $a =  $i - 1;
                            setcookie("result[$a]",$_COOKIE['result'][$i]);
                        }
                    }
                }else{
                    setcookie("result[$l_cookie]",$operasi.$hasil.$result);
                }
            }else{
                setcookie("result[0]",$operasi.$hasil.$result);
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo "Error 1.0 <br>";
        }
    }else{
        echo "Error 4.1 : Kesalahan pada data. Please input your data!";
    }
// Second, cek izin menggunakan function/perhitungan

// Third, set coockie untuk history
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Calculator Tugas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container" style="margin-top: 15px;">
        <h2>Calculator</h2>

        <div class="d-flex flex-row">
            <div class="col-md-4" style="padding: 0;">
                <div class="d-flex flex-row align-items-center relative" style="margin-bottom: 15px;">
                    <p class="title operator">Modus</p>
                    <span>{</span>
                    <input type="text" class="input-data form-control shadow tuyul" placeholder="Masukkan data">
                    <button class="btn btn-primary btn-operasi data" type="button">Data</button>
                    <span>}</span>
                </div>
                <div
                    class="d-flex flex-row align-items-center" style="margin-bottom: 15px;">
                    <p class="title"><strong>Operasi</strong></p>
                    <button class="btn btn-primary btn-operasi mode" type="button" value="modus">Modus</button>
                </div>
            <div class="pilihan-mode">
                <div class="d-flex flex-row align-items-center flex-select" type="button">
                    <button class="btn btn-primary btn-operasi" type="button" value="Max">MAX</button>
                    <button class="btn btn-primary btn-operasi" type="button" value="Min">MIN</button>
                    <button class="btn btn-primary btn-operasi" type="button" value="Modus">Modus</button>
                    <button class="btn btn-primary btn-operasi" type="button" value="Mean">Mean</button>
                </div>
            </div>
            <button class="btn btn-primary btn-submit ok" type="button" operator="Modus">OK</button>
            <form  method="POST" class="inputdata">
                <input type="text" name="data" id="data" style="display: none" value="1,2,3,4,5,56,8,1">
                <input type="text" name="operator" id="operasi" value="Modus" style="display: none">
                <button class="btn btn-primary btn-submit hitung" type="submit" name="submit" onclick="getdata()">Hitung</button>
            </form>
            <div class="result" style="display: block">
                <?php
                if(isset($_COOKIE['result'])) {
                    $l_cookie = count($_COOKIE['result']) -1;
                    foreach ($_COOKIE['result'] as $key => $value) {
                        if ($key == $l_cookie):?>
                        <p>Result</p>
                        <p><?= $value ?></p>
                        <?php endif;
                    }
               }else{
                 echo "not found result"; 
             }
             ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="history">
                <p><strong>History Penggunaan</strong></p>
                <div class="historyku">
                    <?php
                    if(isset($_COOKIE['result'])) {
                       foreach ($_COOKIE['result'] as $key => $value) {
                           ?>
                           <p><?= $value ?></p>
                           <?php
                       }
                   }else{
                     echo "not found result"; 
                 }
                 
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <button class="btn btn-primary msg shadow" type="button">Jika sudah Press Enter untuk memasukkan data</button>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/js.js"></script> -->
    <script src="cssjs.js"></script>
    <script>
          function getdata(){
              var i = document.getElementsByClassName("tuyul")[0].value;
              document.getElementById('data').setAttribute('value',i);
              var j = document.getElementsByClassName("ok")[0].getAttribute("operator");
              document.getElementById('operasi').setAttribute('value',j);
          }
    </script>
</body>

</html>