<div  class="form-group m-2 p-3 cart-form">
        <input type="text" wire:model="code" class="cartinput" >
        <button class="cartbutton" wire:click="checkCode" >
            بررسی
        </button>

    @if($checkedCode != null && $checkCart != null)

{{--        {{dd($checkedCode)}}--}}
    <div class="card" style="width: 28rem;">
        <img class="card-img-top" src="{{url('storage/'.$checkedCode->product->primary_img)}}" alt="Card image cap">
        <div class="card-body text-center">
            <br>
            <h5 class="card-title">{{$checkedCode->product->fa_title}}</h5>
            <br>
            <div class="card-text">تخفیف: <span class="text-danger"> %{{$checkedCode->value}} </span></div>
            <div class="card-text">قیمت قبل تخفیف: <del>{{$checkedCode->product->getFinalPriceAttribute()}} </del></div>
            <div class="card-text">
                قیمت بعد تخفیف:
                <div class="text-danger">
                    {{$productPrice}}
                </div>
            </div>
            <button class="btn btn-primary" wire:click="submitCode">
                اعمال تخفیف
            </button>

        </div>
    </div>
    @endif
</div>
