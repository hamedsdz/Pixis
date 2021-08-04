<?php
$posts = $this->data['posts'];
?>
<div class="PostsList text-center container">
	<?php
	foreach ($posts as $post) {
	?>
		<div class="Post" id="<?= $post->id ?>">
			<div class="row m-3 d-flex flex-row justify-content-around align-items-center shadow bg-white rounded p-2">

				<div class="col">
					<img width="84" class="rounded-circle border-0 p-2" src=<?= base_url($post->profile) ?> alt="<?= $post->name ?>" />
				</div>
				<div class="col">
					<div class="justify-content-center h-100 p-2">
						<h6><?= $post->name ?></h6>
					</div>
				</div>
				<div class="col Like text-center ">
					<a href='#' class="justify-content-center h-100 p-2">
						<span class="fa fa-heart text-danger m-2"></span>
						<h6><?= $post->Likes ?></h6>
					</a>
				</div>
				<div class="clearfix border-top pt-2 w-100">
					<h5><?= $post->title ?></h5>
					<p>
						<?= character_limiter($post->context, 150)  ?>
					</p>
				</div>

			</div>
		</div>
	<?php
	}
	?>
</div>
<script>
	$('.Post').click((e) => {
		e.preventDefault();
		window.location = 'post/' + $(e)[0].currentTarget.id
	})
</script>
