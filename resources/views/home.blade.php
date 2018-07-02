@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Producs Store</h1></div>
				<p>Because of the given tiem I could not focus on making this look beatiful, if you give me 30 minutes more I would give even a cart experience</p>
                @foreach ($products as $key => $value)
					<form class="submitProduct" action="{{ route('request-product') }}" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-2 col-sm-12 pimage">
								<img src="{{ asset('assets/images/product.jpg') }}">
							</div>
							<div class="col-md-2 col-sm-12">
								<h3>Name:</h3>
								<input type="text" class="name" name="name" value="{{ $value->name }}">
							</div>					
							<div class="col-md-2 col-sm-12">
								<h3>Stock:</h3>
								<input type="text" class="stock" name="stock" value="{{ $value->stock }}">
							</div>										
							<div class="col-md-2 col-sm-12">
								<h3>Price:</h3>
								<input type="text" class="price" name="price" value='{{ number_format($value->price,2,".",",") }}'>
							</div>															
							<div class="col-md-2 col-sm-12">
								<input type="submit" class="request btn btn-success" value="REQUEST">
							</div>																					
						</div>
					</form>
                @endforeach										
            </div>
        </div>
    </div>
@endsection