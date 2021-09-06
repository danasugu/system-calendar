<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectManager extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'project_managers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'surnane',
        'email',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function projectManagerProjects()
    {
        return $this->hasMany(Project::class, 'project_manager_id', 'id');
    }

    public function eventEvents()
    {
        return $this->hasMany(Event::class, 'event_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
