<?php
/**
 * SocialEngine
 *
 * @category   Application_Core
 * @package    Core
 * @copyright  Copyright 2006-2020 Webligo Developments
 * @license    http://www.socialengine.com/license/
 * @version    $Id: license-key.tpl 9747 2012-07-26 02:08:08Z john $
 * @author     Steve
 */
?>
<?php if ($this->keyUpdated) { ?>
    <ul class="form-notices">
        <li>License key updated.</li>
    </ul>
<?php } ?>
<?php echo $this->form->render($this) ?>
