@extends('layouts.app')
@section('title')
    Products
@endsection

@section('main-content')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Product Line</th>
                        <th>Vendor</th>
                        <th>Stock</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->productCode }}</td>
                            <td>{{ $product->productName }}</td>
                            <td>{{ $product->productLine }}</td>
                            <td>{{ $product->productVendor }}</td>
                            <td>{{ $product->quantityInStock }}</td>
                            <td>{{ $product->buyPrice }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Product Line</th>
                        <th>Vendor</th>
                        <th>Stock</th>
                        <th>Price</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
