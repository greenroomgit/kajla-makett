<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoUploads extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_uploads';

    protected $fillable = ['picture', 'name','caption', 'email'];

    protected $attributes = array(
    'published' => false
    );
}
