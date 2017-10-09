<?

class Contato extends Controller {

    public function Index_action() {

        //$this->session->deleteSession("contato");
        if ($this->session->checkSession("contato")) {
            $this->smarty->assign("nome", $this->session->selectSessionValue("contato", "nome"));
            $this->smarty->assign("email", $this->session->selectSessionValue("contato", "email"));
            $this->smarty->assign("fone", $this->session->selectSessionValue("contato", "fone"));
            $this->smarty->assign("msg", $this->session->selectSessionValue("contato", "msg"));
        }

        $banners = new BannersModel();
        $banners_lista = $banners -> listaBanners('contato');
        $this -> smarty -> assign("banners", $banners_lista);
        $this -> smarty -> assign("title", NAME." – Contato ");
        $this -> smarty -> assign("description", "Fale conosco e tire suas todas as suas dúvidas! Studio Raquel Pagani – Desde 2002 em Maringá");
        $this -> smarty -> assign("keywords", "Fale conosco, contato, studio Raquel pagani, Pilates");
        $this->session->deleteSession("contato");
        $this->smarty->display("contato.html");
    }

    public function enviar() {
        if ($_POST) {
            try {
                //cria sessão
                $this->session->createSession("contato", $_POST);

                //salva no banco
                $contato = new ContatosModel();
                $dados = array(
                    "nome" => $_POST["nome"],
                    "email" => $_POST["email"],
                    "fone" => $_POST["fone"],
                    "msg" => $_POST["msg"],
                    "data" => date("Y-m-d H:i:s")
                );
                $insereContato = $contato->salva($dados);

                //configurações para envio de email
                $mail = new PHPMailer;
                // $mail->SMTPDebug = 1;
                $mail->Debugoutput = 'html';
                $mail->isSMTP();
                $mail->Host = SMTP;
                $mail->SMTPAuth = true;
                $mail->Username = USER;
                $mail->Password = PWD;
                $mail->SMTPSecure = 'tls';
                $mail->Port = PORTA;
                $mail->CharSet = CHARSET;
                $mail->WordWrap = 70;
                $mail->setFrom(EMAIL_CONTATO, NAME);
                $mail->addAddress(EMAIL_CONTATO);
                $mail->addReplyTo($dados['email'], $dados['nome']);
                // $mail->addBCC(CCO); //copia oculta para programador
                $mail->isHTML(true);
                $mail->Subject = "Contato - ". NAME;
                $mail->Body="<div style=\"max-width:600px;\">
                             <img width=\"180\" height=\"180\" src=\"". IMG ."apple-touch-icon.png\" alt=\"". NAME ."\">
                             <h3 style=\"font-family: sans-serif; color:#4d4d4d; margin:0;\">". NAME ."</h3>
                             <p>Nome: <b style=\"color:#31c1cd; font-family: sans-serif; font-size:14px;\">".$dados['nome']."</b></p>
                             <p>E-mail: <b style=\"color:#31c1cd; font-family: sans-serif; font-size:14px;\">".$dados['email']."</b></p>
                             <p>Telefone: <b style=\"color:#31c1cd; font-family: sans-serif; font-size:14px;\">".$dados['fone']."</b></p>
                             <p>Mensagem:</p>
                             <p style=\"color:#31c1cd; font-family: sans-serif; font-size:14px;\">".$dados['msg']."</p>
                             </div>";
                $mail->AltBody = "Contato através do site ". NAME ."\n Nome: ".$dados['nome']."\n E-mail: ".$dados['email']."\n Telefone: ".$dados['fone']."\n Mensagem:".$dados['msg'];
                // print_r($mail);exit;

                if(!$mail->send()) {
                  $dados = array(
                      "type" => "error",
                      "msg" => "A mensagem não pôde ser enviada - Erro: $mail->ErrorInfo",
                      "data" => date("Y/m/d Hu:i:s")
                  );
                } else {
                  $dados = array(
                      "type" => "success",
                      "msg" => "A mensagem foi enviada com sucesso!",
                      "data" => date("Y/m/d Hu:i:s")
                  );
                }
                $this->session->createSession("alert", $dados);

            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        $this->redir->goToController("contato");
    }

}
