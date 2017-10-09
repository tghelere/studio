<?

class ContatosModel extends Model {

    public $_tabela = "contato";

    public function salva($dados) {
        $id = $this->insert($dados);
        return $id;
    }

}
