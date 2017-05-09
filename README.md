# mailer

Adalah service yang menyediakan layakan pengiriman email. Modul ini membutuhkan
tambahakan konfigurasi pada level aplikasi dengan nama `mailer` yang berisi informasi
koneksi email provider untuk pengiriman email. Contoh konfigurasi tersebut adalah
sebagai berikut:

```php
// ./etc/config.php

return [
    'name' => 'Phun',
    ...
    'mailer' => [
        'SMTP'          => true,
        'Host'          => 'smtp.gmail.com',
        'SMTPAuth'      => true,
        'Username'      => 'mail@gmail.com',
        'Password'      => 'Secret',
        'SMTPSecure'    => 'tls',
        'Port'          => 587,
        'FromEmail'     => 'mail@gmail.com',
        'FromName'      => 'Sender Name'
    ]
];
```

Dan untuk mengirim email, bisa dilakukan dari controller dengan perintah seperti
di bawah:

```php
// ./modules/[module]/controller/[Some]controller.php

...
public function indexAction(){
    
    $params = [
        'to' => [
            [ 
                'email' => 'email@address.com',
                'name' => 'Some Name'
            ]
        ],
        'subject' => 'Welcome home',
        'param_1' => 'Lorem',
        'param_2' => 'Ipsum'
    ];
    
    if(false === $this->mailer->send('welcome', $params))
        $error = $this->mailer->getError();
}
...
```

Perintah `$this->mailer->send` menerima 2 parameter, yang pertama adalah view yang
menggenerasi HTML dan berlokasi di `./theme/mailer/[viewname].phtml`, sementara
parameter kedua adalah parameter yang akan dikirim ke view.