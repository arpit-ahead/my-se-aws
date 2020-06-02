<?php
/**
 * SocialEngine
 *
 * @category   Engine
 * @package    Engine_Package
 * @copyright  Copyright 2006-2020 Webligo Developments
 * @license    http://www.socialengine.com/license/
 * @version    $Id: Enable.php 9747 2012-07-26 02:08:08Z john $
 * @author     John Boehr <j@webligo.com>
 */

/**
 * @category   Engine
 * @package    Engine_Package
 * @copyright  Copyright 2006-2020 Webligo Developments
 * @license    http://www.socialengine.com/license/
 * @author     John Boehr <j@webligo.com>
 */
class Engine_Package_Manager_Operation_Enable
  extends Engine_Package_Manager_Operation_Abstract
{
  protected function _setPackages(Engine_Package_Manifest $targetPackage,
      Engine_Package_Manifest $currentPackage = null)
  {
    $this->_targetPackage = $targetPackage;
    $this->_currentPackage = $currentPackage;
  }
  
  public function doInstall()
  {

  }
}
