<?

class AutenticacaoHelper {

    protected $sessionHelper, $redirectorHelper, $tableName, $userColumn, $passColumn, $user, $pass, $loginController = 'index', $loginAction = 'index', $logoutController = 'index', $logoutAction = 'index';

    public function __construct() {
        $this->sessionHelper = new SessionHelper();
        $this->redirectorHelper = new RedirectorHelper();
        return $this;
    }

    public function setTableName($val) {
        $this->tableName = $val;
        return $this;
    }

    public function setUserColumn($val) {
        $this->userColumn = $val;
        return $this;
    }

    public function setPassColumn($val) {
        $this->passColumn = $val;
        return $this;
    }

    public function setUser($val) {
        $this->user = $val;
        return $this;
    }

    public function setPass($val) {
        $this->pass = $val;
        return $this;
    }

    public function setLoginControllerAction($controller, $action) {
        $this->loginController = $controller;
        $this->loginAction = $action;
        return $this;
    }

    public function setLogoutControllerAction($controller, $action) {
        $this->logoutController = $controller;
        $this->logoutAction = $action;
        return $this;
    }

    public function login() {
        $db = new Model();
        $db->_tabela = $this->tableName;
        $where = $this->userColumn . "='" . $this->user . "' and " . $this->passColumn . "='" . $this->pass . "'";
        $sql = $db->read($where, '1');

        if (count($sql) > 0) {
            $this->sessionHelper->createSession("userAuth", true)
                    ->createSession("userData", $sql[0]);
        } else {
            $this->redirectorHelper->goToControllerAction("user", "erro");
            exit;
        }

        $this->redirectorHelper->goToControllerAction($this->loginController, $this->loginAction);
        return $this;
    }

    function logout() {
        $this->sessionHelper->deleteSession("userAuth")
                ->deleteSession("userData");
        $this->redirectorHelper->goToControllerAction($this->logoutController, $this->logoutAction);
        return $this;
    }

    function checkLogin($action) {
        switch ($action) {
            case "boolean":
                if (!$this->sessionHelper->checkSession("userAuth")) {
                    return false;
                } else {
                    return true;
                }
                break;
            case "redirect":
                if (!$this->sessionHelper->checkSession("userAuth")) {
                    if ($this->redirectorHelper->getCurrentController() != $this->loginController || $this->redirectorHelper->getCurrentAction() != $this->loginAction) {
                        $this->redirectorHelper->goToControllerAction($this->loginController, $this->loginAction);
                    }
                }
                break;
            case "stop":
                if ($this->sessionHelper->checkSession("userAuth")) {
                    exit;
                }
                break;
        }
    }

    public function userData($key) {
        $s = $this->sessionHelper->selectSession("userData");
        return $s[$key];
    }

}
