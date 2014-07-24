<?php

/**
 * AdminController class file.
 *
 * @author Matt Skelton
 * @date 16-May-2013
 */

/**
 * Base class for all admin controllers.
 */
class AdminController extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '/layouts/column1',
     * meaning using a single column layout. See 'protected/modules/admin/views/layouts/column1.php'.
     */
    public $layout = '/layouts/column2';

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * @var array admin context menu items. This property will be assigned to {@link TbMenu::items}.
     */
    public $adminMenu = array();

    

    public function beforeRender($view)
    {
        if ($this->adminMenu && !Yii::app()->user->isGuest)
            $this->renderPartial('/layouts/clips/_admin_clip');

        return parent::beforeRender($view);
    }
} 
?>
