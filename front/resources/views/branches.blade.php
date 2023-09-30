@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">{{ __('Real Time Availability System') }}</a> | Branches</div>

                @include('nav')

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branchesList as $branch)
                            <tr>
                                <th scope="row">{{$branch['id']}}</th>
                                <td>{{$branch['name']}}</td>
                                <td>{{$branch['address']}}</td>
                                <td>
                                    <a href="">edit</a> | <a href="">delete</a>
                                </td>
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

@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
