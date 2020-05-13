<?php

namespace App\Admin\Actions\PhotoUpload;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Publish extends RowAction
{
    public $name = 'Publish';

    public function handle(Model $model)
    {
        $model->publish()->save();

        return $this->response()->success('Success message.')->refresh();
    }
}
