<h3>Operator PHP</h3>

    <form  action="" method="POST">
    Nilai Pertama : <input type="text" required name="pertama" >
    <br />
    Nilai Kedua : <input type="text" required name="kedua" >
    <br />
    Tanggal : <input type="text" readonly name="tgl"
    value="<?php echo date("d-m-Y H:i:s"); ?>">
    <br />
    Operator :
    <select name="operator">

      <option value="*">Perkalian</option>
      <option value="/">Pembagian</option>
      <option value="-">Penguranan </option>
      <option value="+">Penjumlahan </option>

    </select>
        <br />
    <button type="submit" name="proses">Hitung</button>
    </form>

<?php

    $host = 'localhost'; // tetap gak perlu di rubah
    $user = 'root'; // sesuaikan dengan hosting
    $passw = ''; // password yang di sesuaikan dengan hosting
    $db = 'forum'; // database di hostingan

    $connect = mysql_connect($host,$user,$passw);
    $ok = mysql_select_db("$db",$connect); // cek database na

// masukan angka di 2 form lalu pilih operator prose dan nilai keluar
  if (isset($_POST['proses'])) {
    $tglnya = $_POST['tgl'];
    $operator = $_POST['operator'];
    $niali1 = $_POST['pertama'];
    $nilai2 = $_POST['kedua'];
    if (!is_numeric($niali1) OR !is_numeric($nilai2)) {
      echo "<br /><h2>Kedua Inputan hanya bisa angka</h2>";
    echo "<meta http-equiv='refresh' content='1;url=pertemuan1.php'>";
    }
    else {
      if ($operator == "*") {
        $hasil = $_POST['pertama'] * $_POST['kedua'];
        $operator="Perkalian";
        $simpan = mysql_query("INSERT INTO paket VALUES ('', '$tglnya', '$operator', '$niali1', '$nilai2', '$hasil')");
        if ($simpan) {
          echo "Total Perkalian : " . $hasil . "<br /> Dilakukan Pada " . $_POST['tgl'] ;
        }
      }
      elseif ($operator == "/") {
        $hasil = $_POST['pertama'] / $_POST['kedua'];
        $operator="Pembagian";
        $simpan = mysql_query("INSERT INTO paket VALUES ('', '$tglnya', '$operator', '$niali1', '$nilai2', '$hasil')");
        if ($simpan) {
          echo "Total Pembagian : " .$hasil . "<br /> Dilakukan Pada " . $_POST['tgl'] ;
        }
      }
      elseif ($operator == "+") {
        $hasil = $_POST['pertama'] + $_POST['kedua'];
        $operator="Penjumlahan";
        $simpan = mysql_query("INSERT INTO paket VALUES ('', '$tglnya', '$operator', '$niali1', '$nilai2', '$hasil')");
        if ($simpan) {
          echo "Total Penjumlahan : " . $hasil . "<br /> Dilakukan Pada " . $_POST['tgl'] ;
        }
      }
      elseif ($operator == "-") {
        $hasil = $_POST['pertama'] - $_POST['kedua'];
        $operator="Pengurangan";
        $simpan = mysql_query("INSERT INTO paket VALUES ('', '$tglnya', '$operator', '$niali1', '$nilai2', '$hasil')");
        if ($simpan) {
          echo "Total Pengurangan : " . $hasil . "<br /> Dilakukan Pada " . $_POST['tgl'] ;
        }
      }
    }
  }
  ?>
