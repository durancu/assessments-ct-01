@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
    
                        <div class="row">
                            <div class="col">
                                <form class="form-inline" action="">
                                    <div class="form-group mb-2">
                                        <label for="name" class="sr-only">Name</label>
                                        <input type="text" class="form-control" id="name" value="" placeholder="Product Name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="name" class="sr-only">Quantity in Stock</label>
                                        <input type="text" class="form-control" id="quantity" placeholder="Quantity">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="name" class="sr-only">Price per item</label>
                                        <input type="text" class="form-control" id="price" placeholder="Price/item">
                                    </div>
                
                                    <button type="button" id="add_product_btn" class="btn btn-primary mb-2">Add Product</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table" id="products_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity in stock</th>
                                        <th scope="col">Price per item</th>
                                        <th scope="col">Datetime submitted</th>
                                        <th scope="col">Total value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $product)
                                    <tr>
                                        <td>{{$product['name']}}</td>
                                        <td>{{$product['quantity']}}</td>
                                        <td>{{$product['price']}}</td>
                                        <td>{{$product['datetime']}}</td>
                                        <td>{{$product['total_value']}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
    @endsection
