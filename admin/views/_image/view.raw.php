<?php
/**
 * Image View
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-23 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 * 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
JRequest::checkToken('get') or die( 'Invalid Token' ); 
// import Joomla view library
jimport('joomla.application.component.view');

class InstagalleryViewImage extends JViewLegacy{
    
    function display($tpl = null){
        $model = $this->getModel('image');
        $image_id = JRequest::getCmd('id');
        $image = $model->getImage($image_id);
        $this->assignRef('image', $image);
        $relationsModel = $this->getModel('relationship');
        $isFollowing = $relationsModel->isFollowing($image->user->id);
        $this->assignRef('isFollowing', $isFollowing);
        parent::display($tpl);
    }
}
