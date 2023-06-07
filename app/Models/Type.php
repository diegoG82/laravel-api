<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'slug', 'content'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
