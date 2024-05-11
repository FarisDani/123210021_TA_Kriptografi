<?php  
session_start();
include 'koneksi.php';

function encryptCaesar($plaintext, $shift) {
    $result = '';
    $plaintext = strtoupper($plaintext);
    $length = strlen($plaintext);

    for ($i = 0; $i < $length; $i++) {
        if (ctype_alpha($plaintext[$i])) {
            $result .= chr((ord($plaintext[$i]) + $shift - 65) % 26 + 65);
        } else {
            $result .= $plaintext[$i];
        }
    }

    return $result;
}

function encryptAES($plaintext, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $ciphertext = openssl_encrypt($plaintext, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($ciphertext . '::' . $iv);
}

function rc4Encrypt($key, $plaintext) {
    $s = [];
    $j = 0;
    $result = '';

    for ($i = 0; $i < 256; $i++) {
        $s[$i] = $i;
    }

    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
    }

    $i = $j = 0;

    for ($k = 0; $k < strlen($plaintext); $k++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
        $result .= chr(ord($plaintext[$k]) ^ $s[($s[$i] + $s[$j]) % 256]);
    }

    return $result;
}

// Fungsi untuk membaca gambar dan mengenkripsi datanya
function encryptImage($imagePath, $key) {
    // Membaca isi file gambar
    $imageData = file_get_contents($imagePath);

    // Enkripsi data gambar menggunakan RC4
    $encryptedImageData = rc4Encrypt($key, $imageData);

    // Simpan data gambar yang telah dienkripsi ke dalam file
    $encryptedImagePath = 'cv_encrypted/encrypted_' . basename($imagePath);
    file_put_contents($encryptedImagePath, $encryptedImageData);

    return $encryptedImagePath;
}

$lamaranid  = "";
$foto         = $_FILES['foto']['name'];
$file_tmp     = $_FILES['foto']['tmp_name'];
$username     = $_POST['username'];
$lowonganid    = $_POST['lowonganid'];
$deskripsi    = $_POST['deskripsi'];

move_uploaded_file($file_tmp, 'cv/'.$foto);


// Enkripsi deskripsi menggunakan Caesar Cipher
$caesarShift = 3; // Atur shift sesuai kebutuhan Anda
$encryptedDeskripsi = encryptCaesar($deskripsi, $caesarShift);

// Kunci untuk AES
$aesKey = 'kuncirahasia123'; // Ganti dengan kunci yang kuat

// Enkripsi deskripsi yang telah dienkripsi dengan Caesar Cipher menggunakan AES
$encryptedFinal = encryptAES($encryptedDeskripsi, $aesKey);

//enkripsi foto
//$encryptedFoto = encryptAES($foto, $aesKey);

// $rc4key = "rahasia";
// $encryptedFoto = rc4Encrypt($rc4key, $foto);

$imagePath = 'cv/'.$foto; // Ganti dengan path gambar Anda
$imagekey = "SecretKey";

$encryptedImagePath = encryptImage($imagePath, $imagekey);

$sql = "INSERT INTO lamaran VALUES('$lamaranid','$username', '$lowonganid', '$encryptedFinal', '$encryptedImagePath')";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

if($query) {
    header("location:index_user.php?status=tambah_berhasil");
} else {
    header("location:index_user.php?status=failed");
}
?>
