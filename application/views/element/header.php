<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Penentuan Penerima Kredit">
    <meta name="author" content="Anwar">
    
	<!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css')?>"/>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-responsive.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/datepicker.css')?>"/>
    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.js');?>"></script>
    <script src="<?= base_url('asset/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap-datepicker.js');?>"></script>
    <script type="text/javascript">
    var active_page = "histo";
    var active_foto = "asset/img/b.jpg"; 
    $(document).ready(function(){
        $('.foto_histo').click(function(){
            $(".foto_histo").addClass("fade_out");
            $(this).removeClass("fade_out");
            active_foto = $(this).attr("src");
        });
        
        $(".btn").click(function(){
            $(".btn").removeClass("selected");
            $(this).addClass("selected");
            active_page = $(this).attr("rel");
            if(active_foto!=""){
                $.ajax({
                    type    : "POST",
                    url     : active_page+".php",
                    data    : "gambar="+active_foto,
                    cache   : false,
                    success : function(r){
                        $("#status_histo").html(r);
                    }
                });
            }else{
                $.ajax({
                    type    : "POST",
                    url     : active_page+".php",
                    cache   : false,
                    success : function(r){
                        $("#status_histo").html(r);
                    }
                });
            }
        });
    });
    </script>
</head>
<body>
<div class="container">