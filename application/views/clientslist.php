<div class="container mt-5">
<div class="row justify-content-center">
  <div class="col-12">
<h1 class="display-4"><?= $this->lang->line('clients'); ?></h1>
<p class="lead"></p>
</div>
</div>
    <div class="row justify-content-center">
         <div class="col-12">
            <table id="clientslist" class="table table-striped table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center"><?= $this->lang->line('name_client'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('vatno_client'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('tel_client'); ?></th>
                        <th scope="col" class="text-center"><?= $this->lang->line('email_client'); ?></th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $cid = 0;
                foreach ($clients as $cl): 
                    if ($cl->id_client <> $cid ) {
                    $cid = $cl->id_client;
                    ?>
                    <tr>
                    <td class="text-center name_client"><?php echo $cl->name_client; ?></td>
                    <td class="text-center"><?php echo $cl->vatno_client; ?></td>
                    <td class="text-center"><?php echo $cl->tel_client; ?></td>
                    <td class="text-center"><?php echo $cl->email_client; ?></td>
                    <td class="text-left"><a class="button btn btn-outline-primary btn-sm" href="<?=base_url() ?>inspection/client_edit/<?= $cl->id_client ?>"><i class="fal fa-edit fa-lg"></i></a>
                    <?php if (!isset($cl->id_vhcl)) { ?>
                        <a href="<?=base_url() ?>inspection/client_delete/<?= $cl->id_client ?>" class="button btn btn-outline-danger btn-sm confirm"><i class="fal fa-trash-alt fa-lg"></i></a>                    
                    <?php } ?>
                    </td>
                    </tr>
       <?php 
                    }
            
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
                {"searchable": false, "orderable": false, "targets": 4 }
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