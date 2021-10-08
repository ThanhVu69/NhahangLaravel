<!-- Start Customer Reviews -->
<style>
		div.nen1 {
			padding: 20px 0px;
			background: #ffffff url(online/images/nen1.jpg) no-repeat bottom center;
			background-size: cover;
		}

		div.nen2 {
			padding: 20px 0px;
			background: #ffffff url(online/images/nen2.jpg) no-repeat bottom center;
			background-size: cover;
		}

		div.nen3 {
			padding: 70px 0px;
			background: #ffffff url(online/images/nen3.jpg) no-repeat bottom center;
			background-size: cover;
		}
	</style>
	<div class="nen2">
		<!-- Bình luận -->
<div class="container">
@if(count($errors) > 0)
            <div class="alert alert-danger">User exist!</div>
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div> 
            @endif
	<div class="comment-respond-box">
	<h3>Cảm nhận của quý khách</h3>
	<div class="comment-respond-form">
		<form  action="reviews" class="comment-form-respond row" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group">
					<input class="form-control" name="ten" placeholder="Họ và tên" type="text">
				</div>
				<div class="form-group">
					<input class="form-control" name="nghenghiep" placeholder="Nghề nghiệp" type="tex">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group">
					<textarea class="form-control" name="reviews" placeholder="Ý kiến của quý khách" rows="2"></textarea>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<button class="btn btn-submit">Thực hiện</button>
			</div>
		</form>
	</div>
	</div>
	</div>
	
<!-- Bình luận -->
<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Ý kiến khách hàng</h2>
						<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="online/images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Taylor Swift</strong></h5>
								<h6 class="text-dark m-0">Ca sĩ</h6>
								<p class="m-0 pt-3">Mỗi lần hát hội chợ xong tôi lại vào Bánh cuốn Gia An cơ sở gần nhất làm bát bánh chay chả rán.</p>
                            </div>
                            @foreach($reviews as $re)
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="online/images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">{{$re->ten}}</strong></h5>
								<h6 class="text-dark m-0">{{$re->nghenghiep}}</h6>
								<p class="m-0 pt-3">{{$re->reviews}}</p>
                            </div>
                            @endforeach
							
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div></div>
	<!-- End Customer Reviews -->