<?php

namespace App\Http\Livewire\Cart;

use App\Models\CartItem;
use Livewire\Component;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class Price extends Component
{

    public $price;
    public $postalPrice;
    public $cartItemPrices;

    protected $listeners=[
        'updatePrice',
        'increase' => 'updateCounterPrice',
        'decrease' => 'updateCounterPrice',
        'updateCartItems'
    ];


    public function updatePrice($productPrice,$cartItem)
    {
        $cartItem=CartItem::query()->find($cartItem);
        $this->price=(auth()->user()->cart->getPriceAttribute()-$cartItem->getPriceAttribute())+$productPrice*$cartItem->count;
        $this->postalPrice=$this->calcPostalPrice($this->price);
        $this->emit('updateCartItems',$cartItem,$productPrice);
    }

    public function updateCounterPrice($productPrice=null,$cartItem=null)
    {
        $this->price=auth()->user()->cart->getPriceAttribute();
        $this->postalPrice=$this->calcPostalPrice($this->price);
        $this->emit('updateCartItems',$cartItem,$productPrice);

    }

    public function calcPostalPrice($input)
    {
        if($input>300000){
            return 0;
        }
        return 20000;
    }

    //to update price of each cartitem when used discount code to send this data to order details:
    public function updateCartItems($item,$price)
    {

        if($item != null)
        {
            foreach (auth()->user()->cart->cartItems as $key => $value){

                $this->cartItemPrices[$key]['product'] = $value->product_id;
                $this->cartItemPrices[$key]['count'] = $value->count;
                if($value->id == $item['id']) {
                    $this->cartItemPrices[$key]['price'] = $price * $value->count;
                }
                else
                    $this->cartItemPrices[$key]['price']=$value->getPriceAttribute();
            }
        }

        $this->emit('updateCartDetails',$this->cartItemPrices);
    }

    public function render()
    {
        return view('livewire.cart.price');
    }

}
