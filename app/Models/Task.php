<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string $description
 * @property int|null $category_id
 * @property string $state
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Task whereState($value)
 */
class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'state',
        'taskList_id'
    ];
    const UNSTARTED = "UNSTARTED";
    const STARTED = "STARTED";
    const IN_PROGRESS = "IN_PROGRESS";
    const COMPLETE = "COMPLETE";
    const IGNORED = "IGNORED";

    /**
     * @return bool
     */
    public function done()
    {
        return ($this->state === Task::COMPLETE) ? true : false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }
}
