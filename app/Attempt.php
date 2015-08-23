<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;


class Attempt extends Model implements StaplerableInterface
{
    use EloquentTrait;

	protected $fillable = ['mission_id', 'user_id', 'status', 'image'];

    function user()
    {
        return $this->belongsTo('App\User');
    }

    function mission()
    {
        return $this->belongsTo('App\Mission');
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
