<?php $active = 0; ?>
<?php if ($active == 1) { ?>
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
                    <span class="label label-inverse">Postingan : <?php echo $data['postingan'] ?></span>
                    <!--<span class="label label-inverse">Follower : 0</span>-->
                    <!--<span class="label label-inverse">Following:  0</span>-->
                </div>
                <div class="col-sm-2">
                    <a class="btn btn-primary" href="<?php echo site_url($module) ?>">Kembali</button>
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
<?php } ?>


<div class="section-container section-with-top-border">
    <!-- begin timeline -->
    <ul class="timeline">
        <li>
            <!-- begin timeline-title -->
            <!-- <div class="timeline-title">Detail Nelayan</div> -->
            <!-- end timeline-title -->
        </li>
        <li>
            <!-- begin timeline-time -->
            <div class="timeline-time">
                <!-- <span class="date">Biodata Nelayan</span> -->
                <h4>Biodata</h4>
            </div>
            <!-- end timeline-time -->
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;"><i class="fa fa-user accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#biodata" aria-expanded="true"></i></a>
            </div>
            <!-- end timeline-icon -->
            <!-- begin timeline-body -->
            <div class="timeline-body">
                <!-- begin timeline-header -->
                <div class="timeline-header panel-heading">

                </div>
                <!-- end timeline-header -->
                <!-- begin timeline-content -->
                <div id="biodata" class="timeline-content panel-collapse in collapse show"> <!--panel-collapse in collapse-->
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td rowspan="5" width="120">
                                <?php
                                if (empty($data['url_photo'])) {
                                    $url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png';
                                } else {
                                    $url = base_url('upload/profil/') . $data['url_photo'];
                                }
                                ?>
                                <img src="<?php echo $url ?>" width="100" height="100" class="border border-primary"/>
                            </td>
                            <td width="120px">Nama Nelayan</td>
                            <td width="10px">:</td>
                            <td><?php echo $data['name'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $data['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><?php echo $data['phone_number'] ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td><?php echo $data['bio'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- end timeline-body -->
        </li>
        <li>
            <!-- begin timeline-time -->
            <div class="timeline-time">
                <h4>Pengaduan</h4>
            </div>
            <!-- end timeline-time -->
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;"><i class="fa fa-frown accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#pengaduan" aria-expanded="false"></i></a></i></a>
            </div>
            <!-- end timeline-icon -->
            <!-- begin timeline-body -->
            <div class="timeline-body">
                <!-- begin timeline-header -->
                <div class="timeline-header panel-heading">

                </div>
                <!-- end timeline-header -->
                <!-- begin timeline-content -->
                <div id="pengaduan" class="timeline-content panel-collapse in collapse">
                    <table class="table">
                        <tr>
                            <td>Total Pengaduan: <?php echo count($pengaduan); ?></td>
                        </tr>
                    </table>
                    <?php
                    $x = 0;
                    foreach ($pengaduan as $r) {
                        $x++
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center" width="5%" rowspan="6"><?php echo $x; ?></td>
                            </tr>
                            <tr>
                                <td width="15%">Judul</td>
                                <td width="2%">:</td>
                                <td width="30%"><?php echo $r['title']; ?></td>

                                <td width="15%">Detail Lokasi</td>
                                <td width="2%">:</td>
                                <td width="30%"><?php echo $r['full_location_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?php echo $r['status']; ?></td>

                                <td>Koordinat</td>
                                <td>:</td>
                                <td><?php echo $r['latitude'] . ', ' . $r['longitude']; ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td colspan="4"><?php echo $r['description']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class='text-center'>Gambar</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <?php foreach ($this->model->get_pic($r['id'], 'complaint') as $r) { ?>

                                        <?php if ($r['file_type'] == 'image') { ?>
                                            <img src="<?php echo base_url('upload/pengaduan/') . $r['url_file'] ?>" width="100" height="100" class="border border-primary"/>
                                        <?php } else { ?>
                                            <img src="https://cdn6.aptoide.com/imgs/d/f/1/df18c4e0557eed472f3abd502b2dde11_icon.png?w=240" data="<?php echo base_url('upload/pengaduan/') . $r['url_file'] ?>" width="100" height="100" class="border border-primary" onclick="play(this)"/>  
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    <?php } ?>

                </div>
                <!-- end timeline-content -->
            </div>
            <!-- end timeline-body -->
        </li>
        <li>
            <!-- begin timeline-time -->
            <div class="timeline-time">
                <!-- <span class="date">24 February 2014</span> -->
                <h4>Tangkapan Ikan</h4>
            </div>
            <!-- end timeline-time -->
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;"><i class="fa fa-fish accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#tangkapan_ikan" aria-expanded="false"></i></a>
            </div>
            <!-- end timeline-icon -->
            <!-- begin timeline-body -->
            <div class="timeline-body">
                <!-- begin timeline-header -->
                <div class="timeline-header">

                </div>
                <!-- end timeline-header -->
                <!-- begin timeline-content -->
                <div id="tangkapan_ikan" class="timeline-content panel-collapse in collapse">
                    <table class="table">
                        <tr>
                            <td>Total List Tangkapan: <?php echo count($tangkapan_ikan); ?></td>
                        </tr>
                    </table>
                    <?php
                    $x = 0;
                    foreach ($tangkapan_ikan as $r) {
                        $x++
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center" width="5%" rowspan="5"><?php echo $x; ?></td>
                            </tr>
                            <tr>
                                <td width="15%">Jenis Ikan</td>
                                <td width="2%">:</td>
                                <td width="30%"><?php echo $r['fish_name']; ?></td>

                                <td width="15%">Koordinat</td>
                                <td width="2%">:</td>
                                <td width="30%"><?php echo $r['latitude'] . ', ' . $r['longitude']; ?></td>
                            </tr>
                            <tr>
                                <td>Berat&nbsp;Tangkapan</td>
                                <td>:</td>
                                <td colspan="4"><?php echo $r['total_weight']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class='text-center'>Gambar</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <?php foreach ($this->model->get_pic($r['id'], 'catch') as $r) { ?>
                                        <?php if ($r['file_type'] == 'image') { ?>
                                            <img src="<?php echo base_url('upload/tangkapan/') . $r['url_file'] ?>" width="100" height="100" class="border border-primary"/>
                                        <?php } else { ?>
                                            <img src="https://cdn6.aptoide.com/imgs/d/f/1/df18c4e0557eed472f3abd502b2dde11_icon.png?w=240" data="<?php echo base_url('upload/tangkapan/') . $r['url_file'] ?>" width="100" height="100" class="border border-primary" onclick="play(this)"/>  
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table> 
                    <?php } ?>
                </div>
                <!-- end timeline-content -->

            </div>
            <!-- end timeline-body -->
        </li>
        <li>
            <!-- begin timeline-time -->
            <div class="timeline-time">
                <!-- <span class="date">10 January 2014</span> -->
                <h4>Postingan</h4>
            </div>
            <!-- end timeline-time -->
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;"><i class="fa fa-clipboard accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#postingan" aria-expanded="false"></i></a>
            </div>
            <!-- end timeline-icon -->
            <!-- begin timeline-body -->
            <div class="timeline-body">
                <!-- begin timeline-header -->
                <div class="timeline-header">

                </div>
                <!-- end timeline-header -->
                <!-- begin timeline-content -->
                <div id="postingan" class="timeline-content panel-collapse in collapse">
                    <table class="table">
                        <tr>
                            <td>Total Postingan: <?php echo count($postingan); ?></td>
                        </tr>
                    </table>
                    <?php
                    $x = 0;
                    foreach ($postingan as $r) {
                        $x++
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center" width="30" rowspan="5"><?php echo $x; ?></td>
                            </tr>
                            <tr>
                                <td>Post</td>
                                <td>:</td>
                                <td colspan="4"><?php echo $r['caption']; ?></td>
                            </tr>
                            <tr>
                                <td width="15%">Total Like</td>
                                <td width="2%">:</td>
                                <td width="30%"><?php echo count($this->model->get_cl_post($r['id'], 'like')); ?></td>

                                <td width="15%">total&nbsp;Comment</td>
                                <td width="2%">:</td>
                                <td width="30%"><?php echo count($this->model->get_cl_post($r['id'], 'comment')); ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class='text-center'>Gambar</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <?php foreach ($this->model->get_pic($r['id'], 'post') as $r) { ?>
                                        <?php if ($r['file_type'] == 'image') { ?>
                                            <img src="<?php echo base_url('upload/post/') . $r['url_file'] ?>" width="100" height="100" class="border border-primary"/>
                                        <?php } else { ?>
                                            <img src="https://cdn6.aptoide.com/imgs/d/f/1/df18c4e0557eed472f3abd502b2dde11_icon.png?w=240" data="<?php echo base_url('upload/post/') . $r['url_file'] ?>" width="100" height="100" class="border border-primary" onclick="play(this)"/>  
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    <?php } ?>
                </div>
                <!-- end timeline-content -->
            </div>
            <!-- end timeline-body -->
        </li>
    </ul>
    <!-- end timeline -->
    <div class="modal fade" id="modal-video">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Play Video</h4>
                </div>
                <div class="modal-body">
                    <video id="vid" width="320" height="240" controls>
                        <source class="vid" src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> 
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn width-100 btn-default" data-dismiss="modal">Close</a>
                    <a href="javascript:;" class="btn width-100 btn-primary">Action</a>
                </div>
            </div> 
        </div>
    </div>
</div>
<script>
    function play(obj) {
        $("#modal-video").modal('show');
        $(".vid").attr('src',$(obj).attr('data'));
        $("#vid")[0].load();
    }
</script>