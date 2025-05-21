<?php

namespace App\Http\Controllers\Api\Attribute;

use App\models\attribute\Attribute;
use App\models\attribute\AttributeProductValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\blog\BlogCategory;

class AttributeController extends Controller
{
    public function add(Request $request, Attribute $attribute)
    {
        $data = $attribute->createOrUpdate($request);
        return response()->json([
            'message' => 'Save Success',
            'data'=> $data
        ],200);
    }

    public function list(Request $request)
    {
        $keyword = $request->keyword;
        if($keyword == ""){
            $data = Attribute::orderBy('id','DESC')->get();
        }else{
            $data = Attribute::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->get()->toArray();
        }
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function edit($id)
    {
        $data = Attribute::where(['id'=>$id])->first();
        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 200);
    }
    public function deleteCateBlog($id)
    {
        $query = Attribute::find($id);
        AttributeProductValue::query()->where('attribute_id', $query->id)->delete();
        $query->delete();

        return response()->json(['message'=>'Delete Success'],200);
    }
}
