<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

//Get category name if it exists
$db = JFactory::getDBO();
$id = JRequest::getString('id');
if($id != ""){
  $db->setQuery('SELECT #__categories.title FROM #__content, #__categories WHERE #__content.catid = #__categories.id AND #__content.id = '.$id);
  $category = $db->loadResult();
} else {
  $category = "";
}

//remove extraneuos scripts
$this->_scripts = array();
unset($this->_script['text/javascript']);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
  <head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Media Query fix for older browsers -->
    <script type="text/javascript" src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript">window.respond || document.write('<script type="text/javascript" src="<?php echo $tpath ?>/js/vendor/respond.min.js">\x3C/script>')</script>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $tpath ?>/css/vendor/bootstrap.min.css" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $tpath ?>/css/template.min.css" type="text/css" />
  </head>

  <!-- Set page class -->
  <body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>">
    <jdoc:include type="modules" name="main-navigation" />
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="footer" />
  </body>

  <!-- JS -->
  <script type="text/javascript" src="//oss.maxcdn.com/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="<?php echo $tpath ?>/js/vendor/jquery-1.11.3.min.js">\x3C/script>')</script>
  <script async type="text/javascript" src="<?php echo $tpath ?>/js/vendor/blazy.min.js"></script>
  <script async type="text/javascript" src="<?php echo $tpath ?>/js/template.min.js"></script>
</html>
