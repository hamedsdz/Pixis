<?php
$User_Data = ($this->data['User_Data']);
$User_Posts = ($this->data['User_Posts']);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 UserInfo shadow">
            <div class="UserProfile">
                <img src="<?= base_url($User_Data->profile_pic) ?>" alt="">
            </div>
            <div class="UserInfo">
                <div class="row w-100">
                    <div class="col-12">
                        <h5>نام و نام خانوادگی</h5>
                        <span><?= $User_Data->name ?></span>
                    </div>
                    <?php if ($User_Data->bio) : ?>
                        <div class="col-12 mt-3">
                            <h5>بیوگرافی</h5>
                            <span><?= $User_Data->bio ?></span>
                        </div>
                    <?php endif; ?>
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
            <button class="Profile w-100" id='Follow'>دنبال کردن</button>
        </div>
        <div class="col-lg-7 PostsInfo shadow row justify-content-center">
            <?php foreach ($User_Posts as $user_post) : ?>
                <div class=" col-sm-5 Post row m-3 shadow bg-white rounded p-2" id="<?= $user_post->id ?>">
                    <div class="PostBody">
                        <h5><?= $user_post->title ?></h5>
                        <p><?= character_limiter($user_post->context, 200) ?></p>
                    </div>
                    <div class="PostFoot">
                        <div class="Likes">
                            <div class="justify-content-center h-100">
                                <span class="fa fa-heart-o text-danger m-2"></span>
                                <h6><?= $user_post->Likes ?></h6>
                            </div>
                        </div>
                        <div class="Comments">
                            <div class="justify-content-center h-100">
                                <span class="fa fa-comment-o text-primary m-2"></span>
                                <h6><?= $user_post->Comments ?></h6>
                            </div>
                        </div>
                        <div class="Criticisms">
                            <div class="justify-content-center h-100">
                                <span class="fa fa-thumbs-o-down text-danger m-2"></span>
                                <h6><?= $user_post->Criticisms ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<script>
    $('.Post').click((e) => {
        e.preventDefault();
        window.location = baseUrl + 'post/' + $(e)[0].currentTarget.id
    })

    $('#Follow').click(() => {
        const Username = '<?= $User_Data->username ?>';
        $.ajax({
            type: 'GET',
            url: `<?= base_url() ?>user/Follow/${Username}`
        })
    })
</script>