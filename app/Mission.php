<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;


class Mission extends Model implements StaplerableInterface
{
    use EloquentTrait;

	protected $fillable = ['title', 'description', 'image'];

    function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
            	'hero' => [
            		'dimensions' => '1170x400#',
                    'convert_options' => ['quality' => 60]
            	],
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);
    }
}
