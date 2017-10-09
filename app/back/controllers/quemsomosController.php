<?
class Quemsomos extends Controller {

	public function Index_action() {
		$banners = new BannersModel();
		$banners_lista = $banners -> listaBanners('quemsomos');

		$this -> smarty -> assign("banners", $banners_lista);

		$this -> smarty -> assign("title", NAME." – Quem Somos");
		$this -> smarty -> assign("description", "Conheça o Studio Raquel Pagani em Maringá – ambiente de 450 m², planejado para te proporcionar uma incrível experiência.");
		$this -> smarty -> assign("keywords", "Studio Raquel Pagani, desde 2002, primeiro em maringá, dor crônica, tratamento terapêutico, alívio de dor, Pilates, power plate, trx, terapias diversas, Drenagem linfática, lipo redux, acupuntura, massoterapia, rpg, osteopatia, massoterapia, shiatsu, reflexologia, bem estar, quiropraxia, seriedade, compromisso, estrutura, nova sede, 450 metros, bem estar, centro de bem estar, idosos, atletas, referência em maringá, seriedade.");
		$this -> smarty -> display("quemsomos.html");
	}

}
