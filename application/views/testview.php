<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
   <style>
body {font-family:DejaVuSans; font-size:13px; line-height:14px;}
@page {
                margin: 100px 40px 100px 80px;
            }
            .small {font-size:11px;line-height:12px;}
            .smalltxt {font-size:8px;line-height:9px;}
            .mainsecthd { color:#fff; font-size:18px; line-height:22px; background:darkgrey;}
            .secthd {line-height:20px; margin: 10px 0;}
            header {
                position: fixed;
                top: -40px;
                left: 0px;
                right: 0px;
                height: 25px;
                border-top:1px solid #000;
                border-bottom:1px solid #000;
                /** Extra personal styles **/
                }

            footer {
                position: fixed; 
                bottom: -40px; 
                left: 0px; 
                right: 0px;
                height: 20px; 
                text-align:right;

              
            }
           footer .page-number:after { content: counter(page); }
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
  <header>
  <table width="100%">
  <tr><td width="70%">ΑΡΙΘΜΟΣ ΕΚΘΕΣΗΣ: <?php echo $inspection->number_inspection; ?></td><td width="30%" align="right">Ημ/νια: <?php echo date("d-m-Y", strtotime($inspection->date_inspection)); ?></td>
  </table>
        </header>

        <footer>
        <span class="page-number">Σελ. </span>
        </footer>
        <main>
 <table width="100%">
 <tr>
 <td valign="top" style="font-size:12px; line-height:12px;">IMPERIAL AUTOMOTIVE<br />
DEKRA PARTNER<br />
ΛΕΩΦΟΡΟΣ ΣΥΓΓΡΟΥ 253 ΝΕΑ ΣΜΥΡΝΗ<br />
Τ.Κ. 17122<br />
Τηλέφωνο: 2109426352<br />
E-Mail: savvas.tzanis@dekra.com<br />
</td>
<td align="right"><img src="<?php echo base_url(); ?>assets/images/dekra-stamp.jpg" width="90" height="120"></td>
 </tr>
 </table>
<table width="100%" style="padding: 5px 0 3px 0; margin-top:50px; background-color:#007c3f">
<tr><td style="font-size:20px; line-height:21px; color:#fff;">DEKRA Έκθεση Σφραγίδας</td></tr>
</table>

<table  width="100%" style="border:0px;">
<tr>
<td width="60%" colspan="2" class="frcellhdr dgreen bot-border">Διαδικασία</td>
<td width="40%"  colspan="2" class="frcellhdr dgreen bot-border">Επιθεώρηση</td>
</tr>
<tr>
<td class="frcellfld">Αρ.Πελάτη:</td><td colspan="3"><?php echo $inspection->name_client; ?></td>
</tr>
<tr>
<td class="frcellfld">Κατ' εντολή σας από:</td><td colspan="3"><?php echo date("d-m-Y", strtotime($inspection->orderdate_inspection)); ?>, <?php echo date("d-m-Y", strtotime($inspection->ordermethod_inspection)); ?></td>
</tr>
<tr>
<td class="frcellfld">Είδος ελέγχου:</td><td colspan="3">Τεχνικός Έλεγχος, Έλεγχος Αμαξώματος, Έλεγχος Συστήματος</td>
</tr>
<tr><td colspan="4" class="bot-border smalltxt">&nbsp;</td></tr>
<tr>
<td width="60%" colspan="2" class="frcellhdr dgreen bot-border">Περιγραφή οχήματος</td>
<td width="40%"  colspan="2" class="frcellhdr dgreen bot-border">Πινακίδα <span style = "font-weight:normal; color: #000;"><?php echo $inspection->reg_vhcl; ?></span> </td>
</tr>
<tr>
<td class="frcellfld">Τύπος οχήματος:</td><td><?php echo $inspection->type_vhcl; ?></td><td class="frcellfld">Θύρες:</td><td><?php echo $inspection->doors_vhcl; ?></td>
</tr>
<tr>
<td class="frcellfld">Κατασκευαστής:</td><td><?php echo $inspection->make_vhcl; ?></td><td class="frcellfld">Χρώμα:</td><td><?php echo $inspection->colour_vhcl; ?></td>
</tr>
<tr>
<td class="frcellfld">Εμπορική ονομασία:</td><td><?php echo $inspection->model_vhcl; ?></td><td class="frcellfld" nowrap>Επόμενος Τεχ.ελεγχ.:</td><td><?php echo $inspection->nxtdate_vhcl; ?></td>
</tr>
<tr>
<td class="frcellfld">Αρ Πλαισίου:</td><td class="small"><?php echo $inspection->vin_vhcl; ?></td><td class="frcellfld">Ένδειξη χλμ*<br />(καταγεγραμμένη):</td><td><?php echo $inspection->mlg_vhcl; ?></td>
</tr>
<tr>
<td class="frcellfld">Ισχύς/Κυβισμός:</td><td><?php echo $inspection->pow_vhcl; ?>kW / <?php echo $inspection->displ_vhcl; ?>ccm</td><td class="frcellfld" nowrap>Ημ.1ης ταξινόμησης:</td><td><?php echo $inspection->firstreg_vhcl; ?></td>
</tr>
<tr><td colspan="4" class="bot-border smalltxt">&nbsp;</td></tr>
<tr><td colspan="4" class="smalltxt">*Θεωρείται δεδομένο, ότι η συνολική απόσταση που διανύθηκε, αντιστοιχεί στην καταγεγραμμένη χιλιομετρική ένδειξη</td></tr>
</table>
<table  width="100%" style="border:0px; margin-top:15px;">
<tr>
<td align="center"><img src="<?php echo base_url(); ?>assets/images/dekra-gauge1.jpg" width="100" height="102"></td>
<td align="center"><img src="<?php echo base_url(); ?>assets/images/dekra-gauge1.jpg" width="100" height="102"></td>
<td align="center"><img src="<?php echo base_url(); ?>assets/images/dekra-gauge1.jpg" width="100" height="102"></td>
</tr>
<tr>
<td align="center" class="smalltxt dgreen">DEKRA Τεχνικός Έλεγχος</td>
<td align="center" class="smalltxt dgreen">DEKRA Έλεγχος Αμαξώματος</td>
<td align="center" class="smalltxt dgreen">DEKRA Έλεγχος Συστήματος</td>
</tr>
<tr><td colspan="3" class="bot-border smalltxt">&nbsp;</td></tr>
</table>
<table width="100%">
<tr><td class="top-border smalltxt">&nbsp;</td></tr>
<tr><td>Ο εμπειρογνώμονας <?php echo $inspection->last_name; ?> <?php echo $inspection->first_name; ?><br/><br/><span class="smalltxt">Αυτό το έγγραφο συντάχθηκε ηλεκτρονικά και είναι έγκυρο και δίχως υπογραφή</span></td></tr>
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

<div style="width:100%">
  <?php 
  $x = 0;
  $mcp = 99999;
  $scp = 99999;
          foreach ($checkpoints as $cp): 
            if ($cp['mainsectid'] != $mcp) 
            
            {
                $x = $x+1; 
                ?>
                </div>
                
            <div class="newsect-<?= $x ?>" style="width:100%">
            <table width="100%" style="margin-bottom:15px">
            <td width="22%" ><img src="<?php echo base_url(); ?>assets/images/sect-<?= $x ?>.jpg" width="100" height="98"></td>
            <td width="30%" valign="top" style="padding-right:1%; font-size:16px;" class="text-right dgreen">Περιγραφή οχήματος:</td>
            <td width="20%" valign="top" style="margin-left:1%" class="small">Τύπος οχήματος:<br />Κατασκευαστής:<br />Μοντέλο:<br />Αρ. πλαισίου:<br />Ισχύς/Κυβισμός</td>
            <td class="small"><?php echo $inspection->type_vhcl; ?><br /><?php echo $inspection->make_vhcl; ?><br /><?php echo $inspection->model_vhcl; ?><br /><?php echo $inspection->vin_vhcl; ?><br /><?php echo $inspection->pow_vhcl; ?>kW / <?php echo $inspection->displ_vhcl; ?>ccm</td></table>
              <div class="mainsecthd" style="width:100%; display:block"><?= $cp['mainsectprint']; ?></div>
      <?php 
      
      $y= 1;
    } 
if ($cp['id_section'] != $scp) { 
    
    $z=1; ?>
<div class="secthd dgreen" style="page-break-after:avoid;"><?= $x ?>.<?= $y ?> <?= $cp['printtext_section']; ?></div>
<?php 
$y = $y+1;
} ?>


<div style="page-break-inside:avoid; width:100%<?php if($z % 2 != 0){ echo "; background: #ccc;"; } ?>" class="pointrow">
    <div style="width:50%; display:inline-block; min-height:20px; padding:4px 0 0 0"><?= sprintf("%02d",$z) ?> <?= $cp['printtext_cp']; ?></div>
<div class="text-center" style="width:15%; display:inline-block; min-height:20px; padding:2px 0 0 0"><?php 
$pointscore = $inspscore[$cp['id_cp']];
 if ($pointscore > 0) { ?>
<img src="<?php echo base_url(); ?>assets/images/check.png" width="18" height="18">
 <?php } else if ($pointscore == 0) { ?>
    <img src="<?php echo base_url(); ?>assets/images/minus.png" width="18" height="18">
 <?php } else { ?>
    <img src="<?php echo base_url(); ?>assets/images/times.png" width="18" height="18">
 <?php } ?>
</div>
<div class="text-center" style="width:30%; display:inline-block; min-heigh:20px">&nbsp;</div>
</div>

    







<?php
$mcp = $cp['mainsectid'];
$scp = $cp['id_section'];
$z = $z + 1;
 endforeach ?> 
</div>
</main>
  </body>
  </html>