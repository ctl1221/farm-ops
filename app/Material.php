<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
	public static function getAllMaterials()
	{
		$feeds = DB::table('feeds')
						->select('id')
						->addSelect('code')
						->addSelect('description')
						->addSelect('short_name')
						->addSelect('short_description')
						->addSelect('kg_weight')
						->addSelect(DB::raw("'Feed' as material_type"));

		$medicines = DB::table('medicines')
						->select('id')
						->addSelect('code')
						->addSelect('description')
						->addSelect('short_name')
						->addSelect('short_description')
						->addSelect('kg_weight')
						->addSelect(DB::raw("'Medicine' as material_type"));

		$disinfectants = DB::table('disinfectants')
							->select('id')
							->addSelect('code')
							->addSelect('description')
							->addSelect('short_name')
							->addSelect('short_description')
							->addSelect('kg_weight')
							
							->addSelect(DB::raw("'Disinfectant' as material_type"))
							->union($medicines)
							->union($feeds)
							->get();
					
		return $disinfectants;
	}    
}
