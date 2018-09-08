<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$zip = new ZipArchive;
$res = $zip->open('pna.webdevelopmentcompanyinlucknow.website.zip');
if ($res === TRUE) {
  $zip->extractTo('/myzips/extract_path/');
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}
?>