<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-09-27 19:58:33
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/note/views/base/tpl/home.inc.tpl
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
?><div class="box-left col-md-3 col-lg-3 col-xl-2"> <div class="design-box"> <h2><?php echo t('Search Note Posts'); ?></h2> <?php SearchNoteForm::display(PH7_WIDTH_SEARCH_FORM) ;?> </div> <div class="design-box"> <h2><?php echo t('Top Authors'); ?></h2> <ul> <?php foreach($authors as $author) { ?> <li> <a href="<?php $design->url('note','main','author',$author->username) ;?>" title="<?php echo $author->username ;?>" data-load="ajax"><?php echo substr($author->username,0,20) ;?></a> - (<?php echo $author->totalNotes ;?>) </li> <?php } ?> </ul> </div> <div class="design-box"> <h2><?php echo t('Categories'); ?></h2> <ul> <?php foreach($categories as $category) { ?> <li> <a href="<?php $design->url('note','main','category',$category->name) ;?>" title="<?php echo $category->name ;?>" data-load="ajax"><?php echo $category->name ;?></a> - (<?php echo $category->totalNotes ;?>) </li> <?php } ?> </ul> </div> <div class="design-box"> <h2><?php echo t('Top Popular Posts'); ?></h2> <ul> <?php foreach($top_views as $views) { ?> <li> <a href="<?php $design->url('note','main','read',"$views->username,$views->postId") ;?>" title="<?php echo $views->pageTitle ;?>" data-load="ajax"> <?php echo $views->title ;?> </a> </li> <?php } ?> </ul> </div> <div class="design-box"> <h2><?php echo t('Top Rated Posts'); ?></h2> <ul> <?php foreach($top_rating as $rating) { ?> <li> <a href="<?php $design->url('note','main','read',"$rating->username,$rating->postId") ;?>" title="<?php echo $rating->pageTitle ;?>" data-load="ajax"> <?php echo $rating->title ;?> </a> </li> <?php } ?> </ul> </div></div><div class="box-right col-md-9 col-lg-9 col-xl-9 col-xl-offset-1"> <div class="center" id="note_block"> <?php if(!empty($error)) { ?> <p><?php echo $error; ?></p> <?php } else { ?> <?php foreach($posts as $post) { ?> <?php $content = escape($this->str->extract(Framework\Security\Ban\Ban::filterWord($post->content), 400), true) ;?> <h1> <a href="<?php $design->url('note','main','read',"$post->username,$post->postId") ;?>" title="<?php echo $post->title ;?>" data-load="ajax"> <?php echo escape(Framework\Security\Ban\Ban::filterWord($post->title)) ;?> </a> </h1> <div class="left"><?php NoteDesign::thumb($post) ;?></div> <?php echo $content; ?> <p><a href="<?php $design->url('note','main','read',"$post->username,$post->postId") ;?>" data-load="ajax"><?php echo t('See more'); ?></a></p> <?php if($is_user_auth AND $member_id === $post->profileId) { ?> <p> <a class="btn btn-default btn-sm" href="<?php $design->url('note','main','edit',$post->noteId) ;?>"><?php echo t('Edit Article'); ?></a> | <?php $design->popupLinkConfirm(t('Delete Article'), 'note','main','delete', $post->noteId, 'btn btn-default btn-sm') ;?> </p> <?php } ?> <?php if($is_admin_auth AND !UserCore::isAdminLoggedAs()) { ?> <?php $action = ($post->approved == 1) ? 'disapproved' : 'approved' ;?> <?php $text = ($post->approved == 1) ? t('Disapprove') : t('Approve') ;?> <hr /> <div><?php LinkCoreForm::display($text, 'note', 'admin', $action, array('note_id'=>$post->noteId)) ;?> &nbsp; | &nbsp; <a href="<?php $design->url(PH7_ADMIN_MOD,'user','loginuseras',$post->profileId) ;?>" title="<?php echo t('Login as this author to edit/delete this post. Please first approve this note as an administrator to be able to edit or delete it.'); ?>"> <?php echo t('Login as this User'); ?> </a> </div> <?php } ?> <?php $design->likeApi() ;?> <hr /><br /> <?php } ?> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); ?> <?php } ?> </div> <div class="center"> <p> <a class="btn btn-default btn-sm" href="<?php $design->url('note','main','add') ;?>"><?php echo t('Add a new Article'); ?></a> <a class="btn btn-default btn-sm" href="<?php $design->url('note','main','search') ;?>"><?php echo t('Search a Note'); ?></a> </p> <p> <a href="<?php $design->url('xml','rss','xmlrouter','note') ;?>"> <img src="<?php echo PH7_URL_STATIC . PH7_IMG?>icon/feed.svg" alt="RSS Feed" /> </a> </p> </div></div>