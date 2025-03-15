<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class LangProject extends Model
{
    use HasFactory;
    protected $table = 'lang_projects';
    protected $fillable = [
        'project_id',
        'lang_id',
        'title_trans',
        'content_trans',
            
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class)->withDefault();
    }
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class,'lang_id')->withDefault();
    }
}
