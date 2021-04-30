<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;
use Vtlabs\Payment\Traits\CanBePaid;

class PlanModel extends Model
{
    use CanBePaid;
    
    protected $table = 'plans';
    protected $guarded = [];
    protected $casts = [
        'metadata' => 'object',
    ];

    public function features()
    {
        return $this->hasMany(config('plans.models.feature'), 'plan_id');
    }
}
