@extends('layouts.front')
@section('body')
<div class="preloader">
    <div class="top-bg" id="top-bg"></div>
    <div class="loader-middle" id="loader-middle"></div>
    <div class="bottom-bg" id="bottom-bg"></div>
</div>

<header class="site_header main-header">
	<!-- Navigation -->
	<nav>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Logo -->
					<a href="#" class="logotype">
						<img src="{{ asset('assets/images/'.$gs->logo) }}" alt="logotype">
					</a>
					<span class="menu-button">
						<span></span>
						<span></span>
						<span></span>
					</span>
					<a href="{{ route('register') }}" class="btn gradient_button btn_small">Sign Up</a>
					<a href="{{ route('login') }}" class="btn outline_button btn_small mr-3">Login</a>
					<ul>
						<li><a href="#Home-main">Home</a></li>
						<li><a href="#Team">Portfolio</a></li>
						<li><a href="#Roadmap">Roadmap</a></li>
						<li><a href="#Features">Features</a></li>
						<li><a href="#Blog">Blog</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	<!-- Mobile Menu -->
	<div class="mobile-menu">
		<span class="close-menu-button">
			<span></span>
			<span></span>
		</span>
		<!-- Logo Mobile -->
		<a href="#" class="logotype">
			<img src="{{ asset('assets/front/img/logo-white.png') }}" alt="logotype">
		</a>
		<!-- Mobile Nav Links -->
		<ul>
			<li><a href="#Home-main">Home</a></li>
			<li><a href="#Team">Portfolio</a></li>
			<li><a href="#Roadmap">Roadmap</a></li>
			<li><a href="#Features">Features</a></li>
			<li><a href="#Blog">Blog</a></li>
		</ul>
		<a href="{{ route('register') }}" class="btn gradient_button btn_small">Sign Up</a>
		<a href="{{ route('login') }}" class="btn outline_button btn_small mr-3">Login</a>
	</div>
</header>	
<!-- Home Blue Skin -->
<section id="Home-main" class="home_blue valign-center">

	<div class="container pt-header">
		<div class="row">
			<div class="col-xl-6 col-md-6">
				<div class="title title-left">
					<p><span>Smart <br>contracts</span></p>
					<h1>Cryptocurrency</h1>
				</div>
				<h2>Trading Simulator</h2>
				<span class="description-content">Free Trading Simulator for Bitcoin and 76 cryptocurrencies to play your investment strategies live without the need to spend real money. Limit Buy Orders, Stop Loss, Take Profit and more advanced features.</span>
				<!-- Home Buttons -->
				<ul class="header_sources mt-6">
					<li>
						<a href="#" class="mr-sm-4">
							<div class="pulse-btn"></div><span class="circle-icon"><i class="far fa-file-pdf"></i></span>
							<span>White paper 2.3Mb</span> 	
						</a>
					</li>
					<li>
						<a href="http://themevol.com/" class="ActiveVideo-button">
							<div class="pulse-btn"></div><span class="circle-icon"><i class="fas fa-play"></i></span>
							<span>Our Promo Video</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Video Wrap -->
	<div class="video-wrap z-index-500">
		<span class="closeVideo-button">
			<i class="fas fa-times"></i>
		</span>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<iframe src="https://www.youtube.com/embed/g6iDZspbRMg?rel=0&amp;showinfo=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<!-- Banner Cards Images -->
	<div id="banner-cards" data-0="left:40%;top:0%" data-1000="left:40%;top:-80%"></div> 
	<div id="opacity-cards" data-0="background:rgba(0, 40, 98, 0);" data-1000="background:rgba(0,40,98,1)">
</section>
<!-- Section Features -->
<section class="banner blue-banner about">
	<div class="container">
		<div class="row about-features">	
			<div class="row">
				<div class="feature col-md-4 col-sm-12 pt-0 mb-md wow fadeInLeft" data-wow-delay="0.2s">
					<div class="col-sm-12 text-left">
						<div class="image-icon">
							<img src="{{ asset('assets/front/img/features-1.png') }}" alt="">
						</div>	
						<h3>ICO Crowdsale</h3>
						<span>Organic growth minimize backwards overflow quick win come up with something buzzworthy fire up your browser old boys club.</span>
					</div>
				</div>
				<div class="feature col-md-4 col-sm-12 pt-0 mb-md wow fadeInLeft" data-wow-delay="0.4s">
					<div class="col-sm-12 text-left">
						<div class="image-icon">
							<img src="{{ asset('assets/front/img/features-2.png') }}" alt="">
						</div>	
						<h3>Affiliate Commission</h3>
						<span>Deliverables hit the ground running hammer out this is not the hill i want to die on, our social currency.</span>
					</div>
				</div>
				<div class="feature col-md-4 col-sm-12 pt-0 mb-md wow fadeInLeft" data-wow-delay="0.6s">
					<div class="col-sm-12 text-left">
						<div class="image-icon">
							<img src="{{ asset('assets/front/img/features-3.png') }}" alt="">
						</div>	
						<h3>Refer-a-friend bonus</h3>
						<span>Can we take this offline into the weeds execute take five, punch the tree, and come back in here with a clear.</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Offering -->
<!-- <section class="offering">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-md-6">
				<div class="title title-left">
					<span>Offering</span>
					<h2>Launch Our Final Round Offering</h2>
				</div>
				<span class="description-content">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date. Let's not solutionize this right now parking lot it mobile friendly, so on this journey when does this sunset? so hard stop. Turd polishing game plan paddle on both sides. Highlights this vendor is incompetent so on-brand but completeley fresh for t-shaped individual. Driving the initiative forward high touch client productize.</span>
				<a href="#" class="btn light_button">Join Presale</a>
			</div>
			<div class="col-xl-6 col-md-6 valign-center">
				<div class="wow zoomIn" data-wow-delay="0.2s">
					<div class="counter" id="counter">
						<ul>
							<li class="days">
								<p>Days</p>
								<span>00</span>
							</li>
							<li class="hours">
								<p>Hours</p>
								<span>00</span>
							</li>
							<li class="minutes">
								<p>Minutes</p>
								<span>00</span>
							</li>
							<li class="seconds">
								<p>Seconds</p>
								<span>00</span>
							</li>
						</ul>							
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Section Team -->
<section id="Team" class="team">
	<div class="container">
		<div class="row">
			<div class="advisors col-xl-12 col-md-12 pb-sm pb-lg-md">
				<div class="title title-center">
					<span>PORTFOLIOS</span>
					<h2>Top PORTFOLIOS FOR WEEK</h2>
				</div>
			</div>
			<div class="col-xl-12">
				<div class="team-card wow fadeInUp" data-wow-delay="0.2s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-1.png') }}" alt=""/></div>
					<div class="name">Bob Herman</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.4s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-2.png') }}" alt="" /></div>
					<div class="name">Rina Vigo</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.6s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-3.png') }}" alt="" /></div>
					<div class="name">Donovan Lochan</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.8s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-4.png') }}" alt="" /></div>
					<div class="name">Terry Huff</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
			</div>	
			<div class="advisors col-xl-12 col-md-12 pt-sm pb-sm pt-lg-lg pb-lg-md">
				<div class="title title-center">
					<span>PORTFOLIOS</span>
					<h2>Top PORTFOLIOS FOR MONTH</h2>
				</div>
			</div>
			<div class="col-xl-12">
				<div class="team-card wow fadeInUp" data-wow-delay="0.2s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-5.png') }}" alt="" /></div>
					<div class="name">Jinny Broos</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.4s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-6.png') }}" alt="" /></div>
					<div class="name">Dave Bone</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.6s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-7.png') }}" alt="" /></div>
					<div class="name">Shelia Liberty</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.8s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-8.png') }}" alt="" /></div>
					<div class="name">Jamison Lloyd</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="advisors col-xl-12 col-md-12 pt-sm pb-sm pt-lg-lg pb-lg-md">
				<div class="title title-center">
					<span>PORTFOLIOS</span>
					<h2>Top PORTFOLIOS FOR YEAR</h2>
				</div>
			</div>
			<div class="col-xl-12">
				<div class="team-card wow fadeInUp" data-wow-delay="0.2s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-9.png') }}" alt="" /></div>
					<div class="name">Jinny Broos</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.4s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-10.png') }}" alt="" /></div>
					<div class="name">Dave Bone</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.6s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-11.png') }}" alt="" /></div>
					<div class="name">Shelia Liberty</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<div class="team-card wow fadeInUp" data-wow-delay="0.8s">
					<div class="photo"><img src="{{ asset('assets/front/img/team/face-12.png') }}" alt="" /></div>
					<div class="name">Jamison Lloyd</div>
					<div class="post">30 followers</div>
					<ul>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Roadmap -->
<section id="Roadmap" class="roadmap roadmap-dark">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="title title-center">
					<span>Roadmap</span>
					<h2>Our Roadmap</h2>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
				<span class="description-content pb-0">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date.</span>
			</div>
			<div class="col-xl-12 offset-xl-0 col-md-10 offset-xl-0 offset-md-1">
				<ul class="roadmap-items">
					<li>
						<span class="dot"></span>
						<span class="year">2018 2Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2019 1Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2019 22Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2019 4Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2020 1Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2020 2Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2020 4Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2021 1Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2021 2Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2021 3Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
					<li>
						<span class="dot"></span>
						<span class="year">2021 4Q</span>
						<h6>Cryptocurrencies introduced</h6>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- Section Features -->
<section id="Features" class="about about-blue">
	<div class="container">
		<div class="row about-features">
			<div class="col-xl-12">
				<div class="title title-center">
					<span>Features</span>
					<h2>Check Our Features</h2>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
				<span class="description-content">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date.</span>
			</div>
			<div class="col-xl-4 col-md-4 col-sm-6 feature">
				<img src="{{ asset('assets/front/img/features-1.png') }}" alt="">
				<h3>ICO Crowdsale</h3>
				<span>Organic growth minimize backwards overflow quick win come up with something buzzworthy fire up your browser old boys club.</span>
			</div>
			<div class="col-xl-4 col-md-4 col-sm-6 feature">
				<img src="{{ asset('assets/front/img/features-2.png') }}" alt="">
				<h3>Affiliate Commission</h3>
				<span>Deliverables hit the ground running hammer out this is not the hill i want to die on, our social currency.</span>
			</div>
			<div class="col-xl-4 col-md-4 offset-md-0 col-sm-6 offset-sm-3 feature">
				<img src="{{ asset('assets/front/img/features-3.png') }}" alt="">
				<h3>Refer-a-friend bonus</h3>
				<span>Can we take this offline into the weeds execute take five, punch the tree, and come back in here with a clear.</span>
			</div>
		</div>
		<div class="separator-huge"></div>
		<div class="row about-docs pt-sm pt-md-xl">
			<div class="col-xl-6 col-md-6">
				<div class="title title-left">
					<span>Our Docs</span>
					<h2>Read Our Whitepaper</h2>
				</div>
				<span class="description-content">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date. Let's not solutionize this right now parking lot it mobile friendly, so on this journey when does this sunset? so hard stop. Turd polishing game plan paddle on both sides. Highlights this vendor is incompetent so on-brand but completeley fresh for t-shaped individual. Driving the initiative forward high touch client productize.</span>
				<a href="#" class="btn gradient_button">Download</a>
			</div>
			<div class="col-xl-5 col-md-5 d-sm-none d-none d-md-block ml-auto document-wrap">
				<div class="big-image wow zoomIn" data-wow-delay="0.2s">
					<a href="#"><img src="{{ asset('assets/front/img/pdf-doc.png') }}" alt=""></a>
				</div>
			</div>
		</div>
	</div>	
</section>	
<!-- Section Info -->
<section class="info">
	<div class="container">
		<div class="row solution">
			<div class="col-xl-5 col-md-5 mr-auto d-md-block">
				<div class="big-image image-left wow zoomIn" data-wow-delay="0.4s">
					<!--<img src="img/solution-image.png" alt="">-->
					<img src="{{ asset('assets/front/img/banner-image.png') }}" alt="solution image">
				</div>
			</div>
			<div class="col-xl-6 col-md-6 valign-center ">
				<div class="title title-right">
					<span>Solution</span>
					<h2>The Best Solution for ICO and Token Sale</h2>
				</div>
				<span class="description-content pb-0">Open door policy work high performance keywords. Prethink Bob called an all-hands this afternoon, yet granularity, but mobile friendly. Level the playing field. Touch base after I ran into Helen at a restaurant, I realized she was just office pretty, yet into the weeds touch base three-martini lunch. Idea shower touch base. Imagineer screw the pooch, nor killing it pro-sumer software. Get all your ducks in a row quarterly sales are at an all-time low. Going forward we need to dialog around your choice of work attire please use "solutionise" instead of solution ideas! :) on your plate, so bench mark, for synergestic actionables move the needle. Customer centric close the loop strategic fit, nor bench mark.</span>
			</div>
		</div>
		<div class="row comission p-huge">
			<div class="col-xl-6 col-md-6">
				<div class="title title-left">
					<span>Comission</span>
					<h2>Affiliate Comission</h2>
				</div>
				<span class="description-content">Open door policy work high performance keywords. Prethink Bob called an all-hands this afternoon, yet granularity, but mobile friendly. Level the playing field. Touch base after I ran into Helen at a restaurant, I realized she was just office pretty, yet into the weeds touch base three-martini lunch. Idea shower touch base. Imagineer screw the pooch, nor killing it pro-sumer software. Get all your ducks in a row quarterly sales are at an all-time low. Going forward we need to dialog around your choice of work attire please use "solutionise" instead of solution ideas! :) on your plate, so bench mark, for synergestic actionables move the needle. Customer centric close the loop strategic fit, nor bench mark.</span>
				<a href="#" class="btn light_button">Join Presale</a>
			</div>
			<div class="col-xl-5 col-md-5 ml-auto d-md-block">
				<div class="big-image image-left wow zoomIn" data-wow-delay="0.4s">
					<img src="{{ asset('assets/front/img/commission-image.png') }}" alt="">
				</div>
			</div>
		</div>
		<!-- Stats Table -->
		<div class="row crowdsale">
			<div class="col-xl-12">
				<div class="title title-center">
					<span>Crowd Sale</span>
					<h2>Remuneration of Participants</h2>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
				<span class="description-content">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date.</span>
			</div>
		</div>
	</div>
</section>
<!-- Section Blog -->
<section id="Blog" class="news">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="title title-center">
					<span>News</span>
					<h2>Latest News About Us</h2>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
				<span class="description-content">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date.</span>
			</div>
			<div class="col-xl-12 col-md-12">
				<article class="blog-card wow fadeInUp" data-wow-delay="0.2s">
					<a href="single-post.html" class="image"><img src="{{ asset('assets/front/img/blog/article-1.jpg') }}" alt="" /></a>
					<div class="article-content">
						<a href="#" class="category"><i class="far fa-folder"></i> Finance</a>
						<a href="#" class="date"><i class="far fa-clock"></i> 25.09.2018</a>
						<a href="#" class="title"><h3>Lower supply is generating high price growth</h3></a>
					</div>
				</article>
				<article class="blog-card wow fadeInUp" data-wow-delay="0.4s">
					<a href="single-post.html" class="image"><img src="{{ asset('assets/front/img/blog/article-2.jpg') }}" alt="" /></a>
					<div class="article-content">
						<a href="#" class="category"><i class="far fa-folder"></i> Events</a>
						<a href="#" class="date"><i class="far fa-clock"></i> 22.09.2018</a>
						<a href="#" class="title"><h3>Introduction cryptocurrency bills to Congress</h3></a>
					</div>
				</article>
				<article class="blog-card wow fadeInUp" data-wow-delay="0.6s">
					<a href="single-post.html" class="image"><img src="{{ asset('assets/front/img/blog/article-3.jpg') }}" alt="" /></a>
					<div class="article-content">
						<a href="#" class="category"><i class="far fa-folder"></i> Markets</a>
						<a href="#" class="date"><i class="far fa-clock"></i> 28.08.2018</a>
						<a href="#" class="title"><h3>Is relative value investing time finally here?</h3></a>
					</div>
				</article>
			</div>
			<div class="col-xl-12">
				<a href="blog.html" class="btn mt-3 mt-md-4 light_button">More News</a>
			</div>
		</div>
	</div>
</section>
<!-- Section FAQ -->
<section class="faq">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="title title-center">
					<span>FAQ</span>
					<h2>Frequently Asked Quesions</h2>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
				<span class="description-content">Onward and upward, productize the deliverables and focus on the bottom line drop-dead date translating our vision of having a market leading platfrom drop-dead date.</span>
			</div>
			<div class="col-xl-6 col-md-6">
				<div class="dropdown-list">
					<div class="drop-title">Why deliverables this vendor is incompetent?</div>
					<div class="drop-content">Praesent vitae tellus nibh. Suspendisse potenti. Suspendisse condimentum, lorem in hendrerit faucibus, neque diam blandit nisl, nec bibendum enim tortor sit amet mi. Quisque nunc sapien, vehicula non dictum eget, mattis sit amet enim. Donec sit amet volutpat odio. Sed massa est, pulvinar et venenatis commodo.</div>
				</div>
				<div class="dropdown-list">
					<div class="drop-title">Get all your ducks in a row proceduralize?</div>
					<div class="drop-content">Praesent vitae tellus nibh. Suspendisse potenti. Suspendisse condimentum, lorem in hendrerit faucibus, neque diam blandit nisl, nec bibendum enim tortor sit amet mi. Quisque nunc sapien, vehicula non dictum eget, mattis sit amet enim. Donec sit amet volutpat odio. Sed massa est, pulvinar et venenatis commodo.</div>
				</div>
				<div class="dropdown-list">
					<div class="drop-title">We need to dialog around your choice of work attire?</div>
					<div class="drop-content">Praesent vitae tellus nibh. Suspendisse potenti. Suspendisse condimentum, lorem in hendrerit faucibus, neque diam blandit nisl, nec bibendum enim tortor sit amet mi. Quisque nunc sapien, vehicula non dictum eget, mattis sit amet enim. Donec sit amet volutpat odio. Sed massa est, pulvinar et venenatis commodo.</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6">
				<div class="dropdown-list">
					<div class="drop-title">How much profit will I get?</div>
					<div class="drop-content">Praesent vitae tellus nibh. Suspendisse potenti. Suspendisse condimentum, lorem in hendrerit faucibus, neque diam blandit nisl, nec bibendum enim tortor sit amet mi. Quisque nunc sapien, vehicula non dictum eget, mattis sit amet enim. Donec sit amet volutpat odio. Sed massa est, pulvinar et venenatis commodo.</div>
				</div>
				<div class="dropdown-list">
					<div class="drop-title">Get all your ducks in a row proceduralize?</div>
					<div class="drop-content">Praesent vitae tellus nibh. Suspendisse potenti. Suspendisse condimentum, lorem in hendrerit faucibus, neque diam blandit nisl, nec bibendum enim tortor sit amet mi. Quisque nunc sapien, vehicula non dictum eget, mattis sit amet enim. Donec sit amet volutpat odio. Sed massa est, pulvinar et venenatis commodo.</div>
				</div>
				<div class="dropdown-list">
					<div class="drop-title">We need to dialog around your choice of work attire?</div>
					<div class="drop-content">Praesent vitae tellus nibh. Suspendisse potenti. Suspendisse condimentum, lorem in hendrerit faucibus, neque diam blandit nisl, nec bibendum enim tortor sit amet mi. Quisque nunc sapien, vehicula non dictum eget, mattis sit amet enim. Donec sit amet volutpat odio. Sed massa est, pulvinar et venenatis commodo.</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Partners -->
<section class="partners">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-md-6">
				<div class="title title-left">
					<span>Partners</span>
					<h2>Our Partners</h2>
				</div>
			</div>
			<div class="col-xl-12 mt-3 wow fadeInUp" data-wow-delay="0.2s">
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-1.png') }}" alt=""></span>
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-2.png') }}" alt=""></span>
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-3.png') }}" alt=""></span>
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-4.png') }}" alt=""></span>
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-5.png') }}" alt=""></span>
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-6.png') }}" alt=""></span>
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-7.png') }}" alt=""></span>
				<span class="partner-logo"><img src="{{ asset('assets/front/img/bg-main/logo-partners/logo-8.png') }}" alt=""></span>
			</div>
		</div>
	</div>
</section>
<!-- Section Subscribe -->
<section class="subscribe">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="title title-center">
					<span>Subscribe</span>
					<h2>Join Our Mailing List</h2>
				</div>
			</div>
			<div class="col-xl-12 mt-4">
				<form class="wow fadeInUp" data-wow-delay="0.2s">
					<input type="text" placeholder="Enter your email">
					<input type="submit" value="Subscribe" class="btn gradient_button">
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
<footer class="small-footer">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-3 col-sm-6">
				<!-- Footer Logo -->
				<a href="#" class="logotype">
					<img src="{{ asset('assets/front/img/logo-white.png') }}" alt="logotype">
				</a>
				<p>Ellada is the premium HTML template for ICO, crypto, trading, exchange currencies websites. 100% Responsive design and easy to customize.</p>
				
			</div>
			<div class="col-xl-3 col-md-3 col-sm-6">
				<h6 class="footer-title">Navigation</h6>
				<ul>
					<li><a href="#">Main Demo</a></li>
					<li><a href="dark.html">Dark Skin</a></li>
					<li><a href="light.html">Light Skin</a></li>
					<li><a href="exchange.html">Exchange</a></li>
				</ul>
			</div>
			<div class="col-xl-3 col-md-3 col-sm-6">
				<h6 class="footer-title">Account</h6>
				<ul>
					<li><a href="login.html">Login</a></li>
					<li><a href="signup.html">Registration</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="single-post.html">Single Post</a></li>
				</ul>
			</div>
			<div class="col-xl-3 col-md-3 col-sm-6">
				<h6 class="footer-title">Contacts</h6>
				<ul>
					<li>
						<span>25 W 27rd St. New York, NY 10015</span>
					</li>
					<li>
						<span>+1 (222) 555 47 100</span>
					</li>
					<li>
						<a href="#" class="social-button"><i class="fab fa-facebook-f"></i></a>
						<a href="#" class="social-button"><i class="fas fa-paper-plane"></i></a>
						<a href="#" class="social-button"><i class="fab fa-twitter"></i></a>
					</li>
				</ul>
			</div>
			<!-- Copyright -->
			<div class="col-12 copyright">
				<span>&#169; 2020</span>
				<span>Ellada</span>
			</div>
			<!-- Back To Top button -->
			<a href="#Home-main" id="back-to-top" title="Back to top"><i class="fas fa-angle-up"></i></a>
		</div>
	</div>
</footer>
@endsection