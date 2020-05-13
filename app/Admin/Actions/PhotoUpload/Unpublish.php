<?php

namespace App\Admin\Actions\PhotoUpload;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Unpublish extends RowAction
{
    public $name = 'Unpublish';

    public function handle(Model $model)
    {
        $model->unpublish()->save();

        return $this->response()->success('Success message.')->refresh();
    }
}
