<?php
$cfg['blowfish_secret'] = 'xfgokb5940mb58utcm5784tycn47ryc467rbc48vm589um5894yvm'; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */
$i = 0;
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

$i++;
$cfg['Servers'][$i]['verbose'] = 'pnamachdb';
$cfg['Servers'][$i]['host'] = 'pnamachdb.camsryrntfpk.us-east-1.rds.amazonaws.com';
$cfg['Servers'][$i]['port'] = '3306';
$cfg['Servers'][$i]['socket'] = '';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['AllowNoPassword'] = false;

$i++;
$cfg['Servers'][$i]['verbose'] = 'pbidb';
$cfg['Servers'][$i]['host'] = 'pbidb.camsryrntfpk.us-east-1.rds.amazonaws.com';
$cfg['Servers'][$i]['port'] = '3306';
$cfg['Servers'][$i]['socket'] = '';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['AllowNoPassword'] = false;
