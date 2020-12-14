<?php

namespace FUTAPP\app\helpers;

use Exception;
use FUTAPP\app\entity\Partido;
use FUTAPP\app\repository\PartidoRepository;
use FUTAPP\core\App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Emails
{

    const CORREOSMTP ='smtp.gmail.com';
    const USERNAME ='notificacionesfutapp@gmail.com';
    const PASSUSERNAME = 'futapp123';

    private PHPMailer $server;

    private string $author;
    private Partido $partido;

    /**
     * Emails constructor.
     * @param Partido $partido
     * @param string $author
     */
    public function __construct(Partido $partido, string $author)
    {
        $this->partido = $partido;
        $this->author = $author;
        $this->server = new PHPMailer(true);
    }


    public function send()
    {

        try {
            //Server settings
            $this->server->isSMTP();                                            // Send using SMTP
            $this->server->Host       = self::CORREOSMTP;                   // Set the SMTP server to send through
            $this->server->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->server->Username   = self::USERNAME;                     // SMTP username
            $this->server->Password   = self::PASSUSERNAME;                               // SMTP password
            $this->server->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->server->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->server->setFrom(self::USERNAME, 'Admin-'.$this->author);
            $this->server->addAddress(App::getRepository(PartidoRepository::class)->getArbitro($this->partido)->getEmail());     // Add a recipient
            $this->server->addAddress(App::getRepository(PartidoRepository::class)->getEquipoLocal($this->partido)->getCorreo());
            $this->server->addAddress(App::getRepository(PartidoRepository::class)->getEquipoVisitante($this->partido)->getCorreo());


            $partido = $this->partido;
            $this->server->isHTML(true);                                  // Set email format to HTML
            $this->server->Subject = 'Notificacion de partido';
            $this->server->Body    = $this->body();

            $this->server->send();
            App::get('router')->redirect('add-partido');
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$this->server->ErrorInfo}";
        }
    }

    public function body():string{
        $nombrelocal= App::getRepository(PartidoRepository::class)->getEquipoLocal($this->partido)->getNombre();
        $nombrevisitante = App::getRepository(PartidoRepository::class)->getEquipoVisitante($this->partido)->getNombre();
        $arbitro = App::getRepository(PartidoRepository::class)->getArbitro($this->partido)->getNombre().' '.App::getRepository(PartidoRepository::class)->getArbitro($this->partido)->getApellidos();
        $fecha =$this->partido->getFecha();
        $hora =$this->partido->getHoraCompleta();
        $direccion = $this->partido->getDireccionEncuentro();

        $body ="<h1 style='align-content: center;'><b>Designación de partido</b></h1>
                <p><span><b>Equipo Local: </b></span><span>$nombrelocal</span> </p>
                <p><span><b>Equipo Visitante: </b></span><span>$nombrevisitante</span> </p>
                <p><span><b>Arbitro: </b></span><span>$arbitro</span></p>
                <p><span><b>Fecha: </b></span><span>$fecha</span></p>
                <p><span><b>Hora: </b></span><span>$hora</span></p>
                <p><span><b>Direccion: </b></span><span>$direccion</span></p>
        ";
        return $body;
    }

}