<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
 
class Category extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'user_id',
        'name',
    ];
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
