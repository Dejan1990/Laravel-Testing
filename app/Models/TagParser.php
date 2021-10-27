<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagParser extends Model
{
    use HasFactory;

    public function parse(string $tags): array
	{
		return preg_split("/ ?[,|!] ?/", $tags); //upitnik znaci da je preshodni karakter opcioni - u ovom slucaju to je razmak
		//[,|] znaci da je dozvoljeno i , i |
	}
}
