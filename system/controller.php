<?

class Controller extends System {

    protected $redir, $session;
    public $smarty;

    public function init() {

        $this->session = new SessionHelper();
        $this->redir = new RedirectorHelper();
        $this->smarty = new Smarty();


        // conf smarty
        $this->smarty->cache_dir = SMARTY_CACHE;
        $this->smarty->template_dir = TEMPLATES;
        $this->smarty->compile_dir = SMARTY_COMPILE;
        $this->smarty->caching = SMARTY_CACHE_STATUS;
        $this->smarty->cache_lifetime = SMARTY_CACHE_LIFETIME;
        //$this->smarty->testInstall();exit;

        $this->smarty->assign("ambiente", AMBIENTE);
        $this->smarty->assign("name", NAME);
        $this->smarty->assign("charSet", CHARSET);
        $this->smarty->assign("author", AUTHOR);
        $this->smarty->assign("version", VERSION);
        $this->smarty->assign("img", IMG);
        $this->smarty->assign("css", CSS);
        $this->smarty->assign("js", JS);
        $this->smarty->assign("rootUrl", ROOTURL);
        $this->smarty->assign("thisUrl", ROOTURL . $_SERVER['REQUEST_URI']);
        $this->smarty->assign("thisController", $this->_controller);
        $this->smarty->assign("thisAction", $this->_action);
        $this->smarty->assign("thisParams", $this->_params);
        $this->smarty->assign("emailContato", EMAIL_CONTATO);
        $this->smarty->assign("foneContato", FONE_CONTATO);
        $this->smarty->assign("endContato", END_CONTATO);
        $this->smarty->assign("localContato", LOCAL_CONTATO);
        //$this->smarty->assign("connection", CONNECTION);

        //Canonical
        if ($this->_controller == "index") {
            $canonical = ROOTURL . "/";
        } else {
            if ($this->_action == "index_action") {
                $canonical = ROOTURL . "/" . $this->_controller . "/";
            } else {
                if ($this->_params > array()) {
                    $canonical = ROOTURL . "/" . $this->_controller . "/" . $this->_action . "/" . $this->getExplode() . "/";
                } else {
                    $canonical = ROOTURL . "/" . $this->_controller . "/" . $this->_action . "/";
                }
            }
        }
        $this->smarty->assign("canonical", $canonical);

    }

}
