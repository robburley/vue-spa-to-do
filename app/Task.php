<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'priority',
        'completed_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complete()
    {
        return $this->update(['completed_at' => Carbon::now()]);
    }

    public function scopeComplete($query)
    {
        $query->whereNotNull('completed_at');
    }

    public function scopeIncomplete($query)
    {
        $query->whereNull('completed_at');
    }
}
