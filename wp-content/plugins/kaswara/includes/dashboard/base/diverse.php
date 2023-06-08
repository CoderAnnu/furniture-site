<?php 
/**
 * Title         : Aqua Resizer
 * Description   : Resizes WordPress images on the fly
 * Version       : 1.2.2
 * Author        : Syamil MJ
 * Author URI    : http://aquagraphite.com
 * License       : WTFPL - http://sam.zoy.org/wtfpl/
 * Documentation : https://github.com/sy4mil/Aqua-Resizer/
 *
 * @param string  $url      - (required) must be uploaded using wp media uploader
 * @param int     $width    - (required)
 * @param int     $height   - (optional)
 * @param bool    $crop     - (optional) default to soft crop
 * @param bool    $single   - (optional) returns an array if false
 * @param bool    $upscale  - (optional) resizes smaller images
 * @uses  wp_upload_dir()
 * @uses  image_resize_dimensions()
 * @uses  wp_get_image_editor()
 *
 * @return str|array
 */
if(!class_exists('Kaswara_Resize')) {
    class KSWRAq_Exception extends Exception {}
    class Kaswara_Resize
    {
        static private $instance = null;     
        public $throwOnError = false;        
        private function __construct() {}
        private function __clone() {}
        static public function getInstance() {
            if(self::$instance == null) {
                self::$instance = new self;
            }
            return self::$instance;
        }
        public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
            try {
                if (!$url)
                    throw new KSWRAq_Exception('$url parameter is required');
                if (!$width)
                    throw new KSWRAq_Exception('$width parameter is required');
                if ( true === $upscale ) add_filter( 'image_resize_dimensions', array($this, 'aq_upscale'), 10, 6 );
                $upload_info = wp_upload_dir();
                $upload_dir = $upload_info['basedir'];
                $upload_url = $upload_info['baseurl'];                
                $http_prefix = "http://";
                $https_prefix = "https://";
                $relative_prefix = "//"; 
                if(!strncmp($url,$https_prefix,strlen($https_prefix))){ 
                    $upload_url = str_replace($http_prefix,$https_prefix,$upload_url);
                }
                elseif(!strncmp($url,$http_prefix,strlen($http_prefix))){ 
                    $upload_url = str_replace($https_prefix,$http_prefix,$upload_url);      
                }
                elseif(!strncmp($url,$relative_prefix,strlen($relative_prefix))){
                    $upload_url = str_replace(array( 0 => "$http_prefix", 1 => "$https_prefix"),$relative_prefix,$upload_url);
                }               
                if ( false === strpos( $url, $upload_url ) )
                    throw new KSWRAq_Exception('Image must be local: ' . $url);                
                $rel_path = str_replace( $upload_url, '', $url );
                $img_path = $upload_dir . $rel_path;
                if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) )
                    throw new KSWRAq_Exception('Image file does not exist (or is not an image): ' . $img_path);
                $info = pathinfo( $img_path );
                $ext = $info['extension'];
                list( $orig_w, $orig_h ) = getimagesize( $img_path );
                $dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );
                $dst_w = $dims[4];
                $dst_h = $dims[5];
                if ( ! $dims || ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {
                    $img_url = $url;
                    $dst_w = $orig_w;
                    $dst_h = $orig_h;
                } else {
                    $suffix = "{$dst_w}x{$dst_h}";
                    $dst_rel_path = str_replace( '.' . $ext, '', $rel_path );
                    $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";
                    if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {
                        throw new KSWRAq_Exception('Unable to resize image because image_resize_dimensions() failed');
                    }
                    elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) ) {
                        $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
                    }
                    else {
                        $editor = wp_get_image_editor( $img_path );
                        if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) ) {
                            throw new KSWRAq_Exception('Unable to get WP_Image_Editor: ' . 
                                                   $editor->get_error_message() . ' (is GD or ImageMagick installed?)');
                        }
                        $resized_file = $editor->save();
                        if ( ! is_wp_error( $resized_file ) ) {
                            $resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );
                            $img_url = $upload_url . $resized_rel_path;
                        } else {
                            throw new KSWRAq_Exception('Unable to save resized image file: ' . $editor->get_error_message());
                        }
                    }
                }
                if ( true === $upscale ) remove_filter( 'image_resize_dimensions', array( $this, 'aq_upscale' ) );
                if ( $single ) {
                    $image = $img_url;
                } else {
                    $image = array (
                        0 => $img_url,
                        1 => $dst_w,
                        2 => $dst_h
                    );
                }
                return $image;
            }
            catch (KSWRAq_Exception $ex) {
                error_log('Kaswara_Resize.process() error: ' . $ex->getMessage());
                if ($this->throwOnError) {
                    throw $ex;
                }
                else {
                    return false;
                }
            }
        }
        function aq_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {
            if ( ! $crop ) return null;
            $aspect_ratio = $orig_w / $orig_h;
            $new_w = $dest_w;
            $new_h = $dest_h;
            if ( ! $new_w ) {
                $new_w = intval( $new_h * $aspect_ratio );
            }
            if ( ! $new_h ) {
                $new_h = intval( $new_w / $aspect_ratio );
            }
            $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );
            $crop_w = round( $new_w / $size_ratio );
            $crop_h = round( $new_h / $size_ratio );
            $s_x = floor( ( $orig_w - $crop_w ) / 2 );
            $s_y = floor( ( $orig_h - $crop_h ) / 2 );
            return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
        }
    }
}
if(!function_exists('kaswara_resize')) {
    function kaswara_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {       
        if ( defined( 'ICL_SITEPRESS_VERSION' ) ){
            global $sitepress;
            $url = $sitepress->convert_url( $url, $sitepress->get_default_language() );
        }       
        $kaswara_resize = Kaswara_Resize::getInstance();
        return $kaswara_resize->process( $url, $width, $height, $crop, $single, $upscale );
    }
}

function kaswara_image_maker($imageURL, $size, $customClasses = '', $type = 'image'){   
    $result = '';
    if($size == 'full'){
        $result = ($type == 'image') ? '<img src="'.$imageURL.'" class="'.$customClasses.'" alt="'.esc_attr($customClasses).'"/>' : $imageURL;
    }
    else{
        $imageSizes = array(
            'kaswara-thumbnail'                     => array('width' => 120, 'height' => 120),
            'kaswara-small'                         => array('width' => 400, 'height' => 267),
            'kaswara-medium'                        => array('width' => 768, 'height' => 480),
            'kaswara-tall'                          => array('width' => 490, 'height' => 636),
            'kaswara-modernimage-grid'                => array('width' => 748, 'height' => 623),
            'kaswara-modernimage-side'                => array('width' => 1010, 'height' => 579),
            'kaswara-modernimage-masonryextrasmall'   => array('width' => 524, 'height' => 352),
            'kaswara-modernimage-masonrysmall'        => array('width' => 524, 'height' => 398),
            'kaswara-modernimage-masonrymedium'       => array('width' => 524, 'height' => 500),
            'kaswara-modernimage-masonrytall'         => array('width' => 524, 'height' => 650),
            'kaswara-modernimage-metrosquare'       => array('width' => 524, 'height' => 524),
            'kaswara-modernimage-metrowide'         => array('width' => 1048, 'height' => 524),
            'kaswara-modernimage-metrotall'         => array('width' => 524, 'height' => 1048),

        );
        $newImageURL = kaswara_resize($imageURL, $imageSizes[$size]['width'], $imageSizes[$size]['height'], true, true, true);
        $result = ($type == 'image') ? '<img src="'.$newImageURL.'" class="'.$customClasses.'" alt="'.esc_attr($customClasses).'"/>' : $newImageURL;        
    }
    return $result;

}





//Print Function for Moder Image

//Mercury Modern Image
function kswr_modernimage_mecury($elementOptions,$imageUrl,$imageLink){
	$insiderAttributes = $imageContainerAttributes = '';
	$insiderAttributes = 'data-syn-boxshadow-hover="'.esc_attr($elementOptions['boxshadow']).'" ';
	$insiderAttributes .= ($elementOptions['3dhover'] == 'enabled') ? ' data-tilt ' : '';

	$imageContainerAttributes .= ' data-container-frame="'.esc_attr($elementOptions['overlayframe']).'" data-content-showeffect="'.esc_attr($elementOptions['contentshoweffect']).'"  data-overlay-showeffect="'.esc_attr($elementOptions['overlayshoweffect']).'" data-rowposition="'.esc_attr($elementOptions['rowposition']).'"  data-columnposition="'.esc_attr($elementOptions['columnposition']).'"  data-portfoliostyle="mercury" data-hover-image="'.esc_attr($elementOptions['imageeffect']).'" data-overlay-type="normal"';	

	$titleStyle ='padding:'.$elementOptions['titlepadding'].'px 0px;color:'.$elementOptions['titlecolor'].';'.$elementOptions['titlefont'].''.$elementOptions['titlefontstyle'];
	$subtitleStyle ='color:'.$elementOptions['subtitlecolor'].';'.$elementOptions['subtitlefont'].''.$elementOptions['subtitlefontstyle'];

	$outPut = '<div class="syn-lportf-ctn syn-hvimage-mercury syn-hvimage-ctn  syn-isotope-item '.$elementOptions['customclasses'].'" '.$imageContainerAttributes.' >
					<div class="syn-hvimage-insider" '.$insiderAttributes.'>
						'.$imageLink.'		
						<div class="syn-lportf-overlay syn-bxsizing syn-hvimage-overlay syn-transition-3" style="background:'.$elementOptions['overlaycolor'].';"></div>
						<div class="syn-lportf-background kswr-full-section syn-hvimage-background"><img class="syn-lportf-img kswr-full-section" src="'.$imageUrl.'" alt="'.$elementOptions['title'].'"></div>
						<div class="syn-lportf-content syn-bxsizing syn-hvimage-content syn-tilt-elem">
							<h3 class="syn-lportf-title syn-hvimage-content-elem syn-transition-d2 syn-animation-d2 syn-transition-4"><span class="syn-hvimage-content-elemspan kswr-shortcode-element '.$elementOptions['titlefontstyleclasses'].' " style="'.$titleStyle.'" data-fontsettings="'.$elementOptions['titlefont'].'">'.$elementOptions['title'].'</span></h3>
							<div class="syn-lportf-info syn-hvimage-content-elem syn-transition-d3 syn-animation-d4 syn-transition-4"><span class="syn-hvimage-content-elemspan '.$elementOptions['subtitlefontstyleclasses'].' " style="'.$subtitleStyle.'">'.$elementOptions['subtitle'].'</span></div>
						</div>				
						</div>
				</div>';

		return $outPut;
}

//Venus Modern Image
function kswr_modernimage_venus($elementOptions,$imageUrl,$imageLink){
	$insiderAttributes = $imageContainerAttributes = '';
	$insiderAttributes = 'data-syn-boxshadow-hover="'.esc_attr($elementOptions['boxshadow']).'" ';
	$insiderAttributes .= ($elementOptions['3dhover'] == 'enabled') ? ' data-tilt ' : '';

	$imageContainerAttributes .= ' data-container-frame="'.esc_attr($elementOptions['overlayframe']).'" data-content-showeffect="'.esc_attr($elementOptions['contentshoweffect']).'"  data-overlay-showeffect="'.esc_attr($elementOptions['overlayshoweffect']).'" data-rowposition="middle" data-columnposition="center"  data-portfoliostyle="venus" data-hover-image="'.esc_attr($elementOptions['imageeffect']).'" data-overlay-type="normal" data-bordersize="'.esc_attr($elementOptions['bordersize']).'"';	


	$titleStyle ='padding:'.$elementOptions['titlepadding'].'px 0px;color:'.$elementOptions['titlecolor'].';'.$elementOptions['titlefont'].''.$elementOptions['titlefontstyle'];
	$subtitleStyle ='color:'.$elementOptions['subtitlecolor'].';'.$elementOptions['subtitlefont'].''.$elementOptions['subtitlefontstyle'];

	$outPut = '<div class="syn-lportf-ctn syn-hvimage-venus syn-hvimage-ctn  syn-isotope-item '.$elementOptions['customclasses'].'" '.$imageContainerAttributes.'>
					<div class="syn-hvimage-insider" '.$insiderAttributes.'>						
						'.$imageLink.'	
						<div class="syn-lportf-overlay syn-bxsizing syn-hvimage-overlay syn-transition-3" style="background:'.$elementOptions['overlaycolor'].';"></div>
						<div class="syn-lportf-border syn-bxsizing syn-hvimage-borderctn syn-tilt-elem" style="color:'.$elementOptions['colorscheme'].';">
							<div class="syn-hvimage-br syn-hvimage-bleft syn-hvimage-brlr syn-transition-3 syn-transition-d2"></div><div class="syn-hvimage-br syn-hvimage-bright syn-hvimage-brlr syn-transition-4 syn-transition-d2"></div>
							<div class="syn-hvimage-br syn-hvimage-btop syn-hvimage-brtb syn-transition-3 syn-transition-d2"></div><div class="syn-hvimage-br syn-hvimage-bottom syn-hvimage-brtb syn-transition-4 syn-transition-d2"></div>
						</div>
						<div class="syn-lportf-background kswr-full-section syn-hvimage-background"><img class="syn-lportf-img kswr-full-section" src="'.$imageUrl.'" alt="'.$elementOptions['title'].'"></div>
						<div class="syn-lportf-content syn-bxsizing syn-hvimage-content syn-tilt-elem">
							<h3 class="syn-lportf-title syn-hvimage-content-elem syn-transition-d2 syn-animation-d2 syn-transition-4"><span class="syn-hvimage-content-elemspan kswr-shortcode-element '.$elementOptions['titlefontstyleclasses'].' " style="'.$titleStyle.'" data-fontsettings="'.$elementOptions['titlefont'].'">'.$elementOptions['title'].'</span></h3>
							<div class="syn-lportf-info syn-hvimage-content-elem syn-transition-d3 syn-animation-d4 syn-transition-4"><span class="syn-hvimage-content-elemspan '.$elementOptions['subtitlefontstyleclasses'].' " style="'.$subtitleStyle.'">'.$elementOptions['subtitle'].'</span></div>
						</div>				
					</div>				
				</div>';
		return $outPut;

}


//Neptune Modern Image
function kswr_modernimage_neptune($elementOptions,$imageUrl,$imageLink){
	$insiderAttributes = $imageContainerAttributes = '';
	$insiderAttributes = 'data-syn-boxshadow-hover="'.esc_attr($elementOptions['boxshadow']).'" ';
	$insiderAttributes .= ($elementOptions['3dhover'] == 'enabled') ? ' data-tilt ' : '';

	$imageContainerAttributes .= ' data-container-frame="'.esc_attr($elementOptions['overlayframe']).'" data-content-showeffect="'.esc_attr($elementOptions['contentshoweffect']).'"  data-overlay-showeffect="'.esc_attr($elementOptions['overlayshoweffect']).'" data-rowposition="middle" data-columnposition="center"  data-portfoliostyle="neptune" data-hover-image="'.esc_attr($elementOptions['imageeffect']).'" data-overlay-type="normal" data-bordersize="'.esc_attr($elementOptions['bordersize']).'"';	

	$titleStyle ='padding:'.$elementOptions['titlepadding'].'px 0px;color:'.$elementOptions['titlecolor'].';'.$elementOptions['titlefont'].''.$elementOptions['titlefontstyle'];
	$subtitleStyle ='color:'.$elementOptions['subtitlecolor'].';'.$elementOptions['subtitlefont'].''.$elementOptions['subtitlefontstyle'];

	$outPut = '<div class="syn-lportf-ctn syn-hvimage-neptune syn-hvimage-ctn  syn-isotope-item '.$elementOptions['customclasses'].'" '.$imageContainerAttributes.'>
					<div class="syn-hvimage-insider" '.$insiderAttributes.'>											
						'.$imageLink.'	
						<div class="syn-lportf-overlay syn-bxsizing syn-hvimage-overlay syn-transition-3 syn-tilt-elem" style="background:'.$elementOptions['overlaycolor'].';"></div>
						<div class="syn-lportf-border syn-bxsizing syn-hvimage-borderctn syn-tilt-elem" style="color:'.$elementOptions['colorscheme'].';">
							<div class="syn-hvimage-br syn-hvimage-bleft syn-hvimage-brlr syn-transition-3 syn-transition-d2"></div><div class="syn-hvimage-br syn-hvimage-bright syn-hvimage-brlr syn-transition-4 syn-transition-d2"></div>
							<div class="syn-hvimage-br syn-hvimage-btop syn-hvimage-brtb syn-transition-3 syn-transition-d2"></div><div class="syn-hvimage-br syn-hvimage-bottom syn-hvimage-brtb syn-transition-4 syn-transition-d2"></div>
						</div>
						<div class="syn-lportf-background kswr-full-section syn-hvimage-background"><img class="syn-lportf-img kswr-full-section" src="'.$imageUrl.'" alt="'.$elementOptions['title'].'"></div>
						<div class="syn-lportf-content syn-bxsizing syn-hvimage-content syn-tilt-elem">
							<h3 class="syn-lportf-title syn-hvimage-content-elem syn-transition-d2 syn-animation-d2 syn-transition-4"><span class="syn-hvimage-content-elemspan kswr-shortcode-element '.$elementOptions['titlefontstyleclasses'].' " style="'.$titleStyle.'" data-fontsettings="'.$elementOptions['titlefont'].'">'.$elementOptions['title'].'</span></h3>
							<div class="syn-lportf-info syn-hvimage-content-elem syn-transition-d3 syn-animation-d4 syn-transition-4"><span class="syn-hvimage-content-elemspan '.$elementOptions['subtitlefontstyleclasses'].' " style="'.$subtitleStyle.'">'.$elementOptions['subtitle'].'</span></div>
						</div>				
					</div>				
				</div>';
	return $outPut;			
}

//Uranus  Modern Image
function kswr_modernimage_uranus($elementOptions,$imageUrl,$imageLink){
	$insiderAttributes = $imageContainerAttributes = '';
	$insiderAttributes = 'data-syn-boxshadow-hover="'.esc_attr($elementOptions['boxshadow']).'" ';
	$insiderAttributes .= ($elementOptions['3dhover'] == 'enabled') ? ' data-tilt ' : '';

	$imageContainerAttributes .= ' data-container-frame="'.esc_attr($elementOptions['overlayframe']).'" data-content-showeffect="'.esc_attr($elementOptions['contentshoweffect']).'"  data-overlay-showeffect="'.esc_attr($elementOptions['overlayshoweffect']).'" data-rowposition="middle" data-columnposition="center"  data-portfoliostyle="neptune" data-hover-image="'.esc_attr($elementOptions['imageeffect']).'" data-overlay-type="normal" data-bordersize="'.esc_attr($elementOptions['bordersize']).'"';	

	$titleStyle ='padding:'.$elementOptions['titlepadding'].'px 0px;color:'.$elementOptions['titlecolor'].';'.$elementOptions['titlefont'].''.$elementOptions['titlefontstyle'];
	$subtitleStyle ='color:'.$elementOptions['subtitlecolor'].';'.$elementOptions['subtitlefont'].''.$elementOptions['subtitlefontstyle'];

	$outPut = '<div class="syn-lportf-ctn syn-hvimage-uranus syn-hvimage-ctn  syn-isotope-item '.$elementOptions['customclasses'].'" '.$imageContainerAttributes.'>
					<div class="syn-portfolio-insider syn-hvimage-insider" '.$insiderAttributes.'>																	
						'.$imageLink.'		
						<div class="syn-lportf-overlay syn-bxsizing syn-hvimage-overlay syn-transition-3"  style="background:'.$elementOptions['overlaycolor'].';"></div>
						<div class="syn-lportf-border syn-bxsizing syn-hvimage-borderctn syn-tilt-elem" style="color:'.$elementOptions['colorscheme'].';">
							<div class="syn-hvimage-br syn-hvimage-bleft syn-hvimage-brlr syn-transition-4 syn-transition-d2"></div><div class="syn-hvimage-br syn-hvimage-bright syn-hvimage-brlr syn-transition-4 syn-transition-d2"></div>
							<div class="syn-hvimage-br syn-hvimage-btop syn-hvimage-brtb syn-transition-4 syn-transition-d2"></div><div class="syn-hvimage-br syn-hvimage-bottom syn-hvimage-brtb syn-transition-4 syn-transition-d2"></div>
						</div>
						<div class="syn-lportf-background kswr-full-section syn-hvimage-background"><img class="syn-lportf-img kswr-full-section" src="'.$imageUrl.'" alt="'.$elementOptions['title'].'"></div>
						<div class="syn-lportf-content syn-bxsizing syn-hvimage-content syn-tilt-elem">
							<h3 class="syn-lportf-title syn-hvimage-content-elem syn-transition-d2 syn-animation-d2 syn-transition-4"><span class="syn-hvimage-content-elemspan kswr-shortcode-element '.$elementOptions['titlefontstyleclasses'].' " style="'.$titleStyle.'" data-fontsettings="'.$elementOptions['titlefont'].'">'.$elementOptions['title'].'</span></h3>
							<div class="syn-lportf-info syn-hvimage-content-elem syn-transition-d3 syn-animation-d4 syn-transition-4"><span class="syn-hvimage-content-elemspan '.$elementOptions['subtitlefontstyleclasses'].' " style="'.$subtitleStyle.'">'.$elementOptions['subtitle'].'</span></div>
						</div>				
					</div>	
				</div>';
	return $outPut;			

}


//Pluto Modern Image
function kswr_modernimage_pluto($elementOptions,$imageUrl,$imageLink){
	$insiderAttributes = $imageContainerAttributes = '';
	$insiderAttributes = 'data-syn-boxshadow-hover="'.esc_attr($elementOptions['boxshadow']).'" ';
	$insiderAttributes .= ($elementOptions['3dhover'] == 'enabled') ? ' data-tilt ' : '';

	$imageContainerAttributes .= ' data-container-frame="'.esc_attr($elementOptions['overlayframe']).'" data-content-showeffect="'.esc_attr($elementOptions['contentshoweffect']).'"  data-overlay-showeffect="'.esc_attr($elementOptions['overlayshoweffect']).'" data-rowposition="bottom"  data-columnposition="left" data-portfoliostyle="pluto" data-hover-image="'.esc_attr($elementOptions['imageeffect']).'" data-overlay-type="normal"';	

	$titleStyle ='padding:'.$elementOptions['titlepadding'].'px 0px;color:'.$elementOptions['titlecolor'].';'.$elementOptions['titlefont'].''.$elementOptions['titlefontstyle'];
	$subtitleStyle ='color:'.$elementOptions['subtitlecolor'].';'.$elementOptions['subtitlefont'].''.$elementOptions['subtitlefontstyle'];

	$outPut = '<div class="syn-lportf-ctn syn-hvimage-pluto syn-hvimage-ctn  syn-isotope-item  '.$elementOptions['customclasses'].'" '.$imageContainerAttributes.'>
					<div class="syn-portfolio-insider syn-hvimage-insider" '.$insiderAttributes.'>																						
						'.$imageLink.'			
						<div class="syn-lportf-overlay syn-bxsizing syn-hvimage-overlay syn-transition-3" style="background:'.$elementOptions['overlaycolor'].';"></div>
						<div class="syn-lportf-background kswr-full-section syn-hvimage-background"><img class="syn-lportf-img kswr-full-section" src="'.$imageUrl.'" alt="'.$elementOptions['title'].'"></div>
						<div class="syn-hvimage-arrowctn syn-bxsizing syn-tilt-elem" style="color:'.$elementOptions['colorscheme'].';">
							<div class="syn-hvimage-arrowtop syn-hvimage-arrowitem syn-hvimage-arrowside syn-transition-d4 syn-transition-4"></div>
							<div class="syn-hvimage-arrowline syn-hvimage-arrowitem syn-transition-d3 syn-transition-4"></div>
							<div class="syn-hvimage-arrowbottom syn-hvimage-arrowitem syn-hvimage-arrowside syn-transition-d4 syn-transition-4"></div>
						</div>
						<div class="syn-lportf-content syn-bxsizing syn-hvimage-content syn-transition-2 syn-tilt-elem">
							<h3 class="syn-lportf-title syn-hvimage-content-elem syn-transition-d2 syn-animation-d2 syn-transition-4"><span class="syn-hvimage-content-elemspan kswr-shortcode-element '.$elementOptions['titlefontstyleclasses'].' " style="'.$titleStyle.'" data-fontsettings="'.$elementOptions['titlefont'].'">'.$elementOptions['title'].'</span></h3>
							<div class="syn-lportf-info syn-hvimage-content-elem syn-transition-d3 syn-animation-d4 syn-transition-4"><span class="syn-hvimage-content-elemspan '.$elementOptions['subtitlefontstyleclasses'].' " style="'.$subtitleStyle.'">'.$elementOptions['subtitle'].'</span></div>
						</div>				
					</div>				
				</div>';
	return $outPut;		

}
?>