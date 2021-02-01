<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DetailRequest;
use App\Models\Question;
use App\Models\Service;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DetailCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Detail::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/detail');
        CRUD::setEntityNameStrings('Услуга', 'Услуги');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $questions = $this->questions();
        $categories = $this->categories();
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
                'label' => "Категория",
                'name' => 'service_id',
                'type' => 'closure',
                'function' => function ($entry) use ($categories) {
                    return isset($categories[$entry->service_id]) ? $categories[$entry->service_id] : '-';
                }
            ], [
                'label' => "Вопрос/Ответ",
                'name' => 'question_id',
                'type' => 'closure',
                'function' => function ($entry) use ($questions) {
                    return isset($questions[$entry->question_id]) ? $questions[$entry->question_id] : '-';
                }
            ]
        ]);
    }

    private function questions(): array
    {
        $questions = Question::all();
        $results = [];
        foreach ($questions as $question) {
            $results[$question['id']] = $question['title'];
        }
        return $results;
    }

    private function categories(): array
    {
        $categories = Service::all();
        $results = [];
        foreach ($categories as $category) {
            $results[$category['id']] = $category['name'];
        }
        return $results;
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DetailRequest::class);

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
                'name' => 'introduction',
                'type' => 'ckeditor',
                'label' => "Краткое описание",
                'tab' => 'Основное',
            ], [
                'name' => 'description',
                'type' => 'ckeditor',
                'label' => "Полное описание",
                'tab' => 'Основное',
            ], [
                'tab' => 'Связи',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => "Категория",
                'name' => 'service_id',
                'type' => 'select2',
                'attribute' => 'name',
                'entity' => 'service',
                'model' => 'App\Models\Service',
                'default' => 0,
            ], [
                'tab' => 'Связи',
                'name' => 'question_id',
                'type' => 'select2',
                'attribute' => 'title',
                'entity' => 'question',
                'model' => 'App\Models\Question',
                'label' => "Вопрос/ответ",
                'wrapper' => ['class' => 'form-group col-md-6'],
            ], [
                'tab' => 'Связи',
                'type' => 'relationship',
                'name' => 'filters', // the method on your model that defines the relationship
                'label' => "Фильтры, выводяться в категории",
                'attribute' => "title",
            ], [
                'tab' => 'Связи',
                'type' => 'relationship',
                'name' => 'attributes', // the method on your model that defines the relationship
                'label' => "Атрибуты на карточке услуги",
                'attribute' => "title",
            ], [
                'tab' => 'Цены',
                'name' => 'prices',
                'label' => 'Описание таблицы цен',
                'type' => 'repeatable',
                'fields' => [
                    [
                        'name' => 'title',
                        'type' => 'text',
                        'label' => 'Заголовок',
                        'wrapper' => ['class' => 'form-group col-md-12'],
                    ], [
                        'name' => 'description',
                        'type' => 'ckeditor',
                        'label' => 'Текст',
                    ], [
                        'name' => 'head0',
                        'type' => 'text',
                        'label' => 'Обозначение колонки 1',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ], [
                        'name' => 'head1',
                        'type' => 'text',
                        'label' => 'Обозначение колонки 2',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ], [
                        'name' => 'head2',
                        'type' => 'text',
                        'label' => 'Обозначение колонки 3',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ], [
                        'name' => 'body',
                        'label' => '',
                        'type' => 'table',
                        'entity_singular' => 'option', // used on the "Add X" button
                        'columns' => [
                            'Значение 1',
                            'Значение 2',
                            'Значение 3'
                        ],
                        'min' => 1,
                        'tab' => 'Цены',
                    ]
                ],
                'init_rows' => 1,
                'min_rows' => 1,
                'max_rows' => 1,

            ], [
                'name' => 'image',
                'type' => 'browse',
                'label' => "Главная картинка",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'upload' => true,
                'disk' => true,
                'tab' => 'Изображения',
            ], [
                'name' => 'images',
                'label' => "Дополнительные картинки",
                'tab' => 'Изображения',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'type' => 'browse_multiple',
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

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $questions = $this->questions();
        $categories = $this->categories();

        // example logic
        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => "Название",
            ], [
                'name' => 'short_name',
                'label' => "Короткое название",
            ], [
                'name' => 'title',
                'label' => "Заголовок",
            ], [
                'name' => 'sub_title',
                'label' => "Подзаголовок",
            ], [
                'name' => 'meta_title',
                'label' => "Мета тайтл",
            ], [
                'name' => 'meta_description',
                'label' => "Мета описание",
            ], [
                'name' => 'introduction',
                'label' => "Краткое описание",
            ], [
                'name' => 'description',
                'label' => "Полное описание",
            ], [
                'label' => "Категория",
                'name' => 'service_id',
                'type' => 'closure',
                'function' => function ($entry) use ($categories) {
                    return isset($categories[$entry->service_id]) ? $categories[$entry->service_id] : '-';
                }
            ], [
                'name' => 'question_id',
                'label' => "Вопрос/ответ",
                'type' => 'closure',
                'function' => function ($entry) use ($questions) {
                    return isset($questions[$entry->question_id]) ? $questions[$entry->question_id] : '-';
                }
            ], [
                'name' => 'filters', // the method on your model that defines the relationship
                'label' => "Фильтры, выводяться в категории",
            ], [
                'name' => 'attributes', // the method on your model that defines the relationship
                'label' => "Атрибуты на карточке услуги",
            ], [
                'name' => 'prices',
                'label' => 'Описание таблицы цен',
            ], [
                'name' => 'image',
                'type' => 'image',
                'label' => "Главная картинка",
            ], [
                'name' => 'images',
                'label' => "Дополнительные картинки",
                'type' => 'closure',
                'function' => function ($entry) {
                    $images = [];
                    foreach ($entry->images as $image) {
                        $images[] = sprintf('<img src="%s%s" style="max-height: 50px;">', env('APP_URL'), $image);
                    }
                    return implode('', $images);
                }
            ]
        ]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
}
