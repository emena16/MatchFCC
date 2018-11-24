<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-11-08 16:21:39
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/admin123/views/base/tpl/user/browse.tpl
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
?><form method="post" action="<?php $design->url(PH7_ADMIN_MOD,'user','browse') ;?>"> <?php $designSecurity->inputToken('user_action') ;?> <div class="table-responsive"> <table class="table table-striped"> <thead> <tr> <th><input type="checkbox" name="all_action" /></th> <th><?php echo t('User ID#'); ?></th> <th><?php echo t('Email Address'); ?></th> <th><?php echo t('User'); ?></th> <th><?php echo t('Avatar'); ?></th> <th><?php echo t('IP'); ?></th> <th><?php echo t('Membership Group + ID'); ?></th> <th><?php echo t('Registration Date'); ?></th> <th><?php echo t('Last Activity'); ?></th> <th><?php echo t('Last Edit'); ?></th> <th><?php echo t('Reference'); ?></th> <th><?php echo t('Action'); ?></th> </tr> </thead> <tfoot> <tr> <th><input type="checkbox" name="all_action" /></th> <th> <button class="btn btn-default btn-md" type="submit" formaction="<?php $design->url(PH7_ADMIN_MOD,'user','banall') ;?>" ><?php echo t('Ban'); ?> </button> </th> <th> <button class="btn btn-default btn-md" type="submit" formaction="<?php $design->url(PH7_ADMIN_MOD,'user','unbanall') ;?>" ><?php echo t('UnBan'); ?> </button> </th> <th> <button class="red btn btn-default btn-md" type="submit" onclick="return checkChecked()" formaction="<?php $design->url(PH7_ADMIN_MOD,'user','deleteall') ;?>" ><?php echo t('Delete'); ?> </button> </th> <th> <button class="btn btn-default btn-md" type="submit" formaction="<?php $design->url(PH7_ADMIN_MOD,'user','approveall') ;?>" ><?php echo t('Approve'); ?> </button> </th> <th> <button class="btn btn-default btn-md" type="submit" formaction="<?php $design->url(PH7_ADMIN_MOD,'user','disapproveall') ;?>" ><?php echo t('Disapprove'); ?> </button> </th> <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> </tr> </tfoot> <tbody> <?php foreach($browse as $user) { ?> <tr> <td><input type="checkbox" name="action[]" value="<?php echo $user->profileId ;?>_<?php echo $user->username ;?>" /></td> <td><?php echo $user->profileId ;?></td> <td><?php echo $user->email ;?></td> <td> <?php $design->getProfileLink($user->username) ;?><br /> <span class="gray"><?php echo $user->firstName ;?></span> </td> <td><?php $avatarDesign->get($user->username, $user->firstName, null, 32) ;?></td> <td> <img src="<?php $design->getSmallFlagIcon(Framework\Geo\Ip\Geo::getCountryCode($user->ip)) ;?>" title="<?php echo t('Country Flag'); ?>" alt="<?php echo t('Country Flag'); ?>" /> <?php $design->ip($user->ip) ;?> </td> <td><?php echo $user->membershipName ;?> (<?php echo $user->groupId ;?>)</td> <td class="small"><?php echo $dateTime->get($user->joinDate)->dateTime() ;?></td> <td class="small"> <?php if(!empty($user->lastActivity)) { ?> <?php echo $dateTime->get($user->lastActivity)->dateTime() ;?> <?php } else { ?> <?php echo t('No login'); ?> <?php } ?> </td> <td class="small"> <?php if(!empty($user->lastEdit)) { ?> <?php echo $dateTime->get($user->lastEdit)->dateTime() ;?> <?php } else { ?> <?php echo t('No editing'); ?> <?php } ?> </td> <td class="small"><?php echo $user->reference ;?></td> <td class="small"> <a href="<?php $design->url('user','setting','edit',$user->profileId) ;?>" title="<?php echo t("Edit User's Profile"); ?>"><?php echo t('Edit'); ?></a> | <a href="<?php $design->url('user','setting','avatar',"$user->profileId,$user->username,$user->firstName,$user->sex", false) ;?>" title="<?php echo t("Edit User's Profile Photo"); ?>"><?php echo t('Edit Avatar'); ?></a> | <a href="<?php $design->url('user','setting','design',"$user->profileId,$user->username,$user->firstName,$user->sex", false) ;?>" title="<?php echo t("Edit the Wallpaper of the User's Profile Page"); ?>"><?php echo t('Edit Wallpaper'); ?></a> <?php if($is_mail_enabled) { ?> | <a href="<?php $design->url('mail','main','compose',$user->username) ;?>" title="<?php echo t('Send a message to this user'); ?>"><?php echo t('Send Mail'); ?></a> <?php } ?> | <a href="<?php $design->url(PH7_ADMIN_MOD,'user','loginuseras',$user->profileId) ;?>" title="<?php echo t('Login as a user (to edit all this user account).'); ?>"><?php echo t('Login As'); ?></a> | <?php if($user->ban == 0) { ?> <?php $design->popupLinkConfirm(t('Ban'), PH7_ADMIN_MOD, 'user', 'ban', $user->profileId) ;?> <?php } else { ?> <?php $design->popupLinkConfirm(t('UnBan'), PH7_ADMIN_MOD, 'user', 'unban', $user->profileId) ;?> <?php } ?> <?php if($user->active != 1) { ?> | <?php $design->popupLinkConfirm(t('Approve'), PH7_ADMIN_MOD, 'user', 'approve', $user->profileId) ;?> or <?php $design->popupLinkConfirm(t('Disapprove (notified user by email)'), PH7_ADMIN_MOD, 'user', 'disapprove', $user->profileId) ;?> <?php } ?> | <?php $design->popupLinkConfirm(t('Delete'), PH7_ADMIN_MOD, 'user', 'delete', $user->profileId.'_'.$user->username) ;?> </td> </tr> <?php } ?> </tbody> </table> </div></form><?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); ?>