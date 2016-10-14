
<?php
/**
 * Self View
 *
 * @version  1.1
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-27 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 * 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

class InstagalleryViewUser extends JViewLegacy{
    
    function display($tpl = null){
        JToolBarHelper::preferences('com_instagallery');
        Instamenuhelper::addSubmenu('user');
        JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/css/style.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/bootstrap/css/bootstrap-grid.min.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/bootstrap/css/bootstrap-icon.min.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_instagallery/assets/bootstrap/css/bootstrap-thumbs.min.css');
        $model = $this->getModel();
        $user_id = JRequest::getVar('user_id', 'self');
        if(!is_numeric($user_id) && $user_id != 'self'){
            $user_id = $model->getUserIdFromName($user_id);
        }
        $images = $model->getImages($user_id);
        $user = $model->getUserInfo($user_id);
        $relationsModel = $this->getModel('relationship');
        $isFollowing = $relationsModel->isFollowing($user_id);
        $this->isFollowing = $isFollowing;
        if(isset($user->username)){
            JToolBarHelper::title($user->username, 'user');
            $this->assignRef('images', $images);
            $this->assignRef('user', $user);
        }
        JHTML::_('behavior.modal'); 
        parent::display($tpl);
    }
    
}
