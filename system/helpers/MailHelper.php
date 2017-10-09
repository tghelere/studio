<?

class MailHelper {

    protected $mailer;

    public function __construct() {
        $this->$mailer = new PHPMailer();
        return $this;
    }

    public function envia($conteudo) {
        $this->$mailer->IsSMTP();
        $this->$mailer->SMTPAuth = TRUE;
        $this->$mailer->SMTPSecure = "tls";
        $this->$mailer->Port = SMTP_PORTA;
        $this->$mailer->Host = SMTP_HOST;
        $this->$mailer->Username = SMTP_USER;
        $this->$mailer->Password = SMTP_PWD;
        $this->$mailer->SetFrom("thyagoghelere@gmail.com", "Eventualizando");

        $this->$mailer->CharSet = "UTF-8";
        $this->$mailer->AddAddress("ghelere@outlook.com", "Ghelere");
        $this->$mailer->AddBCC("thyagoghelere@hotmail.com");
        $this->$mailer->Subject = SLOGAN;
        $this->$mailer->MsgHTML($conteudo);
        return $this;
    }

}
