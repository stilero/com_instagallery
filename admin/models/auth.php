<?php
/**
 * Auth Model
 *
 * @version  1.0
 * @author Daniel Eliasson (joomla@stilero.com)
 * @copyright  (C) 2012-nov-04 Stilero Webdesign (www.stilero.com)
 * @category Components
 * @subpackage InstaGallery
 * @license	GPLv2
 * 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
class InstaGalleryModelAuth extends JModelItem{
    
    private $redirectUri;
    private $client;
    private $accessCode;
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->redirectUri = JURI::current().'?option=com_instagallery&view=auth&'.JSession::getFormToken().'=1';
        $params = JComponentHelper::getParams('com_instagallery');
        $clientId = $params->get('client_id');
        $clientSecret = $params->get('client_secret');
        $this->client = new InstaClient($clientId, $clientSecret);
        $this->accessCode = new InstaOauthAccessCode($this->client, $this->redirectUri);
    }
    
    public function openAuthorization(){
        $this->accessCode->openAuthorizationUrl();
    }
    
    public function getToken($accessCode){
        $token = new InstaOauthAccessToken($this->client, $this->redirectUri, $accessCode);
        $accessToken = $token->requestAccessToken();
        if($accessToken != false){
            $params = & JComponentHelper::getParams('com_instagallery');
            $params->set('access_token', $accessToken);
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->update('#__extensions AS a');
            $query->set('a.params = '.$db->quote((string)$params->toString()));
            $query->where('a.element = '.$db->quote('com_instagallery'));
            $db->setQuery($query);
            $result = $db->query();
            if($result){
                JFactory::getApplication()->redirect('index.php?option=com_instagallery', JText::_('App Authorized'));
            }else{
                JFactory::getApplication()->redirect('index.php?option=com_instagallery', JText::_('Failed to authorize app'), 'error');
            }
            return $result;
        }
        return false;
    }
}