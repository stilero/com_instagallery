<?php
/**
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-21 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
  */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php if ($this->token === null) : ?>
    <?php echo $this->loadTemplate('connected'); ?>
<?php else : ?>
     <?php echo $this->loadTemplate('auth'); ?>
<?php endif; ?>
