<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('Категория', 'Категории');
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
                'name' => 'short_name',
                'label' => "Короткое название",
            ], [
                'name' => 'title',
                'label' => "Заголовок",
            ], [
                'name' => 'image',
                'type' => 'image',
                'label' => "Главная картинка",
            ], [
                'name' => 'banner',
                'type' => 'image',
                'label' => "Баннер(категория, услуга)",
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
        CRUD::setValidation(ServiceRequest::class);
        $this->crud->addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => "Название",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'name' => 'short_name',
                'type' => 'text',
                'label' => "Короткое название",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'name' => 'title',
                'type' => 'text',
                'label' => "Заголовок",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'name' => 'sub_title',
                'type' => 'text',
                'label' => "Подзаголовок",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'name' => 'image',
                'label' => "Главная картинка",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Изображения',
                'type' => 'browse',
            ], [
                'name' => 'banner',
                'label' => "Баннер(категория, услуга)",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Изображения',
                'type' => 'browse',
            ], [
                'name' => 'meta_title',
                'type' => 'textarea',
                'label' => "Мета тайтл",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'name' => 'meta_description',
                'type' => 'textarea',
                'label' => "Мета описание",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'name' => 'description',
                'type' => 'ckeditor',
                'label' => "Полное описание",
                'tab' => 'Основное',
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
