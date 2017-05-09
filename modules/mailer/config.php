<?php
/**
 * mailer config file
 * @package mailer
 * @version 0.0.1
 * @upgrade true
 */

return [
    '__name' => 'mailer',
    '__version' => '0.0.1',
    '__git' => 'https://github.com/getphun/mailer',
    '__files' => [
        'modules/mailer' => [
            'install',
            'remove',
            'update'
        ],
        'theme/mailer'  => ['install', 'remove']
    ],
    '__dependencies' => [
        'core'
    ],
    '_services' => [
        'mailer' => 'Mailer\\Service\\Mailer'
    ],
    '_autoload' => [
        'classes' => [
            'Mailer\\Service\\Mailer'   => 'modules/mailer/service/Mailer.php',
            'PHPMailer'                 => 'modules/mailer/third-party/phpmailer/class.phpmailer.php',
            'PHPMailerOAuth'            => 'modules/mailer/third-party/phpmailer/class.phpmaileroauth.php',
            'PHPMailerOAuthGoogle'      => 'modules/mailer/third-party/phpmailer/class.phpmaileroauthgoogle.php',
            'POP3'                      => 'modules/mailer/third-party/phpmailer/class.pop3.php',
            'SMTP'                      => 'modules/mailer/third-party/phpmailer/class.smtp.php'
        ],
        'files' => []
    ]
];