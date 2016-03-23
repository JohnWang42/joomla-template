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
if($id != "" && is_numeric($id)){
  $db->setQuery('SELECT #__categories.title FROM #__content, #__categories WHERE #__content.catid = #__categories.id AND #__content.id = '.$id);
  $category = $db->loadResult();
} else {
  $category = "";
}

//remove extraneuos scripts
$this->_scripts = array();
unset($this->_script['text/javascript']);

//template js
$doc->addScript($tpath.'/js/vendor/respond.min.js');
$doc->addScript($tpath.'/js/vendor/jq-1.11.3.min.js');
$doc->addScript($tpath.'/js/vendor/blazy.min.js');
$doc->addScript($tpath.'/js/template.min.js');

//template css
$doc->addStyleSheet('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
$doc->addStyleSheet($tpath.'/css/vendor/bootstrap.min.css');
$doc->addStyleSheet($tpath.'/css/template.min.css');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
  <head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <!-- Set page class -->
  <body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>">
    <jdoc:include type="modules" name="main-navigation" />
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="footer" />
  </body>
</html>
