<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [

            'نام' => $this->fa_title,
            'نام لانین' => $this->en_title,
            'توضیح محصول' => $this->description,
            'قیمت' => $this->price,
            'تخفیف' => $this->discount,
            'عکس اصلی' => $this->primary_img,
            'سایر عکس ها' => $this->other_img,
            'وضعیت' => $this->status
        ];
    }

}
