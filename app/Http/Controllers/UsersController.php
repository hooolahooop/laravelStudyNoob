<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct() {
    $this->middleware('auth.role:admin', ['only' => ['blockUser']]);
	}

	public $html = '<hr><a href="./reg">reg</a><br>
	<a href="./admin">admin</a><br>
	<a href="./all">all</a>';

	public function all() {
		return 'Этот роут для всех юзеров.'.$this->html;
	}

	public function reggedUser() {
		return 'это ток для зареганных с любыми ролями'.$this->html;
	}

	public function adminUsers() {
		return 'это ток для админов.'.$this->html;
	}
}
