<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-09-19 13:05:12
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/admin123/views/base/tpl/main/index.tpl
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
?><?php $this->display($this->getCurrentController() . PH7_DS . 'stat.tpl', $this->registry->path_module_views . PH7_TPL_MOD_NAME . PH7_DS); if($is_news_feed) { ?> <br /><hr /><br /> <?php $this->display($this->getCurrentController() . PH7_DS . 'news.inc.tpl', $this->registry->path_module_views . PH7_TPL_MOD_NAME . PH7_DS); } ?>