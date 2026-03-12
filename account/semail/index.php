<?php

//include "classes/class.phpmailer.php"; // include the class name
include "src/Exception.php"; // include the class name
include "src/PHPMailer.php"; // include the class name
include "src/SMTP.php"; // include the class name


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"])) {


    // variable generate
    $email = $_POST['email'];
    $email_bcc = $_POST['email_bcc'];
    $name = $_POST['name'];
    $domain_name = $_POST['domain_name'];
    $server_ip = $_POST['server_ip'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $name_server_1 = $_POST['name_server_1'];
    $name_server_2 = $_POST['name_server_2'];
    $name_server_ip_1 = $_POST['name_server_ip_1'];
    $name_server_ip_2 = $_POST['name_server_ip_2'];
    // generate the message
    $message = 'Dear Mr./Mrs. ' . $name . ',<br><br>
        
        Welcome to Technobd and we do appreciate you for your business with us.<br>
        This email contains important information regarding your recently purchased hosting service.<br>
        Please read this email carefully and save it for future reference.<br><br>
        
        Account Details <br>
        ===============<br>
        Domain Name : ' . $domain_name . '<br>
        Hosting Paltform: Linux<br><br>

        Your Online Control Panel: http://www.' . $domain_name . '/cpanel or http://' . $server_ip . '/cpanel<br>
        User Name: ' . $user_name . '<br>
        Password: ' . $password . '<br>
        (Change your password at your first login)<br><br>

        FTP Server: ftp.' . $domain_name . ' or ' . $server_ip . '<br>
        User Name: ' . $user_name . '<br>
        Password: ' . $password . '<br><br>

        ** You should upload all your web page files to "public_html" folder.<br><br>

        Webmail: http://www.' . $domain_name . '/webmail<br>
        POP Server: mail.' . $domain_name . ' Port:110<br>
        SMTP Server: mail.' . $domain_name . ' Port: 25 & 26 both (you can use any one). <br>
        Please enable the option "my server require authintication".<br><br>

        Nameserver:<br>
        ' . $name_server_1 . ' ' . $name_server_ip_1 . '<br>
        ' . $name_server_2 . ' ' . $name_server_ip_2 . '<br><br>

        *** Note: Please change you domain`s nameserver to our`s. if you have not registered the domain with us with the purchase of this this hosting service, we will set the proper nameserver. Yet we insist you to check and confirm you have the proper nameserver assigned to your domain. <br> 
        If you just registered your domain or changed your nameserver, your domain may require 8-72 hours to get propagated.<br><br>

        Support<br>
        =======<br>
        Please send email to support@technobd.com for any kind of support requirement.<br>
        As this is a technical service, you must need to provide all details regarding your problem by sending email. Technobd support department will respond you ASAP. It normally takes 2-6 hours during working hours in working days and up to 72 hours during holidays. <br><br>

        Phone Support: +88.01714299219 [9:00 am - 6:00 pm in working days]
        Please note that phone support is available during office hour only. Due to nature of the problem solving process, most cases problem cannot be solved over phone. We recommend to send email to support@technobd.com mentioning all details of your problem.<br><br>

        Contact Details:<br>
        =======================<br>
        Technobd Web Solutions Limited<br>
        46 Kazi Nazrul Islam Avenue (4th Floor) Karwan Bazar, Dhaka - 1215<br>
        Phone: 9126385, 8142040, +04478777911-3, +01715317527<br>
        Email: info@technobd.com<br>
        Web: http://www.technobd.com<br><br>

        Once again please receive our sincere thanks for your faith on Technobd services.<br>
        Please do not hesitate to contact with us if you have any inquiries.<br>
        And of course any kind of suggestion or recommendation highly expected.<br><br>


        Happy Hosting!<br>
        Technobd support Team<br>';


//    $mail = new PHPMailer; // call the class
//    $mail->SMTPOptions = array(
//        'ssl' => array(
//            'verify_peer' => false,
//            'verify_peer_name' => false,
//            'allow_self_signed' => true
//        )
//    );
//    $mail->isSMTP(); //smtp email
//    // smtp configuration
//    $mail->Host = 'smtp.bitm.org.bd';
//    $mail->Port = 25; //Port of the SMTP like to be 25, 80, 465 or 587
//    $mail->SMTPAuth = true; //Whether to use SMTP authentication
//    $mail->Username = 'smtpcheck@bitm.org.bd';
//    $mail->Password = 'igohA]S90pD~';
//    $mail->SetFrom("smtpcheck@bitm.org.bd", "technobd"); //From address of the mail
//    // end configuration
//
//    $mail->Subject = "It is smtp test mail"; //Subject od your mail
//    $mail->AddAddress($email); //To address who will receive this email
//    $mail->AddBCC($email_bcc); //Adds a "Bcc" address
//    $mail->MsgHTML($message); //Put your body of the message you can place html code here
//    $send = $mail->Send(); //Send the mails
//    if ($send) {
//        echo 'Mail sent successfully';
//    } else {
//        echo 'Mail error: ' . $mail->ErrorInfo;
//    }

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'support.technobd.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'support@support.technobd.com';                 // SMTP username
        $mail->Password = 'E7@9)!9XrxD@';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('support@support.technobd.com', 'Technobd');
        $mail->addAddress($email);     // Add a recipient
        $mail->addBCC($email_bcc);
      
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Hosting account details for '.$domain_name;
        $mail->Body = $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    die();
}
?>

<form action="" method="post">
    <label for="email">Customer E-mail Address</label>
    <input type="text" name="email" value="">
    <br>
    <label for="email">BCC E-mail Address</label>
    <input type="text" name="email_bcc" value="sales@technobd.com">
    <br>
    <label for="Name">Name</label>
    <input type="text" name="name" value="">
    <br>
    <label for="Domain Name">Domain Name</label>
    <input type="text" name="domain_name" value="">
    <br>
    <label>Server IP</label>
    <input type="text" name="server_ip" value="67.225.164.70">
    <br>
    <label>User Name</label>
    <input type="text" name="user_name" value="">
    <br>
    <label>Password</label>
    <input type="text" name="password" value="">
    <br>
    <label>Name Server 1</label>
    <input type="text" name="name_server_1" value="ns1.technobd.com">
    <br>
    <label>Name Server 2</label>
    <input type="text" name="name_server_2" value="ns2.techonbd.com">
    <br>
    <label>Name Server IP 1</label>
    <input type="text" name="name_server_ip_1" value="67.225.164.70">

    <br>
    <label>Name Server IP 2</label>
    <input type="text" name="name_server_ip_2" value="67.225.164.70">

    <br>
    <input type="submit" name="submit" value="Send Mail">
</form>