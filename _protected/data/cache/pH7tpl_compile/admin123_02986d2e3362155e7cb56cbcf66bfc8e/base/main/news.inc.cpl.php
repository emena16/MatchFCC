<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-09-19 13:05:12
Compiled file from: /home/proyectsm/public_html/matchfcc/_protected/app/system/modules/admin123/views/base/tpl/main/news.inc.tpl
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
?><div class="center"> <h2 class="underline"><?php echo t('Latest <a href="%software_website%" title="%software_name%">pH7CMS Software</a>\'s News'); ?></h2> <?php XmlDesignCore::softwareNews(10) ;?></div>