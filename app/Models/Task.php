<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function workspace()
{
    return $this->belongsTo(Workspace::class);
}

public function column()
{
    return $this->belongsTo(Column::class);
}

public function assignedUser()
{
    return $this->belongsTo(User::class,'assigned_to');
}
}
