@extends('layouts.app')

@section('content')

    <ul class="listed m-5">
    @forelse($customers as $customer)

       <li class="main-list-item">
           <a href={{route('customers.show',$customer)}}> {{$customer->fullname}} --- {{$customer->email}}</a>
       </li>

    @empty
        There are no users.
    @endforelse
    </ul>

@endsection
