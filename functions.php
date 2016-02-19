<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2.1
 * @filesource     wp-content/themes/responsive/includes/functions.php
 * @link           http://codex.wordpress.org/Theme_Development#Functions_File
 * @since          available since Release 1.0
 */
?>
<?php
/**
 * Fire up the engines boys and girls let's start theme setup.
 */

add_filter('wp_page_menu_args', 'page_menu_disable_home');
add_filter('responsive_container', 'add_google_tag_manager');
add_filter('responsive_header_top', 'search_box');
add_filter('responsive_wrapper_top', 'social_buttons');
add_filter('wp_head', 'set_font');
add_filter('wp_head', 'set_favicon');
add_filter('wp_head', 'fixup_footer');


function add_google_tag_manager()
{
  echo "<!-- Google Tag Manager -->
<noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-PB2CW7\"
height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PB2CW7');</script>
<!-- End Google Tag Manager -->\n";
}


function fixup_footer()
{
  echo "<script type=\"text/javascript\">\n";

  /* The grid class on the copyright, scroll-top, and powered elements
     causes them to each claim their own line when the width is narrowed.
     Removing the grid class allows them to stay on the same line. */
  echo "function removeGridClass() { jQuery('.copyright,.scroll-top,.powered').removeClass('grid'); }\n";

  /* The item with the .powered class says something like "powered by
     Responsive". We'll replace that with our privacy policy. */
  echo "function replacePowered() { jQuery('.powered').html('<a href=\"/privacy-policy\">Privacy Policy</a>'); }\n";

  echo "jQuery(document).ready (function() {removeGridClass(); replacePowered();});\n";
  echo "</script>\n";
}

function page_menu_disable_home($args)
{
  $args['show_home'] = 0;
  return $args;
}


function search_box()
{
  echo "    <div class=\"right\">";
  echo get_search_form();
  echo "    </div>";
}


function social_buttons()
{
  /*  
   * Globalize Theme options 
   */ 

  global $responsive_options; 
  $responsive_options = responsive_get_options();

  echo '<div class="social-icons">';
  echo '<ul>';

  if (!empty($responsive_options['twitter_uid'])) echo '<li class="twitter-icon"><a href="' . $responsive_options['twitter_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/twitter-icon.png" alt="Twitter">'
    .'</a></li>';

  if (!empty($responsive_options['facebook_uid'])) echo '<li class="facebook-icon"><a href="' . $responsive_options['facebook_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/facebook-icon.png" alt="Facebook">'
    .'</a></li>';

  if (!empty($responsive_options['linkedin_uid'])) echo '<li class="linkedin-icon"><a href="' . $responsive_options['linkedin_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/linkedin-icon.png" alt="LinkedIn">'
    .'</a></li>';

  if (!empty($responsive_options['youtube_uid'])) echo '<li class="youtube-icon"><a href="' . $responsive_options['youtube_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/youtube-icon.png" alt="YouTube">'
    .'</a></li>';

  if (!empty($responsive_options['stumble_uid'])) echo '<li class="stumble-upon-icon"><a href="' . $responsive_options['stumble_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/stumble-upon-icon.png" alt="StumbleUpon">'
    .'</a></li>';

  if (!empty($responsive_options['rss_uid'])) echo '<li class="rss-feed-icon"><a href="' . $responsive_options['rss_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/rss-feed-icon.png" alt="RSS Feed">'
    .'</a></li>';

  if (!empty($responsive_options['google_plus_uid'])) echo '<li class="google-plus-icon"><a href="' . $responsive_options['google_plus_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/googleplus-icon.png" alt="Google Plus">'
    .'</a></li>';

  if (!empty($responsive_options['instagram_uid'])) echo '<li class="instagram-icon"><a href="' . $responsive_options['instagram_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/instagram-icon.png" alt="Instagram">'
    .'</a></li>';

  if (!empty($responsive_options['pinterest_uid'])) echo '<li class="pinterest-icon"><a href="' . $responsive_options['pinterest_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/pinterest-icon.png" alt="Pinterest">'
    .'</a></li>';

  if (!empty($responsive_options['yelp_uid'])) echo '<li class="yelp-icon"><a href="' . $responsive_options['yelp_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/yelp-icon.png" alt="Yelp!">'
    .'</a></li>';

  if (!empty($responsive_options['vimeo_uid'])) echo '<li class="vimeo-icon"><a href="' . $responsive_options['vimeo_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/vimeo-icon.png" alt="Vimeo">'
    .'</a></li>';

  if (!empty($responsive_options['foursquare_uid'])) echo '<li class="foursquare-icon"><a href="' . $responsive_options['foursquare_uid'] . '">'
    .'<img src="' . get_stylesheet_directory_uri() . '/icons/foursquare-icon.png" alt="foursquare">'
    .'</a></li>';

  echo '<li><a href="/get-involved/donate/"><img src="' . get_stylesheet_directory_uri() . '/icons/donate-icon.png" alt="donate" /></a></li>';
  echo '<li><a href="http://www.amazon.com/gp/registry/wishlist/34MY4LW1EWB3O"><img src="' . get_stylesheet_directory_uri() . '/icons/wishlist.png" alt="Amazon wishlist" /></a></li>';

  echo '</ul>';
  echo '</div><!-- end of .social-icons -->';
}


function set_font()
{
  echo "<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css' />\n";
}


function set_favicon()
{
  echo "<link rel='shortcut icon' href='".get_stylesheet_directory_uri()."/favicon.ico' />\n";
}

?>
