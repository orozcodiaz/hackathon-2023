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
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-header"><a href="{{route('home')}}">{{ __('Real Time Availability System') }}</a> | Add Item</div>

                <div class="card-navigation">
                    <a href="{{route('home')}}" class="btn btn-primary m-2">Show All Products</a>
                    <a href="{{route('showBranchesPage')}}" class="btn btn-warning m-2" id="branchesBtn">Branches</a>
                    <a href="{{route('showConditionsPage')}}" class="btn btn-warning m-2">Conditions</a>
                </div>

                <div class="card-body">
                        <form action="{{route('saveProduct')}}" method="POST">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameOfProduct" required>
                                <div id="nameOfProduct" class="form-text">Name of the incoming product</div>
                            </div>
                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" required value="{{$generatedSku}}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                          required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="none" disabled selected>- Loading... -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="condition" class="form-label">Condition</label>
                                <select class="form-control" id="condition" name="condition" required>
                                    <option value="none" disabled selected>- Loading... -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="receiver" class="form-label">Receiver</label>
                                <input type="text" class="form-control" id="receiver" name="receiver"
                                       aria-describedby="receiver"
                                       required readonly value="{{auth()->user()->name}}">
                                <div id="receiver" class="form-text">Name of the receiver person.</div>
                            </div>

                            <button type="submit" class="btn btn-success">Create</button>
                            <input type="file" id="fileInput" name="files[]" multiple accept="image/*" class="btn btn-warning">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{route('get-conditions')}}',
                dataType: 'json',
                async:false,
                success: function(data) {
                    $('#condition').html('').append('<option disabled selected>-- Select Condition --</option>');
                    $.each(data, function(i, d) {
                        $('#condition').append('<option value="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });

            $.ajax({
                url: '{{route('get-categories')}}',
                dataType: 'json',
                async:false,
                success: function(data) {
                    $('#category').html('').append('<option disabled selected>-- Select Category --</option>');
                    $.each(data, function(i, d) {
                        $('#category').append('<option value="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });
    </script>
@endsection
