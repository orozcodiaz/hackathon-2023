@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3>Current Branch: <span id="currentBranch">
                    <img id="loader-image2" width="30px" src="{{asset('assets/loader.gif')}}" alt="Loading..." />
                </span>
            </h3>
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">{{ __('Real Time Availability System') }}</a> | Branches</div>

                <div class="card-navigation">
                    <a href="{{route('home')}}" class="btn btn-primary m-2">Show All Items</a>
                    <a href="{{route('showBranchesPage')}}" class="btn btn-warning m-2" id="branchesBtn">Branches</a>
                    <a href="{{route('showConditionsPage')}}" class="btn btn-warning m-2">Conditions</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Total Items</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branchesList as $branch)
                            <tr>
                                <th scope="row">{{$branch['id']}}</th>
                                <td>{{$branch['name']}}</td>
                                <td>{{$branch['address']}}</td>
                                <td>{{rand(10, 99)}}</td>
                                <td><a href="javascript:alert('Still in progress.')">Show Products</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
