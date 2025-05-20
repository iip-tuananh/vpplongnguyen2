<?php

namespace App\models\attribute;

use App\models\product\Product;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function createOrUpdate($request)
    {
        $id = $request->id;
        if($id){
            $query = Attribute::query()->where([
                'id' => $id
            ])->first();

            if ($query) {
                $query->name = json_encode($request->name);
                $query->type = $request->type;

                $query->save();
            }

        } else {
            $query = new Attribute();
            $query->name = json_encode($request->name);
            $query->type = $request->type;

            $query->save();
        }

        return $query;
    }

}
