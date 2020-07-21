<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php  

   //session_start();

   error_reporting(0);

ini_set(“display_errors”, 0 );



        // Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.

        include("autenvio/PHPMailerAutoload.php");

        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $municipio = $_POST["municipio"];
        $estado = $_POST["estado"];
        $mensagem = $_POST["mensagem"];



        if(!isset($email)){

                echo '<script type="text/javascript">

                window.location="index.html";

              </script>';

        }

        // Inicia a classe PHPMailer

        $mail = new PHPMailer();

        

        // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!

        $mail->IsSMTP(); // Define que a mensagem será SMTP

        $mail->Host = "mail.fpeduc.com"; // Seu endereço de host SMTP

        $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"

        $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"

        $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"

        $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"

        $mail->Username = 'vendas@fpeduc.com'; // Conta de email existente e ativa em seu domínio

        $mail->Password = 'ACd0SIXsfE'; // Senha da sua conta de email

        

        // DADOS DO REMETENTE

        $mail->Sender = "vendas@fpeduc.com"; // Conta de email existente e ativa em seu domínio

        $mail->From = "contato@institutovotorantim.org.br"; // Sua conta de email que será remetente da mensagem

        $mail->FromName = "Contato - landPage telemedicina"; // Nome da conta de email

        

        // DADOS DO DESTINATÁRIO

        // $mail->AddAddress("luciana@tewa225.com", 'Instituto Votorantim');

        // $mail->AddAddress("gabriela@tewa225.com", 'Instituto Votorantim');

        // $mail->AddAddress("contato@institutovotorantim.org.br;", 'Instituto Votorantim');

        // $mail->AddAddress("fernanda@tewa225.com", 'Instituto Votorantim');

        $mail->AddAddress("antonio.rodrigues8856@gmail.com", 'Edital Telemedicina'); // Define qual conta de email receberá a mensagem

   
        //$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
        $mail->AddAddress("contato@institutovotorantim.org.br", 'Edital Telemedicina'); 
        $mail->AddAddress("talita.andre@institutovotorantim.org.br", 'Edital Telemedicina'); 
        $mail->AddAddress("juliana.mitkiewicz@votorantim.com", 'Edital Telemedicina'); 

        // Definição de HTML/codificação

        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML

        $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

        

        // DEFINIÇÃO DA MENSAGEM

        $mail->Subject  = 'Contato - landPage telemedicina '; // Assunto da mensagem



        $mail->Body .= '    <div style="padding: 26px;display: block;font-family: Arial, Helvetica, sans-serif;">';

        $mail->Body .= 'Nome: "'.$nome.'" <br>';

        $mail->Body .= 'Email: "'.$email.'"<br> ';
        $mail->Body .= 'Estado: "'.$estado.'"<br> ';
        $mail->Body .= 'Telefone: "'.$telefone.'"<br> ';

        $mail->Body .= 'Municipio: "'.$municipio.'"<br> ';
        $mail->Body .= 'Mensagem: "'.$mensagem.'" ';

        $mail->Body .= '</div>';

        // ENVIO DO EMAIL

        $enviado = $mail->Send();

        // Limpa os destinatários e os anexos

        $mail->ClearAllRecipients();



        if($enviado){ ?>
<script type="text/javascript">
                          $(document).ready(function(){
                                swal("Contato Enviado com Sucesso em breve Respondermos", ":)", "success").then(function(result) {
                              if (result) {
                                location.href="index.html";
                              }else{
                                location.href="index.html";     
                              }
                            });
                           
                          });
                      </script>

       <?php  }



?>