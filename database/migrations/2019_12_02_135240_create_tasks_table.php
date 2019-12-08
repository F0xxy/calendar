<?php

use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('unknown list');
            $table->mediumText('description')->nullable();

            $table->unsignedBigInteger('taskList_id');
            $table->foreign('taskList_id')->references('id')->on('task_lists');

            $table->enum('state', [
                Task::UNSTARTED,
                Task::STARTED,
                Task::IN_PROGRESS,
                Task::COMPLETE,
                Task::IGNORED])
                ->default(Task::UNSTARTED);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
