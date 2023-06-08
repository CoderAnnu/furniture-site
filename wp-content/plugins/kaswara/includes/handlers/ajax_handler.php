<?php 
//File That Will Handle All the Ajax Requests And Rsponses
//Function To Import Demo Data 
add_action('wp_ajax_kaswaraImportDemo', 'kaswara_demo_importer_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraImportDemo', 'kaswara_demo_importer_handler_callback');
function kaswara_demo_importer_handler_callback(){	
	//Importing Demo Data 
	if(isset($_POST['action'], $_POST['contentUrl']) && trim($_POST['action']) == 'kaswaraImportDemo'){ 	
	 	require_once( KASWARA_PLUGIN_PATH. 'includes/handlers/importer/radium-importer.php' );
	  	$kaswara_demo_radium = new Radium_Theme_Importer();
	  	$kaswara_demo_radium->content_demo = $_POST['contentUrl'];
	  	//$kameleon_demo_radium->theme_options_file = '';
	  	//$kameleon_demo_radium->widgets  = '';
	  	//$kameleon_demo_radium->theme_option_name = kameleon_get_options_slug_plugin();  
	  	$kaswara_demo_radium->start_importing(); 	 	
	}
	die();
}

//Functions for Import & Export Settings
function kaswara_return_shortcodes_s(){
	return array('skillbar','radialprogress','socialshare','findus','videomodal','modalwindow','button','alertbox','bfimage','teammate','iconboxaction','interactiveiconbox','dropcaps','singleicon','iconboxinfo','infolist','counter','pricingplan','cardflip','3dcardflip','verticalskillbar','modernflipbox','imagebanner','hoverinfobox','modalanything');
} 

add_action('wp_ajax_exportShortcodeData', 'kaswara_shortcodestyle_exports_handler_callback' );
add_action('wp_ajax_nopriv_exportShortcodeData', 'kaswara_shortcodestyle_exports_handler_callback');
function kaswara_shortcodestyle_exports_handler_callback(){		
	if(isset($_POST['action']) && trim($_POST['action']) == 'exportShortcodeData'){ 	
		$export_result = array();
		foreach (kaswara_return_shortcodes_s() as $sc) {
			$sc_temparray = array($sc => kswr_shortcode_form_values($sc));
			array_push($export_result,$sc_temparray);	
		}
		echo json_encode($export_result);
	}
	die();
}

add_action('wp_ajax_importShortcodeData', 'kaswara_shortcodestyle_import_handler_callback' );
add_action('wp_ajax_nopriv_importShortcodeData', 'kaswara_shortcodestyle_import_handler_callback');
function kaswara_shortcodestyle_import_handler_callback(){		
	if(isset($_POST['action'],$_POST['shortcodeStylingJSON']) && trim($_POST['shortcodeStylingJSON']) !="" && trim($_POST['action']) == 'importShortcodeData'){ 	
		$dataArray = array();
		$dataArray = json_decode(stripslashes($_POST['shortcodeStylingJSON']), true);
		foreach ($dataArray as $key => $value) {
			kaswara_save_option(kaswara_get_options_slug_plugin().'-'.array_keys($value)[0],$value[array_keys($value)[0]]);	
		}
	}
	die();
}

//Import & Export CF7 Styles
add_action('wp_ajax_exportCf7Styles', 'kaswara_cf7_export_handler_callback' );
add_action('wp_ajax_nopriv_exportCf7Styles', 'kaswara_cf7_export_handler_callback');
function kaswara_cf7_export_handler_callback(){		
	if(isset($_POST['action'], $_POST['formStyleID']) && trim($_POST['formStyleID']) !="" && trim($_POST['action']) == 'exportCf7Styles'){ 	
		$cf7export_result = array();
		$cf7Array = kaswara_get_single_option('kmcf7_styles');
		if($_POST['formStyleID'] == 'all')
			$cf7export_result = $cf7Array;
		else{
			if(is_array($cf7Array) && array_key_exists($_POST['formStyleID'],$cf7Array))
				$cf7export_result = array($cf7Array[$_POST['formStyleID']]);
		}
		echo json_encode($cf7export_result);
	}
	die();
}


add_action('wp_ajax_importCf7Styles', 'kaswara_cf7_import_handler_callback' );
add_action('wp_ajax_nopriv_importCf7Styles', 'kaswara_cf7_import_handler_callback');
function kaswara_cf7_import_handler_callback(){		
	if(isset($_POST['action'], $_POST['formStylesJson']) && trim($_POST['formStylesJson']) !="" && trim($_POST['action']) == 'importCf7Styles'){ 	
		$kmcf7_styles = kaswara_get_single_option('kmcf7_styles'); 
		$kmslug = kaswara_get_options_slug_plugin();	
		$dataArray = json_decode(stripslashes($_POST['formStylesJson']), true);
		if(is_array($dataArray)){
			foreach ($dataArray as $key => $elem) {
				$styleID = str_replace(' ','-',strtolower($elem['styleName']));					
				kaswaracf7_save_update($styleID,$elem['styleName'], $elem['styleType'], $elem['styleButton'], $elem['theStyle'],$elem['buttonCSS']);
			}
		}		
	}
	die();
}


//Font Icon Manager
add_action('wp_ajax_uploadFontIcon', 'kaswara_uploadfonticon_handler_callback' );
add_action('wp_ajax_nopriv_uploadFontIcon', 'kaswara_uploadfonticon_handler_callback');
function kaswara_uploadfonticon_handler_callback(){		
	if(isset($_POST['action'],$_POST['fontsetname'],$_FILES["fonticonzipfile"]) && trim($_POST['fontsetname']) != "" && trim($_POST['action']) == 'uploadFontIcon'){ 	
		$fonticonzipfile = $_FILES["fonticonzipfile"]["tmp_name"];

	}
	die();
}

add_action('wp_ajax_deleteFontIcon', 'kaswara_deletefonticon_handler_callback' );
add_action('wp_ajax_nopriv_deleteFontIcon', 'kaswara_deletefonticon_handler_callback');
function kaswara_deletefonticon_handler_callback(){		
	if(isset($_POST['action'],$_POST['iconSetName']) && trim($_POST['iconSetName']) != "" && trim($_POST['action']) == 'deleteFontIcon'){ 	

	}
	die();
}






//Function TO Save the Custom Advanced JS / CSS / 
add_action('wp_ajax_kaswaraCustomCode', 'kaswara_custom_code_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraCustomCode', 'kaswara_custom_code_handler_callback');
function kaswara_custom_code_handler_callback(){		
	if(isset($_POST['action'], $_POST['customCSS'], $_POST['customJS'], $_POST['googleMapApi']) && trim($_POST['action']) == 'kaswaraCustomCode'){ 				 
		$kswrlug =kaswara_get_options_slug_plugin();
	 	kaswara_save_option($kswrlug.'-customCSS',base64_encode($_POST['customCSS']));
	 	kaswara_save_option($kswrlug.'-customJS',base64_encode( $_POST['customJS'] ));	 
	 	kaswara_save_option($kswrlug.'-googlemapsapi',$_POST['googleMapApi']);	 
	 	//kaswara_save_option($kswrlug.'-gMapsKey', $_POST['gMapsKey']);	 
	}
	wp_die();
}




//Function To Save the Contact Form 7 New Style
add_action('wp_ajax_kaswaraCf7Designer', 'kaswara_cf7_designer_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraCf7Designer', 'kaswara_cf7_designer_handler_callback');
function kaswara_cf7_designer_handler_callback(){		
	if(isset($_POST['actionName'], $_POST['action']) != '' && trim($_POST['action']) == 'kaswaraCf7Designer'){ 				 
		$kmcf7_styles = kaswara_get_single_option('kmcf7_styles'); 
		$kmslug =kaswara_get_options_slug_plugin();	
		$styleID = str_replace(' ','-',strtolower($_POST['styleName']));
		if($_POST['actionName'] == 'save'){
			kaswaracf7_save_update($styleID,$_POST['styleName'], $_POST['styleType'], $_POST['styleButton'], $_POST['theStyle'],$_POST['buttonCSS']);
		}
		if($_POST['actionName'] == 'delete'){
				unset($kmcf7_styles[$styleID]);		
				//$kmcf7_styles = array_values($kmcf7_styles);	
				kaswara_save_option($kmslug.'-kmcf7_styles',$kmcf7_styles);		
		}
		
	}
	die();
}

function kaswaracf7_save_update($styleID,$styleName, $styleType, $styleButton, $theStyle,$buttonCSS){
	$kmcf7_styles = kaswara_get_single_option('kmcf7_styles'); 
	$kmslug =kaswara_get_options_slug_plugin();	
	if(!is_array($kmcf7_styles) || empty($kmcf7_styles))
		$kmcf7_styles = array();

	unset($kmcf7_styles[$styleID]);
	//$kmcf7_styles = array_values($kmcf7_styles);
	kaswara_save_option($kmslug.'-kmcf7_styles',$kmcf7_styles);	 			

	$kmcf7_styles[$styleID] = array(
		'styleName' => $styleName,
		'styleType' => $styleType,
		'styleButton' => $styleButton,
		'theStyle' => $theStyle,
		'buttonCSS' => $buttonCSS
	);	
	kaswara_save_option($kmslug.'-kmcf7_styles',$kmcf7_styles);	 	
}

//Function To Return The Form Styler
add_action('wp_ajax_kaswaraCf7FormCreator', 'kaswara_cf7_form_styler_creator_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraCf7FormCreator', 'kaswara_cf7_form_styler_creator_handler_callback');
function kaswara_cf7_form_styler_creator_handler_callback(){		
	if(isset($_POST['actionName'],$_POST['styleType'], $_POST['action']) != '' && trim($_POST['action']) == 'kaswaraCf7FormCreator'){ 
		if($_POST['actionName'] == 'form'){
			$styletypes = kaswara_cf7_styletypes();
			$result = '';
			foreach ($styletypes[$_POST['styleType']]['styleBuilder'] as $key => $value) {	
				$result = kaswara_cf7_formcreator($value);
			}			
		}
	}	
	die();
}

//Function To Return The Form Button Styler
add_action('wp_ajax_kaswaraCf7FormCreatorButton', 'kaswara_cf7_form_styler_creator_button_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraCf7FormCreatorButton', 'kaswara_cf7_form_styler_creator_button_handler_callback');
function kaswara_cf7_form_styler_creator_button_handler_callback(){
	if(isset($_POST['action']) && trim($_POST['action']) == 'kaswaraCf7FormCreatorButton'){ 
		kswrcf7_buttonStylerSection();
	}
	die();
}


//Function To Save The Shortcode List
add_action('wp_ajax_kaswaraShortCodeListSave', 'kaswara_saveshortcodelist_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraShortCodeListSave', 'kaswara_saveshortcodelist_handler_callback');
function kaswara_saveshortcodelist_handler_callback(){
	if(isset($_POST['shortcodelist'],$_POST['action']) && trim($_POST['action']) == 'kaswaraShortCodeListSave'){ 
		kaswara_save_option('kswr_shortcode_list', $_POST['shortcodelist']);
		echo $_POST['shortcodelist'];
	}
	die();
}


//Function To Add A Replica Section to the page
add_action('wp_ajax_kaswaraAddReplicaSection', 'kaswara_addreplicascrtion_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraAddReplicaSection', 'kaswara_addreplicascrtion_handler_callback');
function kaswara_addreplicascrtion_handler_callback(){
	if(isset($_POST['sectionid'],$_POST['action']) && trim($_POST['action']) == 'kaswaraAddReplicaSection'){ 
		$outPut ='';
		$query_options = array('p' => $_POST['sectionid'] , 'post_type'=> 'replica_section' );
		query_posts( $query_options );	
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				$outPut = get_the_content();
			endwhile;
		endif;	
		echo $outPut;
	}
	die();
}




//Function Save Default Shotcode Styling
add_action('wp_ajax_kaswaraSaveShortcodeStyle', 'kaswara_save_shortcode_styling_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraSaveShortcodeStyle', 'kaswara_save_shortcode_styling_handler_callback');
function kaswara_save_shortcode_styling_handler_callback(){		
	if(isset($_POST['action'], $_POST['elementData'], $_POST['shortcodeID']) && trim($_POST['action']) == 'kaswaraSaveShortcodeStyle'){				
		$elementData = array();
		$elementData = json_decode(stripslashes($_POST['elementData']), true);		
		kaswara_save_option(kaswara_get_options_slug_plugin().'-'.$_POST['shortcodeID'],$elementData);
	}
		
	wp_die();
}



//Function To load and search for fonts 
add_action('wp_ajax_kaswaraLoadGFonts', 'kaswara_load_gfonts_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraLoadGFonts', 'kaswara_load_gfonts_handler_callback');
function kaswara_load_gfonts_handler_callback(){		
	if(isset($_POST['action'], $_POST['operation'], $_POST['first'], $_POST['second']) && trim($_POST['action']) == 'kaswaraLoadGFonts' && $_POST['operation'] =='load'){ 				 
		$gfont_array = kswr_return_google_font_names();
		$gfont_array = array_slice($gfont_array, $_POST['first'], $_POST['second']);		
		echo json_encode($gfont_array , true); 	
	}

	if(isset($_POST['action'], $_POST['operation'], $_POST['fontname']) && trim($_POST['action']) == 'kaswaraLoadGFonts' && $_POST['operation'] == 'search'){ 				 
		$gfont_array = kswr_return_google_font_names();	
		$search_sentence = preg_quote($_POST['fontname'], '~'); 	
		$result = preg_grep('~' . $search_sentence . '~', $gfont_array);
		echo json_encode($result , true); 	
	}
	
	wp_die();
}

//Function To add new font to the collection  
add_action('wp_ajax_kaswaraNewFontOperation', 'kaswara_gfonts_operations_handler_callback' );
add_action('wp_ajax_nopriv_kaswaraNewFontOperation', 'kaswara_gfonts_operations_handler_callback');
function kaswara_gfonts_operations_handler_callback(){		
	$kswrlug =kaswara_get_options_slug_plugin();
	$gFontArray = kaswara_get_single_option('gfonts');
	if(!is_array($gFontArray))	$gFontArray = array();
	if(isset($_POST['action'], $_POST['fontname'], $_POST['operation'] ) && trim($_POST['fontname']) != '' && trim($_POST['action']) == 'kaswaraNewFontOperation' && $_POST['operation'] == 'add'){ 		
		if(!in_array($_POST['fontname'],$gFontArray)){
			array_push($gFontArray,$_POST['fontname']);
			kaswara_save_option($kswrlug.'-gfonts', $gFontArray);		
		}
	}	
	if(isset($_POST['action'], $_POST['fontname'], $_POST['operation'] ) && trim($_POST['fontname']) != '' && trim($_POST['action']) == 'kaswaraNewFontOperation' && $_POST['operation'] == 'remove'){ 						
		if(in_array($_POST['fontname'],$gFontArray)){
			unset($gFontArray[array_search($_POST['fontname'], $gFontArray)]);						
			$gFontArray = array_values($gFontArray);			
			kaswara_save_option($kswrlug.'-gfonts', $gFontArray);	
			
		}
	}	
	wp_die();
}


//Search Post/Portfolio/Product for the Visual Composer Shortcodes
add_action('wp_ajax_kaswaraPostShorcodesSearch', 'kaswara_posttype_shortcodesearch_callback' );
add_action('wp_ajax_nopriv_kaswaraPostShorcodesSearch', 'kaswara_posttype_shortcodesearch_callback');
function kaswara_posttype_shortcodesearch_callback(){  
  if(isset($_POST['type'],$_POST['title'])){
      kaswara_search_post_type($_POST['type'],$_POST['title']);
  } 
  die();
}


function kaswara_search_post_type($type,$title){
  global $wpdb;
  $site = $wpdb->prefix.''.'posts';
  if(is_multisite() && !is_main_site(get_current_blog_id()))
    $site = $wpdb->prefix.''.get_current_blog_id().'_posts';

  $posts = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $site WHERE  post_type = '%s' AND post_title LIKE '%s'", $type , '%'.$title.'%' ) );  
  $json = array();
  if(is_array($posts)){
    foreach ( $posts as $p ) {
        $post = get_post( $p );
    array_push($json,array(
      'id'=> $post->ID,
      'title'=> $post->post_title
    ));   
    }    
  echo json_encode($json);
  }
}


function kswr_return_google_font_names(){
	return array("ABeeZee","Abel","Abhaya Libre","Abril Fatface","Aclonica","Acme","Actor","Adamina","Advent Pro","Aguafina Script","Akronim","Aladin","Aldrich","Alef","Alegreya","Alegreya SC","Alegreya Sans","Alegreya Sans SC","Alex Brush","Alfa Slab One","Alice","Alike","Alike Angular","Allan","Allerta","Allerta Stencil","Allura","Almendra","Almendra Display","Almendra SC","Amarante","Amaranth","Amatic SC","Amatica SC","Amethysta","Amiko","Amiri","Amita","Anaheim","Andada","Andika","Angkor","Annie Use Your Telescope","Anonymous Pro","Antic","Antic Didone","Antic Slab","Anton","Arapey","Arbutus","Arbutus Slab","Architects Daughter","Archivo Black","Archivo Narrow","Aref Ruqaa","Arima Madurai","Arimo","Arizonia","Armata","Artifika","Arvo","Arya","Asap","Asar","Asset","Assistant","Astloch","Asul","Athiti","Atma","Atomic Age","Aubrey","Audiowide","Autour One","Average","Average Sans","Averia Gruesa Libre","Averia Libre","Averia Sans Libre","Averia Serif Libre","Bad Script","Baloo","Baloo Bhai","Baloo Bhaina","Baloo Chettan","Baloo Da","Baloo Paaji","Baloo Tamma","Baloo Thambi","Balthazar","Bangers","Basic","Battambang","Baumans","Bayon","Belgrano","Belleza","BenchNine","Bentham","Berkshire Swash","Bevan","Bigelow Rules","Bigshot One","Bilbo","Bilbo Swash Caps","BioRhyme","BioRhyme Expanded","Biryani","Bitter","Black Ops One","Bokor","Bonbon","Boogaloo","Bowlby One","Bowlby One SC","Brawler","Bree Serif","Bubblegum Sans","Bubbler One","Buda","Buenard","Bungee","Bungee Hairline","Bungee Inline","Bungee Outline","Bungee Shade","Butcherman","Butterfly Kids","Cabin","Cabin Condensed","Cabin Sketch","Caesar Dressing","Cagliostro","Cairo","Calligraffitti","Cambay","Cambo","Candal","Cantarell","Cantata One","Cantora One","Capriola","Cardo","Carme","Carrois Gothic","Carrois Gothic SC","Carter One","Catamaran","Caudex","Caveat","Caveat Brush","Cedarville Cursive","Ceviche One","Changa","Changa One","Chango","Chathura","Chau Philomene One","Chela One","Chelsea Market","Chenla","Cherry Cream Soda","Cherry Swash","Chewy","Chicle","Chivo","Chonburi","Cinzel","Cinzel Decorative","Clicker Script","Coda","Coda Caption","Codystar","Coiny","Combo","Comfortaa","Coming Soon","Concert One","Condiment","Content","Contrail One","Convergence","Cookie","Copse","Corben","Cormorant","Cormorant Garamond","Cormorant Infant","Cormorant SC","Cormorant Unicase","Cormorant Upright","Courgette","Cousine","Coustard","Covered By Your Grace","Crafty Girls","Creepster","Crete Round","Crimson Text","Croissant One","Crushed","Cuprum","Cutive","Cutive Mono","Damion","Dancing Script","Dangrek","David Libre","Dawning of a New Day","Days One","Dekko","Delius","Delius Swash Caps","Delius Unicase","Della Respira","Denk One","Devonshire","Dhurjati","Didact Gothic","Diplomata","Diplomata SC","Domine","Donegal One","Doppio One","Dorsa","Dosis","Dr Sugiyama","Droid Sans","Droid Sans Mono","Droid Serif","Duru Sans","Dynalight","EB Garamond","Eagle Lake","Eater","Economica","Eczar","Ek Mukta","El Messiri","Electrolize","Elsie","Elsie Swash Caps","Emblema One","Emilys Candy","Engagement","Englebert","Enriqueta","Erica One","Esteban","Euphoria Script","Ewert","Exo","Exo 2","Expletus Sans","Fanwood Text","Farsan","Fascinate","Fascinate Inline","Faster One","Fasthand","Fauna One","Federant","Federo","Felipa","Fenix","Finger Paint","Fira Mono","Fira Sans","Fjalla One","Fjord One","Flamenco","Flavors","Fondamento","Fontdiner Swanky","Forum","Francois One","Frank Ruhl Libre","Freckle Face","Fredericka the Great","Fredoka One","Freehand","Fresca","Frijole","Fruktur","Fugaz One","GFS Didot","GFS Neohellenic","Gabriela","Gafata","Galada","Galdeano","Galindo","Gentium Basic","Gentium Book Basic","Geo","Geostar","Geostar Fill","Germania One","Gidugu","Gilda Display","Give You Glory","Glass Antiqua","Glegoo","Gloria Hallelujah","Goblin One","Gochi Hand","Gorditas","Goudy Bookletter 1911","Graduate","Grand Hotel","Gravitas One","Great Vibes","Griffy","Gruppo","Gudea","Gurajada","Habibi","Halant","Hammersmith One","Hanalei","Hanalei Fill","Handlee","Hanuman","Happy Monkey","Harmattan","Headland One","Heebo","Henny Penny","Herr Von Muellerhoff","Hind","Hind Guntur","Hind Madurai","Hind Siliguri","Hind Vadodara","Holtwood One SC","Homemade Apple","Homenaje","IM Fell DW Pica","IM Fell DW Pica SC","IM Fell Double Pica","IM Fell Double Pica SC","IM Fell English","IM Fell English SC","IM Fell French Canon","IM Fell French Canon SC","IM Fell Great Primer","IM Fell Great Primer SC","Iceberg","Iceland","Imprima","Inconsolata","Inder","Indie Flower","Inika","Inknut Antiqua","Irish Grover","Istok Web","Italiana","Italianno","Itim","Jacques Francois","Jacques Francois Shadow","Jaldi","Jim Nightshade","Jockey One","Jolly Lodger","Jomhuria","Josefin Sans","Josefin Slab","Joti One","Judson","Julee","Julius Sans One","Junge","Jura","Just Another Hand","Just Me Again Down Here","Kadwa","Kalam","Kameron","Kanit","Kantumruy","Karla","Karma","Katibeh","Kaushan Script","Kavivanar","Kavoon","Kdam Thmor","Keania One","Kelly Slab","Kenia","Khand","Khmer","Khula","Kite One","Knewave","Kotta One","Koulen","Kranky","Kreon","Kristi","Krona One","Kumar One","Kumar One Outline","Kurale","La Belle Aurore","Laila","Lakki Reddy","Lalezar","Lancelot","Lateef","Lato","League Script","Leckerli One","Ledger","Lekton","Lemon","Lemonada","Libre Baskerville","Libre Franklin","Life Savers","Lilita One","Lily Script One","Limelight","Linden Hill","Lobster","Lobster Two","Londrina Outline","Londrina Shadow","Londrina Sketch","Londrina Solid","Lora","Love Ya Like A Sister","Loved by the King","Lovers Quarrel","Luckiest Guy","Lusitana","Lustria","Macondo","Macondo Swash Caps","Mada","Magra","Maiden Orange","Maitree","Mako","Mallanna","Mandali","Marcellus","Marcellus SC","Marck Script","Margarine","Marko One","Marmelad","Martel","Martel Sans","Marvel","Mate","Mate SC","Maven Pro","McLaren","Meddon","MedievalSharp","Medula One","Meera Inimai","Megrim","Meie Script","Merienda","Merienda One","Merriweather","Merriweather Sans","Metal","Metal Mania","Metamorphous","Metrophobic","Michroma","Milonga","Miltonian","Miltonian Tattoo","Miniver","Miriam Libre","Mirza","Miss Fajardose","Mitr","Modak","Modern Antiqua","Mogra","Molengo","Molle","Monda","Monofett","Monoton","Monsieur La Doulaise","Montaga","Montez","Montserrat","Montserrat Alternates","Montserrat Subrayada","Moul","Moulpali","Mountains of Christmas","Mouse Memoirs","Mr Bedfort","Mr Dafoe","Mr De Haviland","Mrs Saint Delafield","Mrs Sheppards","Mukta Vaani","Muli","Mystery Quest","NTR","Neucha","Neuton","New Rocker","News Cycle","Niconne","Nixie One","Nobile","Nokora","Norican","Nosifer","Nothing You Could Do","Noticia Text","Noto Sans","Noto Serif","Nova Cut","Nova Flat","Nova Mono","Nova Oval","Nova Round","Nova Script","Nova Slim","Nova Square","Numans","Nunito","Odor Mean Chey","Offside","Old Standard TT","Oldenburg","Oleo Script","Oleo Script Swash Caps","Open Sans","Open Sans Condensed","Oranienbaum","Orbitron","Oregano","Orienta","Original Surfer","Oswald","Over the Rainbow","Overlock","Overlock SC","Ovo","Oxygen","Oxygen Mono","PT Mono","PT Sans","PT Sans Caption","PT Sans Narrow","PT Serif","PT Serif Caption","Pacifico","Palanquin","Palanquin Dark","Paprika","Parisienne","Passero One","Passion One","Pathway Gothic One","Patrick Hand","Patrick Hand SC","Pattaya","Patua One","Pavanam","Paytone One","Peddana","Peralta","Permanent Marker","Petit Formal Script","Petrona","Philosopher","Piedra","Pinyon Script","Pirata One","Plaster","Play","Playball","Playfair Display","Playfair Display SC","Podkova","Poiret One","Poller One","Poly","Pompiere","Pontano Sans","Poppins","Port Lligat Sans","Port Lligat Slab","Pragati Narrow","Prata","Preahvihear","Press Start 2P","Pridi","Princess Sofia","Prociono","Prompt","Prosto One","Proza Libre","Puritan","Purple Purse","Quando","Quantico","Quattrocento","Quattrocento Sans","Questrial","Quicksand","Quintessential","Qwigley","Racing Sans One","Radley","Rajdhani","Rakkas","Raleway","Raleway Dots","Ramabhadra","Ramaraja","Rambla","Rammetto One","Ranchers","Rancho","Ranga","Rasa","Rationale","Ravi Prakash","Redressed","Reem Kufi","Reenie Beanie","Revalia","Rhodium Libre","Ribeye","Ribeye Marrow","Righteous","Risque","Roboto","Roboto Condensed","Roboto Mono","Roboto Slab","Rochester","Rock Salt","Rokkitt","Romanesco","Ropa Sans","Rosario","Rosarivo","Rouge Script","Rozha One","Rubik","Rubik Mono One","Rubik One","Ruda","Rufina","Ruge Boogie","Ruluko","Rum Raisin","Ruslan Display","Russo One","Ruthie","Rye","Sacramento","Sahitya","Sail","Salsa","Sanchez","Sancreek","Sansita One","Sarala","Sarina","Sarpanch","Satisfy","Scada","Scheherazade","Schoolbell","Scope One","Seaweed Script","Secular One","Sevillana","Seymour One","Shadows Into Light","Shadows Into Light Two","Shanti","Share","Share Tech","Share Tech Mono","Shojumaru","Short Stack","Shrikhand","Siemreap","Sigmar One","Signika","Signika Negative","Simonetta","Sintony","Sirin Stencil","Six Caps","Skranji","Slabo 13px","Slabo 27px","Slackey","Smokum","Smythe","Sniglet","Snippet","Snowburst One","Sofadi One","Sofia","Sonsie One","Sorts Mill Goudy","Source Code Pro","Source Sans Pro","Source Serif Pro","Space Mono","Special Elite","Spicy Rice","Spinnaker","Spirax","Squada One","Sree Krushnadevaraya","Sriracha","Stalemate","Stalinist One","Stardos Stencil","Stint Ultra Condensed","Stint Ultra Expanded","Stoke","Strait","Sue Ellen Francisco","Suez One","Sumana","Sunshiney","Supermercado One","Sura","Suranna","Suravaram","Suwannaphum","Swanky and Moo Moo","Syncopate","Tangerine","Taprom","Tauri","Taviraj","Teko","Telex","Tenali Ramakrishna","Tenor Sans","Text Me One","The Girl Next Door","Tienne","Tillana","Timmana","Tinos","Titan One","Titillium Web","Trade Winds","Trirong","Trocchi","Trochut","Trykker","Tulpen One","Ubuntu","Ubuntu Condensed","Ubuntu Mono","Ultra","Uncial Antiqua","Underdog","Unica One","UnifrakturCook","UnifrakturMaguntia","Unkempt","Unlock","Unna","VT323","Vampiro One","Varela","Varela Round","Vast Shadow","Vesper Libre","Vibur","Vidaloka","Viga","Voces","Volkhov","Vollkorn","Voltaire","Waiting for the Sunrise","Wallpoet","Walter Turncoat","Warnes","Wellfleet","Wendy One","Wire One","Work Sans","Yanone Kaffeesatz","Yantramanav","Yatra One","Yellowtail","Yeseva One","Yesteryear","Yrsa","Zeyada");
}

?>