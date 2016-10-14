<?php
/**
 * Feed View
 *
 * @version  1.1
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-21 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 * 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

class InstagalleryViewPopular extends JViewLegacy{
    
    function display($tpl = null){
        JToolBarHelper::title(JText::_('Not Authorized'), 'user');
        JToolBarHelper::preferences('com_instagallery');
        $params = JComponentHelper::getParams('com_instagallery');
        $token = $params->get('access_token');
        if($token != ''){
            JToolBarHelper::title(JText::_('Popular'), 'newsfeeds');
            Instamenuhelper::addSubmenu('popular');
        }
        //JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/css/style.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/bootstrap/css/bootstrap-grid.min.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/bootstrap/css/bootstrap-icon.min.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/bootstrap/css/bootstrap-thumbs.min.css');
        //JHtmlBehavior::framework(true); 
        JHtml::_('behavior.framework'); 
        JHtml::script(JURI::root().'administrator/components/com_instagallery/assets/js/lazyload.js');
        JHTML::_('behavior.modal'); 
        $model = $this->getModel('popular');
        $items = $model->getImages();
        $this->assignRef('items', $items);
        parent::display($tpl);
    }
}
