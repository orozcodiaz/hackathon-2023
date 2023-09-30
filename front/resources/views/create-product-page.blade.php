@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">{{ __('Real Time Availability System') }}</a> | Add Product</div>

                @include('nav')

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="nameOfProduct" required>
                                <div id="nameOfProduct" class="form-text">Name of the incoming product</div>
                            </div>
                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" required value="{{$generatedSku}}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                          required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="none" disabled selected>- Select Category -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="condition" class="form-label">Condition</label>
                                <select class="form-control" id="condition" name="condition" required>
                                    <option value="none" disabled selected>- Select Condition -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="receiver" class="form-label">Receiver</label>
                                <input type="text" class="form-control" id="receiver" aria-describedby="receiver" required>
                                <div id="receiver" class="form-text">Name of the receiver person.</div>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
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

        });
    </script>
@endsection
