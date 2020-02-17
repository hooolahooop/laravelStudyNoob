<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     *Массово присваиваемые атрибуты.
     *
     *@var array
     * /
     protected $fillable = [
        'name', 'detail'
    ];

    /**
     * Получить пользователя - владельца данной задачи
     * / 
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
*/
    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var array
     */
    protected $guarded = [];
}


$user = User::find(1);

/*foreach ($user->tasks as $task) {
	echo $task->name;
}*/