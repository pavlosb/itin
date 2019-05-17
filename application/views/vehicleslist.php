<div class="container mt-5">
<div class="row justify-content-center">
  <div class="col-12">
<h1 class="display-4"><?= $this->lang->line('vehicles'); ?></h1>
<p class="lead"></p>
</div>
</div>
    <div class="row justify-content-center">
         <div class="col-12">
            <table id="vehicleslist" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center"><?= $this->lang->line('reg_vhcl'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('vin_vhcl'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('make_vhcl'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('model_vhcl'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('client_vhcl'); ?></th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                foreach ($vehicles as $vhcl): 
                                      ?>
                    <tr>
                    <td class="text-center name_client"><?php echo $vhcl->reg_vhcl; ?></td>
                    <td class="text-center"><?php echo $vhcl->vin_vhcl; ?></td>
                    <td class="text-center"><?php echo $vhcl->make_vhcl; ?></td>
                    <td class="text-center"><?php echo $vhcl->model_vhcl; ?></td>
                    <td class="text-center"><?php echo $vhcl->name_client; ?></td>
                    <td class="text-left"><a href="<?=base_url() ?>inspection/vehicle_edit/<?= $vhcl->id_vhcl; ?>"><i class="fal fa-edit"></i></a>
                    <?php if (!isset($cl->id_vhcl)) { ?>
                        <a href="<?=base_url() ?>inspection/vehicle_delete/<?= $vhcl->id_vhcl ?>" class="confirm"><i class="fal fa-times text-danger"></i></a>                    
                    <?php } ?>
                    </td>
                    </tr>
       <?php 
                    
            
            endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>



$(document).ready(function() {

var ulang = '<?= ucfirst($user_lang) ?>';

    $('#clientslist').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/"+ ulang +".json"
            },
            "columnDefs": [
                {"searchable": false, "orderable": false, "targets": 5 }
        ],
        "lengthMenu": [ 25, 50, 100 ]
        });


        $('.confirm').on('click', function (e) {
                             	var link = $(this).attr("href"); // "get" the intended link in a var
       e.preventDefault();    
            bootbox.confirm("<?= $this->lang->line('confirm_erase'); ?>", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
    });
    bootbox.setDefaults({
          /**
           * @optional String
           * @default: en
           * which locale settings to use to translate the three
           * standard button labels: OK, CONFIRM, CANCEL
           */
          locale: "<?= $ulcl ?>"
    });
} );
</script>