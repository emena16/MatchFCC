<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-11-08 16:17:29
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/admin123/views/base/tpl/moderator/video.tpl
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
?><?php if(!empty($videos)) { ?> <ul> <?php foreach($videos as $video) { ?> <?php $action = ($video->approved == 1) ? 'disapprovedvideo' : 'approvedvideo' ;?> <div class="m_video"> <?php VideoDesignCore::generate($video, VideoDesignCore::PREVIEW_MEDIA_MODE, 200, 200) ;?> <p class="italic"> <?php echo t('Posted by'); ?> <?php $design->getProfileLink($video->username) ;?><br /> <small><?php echo t('Posted on %0%', $video->createdDate); ?></small> </p> <div> <?php $text = ($video->approved == 1) ? t('Disapproved') : t('Approved') ;?> <?php LinkCoreForm::display($text, PH7_ADMIN_MOD,'moderator',$action, array('video_id'=>$video->videoId)) ;?> | <?php LinkCoreForm::display(t('Delete'), PH7_ADMIN_MOD, 'moderator', 'deletevideo', array('album_id'=>$video->albumId, 'video_id'=>$video->videoId, 'id'=>$video->profileId, 'username'=>$video->username, 'video_link'=>$video->file)) ;?> </div> </div> <?php } ?> </ul> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); } else { ?> <p class="center"><?php echo t('No Videos found for the moderation treatment.'); ?></p><?php } ?>