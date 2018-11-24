<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-10-02 20:53:18
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/ph7cms-helper/views/base/tpl/main/forkgithubbox.tpl
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
?><div class="col-md-12"> <div id="box_block" class="center"> <h1><?php echo t('<a href="%0%">Fork pH7CMS</a> on Github!', $this->config->values['module.setting']['github.repository_link']); ?></h1> <p>&nbsp;</p> <iframe src="https://ghbtns.com/github-btn.html?user=<?php echo $this->config->values['module.setting']['github.username'] ;?>&amp;repo=<?php echo $this->config->values['module.setting']['github.repo_name'] ;?>&amp;type=fork&amp;count=true&amp;size=large" frameborder="0" scrolling="0" width="158px" height="30px" > </iframe> </div></div>