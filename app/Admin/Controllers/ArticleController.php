<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;


/**
 * Class ArticleController
 * @package App\Admin\Controllers
 *
 */
class ArticleController extends Controller
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
            ->header('Статьи')
            ->description('Список статей')
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

        $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));



        return $content;
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

    public function delete($id)
    {


        $article = Article::find($id);
        if ($article->delete()){
            admin_toastr('Статья успешно удалена', 'success');
            return redirect('/admin/articles');
        }
        admin_toastr('Что-то пошло не так, попробуйте ещё раз', 'error');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $article = new Article();
        $grid = new Grid($article);

        $grid->id('ID')->sortable();
        $grid->title('Название');
        $grid->preview('Превью');
        $grid->author('Автор');
        $grid->categoryId()->display(function ($categoryId) {
            $html = "<a href='/categories/$categoryId'>" . Category::find($categoryId)->name . "</a>";
            return $html;
        });
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');


        $grid->actions(function ($actions) {
            $actions->disableDelete();

            $actions->append('<a onclick="return confirm(\'Вы уверены что хотите удалить запись\')" href="/admin/articles/' .
                $actions->getKey() . '/delete"><i class="fa fa-trash"></i></a>');

        });

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
        $show = new Show(Article::findOrFail($id));

        $show->id('ID');
        $show->title('Название');
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
        $form = new Form(new Article());

        $form->display('id');
        $form->text('title', 'Название статьи');
        $form->textarea('preview', 'Превью статьи');
        $form->summernote('text', 'Текст статьи');
        $form->image('titleImage', 'Основная картинка статьи');
        $form->tags('tags', 'Теги');
        $form->text('categoryId');
        $form->display('author', 'Автор');

        return $form;
    }
}
