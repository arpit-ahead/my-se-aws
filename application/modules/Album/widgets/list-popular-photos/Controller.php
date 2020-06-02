<?php
/**
 * SocialEngine
 *
 * @category   Application_Extensions
 * @package    Album
 * @copyright  Copyright 2006-2010 Webligo Developments
 * @license    http://www.socialengine.com/license/
 * @version    $Id: Controller.php 9791 2012-09-28 20:41:41Z pamela $
 * @author     Sami
 */

/**
 * @category   Application_Extensions
 * @package    Album
 * @copyright  Copyright 2006-2010 Webligo Developments
 * @license    http://www.socialengine.com/license/
 */
class Album_Widget_ListPopularPhotosController extends Engine_Content_Widget_Abstract
{
    public function indexAction()
    {
        // Should we consider views or comments popular?
        $popularType = $this->_getParam('popularType', 'comment');
        if( !in_array($popularType, array('comment', 'view')) ) {
            $popularType = 'comment';
        }
        $this->view->popularType = $popularType;
        $this->view->popularCol = $popularCol = $popularType . '_count';

        // Get paginator
        $parentTable = Engine_Api::_()->getItemTable('album');
        $parentTableName = $parentTable->info('name');
        $table = Engine_Api::_()->getItemTable('album_photo');

        $params = array('search' => true);
        $tableName = $table->info('name');
        $select = $table->getItemsSelect($params);
        $select->from($tableName)
            ->setIntegrityCheck(false)
            ->joinLeft($parentTableName, $parentTableName . '.album_id=' . $tableName . '.album_id', array('view_privacy'))
            ->where($parentTableName . '.search = ?', true)
            ->order($popularCol . ' DESC');
        $select = Engine_Api::_()->network()->getNetworkSelect($parentTableName, $select);
        $authorisedSelect = $table->getAuthorisedSelect($select);
        $this->view->paginator = $paginator = Zend_Paginator::factory($authorisedSelect);

        // Set item count per page and current page number
        $paginator->setItemCountPerPage($this->_getParam('itemCountPerPage', 4));
        $paginator->setCurrentPageNumber($this->_getParam('page', 1));

        // Do not render if nothing to show
        if( $paginator->getTotalItemCount() <= 0 ) {
            return $this->setNoRender();
        }
    }
}