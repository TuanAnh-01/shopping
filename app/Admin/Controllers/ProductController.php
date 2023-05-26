<?php

namespace App\Admin\Controllers;


use App\Models\Branding;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('category_id', __('Category id'));
        $grid->column('branding_id', __('Branding id'));
        $grid->column('size_id', __('Size id'));
        $grid->column('price', __('Price'));
        $grid->column('sale', __('Sale'));
        $grid->column('price_sale', __('Price Sale'));
        $grid->column('images', __('Images'));
        // $grid->column('images_detail', __('Images detail'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('category_id', __('Category id'));
        $show->field('branding_id', __('Branding id'));
        $show->field('size_id', __('Size id'));
        $show->field('price', __('Price'));
        $show->field('sale', __('Sale'));
        $show->field('content', __('Content'));
        $show->field('images', __('Images'));
        $show->field('images_detail', __('Images detail'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', __('Name'))->rules('required');;
        
        $form->select('category_id', __('Category '))->options(Category::all()->pluck('name','name'))->rules('required');
        $form->select('branding_id', __('Branding '))->options(Branding::all()->pluck('name','name'))->rules('required');
        $form->checkbox(('Size'))->options(Size::all()->pluck('name','name'))->canCheckAll()->rules('required');
        $form->number('price', __('Price'))->placeholder('$')->rules('required');
        $form->number('sale', __('Sale'))->placeholder('%');
        $form->summernote('content', __('Content'))->rules('required');
        $form->image('images', __('Images'))->uniqueName()->rules('required');
        $form->multipleImage('Detail')->sortable()->creationRules('required');

        return $form;
    }
}
