<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TagCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TagCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\InlineCreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Tag::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tag');
        CRUD::setEntityNameStrings('Тег', 'Теги');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'id',
                'label' => "Id",
            ], [
                'name' => 'name',
                'label' => "Название",
            ], [
                'name' => 'title',
                'label' => "Заголовок",
            ]
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
        CRUD::setValidation(TagRequest::class);

        $this->crud->addFields([
            [
                'name' => 'id',
                'type' => 'hidden',
            ], [
                'name' => 'name',
                'type' => 'text',
                'label' => "Название",
                'wrapper' => ['class' => 'form-group col-md-6'],
            ], [
                'name' => 'title',
                'type' => 'text',
                'label' => "Заголовок",
                'wrapper' => ['class' => 'form-group col-md-6'],
            ], [
                'name' => 'meta_title',
                'type' => 'textarea',
                'label' => "Мета тайтл",
                'wrapper' => ['class' => 'form-group col-md-6'],
            ], [
                'name' => 'meta_description',
                'type' => 'textarea',
                'label' => "Мета описание",
                'wrapper' => ['class' => 'form-group col-md-6'],
            ], [
                'name' => 'description',
                'type' => 'ckeditor',
                'label' => "Полное описание",
            ]
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
