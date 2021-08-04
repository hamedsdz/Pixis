<?php
$Posts_popular = $this->data['popular_post'];
$users_popular = $this->data['users_popular'];
$Count = $this->data['Count'];
?>
<div class="container">
	<div class="jumbotron">
		<div class="text-center box">
			<h3 class="m-4">با پیکسیس نویسنده شو !</h3>
			<img src=<?= base_url('/assets/images/banner.png') ?> alt="" class="banner img-fluid"/>
		</div>
	</div>

	<div class="text-center mt-5">
		<h3>منتخبین</h3>
		<div class="row mt-5 p-5 rounded Pops">
			<div class="col-lg-4 bg-light mt-2 p-2 rounded PopWriter">
				<h4>نویسندگان محبوب</h4>
				<?php
				foreach ($users_popular as $user):
					?>
					<div class="m-3 d-flex flex-row justify-content-around align-items-center shadow bg-white rounded User" id="<?= $user->username ?>">
						<img width="54" class="rounded-circle border-0 p-2"
							 src=<?= base_url($user->profile_pic) ?> alt=""/>
						<h6 class="m-auto"><?= $user->username ?></h6>
						<span class="fa fa-angle-left m-3"></span>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-7 bg-light mt-2 p-2 rounded PopWriter">
				<h4>پست های محبوب</h4>
				<?php
				foreach ($Posts_popular as $post) {
					if ($post->publish) {
						?>
						<div class="row m-3 d-flex flex-row justify-content-around align-items-center shadow bg-white rounded Post" id="<?= $post->id ?>">
							<div class="col">
								<img width="84" class="rounded-circle border-0 p-2" src="<?= base_url($post->profile) ?>" alt="<?= $post->name ?>"/>
							</div>
							<div class="col">
								<div class="justify-content-center h-100 p-2">
									<h6><?= $post->name ?></h6>
								</div>
							</div>
							<div class="col Like text-center">
								<a href='#' class="justify-content-center h-100 p-2">
									<span class="fa fa-heart text-danger m-2"></span>
									<h6><?= $post->Likes ?></h6>
								</a>
							</div>
							<div class="clearfix border-top pt-2 w-100">
								<h5><?= $post->title ?></h5>
								<p>
									<?= character_limiter($post->context,200) ?>
								</p>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>

<script>
	$('.User').click((e) => {
		e.preventDefault();
		window.location = baseUrl + 'user/view/' + $(e)[0].currentTarget.id;
	})
	$('.Post').click((e) => {
		e.preventDefault();
		window.location = baseUrl + 'post/' + $(e)[0].currentTarget.id;
	})
</script>