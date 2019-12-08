<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TaskList
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereUserId($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string $finished_at
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TaskList whereName($value)
 */
class TaskList extends Model
{
    protected $fillable = [
        'name',
        'description',
        'finished_at',
        'category_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
