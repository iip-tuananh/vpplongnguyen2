<?php

namespace App\models\flashsale;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\models\language\Language;
use Image,Auth;
use App\Customer;
use App\models\product\Category;
use App\models\product\TypeProduct;
use App\models\product\TypeProductTwo;

use App\models\flashsale\FlashsaleItem;

class Flashsale extends Model
{
    protected $table = "flash_sales";
    public function rule()
    {
        return [
            // 'name'  =>   'unique:products,name'
        ];
    }
    protected $casts = [
        'name' => 'array',
        'start_at' => 'datetime:Y-m-d H:i:s',
        'start_time' => 'time:H:i:s',
        'end_time' => 'time:H:i:s',
    ];


    public function getStatusLabelAttribute(): string
    {
        $now = Carbon::now();

        $start = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $this->start_at->format('Y-m-d') . ' ' . $this->start_time
        );

        $end = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $this->start_at->format('Y-m-d') . ' ' . $this->end_time
        );

        if ($end->lt($start)) {
            $end->addDay();
        }

        if ($now->between($start, $end)) {
            return 'ongoing';
        }

        if ($now->lt($start)) {
            return 'upcoming';
        }

        return 'ended';
    }
    public function items() {
        return $this->hasMany(FlashsaleItem::class,'flash_sale_id');
    }

    public function createOrEdit($request)
    {
        $id = $request->id;
        $start = Carbon::parse($request->start_time)
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->format('H:i:s');
        $end = Carbon::parse($request->end_time)
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->format('H:i:s');

        if($id){
            $query = Flashsale::find($id);
            if($query){
                $query->name = json_encode($request->name);
                $query->slug = to_slug($request->name[0]['content']);
                $query->images = json_encode($request->images);
                $query->description = json_encode($request->description);
                $query->start_at = Carbon::parse($request->start_at)->setTimezone('Asia/Ho_Chi_Minh');
                $query->start_time = $start;
                $query->end_time = $end;
                $query->status = $request->status;

                $query->save();

                $query->items()->delete();

                foreach ($request->items as $item ) {
                    $flashSaleItem = new FlashsaleItem();
                    $flashSaleItem->product_id = $item['product_id'];
                    $flashSaleItem->flash_sale_id = $query->id;

                    $flashSaleItem->save();
                }

            }

        }else{
            $query = new Flashsale();
            $query->name = json_encode($request->name);
            $query->slug = to_slug($request->name[0]['content']);
            $query->images = json_encode($request->images);
            $query->description = json_encode($request->description);
            $query->start_at = Carbon::parse($request->start_at)->setTimezone('Asia/Ho_Chi_Minh');
            $query->start_time = $start;
            $query->end_time = $end;
            $query->status = $request->status;

            $query->save();

            foreach ($request->items as $item ) {
                $flashSaleItem = new FlashsaleItem();
                $flashSaleItem->product_id = $item['product_id'];
                $flashSaleItem->flash_sale_id = $query->id;

                $flashSaleItem->save();
            }
        }

        if($request->status == 'active') {
            Flashsale::query()->whereNotIn('id', [$query->id])->update(['status' => 'inactive']);
        }

        return $query;
    }
    public function createClient($request)
    {
        $images = $request->file('images');
        $images_data = [];
        $query = new Product();
        $query->name = toArrayLanguage($request->name);
        $query->slug = to_slug($request->name[0]['content']);

        $query->description = toArrayLanguage($request->description);
        $query->uses = toArrayLanguage($request->uses);
        $query->relationship = $request->relationship;
        $query->category = $request->category;
        $query->type_cate = $request->type_cate;
        $query->management_costs = $request->management_costs;
        $query->address = $request->address;
        $query->district = $request->district;
        $query->author = Auth::guard('customer')->user()->id;
        $query->content = toArrayLanguage($request->content);

        $query->status = $request->status; //0-Sẵn sàng giao dịch 1-Ngừng giao dịch
        $query->acreage = $request->acreage;



        $query->percent_yourself = $request->percent_yourself;
        $query->cost_investment = $request->cost_investment;
        $query->video = $request->video;
        if($request->hasFile('images')){
            foreach($images as $image){
                $name=time().$image->getClientOriginalName();
                $destinationPath = 'uploads/real_estate/' . $name;
                $img = Image::make($image->getRealPath());
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save('uploads/real_estate/'.$name);
                $images_data[] = $name;
            }
        }
        $query->images=json_encode($images_data);
        $query->save();
        return $query;
    }
}
