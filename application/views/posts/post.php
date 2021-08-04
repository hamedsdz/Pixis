<?php
$Post_Data = $this->data['Post_Data'];
$User_Data = $this->data['User_Data'];
$Check_Like = $this->data['Check_Like'];
$Comments = $this->data['Comments'];
?>

<div class="container">
	<div class="row">
		<div class="col-lg-7 PostInfo p-4">
			<!-- <div class="PostTop">
                <div class="row">
                    <div class="col">
                        <h5>تاریخ</h5>
                        <span><?= $Post_Data->date ?></span>
                    </div>
                    <div class="col">
                        <h5>نویسنده</h5>
                        <span><?= $User_Data->name ?></span>
                    </div>
                </div>
            </div> -->
			<div class="PostBody">
				<h3><?= $Post_Data->title ?></h3>
				<p><?= $Post_Data->context ?></p>
			</div>
			<div class="PostFoot">
				<div class="row">
					<div class="col Like text-center">
						<div class="justify-content-center h-100 p-2">
							<?php
							if (!$Check_Like) {
								?>
								<span class="fa fa-heart-o text-danger m-2" id="Like_icon"></span>
								<?php
							} else {
								?>
								<span class="fa fa-heart text-danger m-2" id="Like_icon"></span>
								<?php
							}
							?>
							<h6 id="Like"><?= $Post_Data->Likes ?></h6>
						</div>
					</div>
					<div class="col Comment text-center">
						<a href="#Comment_Box">
							<div class="justify-content-center h-100 p-2">
								<span class="fa fa-comment-o text-primary m-2"></span>
								<!-- <span class="fa fa-comment text-primary m-2"></span> Commented-->
								<h6 id="Comment"><?= $Post_Data->Comments ?></h6>
							</div>
						</a>
					</div>
					<div class="col Criticisms text-center">
						<div class="justify-content-center h-100 p-2">
							<span class="fa fa-thumbs-o-down text-danger m-2"></span>
							<!-- <span class="fa fa-thumbs-down text-danger m-2"></span> criticized-->
							<h6 id="Criticism"><?= $Post_Data->Criticisms ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 UserInfo" id="<?= $User_Data->username ?>">
			<div class="UserProfile">
				<img src="<?= base_url($User_Data->profile_pic) ?>" alt="">
			</div>
			<div class="UserInfo">
				<div class="row w-100">
					<div class="col-12">
						<h5>نام و نام خانوادگی</h5>
						<span><?= $User_Data->name ?></span>
					</div>
					<div class="col-12 mt-3">
						<h5>نام کاربری</h5>
						<span><?= $User_Data->username ?></span>
					</div>
				</div>
				<div class="row mt-3 w-100">
					<div class="col-6">
						<h5>دنبال کنندگان</h5>
						<span><?= $User_Data->followers ?></span>
					</div>
					<div class="col-6">
						<h5>دنبال شوندگان</h5>
						<span><?= $User_Data->following ?></span>
					</div>
				</div>
			</div>
			<button class="Profile w-100">نمایش کاربر</button>
		</div>
	</div>
	<div class="row" id='Comment_Box'>
		<div class="col-lg-7 PostInfo">
			<div class="comments-list">
				<h4>نظرات کاربران</h4>
				<ul>
					<?php foreach ($Comments as $Comment): ?>
						<li>
							<h5></h5>
							<p><?= $Comment->context ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="col-lg-4 AddComment ml-1">
			<form action="<?= base_url('post/Send_Comment') ?>" method="post">
				<div class="form-group col-12">
					<input type="hidden" name="PostId" id="PostId" value="<?= $Post_Data->id ?>">
					<label for="PostTitle">نام کاربر</label>
					<input type="text" class="form-control" name="PostTitle" id="PostTitle">
				</div>
				<div class="form-group col-12">
					<label for="PostContent">محتوای کامنت</label>
					<textarea class="form-control" name="PostContent" id="PostContent" cols="10" rows="10"></textarea>
				</div>
				<button class="save-info">ثبت</button>
			</form>
		</div>
	</div>
</div>

<script>
	$('.Profile').click(() => {
		window.location = baseUrl + 'user/view/' + $('.UserInfo').attr('id');
	})
	const post_id = <?= $Post_Data->id  ?>;
	const user_id = <?= $User_Data->id  ?>;
	$('.Like').click(() => {
		$.ajax({
			type: 'Get',
			url: `<?= base_url() ?>post/Check_Like/${user_id}/${post_id}`,
			success: (data) => {
				let Like_Count = parseInt($('#Like').text());
				if ($('#Like_icon').hasClass('fa-heart-o')) {
					$('#Like_icon').removeClass('fa-heart-o');
					$('#Like_icon').addClass('fa-heart');
					$('#Like').text(Like_Count += 1)
				} else {
					$('#Like_icon').addClass('fa-heart-o');
					$('#Like_icon').removeClass('fa-heart');
					$('#Like').text(Like_Count -= 1)
				}
			}
		})
	})
	// $('.Criticisms').click(() => {
	//     $.ajax({
	//         type: 'Get',
	//         url: `<?= base_url() ?>post/Check_Like/${user_id}/${post_id}`,
	//         success: (data) => {

	//         }
	//     })
	// })
</script>
