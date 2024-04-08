<?php

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class FourOhFourAdmin extends ModelAdmin
{
    private static $menu_title = '404 logger';
    private static $url_segment = 'fourohfouradmin';
    private static $menu_icon_class = 'font-icon-cross-mark';
    private static $managed_models = [
        FourOhFourLog::class,
        SearchLog::class
    ];

    public $showImportForm = false;
    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);
        if ($grid = $form->Fields()->dataFieldByName($this->sanitiseClassName(FourOhFourLog::class))) {
            $grid->getConfig()->removeComponentsByType(GridFieldAddNewButton::class);
        }

        if ($grid = $form->Fields()->dataFieldByName($this->sanitiseClassName(SearchLog::class))) {
            $grid->getConfig()->removeComponentsByType(GridFieldAddNewButton::class);
        }
        return $form;
    }
}
