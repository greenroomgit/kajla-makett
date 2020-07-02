<?php

namespace App\Admin\Controllers;

use App\Kits;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class KitsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Kits';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Kits());

        $grid->column('id', __('Id'));
        $grid->column('thumbnail', __('Thumbnail'));
        $grid->column('name', __('Name'));
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
        $show = new Show(Kits::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('a6', __('A6'));
        $show->field('a5', __('A5'));
        $show->field('a4', __('A4'));
        $form->field('a1', __('A1'));
        $form->field('a2', __('A2'));
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
        $form = new Form(new Kits());

        $form->text('name', __('Name'));
        $form->image('thumbnail', __('Thumbnail'));
        $form->file('a1', __('A1'), ['showRemove' => true])->removable();
        $form->file('a2', __('A2'), ['showRemove' => true])->removable();
        $form->file('a4', __('A4'), ['showRemove' => true])->removable();
        $form->file('a5', __('A5'), ['showRemove' => true])->removable();
        $form->file('a6', __('A6'), ['showRemove' => true])->removable();
        $form->url('iframe', __('Imajize iFrame URL'));

        return $form;
    }
}
