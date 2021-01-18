<?php
/*
* Website's main configuration data language independent
* More: https://opensolution.org/docs/?p=en-settings
*/
unset( $config, $lang, $aData );

/*
* If a website is under development, leave the DEVELOPER_MODE option enabled
* More: https://opensolution.org/docs/?p=en-settings#DEVELOPER_MODE
*/
define( 'DEVELOPER_MODE', true ); // comment this line once a website is publishing
if( defined( 'DEVELOPER_MODE' ) ){
  error_reporting( E_ALL | E_STRICT );
}

/*
* Email as login and password used to log in to the administration panel
* Ensure their security. Don't use passwords such as "admin", "1234", "qwerty" etc.
* More: https://opensolution.org/docs/?p=en-settings#login_email
*/
$config['login_email'] = "[[admin_email]]";
$config['login_pass'] = "[[admin_pass]]";

/*
* Setting IP address from which loging in to administration is possible
* More: https://opensolution.org/docs/?p=en-settings#allowed_ip_admin_panel
*/
$config['allowed_ip_admin_panel'] = null; // default value: null

/*
* Variable stores skin directory name
* More: https://opensolution.org/docs/?p=en-settings#skin
*/
$config['skin'] = 'default'; // default value: 'default'

/*
* Thumbnail sizes and image localizations. When adding a new localization, assign it a number not less than 50
* More: https://opensolution.org/docs/?p=en-settings#images_thumbnails
*/
$config['images_thumbnails'] = Array( 100, 200, 300 ); // default value: Array( 100, 200, 300 )
$config['images_locations'] = Array( 1 => 'Left side', 2 => 'Right side', 3 => 'Gallery', 0 => 'No display' ); // default value: Array( 1 => 'Left side', 2 => 'Right side', 3 => 'Gallery', 0 => 'No display' )

/*
* Menu types presented in a form of an array. Key 0 in the variable is reserved for hidden menu!
* More: https://opensolution.org/docs/?p=en-settings#pages_menus
*/
$config['pages_menus'] = Array( 1 => 'Top menu', 0 => 'Hidden' ); // default value: Array( 1 => 'Top menu', 0 => 'Hidden' )

/*
* Theme settings you can choose from when editing a page
* More: https://opensolution.org/docs/?p=en-settings#themes
*/
$config['themes'] = Array(
  1 => 'page.php', // default value: 1 => 'page.php'
);

/*
* The variable stores default language version. The website will be displayed in this language version until a client changes to another translation
* More: https://opensolution.org/docs/?p=en-settings#default_language
*/
$config['default_language'] = 'en'; // default value: 'en'

/*
* Translation of field descriptions and messages in the administration panel
*/
$config['admin_lang'] = 'en'; // default value: 'en'

/*
* Administration file name
* More: https://opensolution.org/docs/?p=en-settings#admin_file
*/
$config['admin_file'] = 'admin.php'; // default value: 'admin.php'

/*
* Option to disable a WYSIWYG editor (default editor: tinyMCE)
* More: https://opensolution.org/docs/?p=en-settings#wysiwyg
*/
$config['wysiwyg'] = 'tinymce'; // possible values: 'tinymce' (default), null

/*
* The variable responsible for disabling link to the currently viewed page in the navigation path
* More: https://opensolution.org/docs/?p=en-settings#page_link_in_navigation_path
*/
$config['page_link_in_navigation_path'] = true; // possible values: true (default), null

/*
* If set to true, main page name will be displayed in TITLE
* More: https://opensolution.org/docs/?p=en-settings#display_homepage_name_title
*/
$config['display_homepage_name_title'] = null; // possible values: true, null (default)

/*
* The option to remove unused files when a page is deleted
* More: https://opensolution.org/docs/?p=en-settings#delete_unused_files
*/
$config['delete_unused_files'] = true; // possible values: true (default), null

/*
* Possibility to display short page description in place of full description, if the page doesn't have a full description
* More: https://opensolution.org/docs/?p=en-settings#short_to_full_description
*/
$config['short_to_full_description'] = true; // possible values: true (default), null

/*
* "Drag and drop" zone for adding files to the page
* More: https://opensolution.org/docs/?p=en-settings#enable_files_uploader_dropzone
*/
$config['enable_files_uploader_dropzone'] = true; // possible values: true (default), null

/*
* Store allowed extensions of images and other files
* More: https://opensolution.org/docs/?p=en-settings#allowed_not_image_extensions
*/
// Extensions of files - not images
$config['allowed_not_image_extensions'] = 'pdf|swf|doc|txt|xls|ppt|rtf|odt|ods|odp|rar|zip|7z|bz2|tar|gz|tgz|arj|docx'; // default value: 'pdf|swf|doc|txt|xls|ppt|rtf|odt|ods|odp|rar|zip|7z|bz2|tar|gz|tgz|arj|docx'
// Extensions of images
$config['allowed_image_extensions'] = 'jpg|jpeg|gif|png|webp'; // default value: 'jpg|jpeg|gif|png|webp'

/*
* Size and quality of uploaded files settings
* More: https://opensolution.org/docs/?p=en-settings#max_image_size
*/
// Maximum size of the long side of an image for which a thumbnail will be generated
$config['max_image_size'] = 4000; // default value: 4000
// Maximum size of the long side of an image. When the value below is exceeded, the image will be resized to the value defined below.
$config['max_dimension_of_image'] = 1100; // default value: 1100
// Quality of the image being saved and resized
$config['image_quality'] = 80; // default value: 80

/*
* Changing file name to match the name of the page to which it is added
* More: https://opensolution.org/docs/?p=en-settings#change_files_names
*/
$config['change_files_names'] = null; // possible values: true, null (default)

// Default slider setting, find more possible options in the manual: https://opensolution.org/docs/?p=en-design#libraries
$config['default_slider_config'] = 'sAnimation:"fade",iPause:4000'; // default value: 'sAnimation:"fade",iPause:4000'

/*
* Srcset sizes informing the browser about the image which is to load for lower resolutions.
* Appropriate additional slider thumbnails will be created according to the sizes set in this variable
*/
$config['slider_srcset'] = Array( 667, 1024 ); // default value: Array( 667, 1024 )

/*
* Default settings to some of the options
* More: https://opensolution.org/docs/?p=en-settings#default_pages_menu
*/
// PAGE FORMS
// Default page type. Option of the $config['pages_menus']
$config['default_pages_menu'] = 1; // default value: 1

// Default page status. If its value is 'true', the page will be visible
$config['default_pages_status'] = true; // possible values: true (default), null

// Default parent page. Enter the id of a parent page, or leave it empty if you don't want to set a default parent page
$config['default_page_parent'] = ''; // possible values: 'Page ID', '' (default)

// Default localization of a page image. Option of the $config['images_locations'] variable
$config['default_image_location'] = 3; // default value: 1

// Default size of a page image thumbnail. Option of the $config['images_thumbnails'] variable
$config['default_image_size'] = 300; // default value: 300

// Default theme. Option of the $config['themes'] variable
$config['default_theme'] = 1; // default value: 1

/*
* Date format
* More: https://opensolution.org/docs/?p=en-settings#date_format_admin_default
*/
// Date presentation in the administration panel
$config['date_format_admin_default'] = 'Y-m-d H:i'; // default value: 'Y-m-d H:i'

/*
* Add time difference (in minutes) between local time and server time
* More: https://opensolution.org/docs/?p=en-settings#time_diff
*/
$config['time_diff'] = 0; // default value: 0

/*
* If you want the page name URL address to include a language abbreviation, also add a separator, for example _
* Once you modify this variable, edit any page in administration and save it (you don't have to change anything),
* the page address will be updated and will include language abbreviation and the separator.
* More: https://opensolution.org/docs/?p=en-settings#language_separator
*/
$config['language_separator'] = null; // default value: null

/*
* Settings of advanced select field with a search box
* More: https://opensolution.org/docs/?p=en-settings#advanced_select_default_width
*/
// Default field width
$config['advanced_select_default_width'] = '300px'; // default value: '300px'
// Width of the larger field - with the adv-select-long class
$config['advanced_select_long_width'] = '520px'; // default value: '520px'
// Width of the largest field - with the adv-select-very-long
$config['advanced_select_very_long_width'] = '650px'; // default value: '650px'
// Number of items in the select field, above which a search box appears
$config['enable_searching_in_advanced_select_from'] = 20; // default value: 20

/*
* Database directory. You can change its name, to do that make sure to read the manual
* More: https://opensolution.org/docs/?p=en-settings#dir_database
*/
$config['dir_database'] = 'database/'; // default value: 'database/'
$config['database'] = $config['dir_database'].'database.db'; // default value: $config['dir_database'].'database.db'

/*
* List of extensions and classes (CSS styles) assigned to them
* More: https://opensolution.org/docs/?p=en-settings#ext_icons
*/
$config['ext_icons'] = Array( 'rar'=>'zip', 'zip'=>'zip', 'bz2'=>'zip', 'gz'=>'zip', 'fla'=>'fla', 'mp3'=>'media', 'mpeg'=>'media', 'mpe'=>'media', 'mov'=>'media', 'mid'=>'media', 'midi'=>'media', 'asf'=>'media', 'avi'=>'media', 'wav'=>'media', 'wma'=>'media', 'msg'=>'eml', 'eml'=>'eml', 'pdf'=>'pdf', 'jpg'=>'pic', 'jpeg'=>'pic', 'jpe'=>'pic', 'gif'=>'pic', 'bmp'=>'pic', 'tif'=>'pic', 'tiff'=>'pic', 'wmf'=>'pic', 'png'=>'png', 'chm'=>'chm', 'hlp'=>'chm', 'psd'=>'psd', 'swf'=>'swf', 'pps'=>'pps', 'ppt'=>'pps', 'sys'=>'sys', 'dll'=>'sys', 'txt'=>'txt', 'doc'=>'txt', 'rtf'=>'txt', 'vcf'=>'vcf', 'xls'=>'xls', 'xml'=>'xml', 'tpl'=>'web', 'html'=>'web', 'htm'=>'web', 'com'=>'exe', 'bat'=>'exe', 'exe'=>'exe' );

/*
* Note!
* Variables and code below is directed to advanced users only, we do not recommend to modify it
*/
$config['language_cookie_name'] = defined( 'CUSTOMER_PAGE' ) ? 'sLanguage' : 'sLanguageBackEnd';

if( isset( $_GET['sLanguage'] ) && strlen( $_GET['sLanguage'] ) == 2 && is_file( $config['dir_database'].'config_'.$_GET['sLanguage'].'.php' ) ){
  setCookie( $config['language_cookie_name'], $_GET['sLanguage'], time( ) + 86400 );
  $config['language'] = $_GET['sLanguage'];
  $config['current_page_id'] = true;
}
else{
  if( !empty( $_COOKIE[$config['language_cookie_name']] ) && is_file( $config['dir_database'].'config_'.$_COOKIE[$config['language_cookie_name']].'.php' ) && strlen( $_COOKIE[$config['language_cookie_name']] ) == 2 )
    $config['language'] = $_COOKIE[$config['language_cookie_name']];
  else
    $config['language'] = $config['default_language'];
}

if( !isset( $_GET['p'] ) && !isset( $config['current_page_id'] ) && defined( 'CUSTOMER_PAGE' ) ){
  $config['current_page_id'] = getPageId( );
  if( is_numeric( $config['current_page_id'] ) && isset( $_COOKIE[$config['language_cookie_name']] ) && $config['language'] != $_COOKIE[$config['language_cookie_name']] ){
    setCookie( $config['language_cookie_name'], $config['language'], time( ) + 86400 );
  }
}

require $config['dir_database'].'config_'.$config['language'].'.php';
require defined( 'CUSTOMER_PAGE' ) ? $config['dir_database'].'lang_'.$config['language'].'.php' : ( is_file( $config['dir_database'].'lang_'.$config['admin_lang'].'.php' ) ? $config['dir_database'].'lang_'.$config['admin_lang'].'.php' : $config['dir_database'].'lang_'.$config['language'].'.php' );

if( isset( $config['current_page_id'] ) && $config['current_page_id'] === true ){
  $config['current_page_id'] = $config['start_page'];
}

$config['version'] = '6.7';
$config['manual_link'] = 'https://opensolution.org/docs/?v='.$config['version'].'&amp;p='.( ( $config['admin_lang'] == 'pl' ) ? 'pl' : 'en' ).'-';

/*
* Verifies server settings and script's configuration
*/
if( defined( 'DEVELOPER_MODE' ) ){
  $sValue = (float) phpversion( );
  if( $sValue < '7.2' )
    exit( '<h1>Required PHP version is <u>7.2.0</u>, your version is '.phpversion( ).'</h1>' );
  elseif( !extension_loaded( 'pdo_sqlite' ) )
    exit( '<h1>Required <u>PDO</u> library with <u>pdo_sqlite</u> extension is not available</h1>' );
  elseif( !is_file( $config['database'] ) )
    exit( '<h1>Required file <u>'.$config['database'].'</u> is not available</h1>' );
  elseif( defined( 'ADMIN_PAGE' ) && ini_get( 'allow_url_fopen' ) != 1 ){
    exit( '<h1>Turn ON <u>allow_url_fopen</u> in PHP configuration (php.ini)</h1>' );
  }
}
elseif( isset( $_GET['error'] ) && $_GET['error'] == md5( $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'] ) ){
  exit( '<h1>This page is temporary unavailable</h1>' );
}

/**
* Returns page id from the $_GET
* @return array
*/
function getPageId( ){
  global $config;
  if( !is_file( $config['dir_database'].'cache/links' ) )
    exit( '<h1>'.( defined( 'DEVELOPER_MODE' ) ? 'There is no required file: '.$config['dir_database'].'cache/links' : 'This page is temporary unavailable' ).'</h1>' );

  $config['pages_links'] = unserialize( file_get_contents( $config['dir_database'].'cache/links' ) );
  if( isset( $_GET ) && is_array( $_GET ) ){
    foreach( $_GET as $mKey => $mValue ){
      if( isset( $config['pages_links']['?'.$mKey] ) ){
        $config['language'] = $config['pages_links']['?'.$mKey][1];
        return $config['pages_links']['?'.$mKey][0];
      }
      else
        return ( !empty( $mValue ) ? true : false );
    }
    return true;
  }
} // end function getPageId
?>