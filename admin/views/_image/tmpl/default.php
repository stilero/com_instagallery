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
//$embeded = new InstaEmbeddings();
//$json = $embeded->getOembeded($this->image->link);
//$imageEmbeds = json_decode($json);
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
        <script src="<?php echo JURI::root().'media/system/js/mootools-core.js'; ?>"></script>
        <script src="<?php echo JURI::root().'administrator/components/com_instagallery/assets/js/lazyload.js'; ?>"></script>
        <?php 
        JHtml::_('behavior.framework');
        JHtml::script(JURI::root().'administrator/components/com_instagallery/assets/js/lazyload.js'); 
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span7">
                    <img data-src="<?php echo $this->image->images->standard_resolution->url; ?>" src="#" />
                    <div class="row-fluid">
                            <?php echo $this->loadTemplate('commentform'); ?>
                    </div>
                </div>
                <div class="span5 imagedetails">
                    <div class="profile detailitem">
                        <?php echo $this->loadTemplate('profile'); ?>
                    </div>
                    <div class="like detailitem">
                        <?php echo $this->loadTemplate('likeform'); ?>
                    </div>
                    <div class="info detailitem">
                        <?php echo $this->loadTemplate('info'); ?>
                    </div>
                    <div class="text detailitem">
                        <?php echo $this->loadTemplate('text'); ?>
                    </div>
                    <div class="tags detailitem">
                        <?php echo $this->loadTemplate('tags'); ?>
                    </div>
                    <div class="likes detailitem">
                        <?php echo $this->loadTemplate('likes'); ?>
                    </div>
                    <div class="comments detailitem">
                        <?php echo $this->loadTemplate('comments'); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 
unset($embeded); 
?>