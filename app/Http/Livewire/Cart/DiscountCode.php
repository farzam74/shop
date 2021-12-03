<?php

namespace App\Http\Livewire\Cart;

use Carbon\Carbon;
use Livewire\Component;

class DiscountCode extends Component
{
    public $code;
    public $checkedCode;
    public $product;
    public $productPrice;
    public $checkCart;
    public $cartItem;


    public function checkCode()
    {

        //check if the input code belongs to auth user:
        $this->checkedCode=auth()->user()->discountCodes()->where('discounts.code',$this->code)->first();
        if ($this->checkedCode != null){

            //check expire date of code:
            if((new Carbon($this->checkedCode->expire_time))->lt(now())) {
                $this->checkedCode=null;
                $this->alert('error', 'کد تحفیف منقضی شده است.', [
                    'position' => 'top',
                    'timer' => 3000,
                ]);
            }
            else{
                $this->product=$this->checkedCode->product;

                //check if the product of input code exists in cart:
                $this->checkCart=auth()->user()->cart->cartItems()->where('cart_items.product_id',$this->product->id)->first();

                if($this->checkCart == null){
                    $this->checkedCode = null;
                    $this->alert('error', 'محصول مورد نظر در سبد وجود ندارد.', [
                        'position' => 'top',
                        'timer' => 3000,
                    ]);

                }

                else{

                    $this->cartItem=$this->checkCart;
                    $this->productPrice=$this->checkedCode->product->getFinalPriceAttribute()-($this->checkedCode->value/100*$this->checkedCode->product->getFinalPriceAttribute());

                }
            }

        }
        else{
            $this->alert('error','کد تخفیف غیر معتبر است.', [
                'position' =>  'top',
                'timer' =>  3000,
            ]);
        }
    }

    public function submitCode()
    {
        $this->emit('updatePrice',$this->productPrice,$this->cartItem->id);
    }

    public function render()
    {
        return view('livewire.cart.discount-code');
    }
}
