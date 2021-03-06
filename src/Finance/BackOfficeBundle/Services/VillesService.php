<?php
namespace Finance\BackOfficeBundle\Services;


class VillesService {
	
	
	private static $villes_brutes =  array("Tunis","Sfax","Sousse","Ettadhamen-Mnihla","Kairouan","Gabès","Bizerte","Ariana","Gafsa","El Mourouj","Sidi Hassine","La Marsa","Kasserine","Douar Hicher","Ben Arous","Mohamedia","Fouchana","Monastir","Zarzis","Le Bardo","Djerba","Houmt Souk","Hammamet","Médenine","Tataouine","Le Kram","Ben Gardane","Béja","Nabeul","M'saken","Raoued","Djerba","Midoun","La Soukra","Moknine","Oued Ellil","Kalâa Kebira","Mahdia","Le Kef","Sakiet Ezzit","Radès","Jendouba","Kélibia","Jemmal","Sakiet Eddaïer","Ksar Hellal","Sidi Bouzid","Hammam Lif","El Aïn","Métlaoui","Gremda","Dar Chaâbane","El Hamma","Korba","Hammam Sousse","Menzel Temime","Tozeur","Ezzahra","Mateur","Téboulba","El Ksar","Soliman","La Goulette","Bou Mhel el-Bassatine","Douz","La Manouba","Thyna","Mornag","Ksour Essef","Redeyef","Ras Jebel","Kalâa Seghira","Hammam Chott","Djedeida","Den Den","Moularès","Siliana","Fériana","Tebourba","Djerba","Ajim","Mégrine","Chihia","Ghannouch","Akouda","Nefta","Medjez el-Bab","Sbeïtla","Takelsa","Bou Salem","Chebba","Ghardimaou","El Fahs","Grombalia","Ouerdanine","Kébili","Menzel Jemil","El Jem","Souk Lahad","Tajerouine","Tinja","Béni Khiar","El Alia","Menzel Abderrahmane","Zaghouan","Zéramdine","Carthage","Menzel Bouzelfa","Tabarka","Kalâat el-Andalous","Sahline Moôtmar","Mahrès","Kerkennah","Chenini Nahal","Dahmani","Thala","Meknassy","Bekalta","El Guettar","Bembla","Mornaguia","Makthar","Testour","Sayada","Menzel Bourguiba","Béni Khalled","Mdhila","Bou Arada","Bennane","Bodheur","Sers","Ezzouhour","Kondar","Ghomrassen","Jérissa","Téboursouk","Mareth","Zaouiet Sousse","Ksibet el-Médiouni","Bou Argoub","Menzel Ennour","Enfida","Menzel Hayet","Métouia","Raf Raf","Khniss","Hajeb El Ayoun","Agareb","Gaâfour","El Haouaria","Oudhref","Sidi Bou Ali","Zriba","Sened","Rejiche","Sidi Thabet","Aïn Draham","Ksibet Thrayet","Bouficha","Skhira","Oueslatia","Messaadine","Bir Lahmar","Haffouz","Beni Hassen","Regueb","Menzel Kamel","El Krib","Hammam Ghezèze","El Maâgoula","Tazarka","Degache","Sidi Ali Ben Aoun","Metline","Zaouiet Djedidi","Bir Mcherga","El Golâa","Sbikha","Amiret Hajjaj","Khalidia","Sidi Ameur","Sidi Alouane","Nouvelle Matmata","El Maâmoura","Jebiniana","El Bradâa","Melloulèche","Hergla","Somâa","El Hencha","El Hamma du Jérid","Sakiet Sidi Youssef","Kerker","Jemna","Mezzouna","Nefza","Touza","Bou Hajla","Sbiba","Chorbane","Thélepte","El Batan","Foussana","Zaouiet Kontoch","Menzel Bouzaiane","Bir El Hafey","Borj El Amri","Lamta","Jilma","El Ksour","Zarat","Ouled Chamekh","Nasrallah","Kalaat Senan","Nadhour","Ghar El Melh","Majel Bel Abbès","Azmour","Amiret Touazra","Amdoun","Bouhjar","Menzel Horr","Sidi Bou Saïd","Sejnane","Bir Salah","Essouassi","Remada","El Ghnada","Bargou","Amiret El Fhoul","Bir Ali Ben Khalifa","Rouhia","Dar Allouch","Cherahil","Bou Merdes","Jedelienne","Sidi Bennour","Aousja","Dehiba","El Masdour","Djebel Oust","Goubellat","Sidi Bou Rouis","Korbous","El Mida","Nebeur","Menzel Mehiri","Hebira","Haïdra","Beni Khedache","Sidi El Hani","Menzel Fersi","Touiref","Kalâat Khasba","El Alâa","El Aroussa","Graïba","Cebbala Ouled Asker","Chebika","Kesra","Fernana","Menzel Salem","Oued Meliz","Tamerza","Ouled Haffouz","Matmata","Aïn Djeloula","Echrarda","Beni M'Tir") ;
	
	public function getVilles()
	{
		$villes = array();
		foreach (self::$villes_brutes as $key => $value)
		{
			$villes[$value] = $value ;
		}
		
		return $villes;
	}

}
