<!-- banner -->
<div class="banner inner-banner" id="home">
	<div class="container">
	
	</div>
</div>
<!-- //banner -->

<!-- Properties page -->
<div class="blog_w3ls py-5" id="blog">
	<div class="container py-md-5">
		<h3 class="heading mb-5">Villa</h3>
		<div class="blog-grids">
			<div class="row">
				<?php foreach ($villa as $villa): ?>
				<!-- property grid -->
				<div class="col-lg-4 col-md-6">
					<div class="card border-0 med-blog">
						<div class="card-header p-0">
							<img class="card-img-bottom" src="<?php echo base_url('upload/villa/'.$villa->image) ?>" width="64" alt="Card image cap">
						</div>
						<div class="detail">
							<h4 class="title mb-2"><a href="<?php echo site_url('C_Detail/index/'.$villa->villa_id) ?>"><?php echo $villa->nama_villa ?></a></h4>
							<ul class="facilities-list clearfix">
								<li>
									<span class="fa fa-bed"></span> 3 Bedrooms
								</li>
								<li>
									<span class="fa fa-bath"></span> 2 Bathrooms
								</li>
								<li>
									<span class="fa fa-home"></span> <?php echo $villa->alamat ?>
								</li>
								<li>
									<span style="color:green" class="fa fa-money"></span> <?php echo $villa->harga ?> IDR
								</li>
							</ul>
							<p class="mt-2"><?php echo substr($villa->deskripsi, 0, 120) ?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- //property grid -->
				
			</div>
		</div>
	</div>
</div>
<!-- //Properties page -->

