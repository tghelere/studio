<?
class Powerplate extends Controller {

	public function Index_action() {

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('powerplate');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." – Power Plate");
		$this -> smarty -> assign("description", "Saiba mais sobre o Power Plante e seus benefícios como o fortalecimento ósseo e prevenção de osteoporose.");
		$this -> smarty -> assign("keywords", "Power Plate, fortalecimento ósseo, Osteopenia, osteoporose, reduz celulite, força, resistência, circulação sanguínea, previne osteoporose, idosos, atletas, adultos, adolescentes, plataforma vibratória");
		$this -> smarty -> display("powerplate.html");
	}

}
