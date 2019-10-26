<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Weathers extends Model
{
    protected $guarded = [];
    protected $dates = [
        'created_at'
    ];

    public function setMinTempAttribute($value) {
        $this->attributes['min_temp'] = $this->round($value);
    }

    public function setMaxTempAttribute($value) {
        $this->attributes['max_temp'] = $this->round($value);
    }

    public function getCreatedAttribute($value) {
        return Carbon::parse($value)->format('h:i:s A');
    }

    private function round($value) {
        return round($value, 2);
    }

    public function setCreatedAttribute($value) {
        $this->attributes['created'] = Carbon::parse($value)->timezone(env('APP_TIMEZONE'));
    }
}
