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

    protected $fillable = ['picture', 'firstname','lastname', 'email', 'address', 'telephone'];

    protected $attributes = array(
    'published' => false
    );
}
