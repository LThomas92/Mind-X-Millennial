<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Poll-Preview.php');
	require_once(dirname(__FILE__) . '/Total-Soft-Poll-Check.php');
	require_once(dirname(__FILE__) . '/Total-Soft-Pricing.php');
	global $wpdb;
	$table_name18 = $wpdb->prefix . "totalsoft_poll_setting";
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_', 'TS_Poll_Nonce' ))
		{
			$TotalSoft_Poll_SetTitle = sanitize_text_field($_POST['TotalSoft_Poll_SetTitle']);
			$TotalSoft_Poll_Set_01 = sanitize_text_field($_POST['TotalSoft_Poll_Set_01']);
			$TotalSoft_Poll_Set_02 = sanitize_text_field($_POST['TotalSoft_Poll_Set_02']);
			$TotalSoft_Poll_Set_03 = sanitize_text_field($_POST['TotalSoft_Poll_Set_03']);
			$TotalSoft_Poll_Set_04 = str_replace("\&","&", sanitize_text_field(sanitize_text_field($_POST['TotalSoft_Poll_Set_04'])));
			$TotalSoft_Poll_Set_05 = str_replace("\&","&", sanitize_text_field(sanitize_text_field($_POST['TotalSoft_Poll_Set_05'])));
			$TotalSoft_Poll_Set_05 = sanitize_text_field($_POST['TotalSoft_Poll_Set_05']);
			$TotalSoft_Poll_Set_06 = sanitize_text_field($_POST['TotalSoft_Poll_Set_06']);
			$TotalSoft_Poll_Set_07 = sanitize_text_field($_POST['TotalSoft_Poll_Set_07']);
			$TotalSoft_Poll_Set_08 = sanitize_text_field($_POST['TotalSoft_Poll_Set_08']);
			$TotalSoft_Poll_Set_09 = sanitize_text_field($_POST['TotalSoft_Poll_Set_09']);
			$TotalSoft_Poll_Set_10 = sanitize_text_field($_POST['TotalSoft_Poll_Set_10']);
			$TotalSoft_Poll_Set_11 = sanitize_text_field($_POST['TotalSoft_Poll_Set_11']);
			
			if($TotalSoft_Poll_Set_01 == 'on'){ $TotalSoft_Poll_Set_01 = 'true'; }else{ $TotalSoft_Poll_Set_01 = 'false'; }
			if($TotalSoft_Poll_Set_10 == 'on'){ $TotalSoft_Poll_Set_10 = 'true'; }else{ $TotalSoft_Poll_Set_10 = 'false'; }
			
			if(isset($_POST['Total_Soft_Poll_Save_Set']))
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name18 (id, TotalSoft_Poll_SetTitle, TotalSoft_Poll_Set_01, TotalSoft_Poll_Set_02, TotalSoft_Poll_Set_03, TotalSoft_Poll_Set_04, TotalSoft_Poll_Set_05, TotalSoft_Poll_Set_06, TotalSoft_Poll_Set_07, TotalSoft_Poll_Set_08, TotalSoft_Poll_Set_09, TotalSoft_Poll_Set_10, TotalSoft_Poll_Set_11) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoft_Poll_SetTitle, $TotalSoft_Poll_Set_01, $TotalSoft_Poll_Set_02, $TotalSoft_Poll_Set_03, $TotalSoft_Poll_Set_04, $TotalSoft_Poll_Set_05, $TotalSoft_Poll_Set_06, $TotalSoft_Poll_Set_07, $TotalSoft_Poll_Set_08, $TotalSoft_Poll_Set_09, $TotalSoft_Poll_Set_10, $TotalSoft_Poll_Set_11));
			}
			else if(isset($_POST['Total_Soft_Poll_Update_Set']))
			{
				$Total_SoftPoll_Update_Set = sanitize_text_field($_POST['Total_SoftPoll_Update_Set']);
				$wpdb->query($wpdb->prepare("UPDATE $table_name18 set TotalSoft_Poll_SetTitle = %s, TotalSoft_Poll_Set_01 = %s, TotalSoft_Poll_Set_02 = %s, TotalSoft_Poll_Set_03 = %s, TotalSoft_Poll_Set_04 = %s, TotalSoft_Poll_Set_05 = %s, TotalSoft_Poll_Set_06 = %s, TotalSoft_Poll_Set_07 = %s, TotalSoft_Poll_Set_08 = %s, TotalSoft_Poll_Set_09 = %s WHERE id = %d", $TotalSoft_Poll_SetTitle, $TotalSoft_Poll_Set_01, $TotalSoft_Poll_Set_02, $TotalSoft_Poll_Set_03, $TotalSoft_Poll_Set_04, $TotalSoft_Poll_Set_05, $TotalSoft_Poll_Set_06, $TotalSoft_Poll_Set_07, $TotalSoft_Poll_Set_08, $TotalSoft_Poll_Set_09, $Total_SoftPoll_Update_Set));
			}
		}
		else
		{
			wp_die('Security check fail'); 
		}
	}

	$TotalSoftPollSetCount = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name18 WHERE id>%d order by id",0));
	$TotalSoftFontCount = array("Abadi MT Condensed Light", "Aharoni", "Aldhabi", "Amaranth", "Andalus", "Angsana New", "AngsanaUPC", "Anton", "Aparajita", "Arabic Typesetting", "Arial", "Arial Black", "Batang", "BatangChe", "Browallia New", "BrowalliaUPC", "Calibri", "Calibri Light", "Calisto MT", "Cambria", "Candara", "Century Gothic", "Comic Sans MS", "Consolas", "Constantia", "Copperplate Gothic", "Copperplate Gothic Light", "Battambang", "Baumans", "Bungee Shade", "Butcherman","Cabin", "Cabin Sketch", "Cairo", "Damion", "DilleniaUPC", "DaunPenh", "Eagle Lake", "East Sea Dokdo", "Fira Sans Condensed", "Fira Sans Extra Condensed", "FreesiaUPC", "Gafata", "Gabriola", "Jacques Francois", "Headland One", "Katibeh", "KaiTi", "Microsoft Yi Baiti", "Monsieur La Doulaise", "Mr De Haviland", "Nova Script", "Nova Square", "Nyala", "Odor Mean Chey", "Offside", "Old Standard TT", "Oldenburg", "Oxygen", "Oxygen Mono", "Princess Sofia", "Prociono", "Prompt", "Prosto One", "Proza Libre",  "Quicksand", "Quintessential", "Qwigley",  "Raavi", "Racing Sans One", "Radley", "Rajdhani", "Rakkas", "Raleway", "Raleway Dots", "Ramabhadra", "Ramaraja", "Rosarivo", "Revalia", "Shruti", "Siemreap", "Sigmar One", "Signika", "Signika Negative", "SimHei", "SimKai",  "Simonetta", "Tahoma", "Tajawal", "Tangerine", "Taprom", "Tauri", "Taviraj", "Teko", "Telex", "Tenali Ramakrishna", "Tenor Sans", "Text Me One", "The Girl Next Door", "Tienne", "Tillana", "Times New Roman", "Timmana", "Tinos", "Titan One", "Vijaya");
	$TotalSoftFontGCount = array("Abadi MT Condensed Light", "Aharoni", "Aldhabi", "Amaranth", "Andalus", "Angsana New", "AngsanaUPC", "Anton", "Aparajita", "Arabic Typesetting", "Arial", "Arial Black", "Batang", "BatangChe", "Browallia New", "BrowalliaUPC", "Calibri", "Calibri Light", "Calisto MT", "Cambria", "Candara", "Century Gothic", "Comic Sans MS", "Consolas", "Constantia", "Copperplate Gothic", "Copperplate Gothic Light", "Battambang", "Baumans", "Bungee Shade", "Butcherman","Cabin", "Cabin Sketch", "Cairo", "Damion", "DilleniaUPC", "DaunPenh", "Eagle Lake", "East Sea Dokdo", "Fira Sans Condensed", "Fira Sans Extra Condensed", "FreesiaUPC", "Gafata", "Gabriola", "Jacques Francois", "Headland One", "Katibeh", "KaiTi", "Microsoft Yi Baiti", "Monsieur La Doulaise", "Mr De Haviland", "Nova Script", "Nova Square", "Nyala", "Odor Mean Chey", "Offside", "Old Standard TT", "Oldenburg", "Oxygen", "Oxygen Mono", "Princess Sofia", "Prociono", "Prompt", "Prosto One", "Proza Libre",  "Quicksand", "Quintessential", "Qwigley",  "Raavi", "Racing Sans One", "Radley", "Rajdhani", "Rakkas", "Raleway", "Raleway Dots", "Ramabhadra", "Ramaraja", "Rosarivo", "Revalia", "Shruti", "Siemreap", "Sigmar One", "Signika", "Signika Negative", "SimHei", "SimKai",  "Simonetta", "Tahoma", "Tajawal", "Tangerine", "Taprom", "Tauri", "Taviraj", "Teko", "Telex", "Tenali Ramakrishna", "Tenor Sans", "Text Me One", "The Girl Next Door", "Tienne", "Tillana", "Times New Roman", "Timmana", "Tinos", "Titan One", "Vijaya");


        wp_enqueue_style('totalsoft', plugins_url('../CSS/totalsoft.css', __FILE__));
        wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=ABeeZee|Abel|Abhaya+Libre|Abril+Fatface|Aclonica|Acme|Actor|Adamina|Advent+Pro|Aguafina+Script|Akronim|Aladin|Aldrich|Alef|Alegreya|Alegreya+SC|Alegreya+Sans|Alegreya+Sans+SC|Alex+Brush|Alfa+Slab+One|Alice|Alike|Alike+Angular|Allan|Allerta|Allerta+Stencil|Allura|Almendra|Almendra+Display|Almendra+SC|Amarante|Amaranth|Amatic+SC|Amethysta|Amiko|Amiri|Amita|Anaheim|Andada|Andika|Angkor|Annie+Use+Your+Telescope|Anonymous+Pro|Antic|Antic+Didone|Antic+Slab|Anton|Arapey|Arbutus|Arbutus+Slab|Architects+Daughter|Archivo|Archivo+Black|Archivo+Narrow|Aref+Ruqaa|Arima+Madurai|Arimo|Arizonia|Armata|Arsenal|Artifika|Arvo|Arya|Asap|Asap+Condensed|Asar|Asset|Assistant|Astloch|Asul|Athiti|Atma|Atomic+Age|Aubrey|Audiowide|Autour+One|Average|Average+Sans|Averia+Gruesa+Libre|Averia+Libre|Averia+Sans+Libre|Averia+Serif+Libre|Bad+Script|Bahiana|Baloo|Baloo+Bhai|Baloo+Bhaijaan|Baloo+Bhaina|Baloo+Chettan|Baloo+Da|Baloo+Paaji|Baloo+Tamma|Baloo+Tammudu|Baloo+Thambi|Balthazar|Bangers|Barlow|Barlow+Condensed|Barlow+Semi+Condensed|Barrio|Basic|Battambang|Baumans|Bayon|Belgrano|Bellefair|Belleza|BenchNine|Bentham|Berkshire+Swash|Bevan|Bigelow+Rules|Bigshot+One|Bilbo|Bilbo+Swash+Caps|BioRhyme|BioRhyme+Expanded|Biryani|Bitter|Black+And+White+Picture|Black+Han+Sans|Black+Ops+One|Bokor|Bonbon|Boogaloo|Bowlby+One|Bowlby+One+SC|Brawler|Bree+Serif|Bubblegum+Sans|Bubbler+One|Buda:300|Buenard|Bungee|Bungee+Hairline|Bungee+Inline|Bungee+Outline|Bungee+Shade|Butcherman|Butterfly+Kids|Cabin|Cabin+Condensed|Cabin+Sketch|Caesar+Dressing|Cagliostro|Cairo|Calligraffitti|Cambay|Cambo|Candal|Cantarell|Cantata+One|Cantora+One|Capriola|Cardo|Carme|Carrois+Gothic|Carrois+Gothic+SC|Carter+One|Catamaran|Caudex|Caveat|Caveat+Brush|Cedarville+Cursive|Ceviche+One|Changa|Changa+One|Chango|Chathura|Chau+Philomene+One|Chela+One|Chelsea+Market|Chenla|Cherry+Cream+Soda|Cherry+Swash|Chewy|Chicle|Chivo|Chonburi|Cinzel|Cinzel+Decorative|Clicker+Script|Coda|Coda+Caption:800|Codystar|Coiny|Combo|Comfortaa|Coming+Soon|Concert+One|Condiment|Content|Contrail+One|Convergence|Cookie|Copse|Corben|Cormorant|Cormorant+Garamond|Cormorant+Infant|Cormorant+SC|Cormorant+Unicase|Cormorant+Upright|Courgette|Cousine|Coustard|Covered+By+Your+Grace|Crafty+Girls|Creepster|Crete+Round|Crimson+Text|Croissant+One|Crushed|Cuprum|Cute+Font|Cutive|Cutive+Mono|Damion|Dancing+Script|Dangrek|David+Libre|Dawning+of+a+New+Day|Days+One|Dekko|Delius|Delius+Swash+Caps|Delius+Unicase|Della+Respira|Denk+One|Devonshire|Dhurjati|Didact+Gothic|Diplomata|Diplomata+SC|Do+Hyeon|Dokdo|Domine|Donegal+One|Doppio+One|Dorsa|Dosis|Dr+Sugiyama|Duru+Sans|Dynalight|EB+Garamond|Eagle+Lake|East+Sea+Dokdo|Eater|Economica|Eczar|El+Messiri|Electrolize|Elsie|Elsie+Swash+Caps|Emblema+One|Emilys+Candy|Encode+Sans|Encode+Sans+Condensed|Encode+Sans+Expanded|Encode+Sans+Semi+Condensed|Encode+Sans+Semi+Expanded|Engagement|Englebert|Enriqueta|Erica+One|Esteban|Euphoria+Script|Ewert|Exo|Exo+2|Expletus+Sans|Fanwood+Text|Farsan|Fascinate|Fascinate+Inline|Faster+One|Fasthand|Fauna+One|Faustina|Federant|Federo|Felipa|Fenix|Finger+Paint|Fira+Mono|Fira+Sans|Fira+Sans+Condensed|Fira+Sans+Extra+Condensed|Fjalla+One|Fjord+One|Flamenco|Flavors|Fondamento|Fontdiner+Swanky|Forum|Francois+One|Frank+Ruhl+Libre|Freckle+Face|Fredericka+the+Great|Fredoka+One|Freehand|Fresca|Frijole|Fruktur|Fugaz+One|GFS+Didot|GFS+Neohellenic|Gabriela|Gaegu|Gafata|Galada|Galdeano|Galindo|Gamja+Flower|Gentium+Basic|Gentium+Book+Basic|Geo|Geostar|Geostar+Fill|Germania+One|Gidugu|Gilda+Display|Give+You+Glory|Glass+Antiqua|Glegoo|Gloria+Hallelujah|Goblin+One|Gochi+Hand|Gorditas|Gothic+A1|Goudy+Bookletter+1911|Graduate|Grand+Hotel|Gravitas+One|Great+Vibes|Griffy|Gruppo|Gudea|Gugi|Gurajada|Habibi|Halant|Hammersmith+One|Hanalei|Hanalei+Fill|Handlee|Hanuman|Happy+Monkey|Harmattan|Headland+One|Heebo|Henny+Penny|Herr+Von+Muellerhoff|Hi+Melody|Hind|Hind+Guntur|Hind+Madurai|Hind+Siliguri|Hind+Vadodara|Holtwood+One+SC|Homemade+Apple|Homenaje|IBM+Plex+Mono|IBM+Plex+Sans|IBM+Plex+Sans+Condensed|IBM+Plex+Serif|IM+Fell+DW+Pica|IM+Fell+DW+Pica+SC|IM+Fell+Double+Pica|IM+Fell+Double+Pica+SC|IM+Fell+English|IM+Fell+English+SC|IM+Fell+French+Canon|IM+Fell+French+Canon+SC|IM+Fell+Great+Primer|IM+Fell+Great+Primer+SC|Iceberg|Iceland|Imprima|Inconsolata|Inder|Indie+Flower|Inika|Inknut+Antiqua|Irish+Grover|Istok+Web|Italiana|Italianno|Itim|Jacques+Francois|Jacques+Francois+Shadow|Jaldi|Jim+Nightshade|Jockey+One|Jolly+Lodger|Jomhuria|Josefin+Sans|Josefin+Slab|Joti+One|Jua|Judson|Julee|Julius+Sans+One|Junge|Jura|Just+Another+Hand|Just+Me+Again+Down+Here|Kadwa|Kalam|Kameron|Kanit|Kantumruy|Karla|Karma|Katibeh|Kaushan+Script|Kavivanar|Kavoon|Kdam+Thmor|Keania+One|Kelly+Slab|Kenia|Khand|Khmer|Khula|Kirang+Haerang|Kite+One|Knewave|Kotta+One|Koulen|Kranky|Kreon|Kristi|Krona+One|Kurale|La+Belle+Aurore|Laila|Lakki+Reddy|Lalezar|Lancelot|Lateef|Lato|League+Script|Leckerli+One|Ledger|Lekton|Lemon|Lemonada|Libre+Barcode+128|Libre+Barcode+128+Text|Libre+Barcode+39|Libre+Barcode+39+Extended|Libre+Barcode+39+Extended+Text|Libre+Barcode+39+Text|Libre+Baskerville|Libre+Franklin|Life+Savers|Lilita+One|Lily+Script+One|Limelight|Linden+Hill|Lobster|Lobster+Two|Londrina+Outline|Londrina+Shadow|Londrina+Sketch|Londrina+Solid|Lora|Love+Ya+Like+A+Sister|Loved+by+the+King|Lovers+Quarrel|Luckiest+Guy|Lusitana|Lustria|Macondo|Macondo+Swash+Caps|Mada|Magra|Maiden+Orange|Maitree|Mako|Mallanna|Mandali|Manuale|Marcellus|Marcellus+SC|Marck+Script|Margarine|Marko+One|Marmelad|Martel|Martel+Sans|Marvel|Mate|Mate+SC|Maven+Pro|McLaren|Meddon|MedievalSharp|Medula+One|Meera+Inimai|Megrim|Meie+Script|Merienda|Merienda+One|Merriweather|Merriweather+Sans|Metal|Metal+Mania|Metamorphous|Metrophobic|Michroma|Milonga|Miltonian|Miltonian+Tattoo|Mina|Miniver|Miriam+Libre|Mirza|Miss+Fajardose|Mitr|Modak|Modern+Antiqua|Mogra|Molengo|Molle:400i|Monda|Monofett|Monoton|Monsieur+La+Doulaise|Montaga|Montez|Montserrat|Montserrat+Alternates|Montserrat+Subrayada|Moul|Moulpali|Mountains+of+Christmas|Mouse+Memoirs|Mr+Bedfort|Mr+Dafoe|Mr+De+Haviland|Mrs+Saint+Delafield|Mrs+Sheppards|Mukta|Mukta+Mahee|Mukta+Malar|Mukta+Vaani|Muli|Mystery+Quest|NTR|Nanum+Brush+Script|Nanum+Gothic|Nanum+Gothic+Coding|Nanum+Myeongjo|Nanum+Pen+Script|Neucha|Neuton|New+Rocker|News+Cycle|Niconne|Nixie+One|Nobile|Nokora|Norican|Nosifer|Nothing+You+Could+Do|Noticia+Text|Noto+Sans|Noto+Serif|Nova+Cut|Nova+Flat|Nova+Mono|Nova+Oval|Nova+Round|Nova+Script|Nova+Slim|Nova+Square|Numans|Nunito|Nunito+Sans|Odor+Mean+Chey|Offside|Old+Standard+TT|Oldenburg|Oleo+Script|Oleo+Script+Swash+Caps|Open+Sans|Open+Sans+Condensed:300|Oranienbaum|Orbitron|Oregano|Orienta|Original+Surfer|Oswald|Over+the+Rainbow|Overlock|Overlock+SC|Overpass|Overpass+Mono|Ovo|Oxygen|Oxygen+Mono|PT+Mono|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|PT+Serif+Caption|Pacifico|Padauk|Palanquin|Palanquin+Dark|Pangolin|Paprika|Parisienne|Passero+One|Passion+One|Pathway+Gothic+One|Patrick+Hand|Patrick+Hand+SC|Pattaya|Patua+One|Pavanam|Paytone+One|Peddana|Peralta|Permanent+Marker|Petit+Formal+Script|Petrona|Philosopher|Piedra|Pinyon+Script|Pirata+One|Plaster|Play|Playball|Playfair+Display|Playfair+Display+SC|Podkova|Poiret+One|Poller+One|Poly|Pompiere|Pontano+Sans|Poor+Story|Poppins|Port+Lligat+Sans|Port+Lligat+Slab|Pragati+Narrow|Prata|Preahvihear|Press+Start+2P|Pridi|Princess+Sofia|Prociono|Prompt|Prosto+One|Proza+Libre|Puritan|Purple+Purse|Quando|Quantico|Quattrocento|Quattrocento+Sans|Questrial|Quicksand|Quintessential|Qwigley|Racing+Sans+One|Radley|Rajdhani|Rakkas|Raleway|Raleway+Dots|Ramabhadra|Ramaraja|Rambla|Rammetto+One|Ranchers|Rancho|Ranga|Rasa|Rationale|Ravi+Prakash|Redressed|Reem+Kufi|Reenie+Beanie|Revalia|Rhodium+Libre|Ribeye|Ribeye+Marrow|Righteous|Risque|Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab|Rochester|Rock+Salt|Rokkitt|Romanesco|Ropa+Sans|Rosario|Rosarivo|Rouge+Script|Rozha+One|Rubik|Rubik+Mono+One|Ruda|Rufina|Ruge+Boogie|Ruluko|Rum+Raisin|Ruslan+Display|Russo+One|Ruthie|Rye|Sacramento|Sahitya|Sail|Saira|Saira+Condensed|Saira+Extra+Condensed|Saira+Semi+Condensed|Salsa|Sanchez|Sancreek|Sansita|Sarala|Sarina|Sarpanch|Satisfy|Scada|Scheherazade|Schoolbell|Scope+One|Seaweed+Script|Secular+One|Sedgwick+Ave|Sedgwick+Ave+Display|Sevillana|Seymour+One|Shadows+Into+Light|Shadows+Into+Light+Two|Shanti|Share|Share+Tech|Share+Tech+Mono|Shojumaru|Short+Stack|Shrikhand|Siemreap|Sigmar+One|Signika|Signika+Negative|Simonetta|Sintony|Sirin+Stencil|Six+Caps|Skranji|Slabo+13px|Slabo+27px|Slackey|Smokum|Smythe|Sniglet|Snippet|Snowburst+One|Sofadi+One|Sofia|Song+Myung|Sonsie+One|Sorts+Mill+Goudy|Source+Code+Pro|Source+Sans+Pro|Source+Serif+Pro|Space+Mono|Special+Elite|Spectral|Spectral+SC|Spicy+Rice|Spinnaker|Spirax|Squada+One|Sree+Krushnadevaraya|Sriracha|Stalemate|Stalinist+One|Stardos+Stencil|Stint+Ultra+Condensed|Stint+Ultra+Expanded|Stoke|Strait|Stylish|Sue+Ellen+Francisco|Suez+One|Sumana|Sunflower:300|Sunshiney|Supermercado+One|Sura|Suranna|Suravaram|Suwannaphum|Swanky+and+Moo+Moo|Syncopate|Tajawal|Tangerine|Taprom|Tauri|Taviraj|Teko|Telex|Tenali+Ramakrishna|Tenor+Sans|Text+Me+One|The+Girl+Next+Door|Tienne|Tillana|Timmana|Tinos|Titan+One|Titillium+Web|Trade+Winds|Trirong|Trocchi|Trochut|Trykker|Tulpen+One|Ubuntu|Ubuntu+Condensed|Ubuntu+Mono|Ultra|Uncial+Antiqua|Underdog|Unica+One|UnifrakturCook:700|UnifrakturMaguntia|Unkempt|Unlock|Unna|VT323|Vampiro+One|Varela|Varela+Round|Vast+Shadow|Vesper+Libre|Vibur|Vidaloka|Viga|Voces|Volkhov|Vollkorn|Vollkorn+SC|Voltaire|Waiting+for+the+Sunrise|Wallpoet|Walter+Turncoat|Warnes|Wellfleet|Wendy+One|Wire+One|Work+Sans|Yanone+Kaffeesatz|Yantramanav|Yatra+One|Yellowtail|Yeon+Sung|Yeseva+One|Yesteryear|Yrsa|Zeyada|Zilla+Slab|Zilla+Slab+Highlight" rel="stylesheet');
?>

<form method="POST" enctype="multipart/form-data">
	<?php wp_nonce_field( 'edit-menu_', 'TS_Poll_Nonce' );?>
	<div class="Total_Soft_Poll_AMD">
		<a href="https://total-soft.com/wp-poll/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i> Get The Full Version</div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Support_Span">
			<a href="https://wordpress.org/support/plugin/poll-wp/" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_Poll_AMD1"></div>
		<div class="Total_Soft_Poll_AMD2">
			<i class="Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title="Click for creating new settings."></i>
			<span class="Total_Soft_Poll_AMD2_But" onclick="Total_Soft_Poll_SM_But1()">
				New Settings
			</span>
		</div>
		<div class="Total_Soft_Poll_AMD3">
			<i class="Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title="Click for refreshing the page."></i>
			<span class="Total_Soft_Poll_AMD2_But" onclick="TotalSoftPoll_Reload()">
				Cancel
			</span>
			<i class="Total_Soft_Poll_Save_Set Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title="Click for saving the settings."></i>
			<button type="submit" class="Total_Soft_Poll_Save_Set Total_Soft_Poll_AMD2_But" name="Total_Soft_Poll_Save_Set">
				Save
			</button>
			<i class="Total_Soft_Poll_Update_Set Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title="Click for updating the settings."></i>
			<button type="submit" class="Total_Soft_Poll_Update_Set Total_Soft_Poll_AMD2_But" name="Total_Soft_Poll_Update_Set">
				Update
			</button>
			<input type="text" style="display:none" name="Total_SoftPoll_Update_Set" id="Total_SoftPoll_Update_Set">
		</div>
	</div>
	<table class="Total_Soft_Poll_SMMTable">
		<tr class="Total_Soft_Poll_SMMTableFR">
			<td>No</td>
			<td>Setting Title</td>
			<td>Show Results</td>
			<td>Copy</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_SMOTable">
		<?php for($i=0;$i<count($TotalSoftPollSetCount);$i++){ ?>
			<tr id="Total_Soft_Poll_SMOTable_tr_<?php echo $TotalSoftPollSetCount[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftPollSetCount[$i]->TotalSoft_Poll_SetTitle;?></td>
				<td><?php if($TotalSoftPollSetCount[$i]->TotalSoft_Poll_Set_01 == 'true'){ echo 'Yes';}else{ echo 'No';}?></td>
				<td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPoll_Clone_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i></td>
				<td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPoll_Edit_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPoll_Del_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i>
					<span class="Total_Soft_Poll_Del_Span">
						<i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="TotalSoftPoll_Del_Yes_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i>
						<i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftPoll_Del_No_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
		<?php }?>
	</table>
	<div class="Total_Soft_Poll_Loading">
		<img src="<?php echo plugins_url('../Images/loading.gif',__FILE__);?>">
	</div>
	<div class="Total_Soft_Poll_AMSetDiv" id="Total_Soft_Poll_AMSetDiv_S">
		<div class="Total_Soft_Poll_AMSetDiv_Buttons">
			<div class="Total_Soft_Poll_AMSetDiv_Button" id="TS_Poll_TM_TBut_S_GO" onclick="TS_Poll_TM_But('S', 'GO')">General Option</div>
			<div class="Total_Soft_Poll_AMSetDiv_Button" id="TS_Poll_TM_TBut_S_UP" onclick="TS_Poll_TM_But('S', 'UP')">Upcoming Poll</div>
			<div class="Total_Soft_Poll_AMSetDiv_Button" id="TS_Poll_TM_TBut_S_VS" onclick="TS_Poll_TM_But('S', 'VS')">Vote Settings</div>
		</div>
		<div class="Total_Soft_Poll_AMSetDiv_Content">
			<div class="TS_Poll_Option_Div" id="Total_Soft_Poll_AMSetTable_S_GO">
				<div class="TS_Poll_Option_Div1 Total_Soft_Poll_TMTitles">All Parameters are optional, not required to set.</div>
				<div class="TS_Poll_Option_Div1 Total_Soft_Poll_TMTitles">General Options</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Setting Title <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Write the settings title."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="text" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_SetTitle" id="TotalSoft_Poll_SetTitle" required placeholder="* Required">
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Show Results After Voting <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define to show reults after voting or no."></i></div>
					<div class="TS_Poll_Option_Field">
						<div class="switch">
							<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_Set_01" name="TotalSoft_Poll_Set_01" checked>
							<label for="TotalSoft_Poll_Set_01" data-on="Yes" data-off="No"></label>
						</div>
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Start Date <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the start date for the poll."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="date" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_02" id="TotalSoft_Poll_Set_02" placeholder="yyyy-mm-dd">
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">End Date <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the end date for the poll."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="date" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_03" id="TotalSoft_Poll_Set_03" placeholder="yyyy-mm-dd">
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Upcoming Poll Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for upcoming polls."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="text" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_04" id="TotalSoft_Poll_Set_04">
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Text For no Result After Voting <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Write the text for the polls where are not showing results after voting."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="text" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_05" id="TotalSoft_Poll_Set_05">
					</div>
				</div>
			</div>
			<div class="TS_Poll_Option_Div" id="Total_Soft_Poll_AMSetTable_S_UP">
				<div class="TS_Poll_Option_Div1 Total_Soft_Poll_TMTitles">All Parameters are optional, not required to set.</div>
				<div class="TS_Poll_Option_Div1 Total_Soft_Poll_TMTitles">Upcoming Poll Text Settings</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Overlay Color <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the overlay color for the upcoming polls."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="text" name="TotalSoft_Poll_Set_06" id="TotalSoft_Poll_Set_06" class="Total_Soft_Poll_T_Color" value="rgba(209,209,209,0.79)">
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Color <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the text color for the upcoming polls."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="text" name="TotalSoft_Poll_Set_07" id="TotalSoft_Poll_Set_07" class="Total_Soft_Poll_T_Color" value="#000000">
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set font size for the text."></i></div>
					<div class="TS_Poll_Option_Field">
						<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_Set_08" id="TotalSoft_Poll_Set_08" min="8" max="72" value="32">
						<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_Set_08_Output" for="TotalSoft_Poll_Set_08"></output>
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set font family for the text."></i></div>
					<div class="TS_Poll_Option_Field">
						<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_09" id="TotalSoft_Poll_Set_09">
							<?php
								for($i = 0; $i < count($TotalSoftFontGCount); $i++)
								{
									if( $TotalSoftFontGCount[$i] == 'Gabriola') { ?>
										<option value='<?php echo $TotalSoftFontGCount[$i];?>' selected="select" style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
									<?php }else{ ?>
										<option value='<?php echo $TotalSoftFontGCount[$i];?>' style="font-family: <?php echo $TotalSoftFontGCount[$i];?>;"><?php echo $TotalSoftFontCount[$i];?></option>
									<?php }
								}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="TS_Poll_Option_Div" id="Total_Soft_Poll_AMSetTable_S_VS">
				<div class="TS_Poll_Settings_OVS"></div>
				<div class="TS_Poll_Option_Div1 Total_Soft_Poll_TMTitles">All Parameters are optional, not required to set. <img src="<?php echo plugins_url('../Images/pro-icon.png',__FILE__);?>"> </div>
				<div class="TS_Poll_Option_Div1 Total_Soft_Poll_TMTitles">Vote Settings</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">Vote Once <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define to vote one time or more than once."></i></div>
					<div class="TS_Poll_Option_Field">
						<div class="switch">
							<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_Set_10" name="TotalSoft_Poll_Set_10" >
							<label for="TotalSoft_Poll_Set_10" data-on="Yes" data-off="No"></label>
						</div>
					</div>
				</div>
				<div class="TS_Poll_Option_Div1">
					<div class="TS_Poll_Option_Name">One Time Voting Function <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define one time voting function."></i></div>
					<div class="TS_Poll_Option_Field">
						<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_11" id="TotalSoft_Poll_Set_11">
							<option value='phpcookie' selected="select"> PHP Cookie </option>
							<option value='ipaddress'>                   IP Address </option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>