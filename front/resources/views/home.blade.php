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
                <div class="card-header">{{ __('Real Time Availability System') }}</div>

                <div class="card-navigation">
                    <a href="{{route('createProductPage')}}" class="btn btn-primary m-2">Add Item</a>
                    <a href="{{route('showBranchesPage')}}" class="btn btn-warning m-2" id="branchesBtn">Branches</a>
                    <a href="{{route('showConditionsPage')}}" class="btn btn-warning m-2">Conditions</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><img id="loader-image" width="50px" src="{{asset('assets/loader.gif')}}" alt="Loading..." /></p>

                    <div id="loaded-products"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Get Products view
            $.ajax({
                dataType: 'json',
                async: false,
                url: '{{ route('get-products-view') }}',
                success: function(data) {
                    $('#loaded-products').html(data.content);
                    $('#loader-image').hide();
                },
                error: function(jqxhr, textStatus, error) {
                    alert("Request failed: " + textStatus + ", " + error);
                }
            });
        });
    </script>
@endsection
