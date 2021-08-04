<?php
$posts = $this->data['User_Posts'];
?>
<div class="AddPost text-center">
    <div class="row justify-content-center">
        <div class="col-lg-4 m-1 p-4 round PostList">
            <div class="Post m-3 d-flex flex-row justify-content-around align-items-center bg-white round" id="AddNew">
                <span class="fa fa-plus m-3"></span>
            </div>
            <?php foreach ($posts as $post) : ?>
                <div id="<?= $post->id ?>" class="Post m-3 d-flex flex-row justify-content-around align-items-center bg-white round" onclick="LoadPost(this)">
                    <h6 class="m-auto"><?= $post->title ?></h6>
                    <span class="fa fa-angle-left m-3"></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-7 m-1 p-3 round">
            <form action="<?= base_url('post/Add_post') ?>" method="post">
                <div class="form-group col-12">
                    <input type="hidden" name="PostId" id="PostId">
                    <input type="hidden" name="Date" id="Date">
                    <label for="PostTitle">عنوان پست</label>
                    <input type="text" class="form-control" name="PostTitle" id="PostTitle">
                </div>
                <div class="form-group col-12">
                    <label for="PostContent">محتوای پست</label>
                    <textarea class="form-control" name="PostContent" id="PostContent" cols="10" rows="4"></textarea>
                </div>
                <button class="save-info">ثبت</button>
            </form>
        </div>
    </div>
</div>
<script !src="">
    var datePickerOptions = {
        gotoToday: true,
        markToday: true,
        twodigit: true
    };
    kamaDatepicker("Date", datePickerOptions);
    $("#Date").val(new Date().toLocaleDateString('fa-IR', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        formatMatcher: 'basic'
    }).replace(/([۰-۹])/g, token => String.fromCharCode(token.charCodeAt(0) - 1728)));

    const LoadPost = (Data) => {
        const Title = $('#PostTitle');
        const Context = $('#PostContent');
        $.ajax({
            type: "GET",
            url: baseUrl + 'Post/Get_Post_User_Login/' + $(Data).attr("id"),
            success: function(data) {
                const returned = data.split('◄►')
                $(Title).val(returned[0]);
                $(Context).val(returned[1]);
                $('#PostId').val($(Data).attr("id"));
            }
        });
    }
    $('#AddNew').click(() => {
        $('#PostId').val('');
        $('#PostTitle').val('');
        $('#PostContent').val('');
    })
</script>