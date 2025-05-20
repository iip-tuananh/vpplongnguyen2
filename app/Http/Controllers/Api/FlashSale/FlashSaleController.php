<?php

namespace App\Http\Controllers\Api\FlashSale;

use App\models\flashsale\Flashsale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlashSaleController extends Controller
{
    public function create(Request $request, Flashsale $flashsale)
    {
        $data = $flashsale->createOrEdit($request);
        return response()->json([ 'data' => $data, 'message' => 'success'], 200);
    }

    public function list(Request $request)
    {
        $keyword = $request->keyword;
        $data = Flashsale::query()->with('items');

        if($keyword) {
            $data->where('name', 'like', '%' . $keyword . '%');
        }

        $data = $data->get()->map(function($fs) {
            $ngayApDung = Carbon::parse($fs->start_at)
                    ->format('d-m-Y H:i')
                . ' – ' .
                Carbon::parse($fs->end_at)
                    ->format('d-m-Y H:i');

            $trangThai = $fs->status === 'active'
                ? 'Đang kích hoạt'
                : 'Dừng';

            $fs->ngay_ap_dung = $ngayApDung;
            $fs->status_name       = $trangThai;

            return $fs;
        });


        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }

    public function edit($id)
    {
        $data = Flashsale::query()->with('items.product')->where([
            'id'=> $id
        ])
            ->first();
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function delete($id)
    {
        $query = Flashsale::where(['id'=>$id])
            ->first();

        $query->items()->delete();

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
