<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
	public static function getAllMaterials()
	{
		$medicines = DB::table('medicines')->select('*')
						->addSelect(DB::raw("'Medicine' as material_type"));

		$disinfectants = DB::table('disinfectants')->select('*')
							->addSelect(DB::raw("'Disinfectant' as material_type"))
							->union($medicines)
							->get();
					

		return $disinfectants;
	}    
}
