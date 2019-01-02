<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Список категорий')
            ->description('Страница со списком существующих категорий')
            ->body($this->grid());
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
            ->body($this->form($id)->edit($id));
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

        $grid->parentId('Родительская категория')->display(function ($categoryId) {
            if (!$categoryId){
                return 'Нет категории';
            }
            $html = "<a href='/admin/category/$categoryId'>" . Category::find($categoryId)->name . "</a>";
            return $html;
        });

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


        $show->parentId('Родетельская категория')->display(function ($categoryId) {
            if (!$categoryId){
                return 'Нет категории';
            }
            $html = "<a href='/admin/category/$categoryId'>" . Category::find($categoryId)->name . "</a>";
            return $html;
        });

        $show->slug('Slug');
        $show->created_at('Создана');
        $show->updated_at('Редактировалась');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @param null|int $idCategory
     * @return Form
     */
    protected function form($idCategory = null)
    {
        $form = new Form(new Category);

        $form->text('name', 'Имя');

        if ($idCategory == null){
            $categories = (new CategoryService())->getAllCategoriesNameKeysIndex();
        }
        else {
            $categories = (new CategoryService())->getCategoryNamesKeysIndexWithoutId($idCategory);
        }
        $form->select('parentId', 'Родительская категория')->options($categories);

        return $form;
    }
}
