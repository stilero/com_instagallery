<?php
/**
* Description of mod_instagallery
*
* @version  1.0
* @author Daniel Eliasson <daniel at stilero.com>
* @copyright  (C) 2013-sep-26 Stilero Webdesign (http://www.stilero.com)
* @category Custom Form field
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*
*
*/
 
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.helper');


    class JFormFieldConnecteduser extends JFormField {
        protected $type = 'connecteduser';
        
        protected function getInput(){
            $params = JComponentHelper::getParams('com_instagallery');
            $accessToken = $params->get('access_token');
            $username = $params->get('authorized_username');
            if($username === null){
                $htmlCode = '<div class="chzn-container chzn-container-single" style="width: 220px;" title="" id="jform_published_chzn">';
                $htmlCode .= '<a class="chzn-single" tabindex="-1" rel="value_1" href="index.php?option=com_instagallery"><span>Connect Instagram</span></a></div>';
            }else{
                $htmlCode = '<h3 id="profilepic">'.$username.'</h3>';
            }
            
            return $htmlCode;
        }
        
        protected function getLabel(){
            $toolTip = JText::_($this->element['description']);
            $text = JText::_($this->element['label']);
            $labelHTML = '<label id="'.$this->id.'-lbl" for="'.$this->id.'" class="hasTip" title="'.$text.'::'.$toolTip.'">'.$text.'</label>';
            return $labelHTML;
        }
        
    }//End Class
