<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\Order_details\Replicate;
use App\Models\Item;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
            $actions->add(new Replicate($actions->getKey()));
           
        });
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('phone', __('Phone'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));
        $grid->column('note', __('Note'));
        $grid->column('total', __('Total'));
        // $grid->column('user_id', __('User id'));
        $grid->column('status', __('Status'));
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
        $order_detail = Item::where( 'order_id', '=', $id)->get();

        return view('admin.order_detail')->with('order_detail', $order_detail);

    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->text('name', __('Name'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->text('address', __('Address'));
        $form->text('note', __('Note'));
        $form->text('total', __('Total'));
        $form->text('user_id', __('User id'));
        $form->select('status', __('Status'))->options(['Wait for confirmation' => 'Wait for confirmation', 'Confirmation failed' => 'Confirmation failed', 'Confirmation successful' => 'Confirmation successful']);

        return $form;
    }

    
}
