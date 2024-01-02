<?php
namespace App\Helper;

use App\Models\EmailConfigration;

class MailHelper{

  public static function setMailConfig(){
    $emailConfig = EmailConfigration::first();

    $config = [
        'transport' => 'smtp',
        'url' => env('MAIL_URL'),
        'host' => $emailConfig->host,
        'port' => $emailConfig->port,
        'encryption' => $emailConfig->encription,
        'username' => $emailConfig->username,
        'password' => $emailConfig->password,
        'timeout' => null,
        'local_domain' => env('MAIL_EHLO_DOMAIN'),
    ];

    config(['mail.mailers.smtp' => $config]);
    config(['mail.from.address' => $emailConfig->email]);
  }
}
