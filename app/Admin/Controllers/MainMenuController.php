<?php

namespace App\Admin\Controllers;

use App\Models\MainMenu;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MainMenuController extends Controller
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
//            ->header('Index')
//            ->description('description')
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

        $menuTree = MainMenu::tree(function ($tree){
            $tree->branch(function ($menuItem){
                return "{$menuItem['id']} - {$menuItem['name']} | {$menuItem['route']} | " . MainMenu::$statuses[$menuItem['status']];
            });
        });


        return $content
            ->header('Список категорий')
            ->description('Страница со списком существующих категорий')
            ->body($menuTree);
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
            ->header('Detail')
            ->description('description')
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
            ->header('Edit')
            ->description('description')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MainMenu);

        $grid->id('Id');
        $grid->name('Name');
        $grid->route('Route');
        $grid->parentId('ParentId');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(MainMenu::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->route('Route');
        $show->parentId('ParentId');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MainMenu);

        $form->text('name', 'Name');
        $form->text('route', 'Route');
        $form->switch('status', 'Статус')->states([
            'on'  => ['value' => '1', 'text' => 'Публиковать', 'color' => 'success'],
            'off' => ['value' => '0', 'text' => 'Не публиковать', 'color' => 'danger'],
        ]);

        return $form;
    }
}
