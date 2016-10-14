<?php
/**
 * Comment Controller
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-25 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @subpackage Instagallery
 * @license	GPLv2
 * 
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

// import joomla controller library
jimport('joomla.application.component.controller');

class InstagalleryControllerComment extends JControllerLegacy{
    
    public static $modelName = 'comment';
    public static $viewName = 'comment';
    
    public function display($cachable = false, $urlparams = false){
        //Set Default View and Model
        $view = $this->getView( self::$viewName, 'raw' );
        $model = $this->getModel(  self::$modelName );
        $view->setModel( $model, true );
        $view->display();
    }
    
    public function postComment(){
        $view = $this->getView( self::$viewName, 'raw' );
        $model = $this->getModel(  self::$modelName );
        $view->setModel( $model, true );
        $view->postComment();
    }
    
    
}
