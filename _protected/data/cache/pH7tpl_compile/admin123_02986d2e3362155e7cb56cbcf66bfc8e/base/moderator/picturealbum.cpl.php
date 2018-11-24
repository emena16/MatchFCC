<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-11-08 16:17:27
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/admin123/views/base/tpl/moderator/picturealbum.tpl
Template Engine: PH7Tpl version 1.3.0 by Pierre-Henry Soria
*/
/***************************************************************************
 *     pH7CMS Pierre-Henry Soria
 *               --------------------
 * @since      Mon Mar 21 2011
 * @author     SORIA Pierre-Henry
 * @email      hello@ph7cms.com
 * @link       http://ph7cms.com
 * @copyright  (c) 2011-2018, Pierre-Henry Soria. All Rights Reserved.
 * @license    Creative Commons Attribution 3.0 License - http://creativecommons.org/licenses/by/3.0/
 ***************************************************************************/
?><div class="center"> <?php if(!empty($albums)) { ?> <ul> <?php foreach($albums as $album) { ?> <?php $action = ($album->approved == 1) ? 'disapprovedpicturealbum' : 'approvedpicturealbum' ;?> <?php $absolute_url = Framework\Mvc\Router\Uri::get('picture','main','album',"$album->username,$album->name,$album->albumId") ;?> <div class="thumb_photo"> <a href="<?php echo $absolute_url; ?>" target="_blank"> <img src="<?php echo PH7_URL_DATA_SYS_MOD?>picture/img/<?php echo $album->username ;?>/<?php echo $album->albumId ;?>/<?php echo $album->thumb ;?>" /> </a> <p class="italic"> <?php echo t('Posted by'); ?> <?php $design->getProfileLink($album->username) ;?><br /> <small><?php echo t('Posted on %0%', $album->createdDate); ?></small> </p> <div> <?php $text = ($album->approved == 1) ? t('Disapproved') : t('Approved') ;?> <?php LinkCoreForm::display($text, PH7_ADMIN_MOD, 'moderator', $action, array('album_id'=>$album->albumId)) ;?> | <?php LinkCoreForm::display(t('Delete'), PH7_ADMIN_MOD, 'moderator', 'deletepicturealbum', array('album_id'=>$album->albumId, 'id'=>$album->profileId, 'username'=>$album->username)) ;?> </div> </div> <?php } ?> </ul> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); ?> <?php } else { ?> <p><?php echo t('No Picture Albums found for the moderation treatment.'); ?></p> <?php } ?></div>