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
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
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
  <htmlpageheader name="pgheader" style="display:none">
  <table width="100%" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
  <tr><td width="70%"><?= $this->lang->line('pdf_report_num'); ?> <?php echo $inspection->number_inspection; ?></td><td width="30%" align="right"><?= $this->lang->line('pdf_date'); ?> <?php echo date("d-m-Y", strtotime($inspection->date_inspection)); ?></td></tr>
  </table>
        </htmlpageheader>

        <htmlpagefooter name="pgfooter" style="display:none">
        <div style="width:100%; text-align:right;"><?= $this->lang->line('pdf_page'); ?> {PAGENO}</div>
        </htmlpagefooter>
       
        <table width="100%">
 <tr>
 <td valign="top" style="font-size:12px; line-height:12px;">IMPERIAL AUTOMOTIVE<br />
DEKRA PARTNER<br />
ΛΕΩΦΟΡΟΣ ΣΥΓΓΡΟΥ 253 ΝΕΑ ΣΜΥΡΝΗ<br />
Τ.Κ. 17122<br />
Τηλέφωνο: 2109426352<br />
E-Mail: savvas.tzanis@dekra.com<br />
</td>
<td align="right">
<?php if ($result > 0) { ?>
<img src="<?php echo base_url(); ?>assets/images/<?php echo  $langprefix; ?>dekra-stamp.jpg" width="90" height="120">
<?php } else { ?>
&nbsp;
<?php } ?>
</td>
 </tr>
 </table>
 <table width="100%" style="padding: 5px 0 3px 0; margin-top:50px; background-color:#007c3f">
<tr><td style="font-size:20px; line-height:21px; color:#fff;"><?= $this->lang->line('pdf_dekra_report'); ?></td></tr>
</table>

<table  width="100%" style="border:0px;">
<tr>
<td width="60%" colspan="2" class="frcellhdr dgreen bot-border"><?= $this->lang->line('pdf_procedure'); ?></td>
<td width="40%"  colspan="2" class="frcellhdr dgreen bot-border"><?= $this->lang->line('pdf_inspection'); ?></td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_inspection'); ?></td><td colspan="3"><?php echo $inspection->name_client; ?></td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_po'); ?></td><td colspan="3"><?php echo date("d-m-Y", strtotime($inspection->orderdate_inspection)); ?>, <?php echo $inspection->ordermethod_inspection; ?></td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_check_type'); ?></td><td colspan="3"><?= $this->lang->line('technology_check'); ?>, <?= $this->lang->line('bodywork_check'); ?>, <?= $this->lang->line('system_check'); ?></td>
</tr>
<tr><td colspan="4" class="bot-border smalltxt">&nbsp;</td></tr>
<tr>
<td width="60%" colspan="2" class="frcellhdr dgreen bot-border"><?= $this->lang->line('pdf_vehicle_description'); ?></td>
<td width="40%"  colspan="2" class="frcellhdr dgreen bot-border"><?= $this->lang->line('pdf_reg_vhcl'); ?> <span style = "font-weight:normal; color: #000;"><?php echo $inspection->reg_vhcl; ?></span> </td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_type_vhcl'); ?></td><td><?php echo $inspection->type_vhcl; ?></td><td class="frcellfld"><?= $this->lang->line('pdf_doors_vhcl'); ?></td><td><?php echo $inspection->doors_vhcl; ?></td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_make_vhcl'); ?></td><td><?php echo $inspection->make_vhcl; ?></td><td class="frcellfld"><?= $this->lang->line('pdf_colour_vhcl'); ?></td><td><?php echo $inspection->colour_vhcl; ?></td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_model_vhcl'); ?></td><td><?php echo $inspection->model_vhcl; ?></td><td class="frcellfld" nowrap><?= $this->lang->line('pdf_nxtdate_vhcl'); ?></td><td><?php echo date("m/Y", strtotime($inspection->nxtdate_vhcl)); ?></td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_vin_vhcl'); ?></td><td class="small"><?php echo $inspection->vin_vhcl; ?></td><td class="frcellfld"><?= $this->lang->line('pdf_mlg_vhcl'); ?></td><td><?php echo $inspection->mlg_vhcl; ?></td>
</tr>
<tr>
<td class="frcellfld"><?= $this->lang->line('pdf_displpow_vhcl'); ?></td><td><?php echo $inspection->pow_vhcl; ?>kW / <?php echo $inspection->displ_vhcl; ?>ccm</td><td class="frcellfld" nowrap><?= $this->lang->line('pdf_firstreg_vhcl'); ?></td><td><?php echo date("m/Y", strtotime($inspection->firstreg_vhcl)); ?></td>
</tr>
<tr><td colspan="4" class="bot-border smalltxt">&nbsp;</td></tr>
<tr><td colspan="4" class="smalltxt"><?= $this->lang->line('pdf_mlg_notice'); ?></td></tr>
</table>
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
<tr><td class="top-border smalltxt">&nbsp;</td></tr>
<tr><td><?= $this->lang->line('pdf_inspector'); ?> <?php echo $inspection->last_name; ?> <?php echo $inspection->first_name; ?><br/><br/><span class="smalltxt"><?= $this->lang->line('pdf_sign_notice'); ?></span></td></tr>
<tr><td class="bot-border smalltxt">&nbsp;</td></tr>
</table>
<table width="100%" style="margin-top:160px" class="page_break_after">
  <tr><td width="18%" valign="top" class="smalltxt">IMPERIAL AUTOMOTIVE<br/>
DEKRA PARTNER 
</td>
<td width="52%" valign="top" class="smalltxt">ΛΕΩΦΟΡΟΣ ΣΥΓΓΡΟΥ 253<br/>
ΝΕΑ ΣΜΥΡΝΗ TΚ 17122<br/>
ΤΗΛ. 2109426352<br/>
E-Mail : savvas.tzanis@dekra.com</td>
<td width="30%" valign="top" class="smalltxt">Έδρα ΑΘΗΝΑ<br/>
ΑΦΜ.998469321 ΔOY ΝΕΑΣ ΣΜΥΡΝΗΣ<br/>
Αρ. μητρώου:8524901000<br/>
ALPHA BANK SWIFT CRBAGRAA<br/>
IBAN:GR8701401200120002320007025</td>
  </table>

 <table width="100%" border="0">
  <?php 
  $mainsectprint = $langprefix."mainsectprint";
  $printtext_section = $langprefix."printtext_section";
  $printtext_cp = $langprefix."printtext_cp";


  $x = 0;
  $mcp = 99999;
  $scp = 99999;
          foreach ($checkpoints as $cp): 
            if ($cp['mainsectid'] != $mcp) 
            
            {
                $x = $x+1; 

if ($x==3) {?>
<tr><td colspan="3">
									<table width="100%" style="margin-bottom:15px"><tr>
								<td><?php echo '<img src="data:image/svg+xml;base64,'.base64_encode($dynimg).'" />';?></td></tr>
								</table></td></tr>

		
							
							
							
							
						<?php	}

								
                ?>
                </table>
								
               
            <table border="0" padding="0" width="100%" class="newsect-<?= $x ?>">
            <tr><td colspan="3">
            <table width="100%" style="margin-bottom:15px"><tr>
            <td width="22%"><img src="<?php echo base_url(); ?>assets/images/sect-<?= $x ?>.jpg" width="100" height="98"></td>
            <td width="30%" valign="top" style="padding-right:1%; font-size:16px;" class="text-right dgreen"><?= $this->lang->line('pdf_vehicle_description'); ?>:</td>
            <td width="20%" valign="top" style="margin-left:1%" class="small"><?= $this->lang->line('pdf_type_vhcl'); ?><br /><?= $this->lang->line('pdf_make_vhcl'); ?><br /><?= $this->lang->line('pdf_model_vhcl'); ?>:<br /><?= $this->lang->line('pdf_vin_vhcl'); ?><br /><?= $this->lang->line('pdf_displpow_vhcl'); ?></td>
            <td class="small" valign="top"><?php echo $inspection->type_vhcl; ?><br /><?php echo $inspection->make_vhcl; ?><br /><?php echo $inspection->model_vhcl; ?><br /><?php echo $inspection->vin_vhcl; ?><br /><?php echo $inspection->pow_vhcl; ?>kW / <?php echo $inspection->displ_vhcl; ?>ccm</td></tr>
            </table>
            
            </td></tr>
              <tr><td class="mainsecthd" colspan="3"><?= $cp[$mainsectprint]; ?></td></tr>
      <?php 
      
      $y= 1;
    } 
if ($cp['id_section'] != $scp) { 
    
    $z=1; ?>
<tr><td class="secthd dgreen" colspan="3" style="padding:5px 0; page-break-after:avoid;"><?= $x ?>.<?= $y ?> <?= $cp[$printtext_section]; ?></td></tr>
<?php 
$y = $y+1;
} ?>
<tr style="padding:3px 0; page-break-inside:avoid;<?php if($z % 2 != 0){ echo "; background: #ccc;"; } ?>" class="pointrow">
    <td style="width:60%; min-height:20px;"><?= sprintf("%02d",$z) ?> <?= $cp[$printtext_cp]; ?></td>
<td class="text-center" style="width:5%; padding:2px 0 0 0"><?php 
$pointscore = $inspscore[$cp['id_cp']];
 if ($pointscore > 0) { ?>
<img src="<?php echo base_url(); ?>assets/images/check.png" width="18" height="18">
 <?php } else if ($pointscore == 0) { ?>
    <img src="<?php echo base_url(); ?>assets/images/minus.png" width="18" height="18">
 <?php } else { ?>
    <img src="<?php echo base_url(); ?>assets/images/times.png" width="18" height="18">
		 <?php } ?>
</td>
<td class="text-center">&nbsp;</td>
</tr>
<?php if (isset($inspremark[$cp['id_cp']])){ ?>
	<tr style="padding:3px 0; page-break-inside:avoid;<?php if($z % 2 != 0){ echo "; background: #ccc;"; } ?>" class="pointrow">
	<td colspan="3">
	<u><?= $this->lang->line('comment'); ?></u><br/>
<?php		echo $inspremark[$cp['id_cp']]; ?>
</td></tr>
	<?php } 
$mcp = $cp['mainsectid'];
$scp = $cp['id_section'];
$z = $z + 1;
 endforeach ?> 
   </table>
	 <?php if (isset($inspimg)) {  ?>
									
<?php
									$im = 1;
									

									?>
									<table width="100%" style="margin-top:50px; margin-bottom:15px">
									<?php foreach ($inspimg as $key=>$value): 
										
								?>
										
<tr><td width="100%" align="center"><img src="<?= base_url() ?>upload/<?= $value ?>" style="width: 100mm; height: auto;"/></td></tr>

							<?php		
						$im = $im + 1;
						endforeach; ?>

					</table>
					
							<?php	} ?>
  </body>
  </html>
