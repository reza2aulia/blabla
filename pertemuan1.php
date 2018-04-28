<form class="" action="" method="POST">
angka 1 :  <input type="text"placeholder="Silahkan Diisi" required name="nama" value="">

<br/ >
angka 2:  <input type="text"placeholder="Silahkan Diisi" required name="alamat" value="">
<br/>
Tanggal input :<input type="text" readonly name="tgl"
value="<?php echo date("d-M-Y H:i:s"); ?>">
<br/>
Operasi :
<select  name="daerah">
  <option value="">Pilih sistem operasi penjumlahan</option>
  <option value="tambah">Tambah (+)</option>
  <option value="kurang">Kurang(-)</option>
  <option value="kali">Kali(x)</option>
  <option value="bagi">Bagi(:)</option>

</select>
<br/>
<button type="submit" name="proses">Proses</button>
<button type="reset" name="button">Cancel</button>

</form>



<?php
$db_user = "root";
$db_passwd  = "";
$db_name  = "db_test";
$db_host = "localhost";
//
// $connect_db = mysql_connect($db_host, $db_user, $db_passwd);
// $find_db = mysql_select_db($db_name);

$connect = mysql_connect($db_host,$db_user,$db_passwd);
$ok = mysql_select_db($db_name);

$inputan1 = $_POST['nama'];
$inputan2 = $_POST['alamat'];
$operasi = $_POST['daerah'];
$tanggal = date ("Y.m.d");
define ($hasil,$operasi);
$simpan = mysql_query($connect,"INSERT INTO test VALUES ('', '$inputan1', '$operasi','$inputan2',  '$tanggal', '$hasil')");
if ($simpan) {
  echo "terhubung <br/>";
}
else {
  echo "gagals <br/>";
}

if (isset($_POST['proses'])) {

//config nya//
switch ($operasi) {
  case 'tambah':
  $hasil = $inputan1 + $inputan2;
    break;
  case 'kurang':
$hasil =   $inputan1 - $inputan2;
    break;
  case 'kali':
$hasil =   $inputan1 * $inputan2;
    break;
  case 'bagi':
$hasil =   $inputan1 / $inputan2;
  break;

  default:
echo "pilih sistem operasi penjumlahannya dlu <br/>";
    break;
}

echo "hasilnya adalah : ". $hasil ;
}

else {
  echo "silahkan diisi terlebih dahulu";
}


 ?>
