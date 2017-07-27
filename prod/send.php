<?php

$to = 'info@mbeg.ru, mbe.spb@gmail.com';

$subject = 'Письмо с сайта mbeg.ru';

$name = $_POST['InputName'];
$phone = $_POST['InputPhone'];
$email = $_POST['InputEmail'];
$message = $_POST['InputMessage'];

$headers = array();
$headers[] = "From: Mbeg <mbeg@message.com>";
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=UTF-8";
$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/" . phpversion();

$allmsg = "<p><b>Имя:</b> $name</p>
          <p><b>Телефон:</b> $phone</p>
          <p><b>E-mail:</b> $email</p>
          <p><b>Сообщение:</b> $message</p>";
$allmsg = "<html>
          <head>
            <title>Обратная связь</title>
            <META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=UTF-8\">
          </head>
            <body>" 
              . $allmsg . 
            "</body>
          </html>";

mail($to, $subject, $allmsg, implode("\r\n", $headers))

?>