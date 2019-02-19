<?php
namespace _namespace_;

use \Waiterphp\Admin\FormTrait as FormTrait;
use \Waiterphp\Admin\Config\Form as FormConfig;

class _controller_ extends \Controller\Base
{
    use FormTrait;

    protected function setConfig()
    {
        $adminForm = new FormConfig(model('_model_'));
        $primaryKey = $adminForm->getDao()->primaryKey();
        $id = $this->request->getInt($primaryKey, 0);
        if (empty($id)) {
            $adminForm->addAction('add');
        } else {
            $adminForm->addAction('edit');
        }
        return $adminForm;
    }
}