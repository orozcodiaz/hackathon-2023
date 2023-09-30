@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Real Time Availability System') }}</div>

                @include('nav')

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
            let conditions;
            let categories;

            $.getJSON('{{route('get-conditions')}}', function(data) {
                conditions = data;
            }).fail(function(jqxhr, textStatus, error) {
                alert("Request failed: " + textStatus + ", " + error);
            });

            $.getJSON('{{route('get-categories')}}', function(data) {
                categories = data;
            }).fail(function(jqxhr, textStatus, error) {
                alert("Request failed: " + textStatus + ", " + error);
            });

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
