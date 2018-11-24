<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-10-01 19:36:54
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/ph7cms-helper/views/base/tpl/main/githubbox.tpl
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
?><div class="col-md-12"> <div id="box_block" class="center"> <h2><?php echo t('<a href="%0%">Star pH7CMS</a> on Github?', $this->config->values['module.setting']['github.repository_link']); ?></h2> <figure class="center"> <a href="<?php echo $this->config->values['module.setting']['github.repository_link'] ;?>"> <img src="<?php echo $this->registry->url_themes_module . PH7_TPL_MOD_NAME . PH7_SH . PH7_IMG?>github.svg" alt="pH7CMS on Github" /> </a> <figcaption><em><?php echo t('I will really appreciate it :-)'); ?></em></figcaption> </figure> </div></div>