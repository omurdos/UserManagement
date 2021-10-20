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
                            <th>{{ $product->productCode }}</th>
                            <th>{{ $product->productName }}</th>
                            <th>{{ $product->productLine }}</th>
                            <th>{{ $product->productVendor }}</th>
                            <th>{{ $product->quantityInStock }}</th>
                            <th>{{ $product->buyPrice }}</th>
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
