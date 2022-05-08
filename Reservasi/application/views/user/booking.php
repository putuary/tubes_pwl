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
                            <h2>Pemesanan <span style="color: #74F08F;">Kamar</span></h2>
                           <!--  <p>Isi data dengan benar agar pemesanan dapat dilakukan</p> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-rooms-tab">
                            <ul class="nav" role="tablist">
                                <li  class="active"><a href="#booking" data-toggle="tab" ><span class="tab-border" style="color: #74F08F;"></span><span>Pesan Kamar</span></a></li>
                                <li><a href="#personal" data-toggle="tab"><span class="tab-border"></span><span>Info Data Pribadi</span></a></li>
                            </ul>
                        </div>
                        <div class="service-tab-desc text-left mt-60">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="booking">
                                    
                                    <div class="booking-info-deatils">
                                        <div class="single-room-details fix">
                                            <div class="room-img">
                                                <img src="<?=base_url()?>/images/kamar/<?=$detail->gambar?>" alt="">
                                            </div>
                                            <div class="single-room-details pl-50">
                                                <h3 class="s_room_title"><?=$detail->jenis?></h3>
                                                <div class="room_price"><br>
                                                    <h4>Harga</h4><br>
                                                    <h5><?=$detail->harga?> <span>/ malam</span></h5>
                                                    <p> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-room-booking-form mt-60">
                                            <div class="booking_form_inner">
                                                    <div class="single-form-part">
                                                        <div class="date-to mb-20">
                                                    <form action="<?=site_url('Auth/do_booking')?>" method="post">
                                                            <input id="txtCheckin" value="Tanggal Check-In" name="tgl_in">
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                        <div class="select-option">
                                                            <select name="jumlah">
                                                                <option selected>Jumlah Kamar</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="single-form-part">
                                                        <div class="date-to mb-20">
                                                            <input id="txtCheckout" value="Tanggal Check-Out" name="tgl_out" >
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                        <div class="select-option">
                                                            <input type="text" readonly name="jenis" name="jenis" value="<?=$detail->jenis?>" >
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="personal">
                                    <div class="personal-info-details">
                                        <div class="booking-info-inner">
                                           
                                                <div class="booking-form-list">
                                                    <div class="single-form-part">
                                                        <div class="name mb-15">
                                                            <input type="text" placeholder="Nama Lengkap" value="<?=$this->session->userdata('nama')?>" readonly="" name="nama">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="single-form-part">
                                                        <div class="mail mb-15">
                                                            <input type="text" placeholder="Email" value="<?=$this->session->userdata('email')?>" readonly="" name="email">
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                    </div>

                                                     <div class="single-form-part">
                                                        <div class="name mb-15">
                                                            <input type="tell" placeholder="No Telp." value="<?=$this->session->userdata('no')?>" readonly="" name="no">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prve-next-box mt-20">
                                                    <div class="back-link">
                                                        <a href="<?= site_url('Welcome')?>">Cancel</a>
                                                    </div>
                                                    <button type="submit">Pesan Sekarang</button>
                                                </div>
                                           </form>
                                        </div>
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