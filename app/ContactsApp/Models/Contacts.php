<?php

namespace App\ContactsApp\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Contacts extends Model
{
    use SoftDeletes;
    use Sluggable;
    use LogsActivity;
    /**\
     * Contacts attritbure which needs to be logged
     * @var array
     */
    protected static $logAttributes = ['name', 'email', 'phone', 'address', 'company', 'birth_date','deleted_at'];
    /**
     * Table name
     *
     * @var string
     */
    protected $table = "contacts";
    /**
     *  contacts attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'address', 'company', 'birth_date', 'provider', 'provider_id'];
    /**
     * The attributes that should be mutated as date
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * Log the attributes that are onlu changed
     * @var bool
     */
    protected $logOnlyDirty = true;
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable ()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
