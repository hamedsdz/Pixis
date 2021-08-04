<div class="adminChat row justify-content-center">
    <div class="col-lg-4 m-1 p-4 round h-100 text-center">
        <h6>chats</h6>
        <div class="m-3 d-flex flex-row justify-content-around align-items-center bg-white round">
            <img width="54" height="54" class="rounded-circle border-0 p-2" src=<?= base_url('/assets/images/profiles/rose.jpg') ?> alt="" />
            <h6 class="m-auto">نام کاربر</h6>
            <span class="fa fa-angle-left m-3"></span>
        </div>
    </div>
    <div class="col-lg-7 chatContainer p-0 m-1 round">
        <h6 class="pt-2">Username</h6>
        <div class="chat">
            <div class="bubble clearfix">
                <div class="inside text-right">
                    <p>my message</p>
                    <span>01/01 - 23:30</span>
                </div>
            </div>
            <div class="bubble clearfix">
                <div class="outside text-right">
                    <p>Admin Message</p>
                    <span>01/01 - 23:31</span>
                </div>
            </div>
        </div>
        <div class="foot">
            <button type="submit" class="fa fa-paper-plane"></button>
            <input type="text" class="msg" placeholder="نوشتن ..." />
        </div>
    </div>
</div>