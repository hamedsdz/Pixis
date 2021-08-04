<?php
$User_Info = $this->data['User_Profile'];
?>

<div class="userInfo text-center">
    <div class="row justify-content-center">
        <div class="col-lg-4 m-1 p-4 round h-100">
            <form class="border-bottom" action="<?= base_url('dashboard/SaveProfile') ?>" method="POST" enctype="multipart/form-data" id="ProfileForm">
                <img src="<?= base_url($User_Info->profile_pic) ?>" alt="">
                <input type="file" name="ProfileImage" id="ProfileImage" class='ProfileImage shadow' accept=".jpg, .jpeg, .png">
                <label for="ProfileImage" class="ProfileImageLabel has-tooltip" data-toggle="tooltip" data-placement="bottom" title='حجم عکس باید کمتر از 5 مگابایت باشد'><span>
                        <div class="fa fa-pencil"></div>
                    </span></label>
            </form>
            <div class="row ">
                <div class="Username mt-3 col-12">
                    <h5>Username</h5>
                    <span><?= $User_Info->username ?></span>
                </div>
            </div>
            <div class="row">
                <div class="Followers mt-3 col-md-6">
                    <h5>Followers</h5>
                    <span><?= $User_Info->followers ?></span>
                </div>
                <div class="Following mt-3 col-md-6">
                    <h5>Following</h5>
                    <span><?= $User_Info->following ?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-7 m-1 p-3 round">
            <form action="<?= base_url('dashboard/Update_Profile') ?>" method="POST">
                <div class="form-group col-12 row">
                    <div class="col-md-6">
                        <label for="Name">نام و نام خانوادگی</label>
                        <input type="text" class="form-control" name="Name" id="Name" value="<?= $User_Info->name ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="Birthdate">تاریخ تولد</label>
                        <input type="text" class="form-control" name="Birthdate" id="Birthdate" value="<?= $User_Info->birthdate ?>">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="Bio">بیوگرافی</label>
                    <textarea class="form-control" name="Bio" id="Bio" cols="10" rows="4"><?= $User_Info->bio ?></textarea>
                </div>
                <button class="save-info">ثبت اطلاعات</button>
            </form>
        </div>
    </div>
</div>

<script>
    var datePickerOptions = {
        placeholder: "روز / ماه / سال",
        twodigit: true,
        closeAfterSelect: true,
        nextButtonIcon: "fa fa-arrow-right",
        previousButtonIcon: "fa fa-arrow-left",
        buttonsColor: "gray",
        markToday: true,
        markHolidays: true,
        highlightSelectedDay: true,
        sync: false,
        gotoToday: true,
    };
    kamaDatepicker("Birthdate", datePickerOptions);

    $('#ProfileImage').change(() => {
        $('#ProfileForm').submit();
    })
</script>