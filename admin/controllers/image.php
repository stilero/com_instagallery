<?php
/**
 * Image Controller
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-23 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @subpackage Instagallery
 * @license	GPLv2
 * 
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

// import joomla controller library
jimport('joomla.application.component.controller');

class InstagalleryControllerImage extends JControllerLegacy{
    
    public static $modelName = 'image';
    public static $viewName = 'image';
    
    public function display($cachable = false, $urlparams = false){
        $view = $this->getView( self::$viewName, 'raw' );
        $model = $this->getModel(  self::$modelName );
        $view->setModel( $model, true );
        $relationsModel = $this->getModel('relationship' );
        $view->setModel( $relationsModel, false);
        $view->display();
    }
}
