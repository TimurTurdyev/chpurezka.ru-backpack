<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReviewCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReviewCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/review');
        CRUD::setEntityNameStrings('Отзыв', 'Отзывы');
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
                'label' => "Автор",
            ], [
                'name' => 'sub_name',
                'label' => "Компания",
            ], [
                'name' => 'image',
                'type' => 'image',
                'label' => "Аватарка",
            ], [
                'name' => 'description',
                'label' => "Описание",
                'type' => 'closure',
                'function' => function ($entry) {
                    return substr(strip_tags($entry->description), 0, 50) . '...';
                }
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
        CRUD::setValidation(ReviewRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => "Имя",
                'wrapper' => ['class' => 'form-group col-md-6'],
            ], [
                'name' => 'sub_name',
                'type' => 'text',
                'label' => "Компания",
                'wrapper' => ['class' => 'form-group col-md-6'],
            ], [
                'name' => 'image',
                'type' => 'browse',
                'label' => "Аватарка",
            ], [
                'name' => 'description',
                'type' => 'ckeditor',
                'label' => "Текст отзыва",
            ], [   // radio
                'name' => 'rating',
                'label' => 'Рейтинг',
                'type' => 'radio',
                'options' => [
                    1 => "1",
                    2 => "2",
                    3 => "3",
                    4 => "4",
                    5 => "5",
                ],
                'inline' => true,
            ], [
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'radio',
                'options' => [
                    0 => "Выкл",
                    1 => "Вкл"
                ],
                'inline' => true
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
