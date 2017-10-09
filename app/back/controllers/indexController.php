<?
class Index extends Controller {

	public function Index_action() {

		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('home');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." – Home");
		$this -> smarty -> assign("description", "O Studio Raquel Pagani é pioneiro no Pilates e Power Plate em Maringá. Desde 2002. Acreditamos na conscientização corporal em busca do bem-estar e alívio de dor crônica.");
		$this -> smarty -> assign("keywords", "Estudio, pilates, power plate, trx, rpg, osteopatia, “drenagem linfática”, fisioterapia, recuperação, bem estar, idosos, atletas, treinamento funcional, “Pilates aéreo”, ioga, dor crônica, fibromialgia, aeropilates, maringá, paraná, “aula de Pilates”, “Pilates solo”, “benefícios do Pilates”, “Pilates maringá”, “artrite reumatoide”, artrose, Osteopenia, osteoporose, “hérnia de disco”, “mercadinho do studio”, Detox, fortalecimento.");

		$this -> smarty -> display("home.html");
	}

}
