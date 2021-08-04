<?php
$Notifications = ($this->data['Notification']);
?>
<div class="notifInfo">
    <ul class="nav nav-tabs fixed-tab">
        <li class="nav-item">
            <a class="nav-link active" href="#Global" title="All">
                <div class="fa fa-users text-primary"></div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Error" title="Error">
                <div class="fa fa-exclamation-circle text-danger"></div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Security" title="Security">
                <div class="fa fa-shield text-success"></div>
            </a>
        </li>
    </ul>
    <div class="Boxes">
        <div class="NotifBox" id="Global">
			<?php if($Notifications):?>
			<?php foreach ($Notifications as $Notif):?>
            <div class="notif row <?php if($Notif->Seen==0) echo 'unread'; else echo 'read';?>">
                <span class="btn fa fa-envelope-o col-md-1 col-3 text-right"></span>
                <span class="col-md-2 col-9 text-left"><?= $Notif->SendTime ?></span>
                <p class="justify-content-center col-md-9 text-center p-1"><?= $Notif->MessageText ?></p>
            </div>
			<?php endforeach; endif;?>
        </div>
    </div>
</div>
