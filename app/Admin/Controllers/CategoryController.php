<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;


class CategoryController extends Controller
{
    use HasResourceActions;

//    /**
//     * Index interface.
//     *
//     * @param Content $content
//     * @return Content
//     */
//    public function index(Content $content)
//    {
//        return $content
//            ->header('Список категорий')
//            ->description('Страница со списком существующих категорий')
//            ->body($this->grid());
//    }

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {

        $categoryTree = Category::tree(function ($tree){
            $tree->branch(function ($category){
                return "{$category['id']} - {$category['name']} | Slug: /{$category['slug']} | " . Category::$statuses[$category['status']];
            });
        });


        return $content
            ->header('Список категорий')
            ->description('Страница со списком существующих категорий')
            ->body($categoryTree);
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Категория')
            ->description('Страница описания категории')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Редактировать категорию')
            ->description('Страница для реадактирования категории')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Создание категории')
            ->description('Страница для создания новой категории')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->id('Id');

        $grid->name('Имя');

        $grid->filter(function ($filter){
            $filter->equal('status')->select(Category::$statuses);
        });

        $grid->status('Статус')->display(function ($status){
            return Category::$statuses[$status];
        })->sortable();
        $grid->slug('Slug');
        $grid->created_at('Создана');
        $grid->updated_at('Редактировалась');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->id('Id');

        $show->name('Имя');

        $show->status('Статус');

        $show->slug('Slug');
        $show->created_at('Создана');
        $show->updated_at('Редактировалась');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category);

        $form->text('name', 'Имя');

        $form->textarea('text');

        $form->switch('status', 'Статус')->states([
            'on'  => ['value' => '1', 'text' => 'Публиковать', 'color' => 'success'],
            'off' => ['value' => '0', 'text' => 'Не публиковать', 'color' => 'danger'],
        ]);


        return $form;
    }
}
