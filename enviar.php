<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'itoloko@gmail.com'; // Gmail usado para enviar
    $mail->Password   = 'alpomykqluyaytry';       // SENHA DE APP (adicione manualmente)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('itoloko@gmail.com', $_POST['nome']);
    $mail->addAddress('itoloko@gmail.com');

    $mail->isHTML(false);
    $mail->Subject = 'Nova mensagem do site';
    $mail->Body    = "Nome: {$_POST['nome']}\nEmail: {$_POST['email']}\nMensagem:\n{$_POST['mensagem']}";

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>
