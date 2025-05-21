<?php

namespace App\Http\Controllers\Api\Product;

use App\models\attribute\Attribute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create(Request $request, Product $product)
    {
        $data = $product->createOrEdit($request);
        return response()->json([ 'data' => $data, 'message' => 'success'], 200);
    }
    public function list(Request $request)
    {
        $keyword = $request->keyword;
        if($keyword == ""){
            $data = Product::leftJoin('product_category', function($join){
                $join->on('product_category.id','=','products.category');
            })
            ->select('products.*','product_category.name as cate')->orderBy('id','DESC')
            ->get();
        } else {
            $data = Product::query()
            ->leftJoin('product_category', function($join){
                $join->on('product_category.id','=','products.category');
            })
            ->select('products.*','product_category.name as cate')->orderBy('id','DESC')->get();

            $data = $data->filter(function($product) use ($keyword) {
                $name = (languageName($product->name));

                return $keyword === '' || Str::contains($name, $keyword);
            })->values();
        }
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function edit($id)
    {
        $data = Product::where([
            'id'=> $id
        ])
        ->first();

        $attrValues = [];
        foreach($data->attributes as $a) {
            $attrValues[] = [
                'id'     => $a->id,
                'name'     => languageName($a->name),
                'type'     => $a->type,
                'value_text'     => $a->pivot->value_text,
                'value_datetime' => $a->pivot->value_date
                    ? Carbon::parse($a->pivot->value_date)
                        ->format('Y-m-d H:i:s')
                    : null,
                ];
        }
        $data->attribute_values = $attrValues;

        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function delete($id)
    {
        $query = Product::where(['id'=>$id])
        ->first();
        if($query->images){
            $imgArr = json_decode($query->images);
            foreach($imgArr as $i){
                $file= str_replace('http://localhost:8080','',$i);
                $filename = public_path().$file;
                if(file_exists( public_path().$file ) ){
                    \File::delete($filename);
                }
            }
        }
        $query->delete();

        return response()->json([
            'message' => 'Delete success'
        ]);
    }
}
