<?php

namespace App\Admin\Controllers;

use App\GuideSteps;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GuidesStepsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\GuideSteps';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GuideSteps());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('picture', __('Picture'))->image();
        $grid->column('description', __('Description'));
        $grid->column('link', __('Link'));
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
        $show = new Show(GuideSteps::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('link', __('Link'));
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
        $form = new Form(new GuideSteps());

        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));
        $form->url('link', __('Link'));
        $form->image('picture')->uniqueName();

        return $form;
    }
}
