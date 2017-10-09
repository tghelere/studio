<?
class Trx extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('trx');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." – TRX® – Treinamento em Suspensão");
		$this -> smarty -> assign("description", "Conheça o TRX, exercício funcional de alta performance");
		$this -> smarty -> assign("keywords", "TRX, Suspension training, treino em suspensão, força, equilíbrio estabilidade, core, peso corporal, rip Training condicionamento físico, exercício, famosos, resistência, treino funcional");
		$this -> smarty -> display("trx.html");
	}

}
