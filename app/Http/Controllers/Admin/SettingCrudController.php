<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Setting");
        $this->crud->setEntityNameStrings('Настройку', 'Настройки');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/setting');
    }

    public function setupListOperation()
    {
        // columns to show in the table view
        $this->crud->setColumns([
            [
                'name'  => 'key',
                'label' => 'Ключ',
            ],
            [
                'name'  => 'value',
                'label' => 'Значение',
            ],
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SettingRequest::class);
        $this->crud->addField([
            'name'       => 'key',
            'label'      => 'Ключ',
            'type'       => 'text',
        ]);

        $this->crud->addField([
            'name'       => 'value',
            'label'      => 'Значение',
            'type'       => 'textarea',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
