<?php

/*

GMAIL SETTING: 
https://accounts.google.com/DisplayUnlockCaptcha
https://www.google.com/settings/security/lesssecureapps

 */
$config['smtpprotocol'] = 'smtp';
$config['smtphost'] = 'ssl://smtp.googlemail.com';
$config['smtpport'] = 465;
$config['smtpuser'] = 'aindo.mailer@gmail.com';
$config['smtppass'] = 'aindomailer';
$config['smtpmailtype'] = 'html';
$config['smtpcharset'] = 'iso-8859-1';
$config['smtpsendto'] = 'aindo@gmail.com';