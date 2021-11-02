<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Counter extends Component
{

    public $count;
    public $product;
    public $cartItem;
    public $cartItemPrices;
    public $index;


    //to update total price in cart:

    protected $listeners=
        [
            'updateCartDetails'
        ];

    public function increment()
    {
        if( $this->count <= $this->product->capacity){

            $this->count++;
            $this->cartItem->count++;
            $this->cartItem->save();
            $this->emit('increase');

        }

        else

            $this->alert('error','تعداد انتخابی بیشتر از ظرفیت است.', [
                'position' =>  'top',
                'timer' =>  3000,
            ]);

    }

    public function decrement()
    {
        if ($this->count > 1) {
            $this->count--;
            $this->cartItem->count--;
            $this->cartItem->save();
            $this->emit('decrease');
        }

    }

    public function updateCartDetails($cartItemPrices)
    {
        $this->cartItemPrices=$cartItemPrices;
    }

    public function render()
    {
        return view('livewire.cart.counter');
    }
}
