<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['schedule_status'];
    public function scheduleInterview()
    {
        return $this->hasOne(ScheduleInterview::class);
    }
    public function schedulePickup()
    {
        return $this->hasOne(SchedulePickup::class);
    }
    public function scheduleVisit()
    {
        return $this->hasOne(ScheduleVisit::class);
    }
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
