<?php

namespace App\Admin\Controllers;

use App\Models\FilterPrice;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FilterPriceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'FilterPrice';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FilterPrice());

        $grid->column('id', __('Id'));
        $grid->column('price_min', __('Price min'));
        $grid->column('price_max', __('Price max'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(FilterPrice::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('price_min', __('Price min'));
        $show->field('price_max', __('Price max'));
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
        $form = new Form(new FilterPrice());

        $form->number('price_min', __('Price min'))->placeholder('$')->min(1)->rules('required');
        $form->number('price_max', __('Price max'))->placeholder('$');

        return $form;
    }
}
