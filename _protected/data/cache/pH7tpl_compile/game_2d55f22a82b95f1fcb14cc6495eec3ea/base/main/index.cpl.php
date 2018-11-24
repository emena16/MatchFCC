<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-09-27 20:00:37
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/game/views/base/tpl/main/index.tpl
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
?><div class="box-left col-md-3 col-lg-3 col-xl-2"> <div class="design-box"> <h2><?php echo t('Search Games'); ?></h2> <?php SearchGameForm::display(PH7_WIDTH_SEARCH_FORM) ;?> </div> <div class="design-box"> <h2><?php echo t('Categories'); ?></h2> <ul> <?php foreach($categories as $category) { ?> <li> <a href="<?php $design->url('game','main','category',$category->name) ;?>" title="<?php echo $category->name ;?>" data-load="ajax"><?php echo $category->name ;?></a> - (<?php echo $category->totalCatGames ;?>) </li> <?php } ?> </ul> </div> <div class="design-box"> <h2><?php echo t('Top Popular Games'); ?></h2> <ul> <?php foreach($top_views as $views) { ?> <li> <a href="<?php $design->url('game','main','game',"$views->title,$views->gameId") ;?>" title="<?php echo $views->name ;?>"><?php echo $views->title ;?></a> </li> <?php } ?> </ul> </div> <div class="design-box"> <h2><?php echo t('Top Rated Games'); ?></h2> <ul> <?php foreach($top_rating as $rating) { ?> <li> <a href="<?php $design->url('game','main','game',"$rating->title,$rating->gameId") ;?>" title="<?php echo $rating->name ;?>"><?php echo $rating->title ;?></a> </li> <?php } ?> </ul> </div> <div class="design-box"> <h2><?php echo t('Newest Games'); ?></h2> <ul> <?php foreach($latest as $new) { ?> <li> <a href="<?php $design->url('game','main','game',"$new->title,$new->gameId") ;?>" title="<?php echo $new->name ;?>"><?php echo $new->title ;?></a> </li> <?php } ?> </ul> </div></div><div class="box-right col-md-9 col-lg-9 col-xl-9 col-xl-offset-1"> <div class="center"> <?php if(!empty($error)) { ?> <p><?php echo $error; ?></p> <?php } else { ?> <?php foreach($games as $game) { ?> <h2> <a href="<?php $design->url('game','main','game',"$game->title,$game->gameId") ;?>"><?php echo $game->title ;?></a> </h2> <div class="msg_content"> <p> <a rel="nofollow" href="<?php $design->url('game','main','game',"$game->title,$game->gameId") ;?>"> <img alt="<?php echo $game->title ;?>" title="<?php echo $game->title ;?>" src="<?php echo PH7_URL_DATA_SYS_MOD?>game/img/thumb/<?php echo $game->thumb ;?>" width="95" height="66" class="thumb_img" /> </a> </p> <p><strong><?php echo $game->title ;?></strong></p> <p><?php echo $game->description ;?></p> <?php if(AdminCore::auth()) { ?> <div> <a class="btn btn-default btn-sm" href="<?php $design->url('game','admin','edit',"$game->title,$game->gameId") ;?>"><?php echo t('Edit Game'); ?></a> &bull; <div class="btn btn-default btn-sm inline"> <?php LinkCoreForm::display(t('Delete Game'), 'game', 'admin', 'delete', array('id'=>$game->gameId, 'thumb'=>$game->thumb, 'file'=>$game->file)) ;?> </div> </div> <?php } ?> <hr /> </div> <?php } ?> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); ?> <?php } ?> </div></div>