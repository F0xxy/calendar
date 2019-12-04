<?php

namespace App\Models;

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
    //
}
