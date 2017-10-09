<?

class RedirectorHelper {

    protected $parametros = array();

    protected function go($data) {
        header("Location: /" . $data);
    }

    public function setUrlParameter($name, $value) {
        $this->parametros[$name] = $value;
        return $this;
    }

    protected function getUrlParameter() {
        $parms = "";
        foreach ($this->parametros as $name => $value) {
            $parms .= $name . '/' . $value . '/';
        }
        return $parms;
    }

    public function goToController($controller) {
        //$this->go($controller . '/index/' . $this->getUrlParameter());
        $this->go($controller.'/');
    }

    public function goToAction($action) {
        $this->go($this->getCurrentController() . '/' . $action . '/' . $this->getUrlParameter());
    }

    public function goToControllerAction($controller, $action) {
        $this->go($controller . '/' . $action . '/' . $this->getUrlParameter());
    }

    public function goToIndex() {
        $this->goToController('index');
    }

    public function goToUrl($url) {
        header("Location: " . $url);
    }

    public function getCurrentController() {
        global $start;
        return $start->_controller;
    }

    public function getCurrentAction() {
        global $start;
        return $start->_action;
    }

}
