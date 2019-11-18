<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-2">
                <?php
                if (empty($data['url_photo'])) {
                    $url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png';
                } else {
                    $url = base_url('upload/profil/') . $data['url_photo'];
                }
                ?>
                <img src="<?php echo $url ?>" width="100" height="100" class="border border-primary"/>
            </div>
            <div class="col-sm-2">
                <p>Nama</p>
                <p>Email</p>
                <p>Phone</p>
            </div>
            <div class="col-sm-8">
                <p><?php echo $data['name'] ?></p>
                <p><?php echo $data['email'] ?></p>
                <p><?php echo $data['phone_number'] ?></p>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-10">
                <span class="label label-inverse">Postingan : <?php echo $data['postingan']?></span>
                <!--<span class="label label-inverse">Follower : 0</span>-->
                <!--<span class="label label-inverse">Following:  0</span>-->
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary" onclick="window.location.reload()">Kembali</button>
            </div>
        </div>
    </div>

</div>
<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-3">
                <p>Username</p>
                <p>Bio</p>
            </div>
            <div class="col-sm-9">
                <p><?php echo $data['username']; ?></p>
                <p><?php echo $data['bio']; ?></p>
            </div>
        </div>
    </div>
</div>