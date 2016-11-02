<?php defined('_JEXEC') or die(file_get_contents('index.html'));
/**
 * @package   InstaGallery for Joomla
 * @copyright Copyright (c) 2010 - 2015 Daniel Eliasson. All rights reserved.
 * @license   Distributed under the terms of the GNU General Public License GNU/GPL v3 http://www.gnu.org/licenses/gpl-3.0.html
 */
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

class com_instagalleryInstallerScript
{
	private $results = array();
	private $component_name;

	
	public function __construct($parent)
	{
	}
	
	
	public function install($parent)
	{
		
		$this->chain_install($parent);
		
	}
	
	

	
	private function chain_install(JInstallerAdapterComponent $parent)
	{
		$manifest = $parent->get('manifest');
                
		$extensions = isset($manifest->chain->extension) ? $manifest->chain->extension : array();
		foreach ($extensions as $extension)
		{
			$attributes = $extension->attributes();
			$item = $parent->getParent()->getPath('source') . '/' . $attributes['directory'] . '/' . $attributes['name'];
			if (is_dir($item))
			{
				$installer = new JInstaller();
				$installed = $installer->install($item);
				$this->results[(string) $attributes['name']] = array('type' => strtoupper((string) $attributes['type']), 'result' => $installed ? 'SUCCESS' : 'ERROR', 'icon' => $installed ? 'ok' : 'delete');
			}
		
		}
		
		$this->results[$this->component_name] = array('type' => 'COMPONENT', 'result' => 'SUCCESS', 'icon' => 'ok');
	}
	
	
}