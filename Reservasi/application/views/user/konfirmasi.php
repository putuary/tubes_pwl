<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/core.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/shortcode/shortcodes.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/index.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css');?>">
    <link rel="icon" href="<?=base_url()?>/images/logo-hotel.png">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script language="javascript">
         $(document).ready(function () {
            $("#txtCheckin").datepicker({
                minDate:0,
                dateFormat: "dd-M-yy",
                onSelect: function (date) {
                    var date2 = $('#txtCheckin').datepicker('getDate');
                    date2.setDate(date2.getDate());
                    $('#txtCheckout').datepicker('setDate', date2);
                    //sets minDate to dateofbirth date + 1
                    $('#txtCheckout').datepicker('option', 'minDate', date2);
                }
            });
            $('#txtCheckout').datepicker({
                minDate:0,
                dateFormat: "dd-M-yy",
                onClose: function () {
                    var dt1 = $('#txtCheckin').datepicker('getDate');
                    console.log(dt1);
                    var dt2 = $('#txtCheckout').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#txtCheckout').datepicker('option', 'minDate');
                        $('#txtCheckout').datepicker('setDate', minDate);
                    }
                }
            });
        });

    </script>
</head>  
<body>
    <div class="wrapper">

          <div class="room-booking ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="section-title mb-80 text-center">
                            <h2>Konfirmasi <span style="color: #74F08F;">Pemesanan</span></h2>
                            
                            <div class="toast">
                                <div class="toast-body">
                                   <p><?=$this->session->flashdata('msg');?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-rooms-tab">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#done" data-toggle="tab"><span class="tab-border">1</span><span>Konfirmasi</span></a></li>
                                <li><a href="#payment" data-toggle="tab"><span class="tab-border">2</span><span>Status Pemesanan</span></a></li>
                            </ul>
                        </div>
                        <div class="service-tab-desc text-left mt-60">
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="done">
                                    <div class="booking-done">
                                        <div class="booking-done-table table-responsive text-center" style="width: 100%;">
                                            <div class="text-right"><a href="<?= site_url('Welcome/index')?>" class="btn btn-primary">Kembali ke Beranda</a></div><br><br>
                                            <table class="table">
                                                <tr>
                                                    <td><p>Jumlah Kamar </p></td>
                                                    <td><p> Tanggal Check in <span></span></p></td>
                                                    <td><p> Tanggal Check Out <span></span></p></td>
                                                    <td><p> Nama <span></span></p></td>
                                                    <td><p> Email <span></span></p></td>
                                                    <td><p> no telepon</p></td>
                                                </tr>
                                                <tr>
                                                    <td><p><?=$trans->jumlah?> Kamar </p></td>
                                                    <td><p><?=$trans->tgl_in?> <span></span></p></td>
                                                    <td><p><?=$trans->tgl_out?> <span></span></p></td>
                                                    <td><p><?=$trans->nama?> <span></span></p></td>
                                                    <td><p><?=$trans->email?> <span></span></p></td>
                                                    <td><p><?=$trans->no?></p></td>
                                                </tr>
                                            </table>
                                            <table class="table">
                                                <tr>
                                                    <td><p>Jenis Kamar</p></td>
                                                    <td><p> Harga <span></span></p></td>
                                                </tr>
                                                <tr class="row2">
                                                    <td><p><?=$trans->jenis?></p></td>
                                                    <?php 
                                                        $tampil = $this->db->get_where('kamar',array('jenis' => $trans->jenis))->row(); 
                                                    ?>
                                                    <td><p><?=$tampil->harga?></p></td>
                                                    
                                                </tr>
                                                <tr class="row3">
                                                    <td><p>Total Yang harus dibayar</p></td>
                                                    <td><p><?=$trans->jumlah * $tampil->harga?></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="payment">
                                    <div class="payment-info">
                                        <h1>Status Pemesanan Kamar Anda</h1>
                                        <h3>"<?=$trans->status?>"</h3>
                                        <h3></h3>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
</div>
    
</body>
</html>
<!-- <script src="<?= base_url('assets/js/vendor/jquery-1.12.0.min.js');?>"></script> -->
    
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
   
   <!--  <script src="<?= base_url('assets/js/waypoints.min.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.counterup.min.js');?>"></script>
    <script src="<?= base_url('assets/js/video-player.js');?>"></script>
    <script src="<?= base_url('assets/js/animated-headlines.js');?>"></script>
    <script src="<?= base_url('assets/js/mailchimp.js');?>"></script>
    <script src="<?= base_url('assets/js/ajax-mail.js');?>"></script>
    <script src="<?= base_url('assets/js/parallax.js');?>"></script>
    <script src="<?= base_url('assets/js/textilate.js');?>"></script>
    <script src="<?= base_url('assets/js/lettering.js');?>"></script>
    <script src="<?= base_url('assets/js/isotope.pkgd.min.js');?>"></script>
    <script src="<?= base_url('assets/js/packery-mode.pkgd.min.js');?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.magnific-popup.js');?>"></script>
    <script src="<?= base_url('assets/js/plugins.js');?>"></script>
    <script src="<?= base_url('assets/js/main.js');?>"></script> -->