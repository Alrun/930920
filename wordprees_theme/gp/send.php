<?php

$message = '<p><b>Письмо от: </b> '. $_POST['InputName'] .'</p>
            <p><b>Компания: </b>' . $_POST['InputCompany'] . '</p>
            <p><b>Должность: </b>' . $_POST['InputJob'] . '</p>
            <p><b>Телефон: </b>' . $_POST['InputPhone'] . '</p>
            <p><b>E-mail: </b>' . $_POST['InputEmail'] . '</p>
            <p><b>Текст письма: </b>' . $_POST['InputText'] . '</p>';

require "PHPMailer-master/PHPMailerAutoload.php";

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->setLanguage('ru');
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'www.930920.ru@yandex.ru';                 // SMTP username
$mail->Password = '318717i';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('www.930920.ru@yandex.ru', '930920');
$mail->addAddress('930920.yar@gmail.com', 'Получателю'); //930920.yar@gmail.com Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('www.930920.ru@yandex.ru', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'New message 930920.ru';
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}