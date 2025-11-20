<?php

namespace Rennokki\Plans\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PlanUsageLog extends Model
{
    protected $table = 'plan_usage_logs';

    protected $fillable = ['subscription_id'];
}
