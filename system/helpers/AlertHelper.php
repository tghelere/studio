<?

class AlertHelper {

    protected $alert, $sessionHelper, $redirectorHelper;
    private $dados, $tag;

    public function __construct() {
        $this->sessionHelper = new SessionHelper();
        $this->redirectorHelper = new RedirectorHelper();
        return $this;
    }

    public function setAlert($type, $msg) {

        $this->dados = array(
            "type" => $type,
            "msg" => $msg,
            "data" => date("d/m/Y H:i:s")
        );
        return $this->dados;
    }

    public function getAlert() {
        return $this->alert;
    }

    public function generateAlert($type, $msg) {
        //verifica e cria sessão
        //$this->alert = $this->setAlert($type, $msg);        
        $this->tag = "alert";
        if ($this->sessionHelper->checkSession($this->tag)) {
            $this->dados["alert"] = ["type" => $type, "msg" => $msg, "data" => date("d/m/Y H:i:s")];
            $this->sessionHelper->incrementSession($this->tag, $this->dados);
        } else {
            $this->dados = array("type" => $type, "msg" => $msg, "data" => date("d/m/Y H:i:s"));
            $this->sessionHelper->createSession($this->tag, $this->dados);
        }
        //$this->redirectorHelper->goToController("index");

        return $this->sessionHelper->selectSession($this->tag);
    }

}
