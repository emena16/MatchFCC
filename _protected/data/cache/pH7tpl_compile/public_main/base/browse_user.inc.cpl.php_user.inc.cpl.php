<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-09-27 19:58:58
Compiled file from: /home/proyectsm/public_html/matchfcc/templates/themes/base/tpl/browse_user.inc.tpl
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
?><div class="box-left col-md-3 col-lg-3 col-xl-2"> <div role="search" class="design-box"> <h2><?php echo t('Quick Search'); ?></h2> <?php SearchUserCoreForm::quick(PH7_WIDTH_SEARCH_FORM) ;?> </div></div><div class="box-right col-md-9 col-lg-9 col-xl-9 col-xl-offset-1"> <?php if(empty($users)) { ?> <p class="center bold"><?php echo t('Whoops! No users found.'); ?></p> <?php } else { ?> <?php foreach($users as $user) { ?> <?php $country_name = t($user->country) ;?> <?php $aAge = explode('-', $user->birthDate); $age = (new Framework\Math\Measure\Year($aAge[0], $aAge[1], $aAge[2]))->get() ;?> <div class="thumb_photo"> <?php UserDesignCoreModel::userStatus($user->profileId) ;?> <?php if($user->sex === 'male') { ?> <?php $sex_ico = ' <span class=green>&#9794;</span>' ;?> <?php } elseif($user->sex === 'female') { ?> <?php $sex_ico = ' <span class=pink>&#9792;</span>' ;?> <?php } else { ?> <?php $sex_ico = '' ;?> <?php } ?> <?php $avatarDesign->get($user->username, $user->firstName, $user->sex, 64, true) ;?> <p class="cy_ico"> <a href="<?php echo (new UserCore)->getProfileLink($user->username) ;?>" title="<?php echo t('Name: %0%', $user->firstName); ?><br> <?php echo t('Gender: %0% %1%', t($user->sex), $sex_ico); ?><br> <?php echo t('Seeking: %0%', t($user->matchSex)); ?><br> <?php echo t('Age: %0%', $age); ?><br> <?php echo t('From: %0%', $country_name); ?><br> <?php echo t('City: %0%', $this->str->upperFirst($user->city)); ?><br> <?php echo t('State: %0%', $this->str->upperFirst($user->state)); ?>"> <strong><?php echo $this->str->extract($user->username, PH7_MAX_USERNAME_LENGTH_SHOWN, PH7_ELLIPSIS) ;?></strong> </a> <img src="<?php $design->getSmallFlagIcon($user->country) ;?>" alt="<?php echo $country_name; ?>" title="<?php echo t('From %0%', $country_name); ?>" /> </p> <?php if($is_admin_auth) { ?> <p class="small"> <a href="<?php $design->url(PH7_ADMIN_MOD,'user','loginuseras',$user->profileId) ;?>" title="<?php echo t('Login As a member'); ?>"><?php echo t('Login As'); ?></a> | <?php if($user->ban == '0') { ?> <?php $design->popupLinkConfirm(t('Ban'), PH7_ADMIN_MOD, 'user', 'ban', $user->profileId) ;?> <?php } else { ?> <?php $design->popupLinkConfirm(t('UnBan'), PH7_ADMIN_MOD, 'user', 'unban', $user->profileId) ;?> <?php } ?> | <br /><?php $design->popupLinkConfirm(t('Delete'), PH7_ADMIN_MOD, 'user', 'delete', $user->profileId.'_'.$user->username) ;?> | <?php $design->ip($user->ip) ;?> </p> <?php } ?> </div> <?php } ?> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); ?> <?php } ?></div>