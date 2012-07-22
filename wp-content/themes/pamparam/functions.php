<?php
require_once('library/pamparam.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'portfolio-thumb-420', 420);
add_image_size( 'portfolio-attachment-880', 880);
add_image_size( 'post-thumb-880', 500, 200, true);

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function pamparam_register_sidebars() {
    register_sidebar(array(
    	'id' => 'main_sidebar',
    	'name' => 'Main sidebar',
    	'description' => 'The main sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
    	'id' => 'search_sidebar',
    	'name' => 'Search sidebar',
    	'description' => 'The search sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
    	'id' => 'simple_sidebar',
    	'name' => 'Simple sidebar',
    	'description' => 'The simple sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
    	'id' => 'footer_bar',
    	'name' => 'Footer bar',
    	'description' => 'The footer bar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
}

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function pamparam_wpsearch($form) {
    $form = '<form role="search" class="widget" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div id="form-content">
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Enter your search keywords..." />
    </div>
    </form>';
    return $form;
} // don't remove this bracket!

function pamparam_get_page_link_by_slug($page_slug, $pagenum = 0) {
    $page = get_page_by_path($page_slug);
    if ($page && $pagenum) :
            $_SERVER['REQUEST_URI'] .= '/'.$page_slug.'/';
            echo get_pagenum_link($pagenum);
    elseif ($page):
        echo get_permalink( $page->ID );
    else :
        echo "#";
    endif;
}

function pamparam_social_widget() {
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        $protocol = 'https';
    else
        $protocol = 'http';

    $widgets['facebook'] =
        sprintf(
            '<div class="facebook-like"><iframe src="%s://www.facebook.com/plugins/like.php?href=%s&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>',
            $protocol,
            rawurlencode(get_permalink())
        );
    
    $widgets['twitter'] =
        sprintf(
            '<div class="twitter-tweet"><a href="%s://twitter.com/share?url=%s" class="twitter-share-button" data-text="%s" data-via="" data-count="horizontal">%s</a><script type="text/javascript" src="' . $protocol . '://platform.twitter.com/widgets.js"></script></div>',
            $protocol,
            rawurlencode(get_permalink()),
            get_the_title(),
            __("Tweet", SW_DEF_STRING)
        );
    
    $widgets['google'] =
        sprintf(
            '<div class="google-plus"><g:plusone size="medium" href="%s"></g:plusone><script type="text/javascript">(function() { var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true; po.src = \'https://apis.google.com/js/plusone.js\'; var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s); })();</script></div>',
            get_permalink()
        );
    
    $content = '<div class="social-widget">';
    foreach ($widgets as $widget) {
        $content .= $widget;
    }
    $content .= '<div class="social-clear"></div></div>';
  
    echo $content;
}

?>