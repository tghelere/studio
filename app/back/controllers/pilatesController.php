<?
class Pilates extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('pilates');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." – Pilates desde 2002");
		$this -> smarty -> assign("description", "“Seu corpo é seu maior bem, ele guarda e reflete sua alma. Cuide dele como se fosse uma pedra preciosa e nós o lapidaremos” Joseph Pilates");
		$this -> smarty -> assign("keywords", "“Pilates solo”, “Pilates aéreo”, aeropilates, “mat Pilates”, joseph Pilates, ioga, “Pilates para adolescentes”, “Pilates para gestantes”, “Pilates para idosos”, “power house”, equilíbrio, artrite, artrose, “dor lombar”, fortalecimento, “reeducação postural”, “alívio do stress”, “dor nas costas”, “dor na coluna”, Pilates ");
		$this -> smarty -> display("pilates.html");
	}

}
