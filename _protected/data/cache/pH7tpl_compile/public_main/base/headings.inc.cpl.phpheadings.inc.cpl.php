<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2018-09-19 12:59:57
Compiled file from: /home/proyectsm/public_html/matchfcc/templates/themes/base/tpl/headings.inc.tpl
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
?><div class="center" id="headings"> <?php foreach(['h1' => 'h1_title', 'h2' => 'h2_title', 'h3' => 'h3_title', 'h4' => 'h4_title'] as $heading => $headingVar) { ?> <?php if(!empty($$headingVar)) { ?> <<?php echo $heading; ?>><?php echo $$headingVar ;?></<?php echo $heading; ?>> <?php } ?> <?php } ?></div>