<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KitRequests extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kit_requests';

    protected $fillable = ['name','postal', 'email', 'city', 'address', 'token', 'verified_at', 'sent'];

    protected $attributes = array(
    'sent' => false
    );
}
