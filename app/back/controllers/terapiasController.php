<?
class Terapias extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('terapias');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." – Terapias");
		$this -> smarty -> assign("description", "Se dê esse presente! Conheça nossas terapias diversas que podem te auxiliar – acupuntura, RPG, massoterapia, lipo redux e mais.");
		$this -> smarty -> assign("keywords", "Drenagem linfática, lipo redux, acupuntura, massoterapia, rpg, osteopatia, massoterapia, shiatsu, reflexologia, bem estar, quiropraxia");
		$this -> smarty -> display("terapias.html");
	}

}
