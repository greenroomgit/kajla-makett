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

    protected $fillable = ['picture', 'name', 'thumb', 'caption', 'email'];

    protected $attributes = array(
    'published' => false
    );


    public function publish()
    {
        $this->attributes['published'] = true;

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.published', [], function ($message) {
            $email = $this->attributes['email'];
            $message
            ->from('makett@kajla.hu', 'Kajla Makett')
            ->to($email)
            ->subject('Publikáltuk a fotót!');
        });

        return $this;
    }
    public function unpublish()
    {
        $this->attributes['published'] = false;
        return $this;
    }
}
