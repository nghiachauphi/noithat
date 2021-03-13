@extends('layouts.app')

@section('content')


<style type="text/css">
	div.carousel-item{
		width: 100%;
		height: 250px!important;
	}
	.carouselExampleIndicators{

	}

	
</style>
<script type="text/javascript">
	$('.carousel').carousel({
  interval: 1000
})
</script>

<div class="banner">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
	    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  	<div class="carousel-inner">
    <div class="carousel-item active">
      	<img class="d-block w-100" src="{{asset('public/images/banner4.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      	<img class="d-block w-100" src="{{asset('public/images/banner2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      	<img class="d-block w-100" src="{{asset('public/images/banner5.jpg')}}" alt="Third slide">
    </div>
  	</div>
  		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
  		</a>
	</div>
</div>

<div class="row w-100 h-100">
		<div class="tab-content w-100" id="pills-tabContent" >
		  	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		  		<table class="table">
				  	<tbody>
				    	<div class="container">
						  	<div class="row">
						  		
						  		@foreach($sanpham as $item)
						  		<div class="col col-sm-3 col-lg-3" style="width: 18rem;">
                                	<img class="rounded" src="{{asset('/public/upload/'.$item->hinhanh)}}" width="300" height="300">
									<div class="card-body">
										<h5 class="card-title">{{$item->tensanpham}}</h5>
										<p class="card-text">{{$item->mota}}</p>

										<a href="{{ route('chitietsp',$item->id) }}">
		                                    <button type="submit" class="btn btn-primary">Xem chi tiết<i class="fa fa-chevron-right"  aria-hidden="true"></i></button>
		                                </a>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
				  	</tbody>
				</table>
		  	</div>
		

		<div class="tab-pane fade w-100" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		  	<table class="table">
				<tbody>
					<div class="container">
						<div class="row">
						  	@foreach($sanpham as $item)
						  		@if($item->danhmuc_id==2)
						  		<div class="card col col-sm-3 col-lg-3" style="width: 18rem;">
                                	<img class="rounded" src="{{asset('/public/upload/'.$item->hinhanh)}}" width="300" height="300">
									<div class="card-body">
										<h5 class="card-title">{{$item->tensanpham}}</h5>
										<p class="card-text">{{$item->mota}}</p>
										<a href="{{ route('chitietsp',$item->id) }}">
		                                    <button type="submit" class="btn btn-primary">Xem chi tiết<i class="fa fa-chevron-right"  aria-hidden="true"></i></button>
		                                </a>
									</div>
								</div>
								@endif
								@endforeach
						</div>
					</div>
				</tbody>
			</table>
		</div>

		<div class="tab-pane fade w-100" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
	  		<table class="table">
			  	<tbody>
			    	<div class="container">
					  	<div class="row">
					  		@foreach($sanpham as $item)
						  		@if($item->danhmuc_id==3)
						  		<div class="card col col-sm-3 col-lg-3" style="width: 18rem;">
                                	<img class="rounded" src="{{asset('/public/upload/'.$item->hinhanh)}}" width="300" height="300">
									<div class="card-body">
										<h5 class="card-title">{{$item->tensanpham}}</h5>
										<p class="card-text">{{$item->mota}}</p>
										<a href="{{ route('chitietsp',$item->id) }}">
		                                    <button type="submit" class="btn btn-primary">Xem chi tiết<i class="fa fa-chevron-right"  aria-hidden="true"></i></button>
		                                </a>
									</div>
								</div>
								@endif
								@endforeach
						</div>
					</div>
			  	</tbody>
			</table>
		</div>
	</div>
@endsection