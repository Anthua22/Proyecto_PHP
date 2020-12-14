<?php



class Emails
{
    private string $to;

    private PHPMailer\PHPMailer\PHPMailer $server;

    /**
     * Emails constructor.
     * @param string $to
     * @param string $title
     */
    public function __construct(string $to)
    {
        $this->to = $to;
        $this->server = new PHPMailer\PHPMailer\PHPMailer(true);
    }
    public function send()
    {

// Instantiation and passing `true` enables exceptions

        try {
            //Server settings
            $this->server->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $this->server->isSMTP();                                            // Send using SMTP
            $this->server->Host       = 'smtp@gmail.com';                    // Set the SMTP server to send through
            $this->server->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->server->Username   ='anthonyemmanuel.ubillus@iesdoctorbalmis.com' ;                     // SMTP username
            $this->server->Password   = 'tonyecu1499';                               // SMTP password
            $this->server->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->server->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->server->setFrom('notificaciones@futapp.com', 'Admin');
            $this->server->addAddress($this->to);     // Add a recipient
         //   $this->server->addAddress('ellen@example.com');               // Name is optional

            // Content
            $this->server->isHTML(true);                                  // Set email format to HTML
            $this->server->Subject = 'Notificación de partido';
            $this->server->Body    = 'This is the HTML message body <b>in bold!</b>';
            $this->server->AltBody = 'This is the body in plain text for non-HTML this->server clients';

            $this->server->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->server->ErrorInfo}";
        }
    }

}