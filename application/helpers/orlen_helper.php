<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');/*
 * function that generate the action buttons edit, delete
 * This is just showing the idea you can use it in different view or whatever fits your needs
 */
function tanggal_indo($tanggal)
{
    $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function rubah_tanggal($tgl)
{
   $exp = explode('-',$tgl);
   if(count($exp) == 3)
   {
       $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
   }
   return $tgl;
}

function countdown($hitungmundur)
{
   $bulan = array (1 =>   'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
);
   $split = explode('-', $hitungmundur);
   return $bulan[ (int)$split[1] ].' '.$split[2] .' '. $split[0];
}
function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;        
    return($result);
}

function format_rupiah($angka)
{
    $jadi = "Rp " . number_format((double)$angka,2,',','.');
    return $jadi;
} 
function format_harga($angka)
{
    $jadi = number_format((double)$angka,0,',','.');
    return $jadi;
}

function encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

define('CLASS_ENCRYPT', dirname(__FILE__));
include('cryptography/AES.class.php');
include('cryptography/class.hash_crypt.php');

function keypass()
{
    return md5('inv'.md5('store'));
}

function paramEncrypt($x)
{

    $first_output = '';
    $count = 0;

    $Cipher = new AES();
    $key_256bit = keypass();
    
    $n = ceil(strlen($x)/16);
    $encrypt = "";

    for ($i=0; $i<=$n-1; $i++)
    {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($x, $i*16, 16)),$key_256bit);
        $encrypt .= $cryptext;   
    }

    return $encrypt;
}

function paramDecrypt($x)
{
    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x)/32);
    $decrypt = "";

    for ($i=0; $i<=$n-1; $i++)
    {
        $result = $Cipher->decrypt(substr($x, $i*32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }

    return $decrypt;
}

function passwordEncrypt($x)
{
    $password1 = paramEncrypt($x);
    $password2 = encode($password1);

    return $password2;
    
}

function passwordDecrypt($x)
{
    $password1 = decode($x);
    $password2 = paramDecrypt($password1);

    return $password2;
}



function check_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP Tidak Dikenali';

    return $ipaddress;
}

