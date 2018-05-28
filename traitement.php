<?php 
	//fonction de nettoyage des accents
	function skip_accents( $str, $charset='utf-8' ) {

		$str = htmlentities( $str, ENT_NOQUOTES, $charset );

		$str = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );
		$str = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $str );
		$str = preg_replace( '#&[^;]+;#', '', $str );

		return $str;
	}

	// Récupération du json en ligne
	$json = file_get_contents("http://data.metromobilite.fr/api/findType/json?types=lieux");

	// Décodage du fichier
	$parsed_json = json_decode($json);


	// Tableau de valeur non souhaiter
	$blackList = array(
		"MAIRIE", "CLINIQUE", "COLLEGE", "EREA LA BATIE", "METROVELO", "ZAC","ZI", "Z.I", "LYCEE", "PISCINE", "LIDDL", "HOPITAL", "HÔPITAL ", "ZA","STADE", "GYMNASE", "CRÉMATORIUM", "SDA AQUAPOLE", "ÉCOLE", "AGENCE", "CENTRE DE CONGRÈS EUROPOLE", "CENTRE DE SANTÉ", "CENTRE D'ÉTUDES","HOTEL", "INPG", "IUFM", "INSTITUT DE GÉOGRAPHIE ALPINE","LA BELLE ELECTRIQUE", "LA METRO","LE SUMMUM", "PATINOIRE", "PRÉFECTURE","RECTORAT", "POMPES FUNÈBRES", "ZONE ARTISANALE","AERODROME", "AIRE D'ATTERRISSAGE ","ZIRST INOVALLEE", "ZONE", "DOM. UNIV.", "UNIV", "INSTITUT D'ÉTUDES POLITIQUES", "CENTRE COMMERCIAL","CASERNE MILITAIRE","CITÉLIB BY HA:MO"
	);


	// TRAITEMENT du json complet
	foreach ($parsed_json->{"features"} as $value) {
		
		// Chaine de caractère à vérifier
		$libelle = $value->{"properties"}->{"LIBELLE"};


		// Vérification si le texte de la $blackList n'ai pas dans le $libelle
		$bool = true;
		for ($i=0; $i < count($blackList); $i++) { 
			if (stristr($libelle, $blackList[$i])) {
				$bool = false;
			}
		}
		
		// Création du tableau avec les données souhaiter
		if ($bool) {
			$result[skip_accents($value->{"properties"}->{"LIBELLE"})] = array(
				$value->{"properties"}->{"LIBELLE"},
				$value->{"geometry"}->{"coordinates"}[0],
				$value->{"geometry"}->{"coordinates"}[1]
			);
		}
	}
	//tri du tableau selon les clés
	ksort($result);

	/* print '<pre>';
	print_r($result); 
	print '</pre>'; */

	// // Encodage de $result en json
	// $jsonphp = json_encode($result);

	// print($jsonphp);
?>