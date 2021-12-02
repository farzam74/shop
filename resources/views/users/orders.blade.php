@extends('layouts.app')

    @section('content')

        <table class="table container">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">تاریخ</th>
                <th scope="col">وضعیت</th>
                <th scope="col">قیمت</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->created_at}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->price}} تومان</td>
            </tr>
            @empty

            <tr>

                <th colspan="4" class="text-center">سفارشی وجود ندارد</th>

            </tr>


            @endforelse

            </tbody>
        </table>

    @endsection
