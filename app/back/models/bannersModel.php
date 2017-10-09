<?

class BannersModel extends Model {

    public $_tabela = "banners";

    public function listaBanners($page) {
        return $this->read($where = "status='1' and page='{$page}'", null, null, $orderby = "`order`");
    }

}
