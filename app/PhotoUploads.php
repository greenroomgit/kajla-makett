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


    public function publish()
    {
        $this->attributes['published'] = true;

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.published', [], function ($message) {
            $email = 'olah.gergely@pixeloid.hu';
            $message
            ->from('donotreply@justlaravel.com')
            ->to($email, 'Howdy buddy!')
            ->subject('Test Mail!');
        });

        return $this;
    }
    public function unpublish()
    {
        $this->attributes['published'] = false;
        return $this;
    }
}
