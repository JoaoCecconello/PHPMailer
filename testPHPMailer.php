<?php   
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$time_start = microtime(true);

echo "inicio do código </br>";

$mail = new PHPMailer(true);

// Define que a mensagem será SMTP
$mail->IsSMTP();

// Host do servidor SMTP externo, como o SendGrid.
$mail->Host = "smtp.umbler.com";

$mail->Port = 587;

// Autenticação | True
$mail->SMTPAuth = true;

// Usuário do servidor SMTP
$mail->Username = 'joao.cecconello@umbler.com';

// Senha da caixa postal utilizada
$mail->Password = 'schN3ph1l@';

$mail->From = "joao.cecconello@umbler.com";
$mail->FromName = "Teste";
$mail->AddAddress('jvcecconello@gmail.com', 'João');

// Define que o e-mail será enviado como HTML | True
$mail->IsHTML(true);

// Assunto da mensagem
$mail->Subject = "Mensagem Teste";

// Conteúdo no corpo da mensagem
$mail->Body = 'Conteudo da mensagem';

// Conteúdo no corpo da mensagem(texto plano)
$mail->AltBody = 'Conteudo da mensagem em texto plano';

//Envio da Mensagem
$enviado = $mail->Send();

$mail->ClearAllRecipients();

if ($enviado) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    echo "fim do código = ".$time."</br>";
    
    
    echo "E-mail enviado com sucesso!"."</br>";;
} else {
  echo "Não foi possível enviar o e-mail.";
  echo "Motivo do erro: " . $mail->ErrorInfo;
}
?>

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}