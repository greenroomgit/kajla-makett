<?php

namespace App\Admin\Controllers;

use App\PhotoUploads;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PhotoUploadsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\PhotoUploads';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PhotoUploads());

        $grid->column('id', __('Id'));
        $grid->column('picture', __('Picture'))->image();
        $grid->column('firstname', __('Firstname'));
        $grid->column('lastname', __('Lastname'));
        $grid->column('email', __('Email'));
        $grid->column('published', __('Published'));
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
        $show = new Show(PhotoUploads::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('firstname', __('Firstname'));
        $show->field('lastname', __('Lastname'));
        $show->field('address', __('Address'));
        $show->field('email', __('Email'));
        $show->field('published', __('Published'));
        $show->field('telephone', __('Telephone'));
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
        $form = new Form(new PhotoUploads());

        $form->text('firstname', __('Firstname'));
        $form->text('lastname', __('Lastname'));
        $form->text('address', __('Address'));
        $form->text('email', __('Email'));
        $form->switch('published', __('Published'));
        $form->text('telephone', __('Telephone'));

        return $form;
    }
}
