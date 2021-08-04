<?php
$this->data['All_Users'] = $this->User_m->get_all_users();
$this->data['All_Posts'] = $this->Post_m->get_all_posts_Count();
?>
<div class="footer pb-3">
	<img src='<?= base_url('/assets/images/footer.png') ?>' alt="" height="60" class="FootTop" />
	<a href="<?= base_url() ?>">
		<img src="<?= base_url('/assets/images/pixis.svg') ?>" alt="" height="60" class="FootLogo" />
	</a>
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-4">
				<nav class="navbar navbar-expand-sm navStyle">
					<a href="#" class="navbar-brand">دسترسی سریع</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basic-navbar-nav1" aria-controls="basic-navbar-nav1">
						<div class="fa fa-angle-down"></div>
					</button>
					<div class="collapse navbar-collapse" id="basic-navbar-nav1">
						<ul class="navbar-nav mr-auto CollapseStyle">
							<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">خانه</a></li>
							<li class="nav-item"><a class="nav-link" href="#WorkWithUs">همکاری با پیکسیس</a></li>
							<li class="nav-item"><a class="nav-link" href="#Contact"> ارتباط با ما</a></li>
							<li class="nav-item"><a class="nav-link" href="<?= base_url('dashboard') ?>">حساب کاربری</a>
							</li>
							<li class="nav-item"><a class="nav-link" href="#About">درباره ما</a></li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-sm-4">
				<nav class="navbar navbar-expand-sm navStyle">
					<a class='navbar-brand' href="#">هدف ما</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basic-navbar-nav2" aria-controls="basic-navbar-nav2">
						<div class="fa fa-angle-down"></div>
					</button>
					<div class="collapse navbar-collapse" id="basic-navbar-nav2">
						<p class="mr-auto text-justify">
							پیکسیس با طراحی قدرتمند با افتخار برای رقابت با رسانه های
							اینترنتی فارسی زبان به فعالیت پرداخته است برای رسیدن به
							درجات بالا و قرارگیری در میان برترین ها به کمک شما عزیزان
							نیازمند است لطفا با اشترک گذاری پست ها و نظر به آنها ما را
							در این کار همراهی کنید.
						</p>
					</div>
				</nav>
			</div>
			<div class="col-sm-4">
				<nav class="navbar navbar-expand-sm navStyle">
					<a class="navbar-brand" href="#">شبکه های اجتماعی</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basic-navbar-nav3" aria-controls="basic-navbar-nav3">
						<div class="fa fa-angle-down"></div>
					</button>
					<div class="collapse navbar-collapse" id="basic-navbar-nav3">
						<Nav class="mr-auto CollapseStyle">
							<div class="SiteInfo">
								<span>کاربران</span>
								<span><?= $this->data['All_Users'] ?></span>
							</div>
							<div class="SiteInfo">
								<span>پست ها</span>
								<span><?= $this->data['All_Posts'] ?></span>
							</div>
							<div class="SiteInfo">
								<span>تاریخ</span>
								<span class="Today">

								</span>
							</div>
							<div>
								<span>شبکه های اجتماعی</span>
							</div>
							<div class="SocialMedia">
								<img src=<?= base_url('/assets/images/facebook.svg') ?> alt="" />
								<img src=<?= base_url('/assets/images/twitter.svg') ?> alt="" />
								<img src=<?= base_url('/assets/images/instagram.svg') ?> alt="" />
								<img src=<?= base_url('/assets/images/telegram.svg') ?> alt="" />
							</div>
						</Nav>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<script>
	$(".Today").text(new Date().toLocaleDateString('fa-IR', {
		year: 'numeric',
		month: '2-digit',
		day: '2-digit',
		formatMatcher: 'basic'
	}).replace(/([۰-۹])/g, token => String.fromCharCode(token.charCodeAt(0) - 1728)));
</script>