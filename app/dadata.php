<?php

namespace App;

use Fomvasss\Dadata\Facades\DadataSuggest;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Dadata extends Model
{
	$result = DadataSuggest::suggest("address", ["query"=>"Москва", "count"=>5]);

	return $result;
}