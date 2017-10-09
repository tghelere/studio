<?

class SessionHelper {

    public function createSession($name, $value) {
        $_SESSION[$name] = $value;
        return $this;
    }

    public function selectSession($name) {
        return $_SESSION[$name];
        return $this;
    }

    public function selectSessionValue($session, $value) {
        return $_SESSION[$session][$value];
        return $this;
    }

    public function deleteSession($name) {
        unset($_SESSION[$name]);
        return $this;
    }

    public function checkSession($name) {
        return isset($_SESSION[$name]);
    }
    public function incrementSession($nome, $dados) {
        array_push($_SESSION[$nome], $dados);       
        return $this;
    }

    public function existSession() {
        if (isset($_SESSION["userAuth"])) {
            return $_SESSION["userAuth"];
        } else {
            return 0;
        }
    }

}
