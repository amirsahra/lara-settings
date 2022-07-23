<?php

namespace Amirsahra\LaraSetting\Databases\Models;

use Illuminate\Database\Eloquent\Model;

class LaraSetting extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table =  config('larasetting.stores.database.table_name');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'value', 'is_active','description'];
}