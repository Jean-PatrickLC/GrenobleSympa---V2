<?php  


    $nom    = $_POST['contact-nom'];
    $prenom = $_POST['contact-prenom'];
    $email  = $_POST['contact-email'];
    $comm   = $_POST['contact-commentaire'];
    $sexe = $_POST['contact-sexe'];

    
    $content = '
        <html>
            <body>
                <b style="color: red;">Votre nom : </b>'. $nom .'
                <br><br>
                <b style="color: red;">Votre prenom : </b>'. $prenom .' 
                <br><br>
                <b style="color: red;">Votre sexe : </b>'. $sexe .' 
                <br><br>
                <b style="color: red;">Votre email : </b>'. $email .'
                <br><br>
                <b style="color: red;">Votre commentaire : </b>'. $comm .' 
            </body>
        </html>
    ';

    


    if (isset($_POST['test'])) {
        echo '<pre>';
        echo htmlentities(print_r($_POST, true));
        echo '</pre>';
        exit;
    }



    require_once dirname(__FILE__).'/lib/phpmailer/src/PHPMailer.php';
    use PHPMailer\PHPMailer\PHPMailer;


    $mail = new PHPMailer();
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->SetFrom('r3w0p42@gmail.com', 'WARGNY Damien');
    $mail->addAddress('p0wer42@live.fr', 'Damien WARGNY');
    $mail->Subject = 'Envoye MAIL avec PHPMailer';
    $mail->CharSet = 'UTF-8';
    $mail->MsgHTML($content);
    
    
    if(!$mail->send()){
        print 'ERREUR : '.$mail->ErrorInfo;
    }else{
        print 'Message envoyé !!';
    }



?>