@extends('layouts.app')
@section('title')
    Product Lines
@endsection

@section('main-content')

<div class="card">
    {{-- <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div> --}}
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Product Line</th>
          <th>Description</th>
          <th></th>
          
        </tr>
        </thead>
        <tbody>
          @foreach ($productLines as $productLine)
          <tr>
            <td>{{ $productLine->productLine }}</td>
            <td>{{ $productLine->textDescription }}</td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Product Line</th>
            <th>Description</th>
            <th></th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->



    {{-- {{$productLine}} --}}
@endsection