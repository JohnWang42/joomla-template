<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

//Get category name if it exists
$db = &JFactory::getDBO();
$id = JRequest::getString('id');
if($id != ""){
  $db->setQuery('SELECT #__categories.title FROM #__content, #__categories WHERE #__content.catid = #__categories.id AND #__content.id = '.$id);
  $category = $db->loadResult();
} else {
  $category = "";
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
  <head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Media Query fix for older browsers -->
    <script type="text/javascript" src="<?php echo $tpath ?>/js/respond.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $tpath ?>/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $tpath ?>/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $tpath ?>/css/bootstrap.min.css" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $tpath ?>/css/template.css" type="text/css" />
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>

  <!-- Set page class -->
  <body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>">
    <jdoc:include type="modules" name="main-navigation" />
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="footer" />
  </body>

  <!-- JS -->
  <script type="text/javascript" src="<?php echo $tpath ?>/js/template.js"></script>
</html>
