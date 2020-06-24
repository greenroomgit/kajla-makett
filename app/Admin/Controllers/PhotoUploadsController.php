<?php

namespace App\Admin\Controllers;

use App\PhotoUploads;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\PhotoUpload\Publish;
use App\Admin\Actions\PhotoUpload\Unpublish;

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
        $grid->column('thumb', __('Picture'))->image()->modal(null, function ($model) {
            return '<img src="/storage/'  . $model['picture'] . '" width="100%"/>';
        });


        $grid->column('name', __('Name'));
        $grid->column('caption', __('Caption'));
        $grid->column('email', __('Email'));
        $grid->column('published', __('Published'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function ($actions) {
            $actions->add($actions->row->getAttributes()['published'] ? new Unpublish : new Publish);
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
        $show = new Show(PhotoUploads::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('caption', __('Caption'));
        $show->field('published', __('Published'));
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

        $form->text('name', __('Name'));
        $form->text('email', __('Email'));
        $form->text('city', __('City'));
        $form->text('address', __('Address'));
        $form->number('postal', __('Postal'));
        $form->text('caption', __('Caption'));
        $form->switch('published', __('Published'));

        return $form;
    }
}
