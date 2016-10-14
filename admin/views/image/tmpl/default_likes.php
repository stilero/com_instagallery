<?php
/**
 * Instagallery
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Instagallery
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-24 Stilero Webdesign http://www.stilero.com
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 
$maxCount = 10;
$i = 0;
$remainCount = $this->image->likes->count - $maxCount;
$remainHTML = '';
if($remainCount > 0){
    $remainHTML = '<span class="label label-info"><i class="icon-chevron-right icon-white"></i> and '.$remainCount.' more</span>';
}
?>
<i class="icon-heart"></i> <?php echo $this->image->likes->count; ?> Likes
<?php foreach ($this->image->likes->data as $like) : ?>
    <div class="like">
        <span class="label label-success">
            <a href="index.php?option=com_instagallery&view=user&format=raw&user_id=<?php echo $like->id; ?>">
                <i class="icon-user icon-white"></i> <?php echo $like->username; ?>
            </a>
        </span>
    </div>
    <? if($i++ == $maxCount) { break; }?>
<?php endforeach; ?>
<?php echo $remainHTML; ?>
