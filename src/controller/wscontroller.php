<?php

class wscontroller {
	protected $model		= 'wsmodeldefault';
	protected $view			= 'page.default.php';
	protected $page			= 'page';
	protected $modelname;
	protected $deconnexion  = 'connexion';
	public	  $data			= array();
	public	  $wscontext;
    /**
        Constructeur
    **/
	protected function wscontroller($wscontext = false) {
		//context
		$this->wscontext = $wscontext;
	}

	public function prepareData() {

		if (strpos($_SERVER['REQUEST_URI'], "/?Deconnect"))
		{
			$this->wscontext->unregister('wsuser');
			$this->data['wsuser'] = "";
			//echo "<br />Deconnect";
		}
	}

	public function getData() {
	
		// on instancie le modèle
		$modelname = $this->modelname;
		$this->model = new $modelname($this->view);
		$this->data = $this->model->getData();
		
		//post
		$this->data['POST'] = $this->wscontext->getPost();
		print_r($this->data['POST']);
		//print_r($this->data);
	
		// session user 
		$this->data['wsuser'] = "";
		if ($this->wscontext->isregistered('wsuser') && !strpos($_SERVER['REQUEST_URI'], "/?Deconnect"))
		{

			$this->data['wsuser'] = $this->wscontext->get('wsuser');
			//echo "<br />SESSION<br />";	

		}
		elseif($this->wscontext->getGet('IdM') != "")
		{
			//CONTROEL INJECTION SQL $this->wscontext->getGet('IdM')
			$query = "SELECT * FROM member WHERE id_md5 ='".mysql_real_escape_string($this->wscontext->getGet('IdM'))."'";
			$this->model->executequery($query,'wsuser');

			$users = $this->model->getData('wsuser');
			
			if (is_array($users)){
				$user = (is_array($users[0])) ? $users[0] : $users;
				$this->data['wsuser'] = $user;
				//echo "<br />BASE DE DONNEE<br />";				
				$this->wscontext->register('wsuser');
				$this->wscontext->set('wsuser', $user);
			
			}
			else
			{
				//PAS DE MEMBRE EN BASE CORRESPONDANT à IdM
			}

		}

		return $this->data;

	}

	public function addData() {

	}
	public function isCacheable (){
		return true;
	}

	public function setView($view){
		if (!strpos($_SERVER['REQUEST_URI'], "/?Deconnect"))
			$this->view = $view;
		else
			$this->view = $this->deconnexion;
	}

	public function getView(){
		if ($this->getTpl()){
			$file = TPL.$this->page.'.php';
			if (!file_exists($file)) $file = WS_TPL.$this->page.'.php';
			if (!file_exists($file)) return false;
			//echo "<br />FILE : ";print_r($this->file);echo "<br />";
			require_once($file);
		}
	}

	public function getTpl(){
		$this->tpl = PAGES.$this->view.'.php';
		if (!file_exists($this->tpl)) $this->tpl = WS_PAGES.$this->view.'.php';
		$this->front = 'default';
		if (!file_exists($this->tpl)) $this->tpl = PAGES.'default.php';
		if (!file_exists($this->tpl)) $this->tpl = WS_PAGES.'default.php';
		if (!file_exists($this->tpl)) return false;
		//echo "<br />TPL : ";print_r($this->tpl);echo "<br />";
		return true;
	}

	public function isBlocs($place){
		//echo "<br />DATA : ";print_r($this->data);echo "<br />";
		if (isset($this->data['front'][$place]) && !empty($this->data['front'][$place]))
			return true;
		return false;
	}

	public function getBlocs($place){
		//echo "<br />DATA : ";print_r($this->data);echo "<br />";
		if (isset($this->data['front'][$place]))
			foreach($this->data['front'][$place] as $key => $bloc){
				$this->bloc['id'] = $key; //echo $key;
				$this->bloc['params'] = $bloc;
				$this->getBloc();
				unset($this->bloc);
			}
	}

	public function getBloc(){
		$file = BLOCS.'ws'.$this->bloc['id'].'.php';
		if (!file_exists($file))
			$file = WS_BLOCS.$this->bloc['id'].'.php';
		if (!file_exists($file))
			$file = TPL.'ws'.'bloc.php';
		if (!file_exists($file))
			$file = WS_TPL.'bloc.php';
		//echo "<br />BLOC FILE : ".$file."<br />";
		include($file);
	}

	public function getElements ($elements){
		$this->elements = $elements;
		if (!empty($elements))
		foreach($elements as $elt){
			if (!isset($elt['element_parent']) || $elt['element_parent'] == '')
				$this->getElement($elt);
		}
	}

	public function getElement ($elt){
		//print_r($elt);
		if (!isset($elt['element_place']))    $elt['element_place'] = '';
		if (!isset($elt['disabled'])) $elt['disabled'] = '';
		if (!isset($elt['element_label']))    $elt['element_label'] = '';
		if (!isset($elt['element_type']))     $elt['element_type'] = '';
		if (!isset($elt['element_parent']))   $elt['element_parent'] = '';
		if (!isset($elt['element_class']))    $elt['element_class'] = '';
		if (!isset($elt['value']))            $elt['value'] = '';
		if (!isset($elt['data0']))            $elt['data0'] = '';
		if (!isset($elt['data1']))            $elt['data1'] = '';
		if (!isset($elt['data2']))            $elt['data2'] = '';
		if (!isset($elt['data3']))            $elt['data3'] = '';
		if (!isset($elt['data4']))            $elt['data4'] = '';
		if (!isset($elt['data5']))            $elt['data5'] = '';
		if (!isset($elt['data6']))            $elt['data6'] = '';
		if (!isset($elt['data7']))            $elt['data7'] = '';
		if (!isset($elt['data8']))            $elt['data8'] = '';
		if (!isset($elt['data9']))            $elt['data9'] = '';
		$file = ELEMENTS.'ws'.$elt['type'].'.php';
		if (!file_exists($file))
			$file = WS_ELEMENTS.$elt['type'].'.php';
		if (file_exists($file)){
			include($file);
		}
	}

	public function addElement($elt){
		if (is_array($elt) && isset($elt['element_label']))
		$this->elements[$elt['element_label']] = $elt;
	}






	//form controls
	public function check_numeric($key, $value)
	{
		if ($this->data['wswarning'][$key] == '')
		if (preg_match("/[^0-9]/", $value))
		{
			$this->data['wswarning'][$key] = 'Caractère(s) numérique(s)';
			//print_r($this->data['wswarning'][$key]);
			return true;
		}
	}

	public function check_mandatory($key, $value)
	{
		if ($value == '')
		{
			$this->data['wswarning'][$key] = 'Ce champs est obligatoire';
			return true;
		}
	}

	public function check_email($key, $value)
	{
		if ($this->data['wswarning'][$key] == '')
		if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $value))
		{
			$this->data['wswarning'][$key] = "L'email est incorrect";
			return true;
		}
	}
	
	public function email($subject, $message, $to = null, $from = null)
	{
		$rc = false;

		if ($from == null)
			$from = 'contact@equinode.com';
		if ($to == null)
			$to = 'contact@equinode.com';
		if ($subject == null)
			$subject = 'Email en provenance d\'equinode';

		$message_str = '';
		$message_str .= '<table width="600" align="center" bgcolor="#dedede" cellpadding="1" cellspacing="0" border="0"><tr><td><table width="600" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" border="0"><tr><td colspan="3" align="center" bgcolor="#dedede"><a title="EquiNode" href="http://www.equinode.com"><img alt="http://www.equinode.com" src="http://www.equinode.com'.IMG.'email/bandeau.jpg" border="0" align="absmiddle" /></a></td></tr><tr><td colspan="3" height="50">&nbsp;</td></tr><tr><td width="20"></td><td align="left">';

		$message_str .= nl2br($message);

		$message_str .= '</td><td width="20"></td></tr><tr><td colspan="3" height="50">&nbsp;</td></tr></table></td></tr></table>';

		// ENVOI MAIL

		$header = "From: " . $from . "\n";
		$header .= "MIME-version: 1.0\n";
		$header .= "Content-type: text/html; charset=iso-8859-1\n";
		$message = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'><html><body>" . $message_str . "</body></html>";
		if (mail($to, $subject, $message_str, $header)){ $rc = true; }

		return $rc;
	}
	
	

	public function getCodespays(){
		return $pays = array(
		"ad" => "andorre",
		"ae" => "emirats arabes unis",
		"af" => "afghanistan",
		"ag" => "antigua-et-barbuda",
		"ai" => "anguilla",
		"al" => "albanie",
		"am" => "arménie",
		"an" => "antilles",
		"ao" => "angola",
		"aq" => "antarctique",
		"ar" => "argentine",
		"as" => "samoa américaines",
		"at" => "autriche",
		"au" => "australie",
		"aw" => "aruba",
		"az" => "azerbaïdjan",
		"ba" => "bosnie-herzégovine",
		"bb" => "barbade",
		"bd" => "bangladesh",
		"be" => "belgique",
		"bg" => "bulgarie",
		"bh" => "bahreïn",
		"bi" => "burundi",
		"bj" => "bénin ",
		"bm" => "bermudes",
		"bn" => "brunei darussalam",
		"bo" => "bolivie",
		"br" => "brésil",
		"bs" => "bahamas",
		"bt" => "bhoutan",
		"bw" => "botswana",
		"by" => "biélorussie",
		"bz" => "belize",
		"kh"=>"cambodge",
		"ca" => "canada",
		"cc" => "iles cocos",
		"cd" => "république démocratique du congo",
		"cf" => "république centrafricaine",
		"cg" => "congo",
		"ch" => "suisse",
		"ci" => "côte d'ivoire",
		"ck" => "iles cook",
		"cl" => "chili",
		"cm" => "cameroun",
		"cn" => "chine",
		"co" => "colombie",
		"cr" => "costa rica","cu" => "cuba",
		"cv" => "cap-vert",
		"cx" => "ile christmas",
		"cy" => "chypre",
		"cz" => "république tchèque",
		"de" => "allemagne",
		"dj" => "djibouti",
		"dk" => "danemark",
		"dm" => "dominique",
		"do" => "république dominicaine",
		"dz" => "algérie",
		"ec" => "equateur",
		"ee" => "estonie",
		"eg" => "egypte",
		"eh" => "sahara occidental",
		"er" => "erythrée",
		"es" => "espagne",
		"et" => "ethiopie",
		"fi" => "finlande",
		"fj" => "fidji",
		"fk" => "iles falklands",
		"fm" => "micronésie",
		"fo" => "ile feroe",
		"fr" => "france",
		"ga" => "gabon",
		"gd" => "grenade",
		"ge" => "géorgie",
		"gf" => "guyane française",
		"gh" => "ghana",
		"gi" => "gibraltar",
		"gl" => "groënland",
		"gq"=>"guinée équatoriale",
		"gm" => "gambie",
		"gn" => "guinée",
		"gp" => "guadeloupe",
		"gr" => "grèce",
		"gt" => "guatemala",
		"gu" => "guam",
		"gw" => "guinée-bissao",
		"gy" => "guyane",
		"hk" => "hong kong",
		"hn" => "honduras",
		"hr" => "croatie",
		"ht" => "haïti",
		"hu" => "hongrie",
		"id" => "indonésie",
		"ie" => "irlande",
		"il" => "israël",
		"in" => "inde",
		"iq" => "iraq",
		"ir" => "iran",
		"is" => "islande",
		"it" => "italie",
		"jm" => "jamaïque",
		"jo" => "jordanie",
		"jp" => "japon",
		"ke" => "kenya",
		"kg" => "kirghistan",
		"bf" => "burkina faso",
		"ki" => "kiribati",
		"km" => "république comorienne",
		"kn" => "saint-christophe-et-niévès",
		"kp" => "corée du nord",
		"kr" => "corée du sud",
		"kw" => "koweït",
		"ky" => "iles caïmans",
		"kz" => "kazakhstan",
		"la" => "laos",
		"lb" => "liban",
		"lc" => "sainte-lucie",
		"li" => "liechtenstein",
		"lk" => "sri lanka",
		"lr" => "libéria",
		"ls" => "lesotho",
		"lt" => "lituanie",
		"lu" => "luxembourg",
		"lv" => "lettonie",
		"ly" => "libye",
		"ma" => "maroc",
		"mc" => "monaco",
		"md" => "moldavie",
		"mg" => "madagascar",
		"ml"=>"mali",
		"mh" => "marshall",
		"mk" => "macédoine","mm"=>"myanmar",
		"mq"=>"martinique",
		"mn" => "mongolie",
		"mo" => "makau",
		"mp" => "ile mariana du nord",
		"mr" => "mauritanie",
		"ms" => "monteserrat",
		"mu" => "maurice",
		"mt"=>"malte",
		"mv" => "maldives",
		"mw" => "malawi",
		"mx" => "mexique west",
		"my" => "malaisie",
		"mz" => "mozambique",
		"na" => "namibie",
		"nc" => "nouvelle-calédonie",
		"ne" => "niger",
		"nf" => "ile de norfolk",
		"ng" => "nigeria",
		"ni" => "nicaragua",
		"nl" => "pays-bas",
		"no" => "norvège",
		"np" => "népal",
		"nr" => "nauru",
		"nu" => "niue",
		"nz" => "nouvelle-zélande",
		"om" => "oman",
		"pa" => "panama",
		"pe" => "pérou",
		"pf" => "polynésie française",
		"pg" => "papouasie - nouvelle guinée",
		"ph" => "philippines",
		"pk" => "pakistan",
		"pl" => "pologne",
		"pm" => "st. pierre and miquelon",
		"pn" => "pitcairn",
		"pr" => "porto rico",
		"ps" => "palestine",
		"pt" => "portugal",
		"pw" => "palau",
		"py" => "paraguay",
		"qa" => "qatar",
		"re" => "réunion",
		"ro" => "roumanie",
		"ru" => "fédération russe",
		"rw" => "rwanda",
		"sa" => "arabie saoudite",
		"sb" => "iles salomon",
		"sc" => "seychelles",
		"sd" => "soudan",
		"se" => "suède",
		"sg" => "singapour",
		"sh" => "saint hélène",
		"si" => "slovénie",
		"sk" => "slovaquie",
		"sl" => "sierra leone",
		"sm" => "saint-marin",
		"sn" => "sénégal",
		"so" => "somalie",
		"sr" => "suriname",
		"st" => "sao tomé-et-principe",
		"sv" => "salvador",
		"sy" => "syrie",
		"sz" => "swaziland",
		"tc" => "turks et caicos",
		"td" => "république du tchad",
		"tg" => "togo",
		"th" => "thaïlande",
		"tj" => "tchétchénie",
		"tk" => "iles tokelau",
		"tm" => "turkménistan",
		"tn" => "tunisie",
		"to" => "tonga",
		"tp" => "timor-oriental",
		"tr" => "turquie",
		"tt" => "trinité-et-tobago",
		"tv" => "tuvalu",
		"tw" => "taiwan",
		"tz" => "tanzanie",
		"ua" => "ukraine",
		"ug" => "ouganda",
		"gb" => "royaume-uni",
		"us" => "etats unis d'amérique",
		"uy" => "uruguay",
		"uz" => "ousbékistan",
		"va" => "vatican",
		"vc" => "saint-vincent-et-les grenadines",
		"ve" => "vénézuela",
		"vg" => "iles vierges américaines",
		"vi" => "iles vierges britanniques ",
		"vn" => "viêt-nam",
		"vu" => "vanuatu",
		"wf" => "wallis et futuna",
		"ws" => "samoa occidentales",
		"ye" => "yémen",
		"yt" => "mayotte",
		"yu" => "yougoslavie",
		"za" => "afrique du sud",
		"zm" => "zambie",
		"zw" => "zimbabwe"
		);
	}

}