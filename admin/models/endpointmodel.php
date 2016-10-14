<?php
/**
 * Description of Instagallery
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-26 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
class InstagalleryModelEndpointmodel extends JModel{
    
    private $EndPoint;
    
    public function __construct($endPoint, $config = array()) {
        parent::__construct($config);
        $params = JComponentHelper::getParams('com_instagallery');
        $accessToken = $params->get('access_token');
        $this->EndPoint = new $endPoint($accessToken);
    }
}