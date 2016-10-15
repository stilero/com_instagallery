<?php
/**
 * Description of Instagallery
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

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Instagram Image</title>
        <link href="<?php echo JURI::root().'administrator/components/com_instagallery/assets/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
        <link href="<?php echo JURI::root().'administrator/components/com_instagallery/assets/css/image.css'; ?>" rel="stylesheet">
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="<?php echo JURI::root().'administrator/components/com_instagallery/assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo JURI::root().'administrator/components/com_instagallery/assets/js/dialog.js'; ?>"></script>
        <script src="<?php echo JURI::root().'administrator/components/com_instagallery/assets/js/like.js'; ?>"></script>
        <script src="<?php echo JURI::root().'administrator/components/com_instagallery/assets/js/comment.js'; ?>"></script>
        <script src="<?php echo JURI::root().'administrator/components/com_instagallery/assets/js/relationship.js'; ?>"></script>
        <?php if(!isset($this->user)): ?>
        <div class="container-fluid">
            <div class="row-fluid well">
                <h1>Private user</h1>
            </div>
        </div>
        <?php 
            return;
            endif; ?>
        <div class="container-fluid">
            <div class="row-fluid well">
                <div class="span3">
                    <div class="row">
                         <div class="span12">
                        <img src="<?php echo $this->user->profile_picture; ?>" class="img-polaroid" />
                         </div>
                    </div>
                    <div class="row">
                        <div class="span12">
                        <?php echo $this->loadTemplate('follow'); ?>
                    </div>
                    </div>
                </div>
                <div class="span9">
                    <?php echo $this->loadTemplate('profile'); ?>
                </div>
            </div>
            <div class="row">
                <ul class="thumbnails">
                    <?php foreach ($this->images as $image) : ?>
                        <li class="span2">
                            <div class="thumbnail">
                                <a data-toggle="modal" href="index.php?option=com_instagallery&view=image&format=raw&id=<?php echo $image->id.'&'.JSession::getFormToken() .'=1';?>"><img src="<?php echo $image->images->thumbnail->url; ?>" alt=""></a>
                                <p>
                                    <i class="icon-time"></i><?php echo Boardhelper::timeToText($image->created_time); ?> 
                                    <i class="icon-heart"></i><?php echo $image->likes->count; ?> 
                                    <i class="icon-comment"></i><?php echo $image->comments->count; ?>
                                </p>
                            </div>             
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </body>
</html>