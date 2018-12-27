<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\User;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Auth;

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
            ->header('Index')
            ->description('description')
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
        $grid = new Grid(new Article);

        $grid->id('Id');
        $grid->title('Title');
        $grid->preview('Preview');
        $grid->text('Text');
        $grid->titleImage('TitleImage');
        $grid->author('Author')->display(function ($author){

            $authorId = $author['id'];
            $authorName = $author['name'];

            $html = "<a href='/admin/auth/users/$authorId'>$authorName</a>";
            return $html;
        });
        $grid->tags('Tags');
        $grid->route('Route');
        $grid->categoryId()->display(function ($categoryId) {
            if (!$categoryId){
                return 'Нет категории';
            }
            $html = "<a href='/category/$categoryId'>" . Category::find($categoryId)->name . "</a>";
            return $html;
        });
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->deleted_at('Deleted at');

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

        $show->id('Id');
        $show->title('Title');
        $show->preview('Preview');
        $show->text('Text');
        $show->titleImage('TitleImage');
        $show->author('Author');
        $show->tags('Tags');
        $show->route('Route');
        $show->categoryId('CategoryId');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->deleted_at('Deleted at');

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

        $form->id('id');
        $form->text('title', 'Название');
        $form->textarea('preview', 'Превью');
        $form->summernote('text');
        $form->image('titleImage', 'Картинка на превью');

        $form->display('author.name', 'Author');
        $form->textarea('description')->default('NULL');
        $form->tags('tags', 'Tags')->default('NULL');
        $form->tags('keywords', 'Keywords')->default('NULL');
        $form->text('route', 'Route')->default('NULL');
        $form->text('categoryId', 'Категория');

        return $form;
    }
}
