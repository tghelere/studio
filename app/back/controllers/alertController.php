<?

class Alert extends Controller {
    public function Index_action() {
      if ($this->session->checkSession("alert")) {
        echo json_encode($this->session->selectSession("alert"));
        $this->session->deleteSession("alert");
      }
    }
  }
