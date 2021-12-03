@extends('layouts.app')

@section('content')

{{--    <ul class="listed m-5">--}}
{{--    @forelse($users as $user)--}}

{{--       <li class="main-list-item">--}}
{{--           <a href={{route('users.show',$user)}}> {{$user->fullname}} --- {{$user->email}}</a>--}}
{{--       </li>--}}

{{--    @empty--}}
{{--        There are no users.--}}
{{--    @endforelse--}}
{{--    </ul>--}}

<div class="btn-toolbar">
    <button class="btn btn-primary">New User</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
</div>
<div class="well">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Fullame</th>
            <th>Email</th>
            <th style="width: 36px;"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Tompson</td>
            <td>
                <a href="user.html"> <i class="icon-pencil"></i>
                </a>
                <a href="#myModal" role="button" data-toggle="modal"> <i class="icon-remove"></i>
                </a>
            </td>
        </tr>

        </tbody>
    </table>
</div>
{{--<div class="pagination">--}}
{{--    <ul>--}}
{{--        <li>--}}
{{--            <a href="#">Prev</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">1</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">2</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">3</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">4</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">Next</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</div>--}}
{{--<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-header">--}}
{{--        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--        <h3 id="myModalLabel">Delete Confirmation</h3>--}}
{{--    </div>--}}
{{--    <div class="modal-body">--}}
{{--        <p class="error-text">Are you sure you want to delete the user?</p>--}}
{{--    </div>--}}
{{--    <div class="modal-footer">--}}
{{--        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>--}}
{{--        <button class="btn btn-danger" data-dismiss="modal">Delete</button>--}}
{{--    </div>--}}
{{--</div>--}}

@endsection
