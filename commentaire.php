<?php
    $connection = new mysqli('localhost', 'root', 'root', 'register');
    mysqli_set_charset($connection, "utf8mb4");

    $current_page = $_SERVER['HTTP_REFERER'];

    $code_commentaire = NULL;

    if(isset($_POST['commentaire_jeu']))
    {
        $commentaire_jeu= filter_var(trim($_POST['commentaire_jeu']), FILTER_SANITIZE_STRING);

        switch($current_page) 
        {
            case "http://localhost/myhost-exemple/metro_exodus_page.php":
                $code_commentaire = 6446;
                break;
            case "http://localhost/myhost-exemple/dying_light_page.php":
                $code_commentaire = 2461;
                break;
            case "http://localhost/myhost-exemple/cyberpunk_page.php":
                $code_commentaire = 6592;
                break;
            case "http://localhost/myhost-exemple/hogwarz_page.php":
                $code_commentaire = 1436;
                break;
            case "http://localhost/myhost-exemple/teardown_page.php":
                $code_commentaire = 9501;
                break;
            case "http://localhost/myhost-exemple/elden_ring_page.php":
                $code_commentaire = 8812;
                break;
            case "http://localhost/myhost-exemple/dragons_dogma_2_page.php":
                $code_commentaire = 5123;
                break;
            case "http://localhost/myhost-exemple/pacific_drive_page.php":
                $code_commentaire = 4951;
                break;
        }
        $sql = new mysqli('localhost', 'root', 'root', 'register');
        $sql -> query("INSERT INTO `commentaire` (`commentaire_jeu`, `commentaire_site`, `code_commentaire`) 
        VALUES ('$commentaire_jeu', NULL, '$code_commentaire')");

        $sql -> close();
        header("Location: $current_page");
    }

    else if (isset($_POST['commentaire_site']))
    {
        $commentaire_site = filter_var(trim($_POST['commentaire_site']), FILTER_SANITIZE_STRING);

        $sql = new mysqli('localhost', 'root', 'root', 'register');
        $sql -> query("INSERT INTO `commentaire` (`commentaire_jeu`, `commentaire_site`, `code_commentaire`)
        VALUES (NULL, '$commentaire_site', NULL)");

        $sql -> close();
        header("Location: $current_page");
    }
    else if (isset($_POST['message_support']))
    {
        include 'PHPMailer-master/src/SMTP.php';
        include 'PHPMailer-master/language/phpmailer.lang-fr.php';
        include 'PHPMailer-master/src/Exception.php';
        include 'PHPMailer-master/src/PHPMailer.php';

        session_start();
        if(isset($_SESSION['user']))
        {
            $user_nom = $_SESSION['user']['nickname'];
            $user_email = $_SESSION['user']['email'];
            // echo "$user_nom $user_email";
            $message_support = filter_var(trim($_POST['message_support']), FILTER_SANITIZE_STRING);
            // echo "$message_support";
            
            // $mail = new PHPMailer();

            // $mail->isSMTP();
            // $mail->Host = 'localhost';  // adresse SMTP de serveur
            // $mail->SMTPAuth = true;
            // $mail->Username = 'your@example.com'; // Votre login
            // $mail->Password = 'your_password'; // Votre password
            // $mail->SMTPSecure = 'tls';
            // $mail->Port = 465;

            // $mail->setFrom('azikvlad6@gmail.com', 'Vladyslav');
            // $mail->addAddress('azikvlad5@gmail.com', 'Vlady');
            // $mail->Subject = 'Test Email';
            // $mail->Body = 'This is a test email sent with PHPMailer.';

            // if ($mail->send()) 
            // {
            //     echo 'Email sent successfully!';
            // } else 
            // {
            //     echo 'Error sending email: ' . $mail->ErrorInfo;
            // }
            ini_set("SMTP", "localhost");
            ini_set("smtp_port", "465");
            mail(
                "azikvlad6@gmail.com",
                "Vous avez une lettre de demande d'assistance:\n", 
                "Nickname: $user_nom\nEmail: $user_email\nMessage: $message_support",
                "From: azikvlad5@gmail.com"
            );
            // je sais pas comment faire avec le port et les données du host pour envoyer le message, sinon ce script marche bien, je suis que en L1, je sais pas comment gerer les choses comme ça, désolé
        }
    }
    $connection->close();
    // header("Location: $current_page");
    exit;
?>  