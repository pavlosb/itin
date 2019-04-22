<?php
if (isset($user_lang) && $user_lang == "greek") {
  $langprefix ="";
} else {
  $langprefix ="en_";
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
   <style>
body {font-family:DejaVuSans;font-size:13px; line-height:14px;}
@page {
                margin: 120px 40px 120px 80px;
                margin-header: 60px; /* <any of the usual CSS values for margins> */
	              margin-footer: 60px; /* <any of the usual CSS values for margins> */
                header: html_pgheader;
                footer: html_pgfooter;
       }
            .text-center {text-align:center;}
            .text-right {text-align:right;}
            .small {font-size:11px;line-height:12px;}
            .smalltxt {font-size:8px;line-height:9px;}
            .mainsecthd { color:#fff; font-size:18px; line-height:22px; background:darkgrey;}
            .secthd {line-height:20px; margin: 10px 0;}
            .pgheader {
                position: fixed;
                top: -40px;
                left: 0px;
                right: 0px;
                height: 25px;
                border-top:1px solid #000;
                border-bottom:1px solid #000;
                /** Extra personal styles **/
                }

                .pgfooter {
                position: fixed; 
                bottom: -40px; 
                left: 0px; 
                right: 0px;
                height: 20px; 
                text-align:right;

              
            }
            .certhead {font-size:38px; text-align:center;}
            .dgreen {color:#007c3f;}
            .frcellhdr, .secthd {font-size:14px; font-weight:bold;}
            .frcellfld {color: #606060; font-size:12px;}
            .top-border {border-top:1px solid #000;}
            .bot-border {border-bottom:1px solid #000;}
           .page_break_before { page-break-before: always; }
           .page_break_after { page-break-after: always; }
           .newsect-1, .newsect-2 {page-break-after: always;}
      

</style>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
   <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <title>ITIN</title>
  </head>
  <body>
  <htmlpageheader name="pgheader" style="display:none"></htmlpageheader>
<htmlpagefooter name="pgfooter" style="display:none"></htmlpagefooter>



<table  width="100%" style="border:0px; margin-top:15px;">
<tr>
<td align="center"><img src="<?php echo base_url(); ?>assets/images/dekra-gauge1-<?php echo $sec1score ?>.jpg" width="100" height="102"></td>
<td align="center"><img src="<?php echo base_url(); ?>assets/images/dekra-gauge2-<?php echo $sec2score ?>.jpg" width="100" height="102"></td>
<td align="center"><img src="<?php echo base_url(); ?>assets/images/dekra-gauge3-<?php echo $sec3score ?>.jpg" width="100" height="102"></td>
</tr>
<tr>
<td align="center" class="smalltxt dgreen"><?= $this->lang->line('pdf_technology_check'); ?></td>
<td align="center" class="smalltxt dgreen"><?= $this->lang->line('pdf_bodywork_check'); ?></td>
<td align="center" class="smalltxt dgreen"><?= $this->lang->line('pdf_system_check'); ?></td>
</tr>
<tr><td colspan="3" class="smalltxt">&nbsp;</td></tr>
</table>

        <table width="100%">
 <tr>
 <td valign="top" style="font-size:12px; line-height:12px;">
</td>
<td align="right">
<?php if ($result > 0) { ?>
<img src="<?php echo base_url(); ?>assets/images/<?php echo  $langprefix; ?>dekra-stamp.jpg" width="90" height="120">
<?php } else { ?>
<img src="<?php echo base_url(); ?>assets/images/<?php echo  $langprefix; ?>dekra-stamp-fail.jpg" width="90" height="120">
<?php } ?>
</td>
 </tr>
 </table>
 




 
                
            
  </body>
  </html>