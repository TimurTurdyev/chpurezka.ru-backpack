<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Blog;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('Статья', 'Статьи');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $categories = $this->categories();
        $users = $this->users();
        $this->crud->setColumns([
            [
                'name' => 'id',
                'label' => "Id",
            ], [
                'name' => 'blog_id',
                'label' => 'Категория',
                'type' => 'closure',
                'function' => function ($entry) use ($categories) {
                    return isset($categories[$entry->blog_id]) ? $categories[$entry->blog_id] : '-';
                }
            ], [
                'name' => 'author_id',
                'label' => 'Автор',
                'type' => 'closure',
                'function' => function ($entry) use ($users) {
                    return isset($users[$entry->author_id]) ? $users[$entry->author_id] : '-';
                }
            ], [
                'name' => 'name',
                'label' => "Название",
            ], [
                'name' => 'title',
                'label' => "Заголовок",
            ], [
                'name' => 'image',
                'type' => 'image',
                'label' => "Главная картинка",
            ], [
                'name' => 'except',
                'label' => "Анонс",
            ], [
                'name' => 'status',
                'label' => "Статус",
                'type' => 'closure',
                'function' => function ($entry) {
                    return (int)$entry->status ? 'Вкл': 'Выкл';
                }
            ]
        ]);
    }

    private function categories(): array
    {
        $categories = Blog::all();
        $results = [];
        foreach ($categories as $category) {
            $results[$category['id']] = $category['name'];
        }
        return $results;
    }

    private function users(): array
    {
        $users = User::all();
        $results = [];
        foreach ($users as $user) {
            $results[$user['id']] = $user['name'];
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
        CRUD::setValidation(PostRequest::class);
        $this->crud->addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => "Название",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'tab' => 'Связи',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => "Категория",
                'name' => 'blog_id',
                'type' => 'select2',
                'attribute' => 'name',
                'entity' => 'blog',
                'model' => 'App\Models\Blog',
                'default' => 0,
            ], [
                'tab' => 'Связи',
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => "Автор",
                'name' => 'author_id',
                'type' => 'select2',
                'attribute' => 'name',
                'entity' => 'authorId',
                'model' => 'App\Models\User',
                'default' => 0,
            ], [
                'tab' => 'Связи',
                'label' => "Tags",
                'type' => 'select2_multiple',
                'name' => 'tags',
                'entity' => 'tags',
                'model' => "App\Models\Tag",
                'attribute' => 'name',
                'pivot' => true,
                'select_all' => true,
                'options' => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }),
            ], [
                'name' => 'title',
                'type' => 'text',
                'label' => "Заголовок",
                'wrapper' => ['class' => 'form-group col-md-6'],
                'tab' => 'Основное',
            ], [
                'name' => 'image',
                'label' => "Главная картинка",
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
                'name' => 'except',
                'type' => 'ckeditor',
                'label' => "Анонс",
                'tab' => 'Основное',
            ], [
                'name' => 'description',
                'type' => 'ckeditor',
                'label' => "Полное описание",
                'tab' => 'Основное',
            ], [
                'name' => 'status', // the name of the db column
                'label' => 'Статус', // the input label
                'type' => 'radio',
                'options' => [
                    0 => "Выкл",
                    1 => "Вкл"
                ],
                'default' => 0,
                'inline' => true,
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
