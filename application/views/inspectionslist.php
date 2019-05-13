
<?php
if (isset($user_lang) && $user_lang == "greek") {
  $langprefix ="";
} else {
  $langprefix ="en_";
  }
?><div class="container mt-5">
    <div class="row justify-content-center">
         <div class="col-12">
            <table id="inspectlist" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center"><?= $this->lang->line('number_inspection'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('date_inspection'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('vehicle_inspection'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('client_vhcl'); ?></th>
                        <th scope="col" class="text-center"><i class="fal fa-file-alt"></i></th>
                        <th scope="col" class="text-center"><i class="fal fa-tachometer-fast"></i></th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($inspections as $insp): ?>
                    <tr>
                    <td class="text-left"><?php echo $insp->number_inspection; ?></td>
                    <td class="text-center"><?php echo date("d-m-Y", strtotime($insp->date_inspection)); ?></td>
                    <td class="text-center"><?php echo $insp->reg_vhcl; ?> <?php echo $insp->make_vhcl; ?></td>
                    <td class="text-center"><?php echo $insp->name_client; ?></td>
                    <td class="text-center"><?php 
                    if ($insp->filename_inspection != NULL) {?>
                    <a href="<?= base_url()?>assets/pdfs/<?= $insp->filename_inspection ?>" target="_blank"><i class="fal fa-file-pdf fa-lg"></i></a>
                    <a href="<?= base_url()?>assets/pdfs/<?= $insp->en_filename_inspection ?>" target="_blank"><i class="fal fa-file-pdf fa-lg"></i></a>
                    <?php } else { ?>
                        <button type="button" id="createrpt" class="btn btn-outline-success btn-sm" data-inspid="<?= $insp->id_inspection ?>"><i class="fas fa-plus"></i></button>

                    <?php } ?></td>
                    <td class="text-center"><?php 
                    if ( ($insp->s1score_inspection >= 92) && ($insp->s2score_inspection >= 53) && ($insp->s1score_inspection >= 12))
                    {
                        echo '<i class="fas fa-thumbs-up text-success"></i>';

                    } else {
                        echo '<i class="fal fa-thumbs-down text-danger"></i>';

                    } ?>
        
                    
                    
                   </td>
                    <td class="text-center"><?php echo ($insp->status_inspection > 0 ? '<a href="'.base_url().'inspection/inspection_view/'.$insp->id_inspection.'"><i class="fal fa-eye fa-lg text-secondary"></i></a>' : '<a href="'.base_url().'inspection/inspection_edit/'.$insp->id_inspection.'"><i class="fal fa-edit fa-lg text-secondary"></i></a>') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="spinner-border align-self-center" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<script>
$(document).ready(function() {
    $("#spinner").removeClass("d-flex").hide();

    var ulang = '<?= ucfirst($user_lang) ?>';

    $('#inspectlist').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/"+ ulang +".json"
            },
            "columnDefs": [
                {"searchable": false, "orderable": false, "targets": 6 }
        ],
        "lengthMenu": [ 25, 50, 100 ]
        });


        $( "#createrpt" ).click(function() {
        var inspid =$(this).data("inspid");
        alert(inspid);

        });
} );
</script>