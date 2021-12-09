<?php

/**
 * Home Page
 * 
 * @package NM_USC
 */ 

?>
<?php 

if(is_front_page()){
    get_template_part('template-parts/header/site', 'banner');
}

?>
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
			<a href="women.html">
				<div class="bb-left-agileits-w3layouts-inner">
					<h3>SALE</h3>
					<h4>upto<span>75%</span></h4>
				</div>
			</a>
		</div>
		<div class="col-md-4 bb-grids bb-middle-agileits-w3layouts">
			<a href="shoes.html">
				<div class="bb-middle-top">
					<h3>SALE</h3>
					<h4>upto<span>55%</span></h4>
				</div>
			</a>
			<a href="jewellery.html">
				<div class="bb-middle-bottom">
					<h3>SALE</h3>
					<h4>upto<span>65%</span></h4>
				</div>
			</a>
		</div>
		<div class="col-md-3 bb-grids bb-right-agileits-w3layouts">
			<a href="watches.html">
				<div class="bb-right-top">
					<h3>SALE</h3>
					<h4>upto<span>50%</span></h4>
				</div>
			</a>
			<a href="handbags.html">
				<div class="bb-right-bottom">
					<h3>SALE</h3>
					<h4>upto<span>60%</span></h4>
				</div>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php get_template_part('template-parts/product-top'); ?>

<div class="fandt">
	<div class="container">
		<div class="col-md-6 features">
			<h3>Our Services</h3>
			<div class="support">
				<div class="col-md-2 ficon hvr-rectangle-out">
					<i class="fa fa-user " aria-hidden="true"></i>
				</div>
				<div class="col-md-10 ftext">
					<h4>24/7 online free support</h4>
					<p>Praesent rutrum vitae ligula sit amet vehicula. Donec eget libero nec dolor tincidunt vulputate.
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="shipping">
				<div class="col-md-2 ficon hvr-rectangle-out">
					<i class="fa fa-bus" aria-hidden="true"></i>
				</div>
				<div class="col-md-10 ftext">
					<h4>Free shipping</h4>
					<p>Praesent rutrum vitae ligula sit amet vehicula. Donec eget libero nec dolor tincidunt vulputate.
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="money-back">
				<div class="col-md-2 ficon hvr-rectangle-out">
					<i class="fa fa-money" aria-hidden="true"></i>
				</div>
				<div class="col-md-10 ftext">
					<h4>100% money back</h4>
					<p>Praesent rutrum vitae ligula sit amet vehicula. Donec eget libero nec dolor tincidunt vulputate.
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6 testimonials">
			<div class="test-inner">
				<div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;">
							<div class="banner-wrap">
								<img src="<?php echo NM_DIR_URI;?>/assets/images/c1.png" alt=" " class="img-responsive" />
								<p>Nam elementum magna id nibh pretium suscipit varius tortor. Phasellus in lorem sed
									massa consectetur fermentum. Praesent pellentesque sapien euismod.</p>
								<h4># Andrew</h4>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;">
							<div class="banner-wrap">
								<img src="<?php echo NM_DIR_URI;?>/assets/images/c2.png" alt=" " class="img-responsive" />
								<p>Morbi semper, risus dignissim sagittis iaculis, diam est ornare neque, accumsan risus
									tortor at est. Vivamus auctor quis lacus sed interdum celerisque.</p>
								<h4># Lucy</h4>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;">
							<div class="banner-wrap">
								<img src="<?php echo NM_DIR_URI;?>/assets/images/c3.png" alt=" " class="img-responsive" />
								<p>Fusce non cursus quam, in hendrerit sem. Nam nunc dui, venenatis vitae porta sed,
									sagittis id nisl. Pellentesque celerisque eget ullamcorper vehicula. </p>
								<h4># Martina</h4>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

</div>
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
		<h3>Top Brands</h3>
		<div class="sliderfig">
			<ul id="flexiselDemo1">
				<li>
					<img src="<?php echo NM_DIR_URI;?>/assets/images/4.png" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="<?php echo NM_DIR_URI;?>/assets/images/5.png" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="<?php echo NM_DIR_URI;?>/assets/images/6.png" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="<?php echo NM_DIR_URI;?>/assets/images/7.png" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="<?php echo NM_DIR_URI;?>/assets/images/46.jpg" alt=" " class="img-responsive" />
				</li>
			</ul>
		</div>

	</div>
</div>
<!-- //top-brands -->
<!-- newsletter -->
<div class="newsletter">
	<div class="container">
		<div class="col-md-6 w3agile_newsletter_left">
			<h3>Newsletter</h3>
			<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
		</div>
		<div class="col-md-6 w3agile_newsletter_right">
			<form action="#" method="post">
				<input type="email" name="Email" value="Email" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Email';}" required="">
				<input type="submit" value="Subscribe" />
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
