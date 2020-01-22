<?php

# Inclui os arquivos class.phpmailer.php localizado na pasta phpmailer
require_once("phpmailer/class.phpmailer.php");
require_once("phpmailer/class.smtp.php");

# Inicia a classe de envio
$mail = new PHPMailer();

# Define os dados do servidor e tipo de conexão
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.emailsrvr.com"; # Endereço do servidor SMTP, na WebHS basta usar localhost caso a conta de email esteja na mesma máquina de onde esta a correr este código, caso contrário altere para o seu desejado ex: mail.nomedoseudominio.com
$mail->Port = 25; // Porta TCP para a conexão
$mail->SMTPAutoTLS = false; // Utiliza TLS Automaticamente se disponível
$mail->SMTPAuth = true; # Usar autenticação SMTP - Sim
$mail->Username = 'contato@icij.com.br'; # Login de e-mail
$mail->Password = 'Top$150m'; // # Password do e-mail
# Define o remetente (você)
$mail->From = $_POST["email"]; # Seu e-mail
$mail->FromName =  $_POST["nome"];
# Define os destinatário(s)
$mail->AddAddress('contato@icij.com.br', '[TC PROFESSIONAL] Turma 03'); #---alterar---/
#$mail->AddCC('contato@riocoaching.com.br', '[TC PROFESSIONAL] Turma 02'); // Copia
#$mail->AddAddress('glaucohf@gmail.com', '[TC PROFESSIONAL] Turma 02'); # Os campos podem ser substituidos por variáveis ---alterar---
#$mail->AddCC('pessoa2@dominio.com', 'Pessoa Nome 2'); # Copia
#$mail->AddBCC('pessoa3@dominio.com', 'Pessoa Nome 3'); # Cópia Oculta
# Define os dados técnicos da Mensagem
$mail->IsHTML(true); # Define que o e-mail será enviado como HTML
#$mail->CharSet = 'iso-8859-1'; # Charset da mensagem (opcional)
# Define a mensagem (Texto e Assunto)
$mail->Subject = "[TC PROFESSIONAL] Turma 03"; # Assunto da mensagem

$mail->Body = "<h2><strong>[TC PROFESSIONAL] Turma 03</h2></strong><BR><strong>Mensagem: </strong>" . $_POST['message'] . "<BR><strong>De: </strong>" . $_POST['nome'] . "<BR><strong>Telefone: </strong>" . $_POST['telefone'] . "<BR><strong>Email:</strong> " . $_POST['email']. "<BR><strong>Parametros UTM: </strong><BR>" . $_POST['utm_data'] . "<BR><strong>Mensagem do IP:</strong>" . $_POST['ip'];
$mail->AltBody = "Este é o corpo da mensagem de teste, somente Texto! \r\n :)";


# Envia o e-mail
$enviado = $mail->Send();

# Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

# Exibe uma mensagem de resultado (opcional)
if ($enviado) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Não foi possível enviar o e-mail.";
    echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}
?>
