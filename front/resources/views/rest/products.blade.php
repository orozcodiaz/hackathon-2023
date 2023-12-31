<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Picture</th>
        <th scope="col">SKU</th>
        <th scope="col">Product Name</th>
        <th scope="col">Category</th>
        <th scope="col">Condition</th>
        <th scope="col">Total Qty</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product['id']}}</th>
                <td><img width="20" src="{{asset('assets/img/' . $product['picture'])}}"> </td>
                <td><b>{{$product['sku']}}</b></td>
                <td>{{$product['name']}}</td>
                <td>{!! $product['category'] !!}</td>
                <td>{{$product['condition']}}</td>
                <td>{{$product['totalQty']}}</td>
                <td>
                    <a href="{{route('editProductPage', $product['id'])}}">edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>