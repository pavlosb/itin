<div class="container mt-5">
<div class="row justify-content-center">
  <div class="col-12">
<h1 class="display-4">Πελάτες</h1>
<p class="lead"></p>
</div>
</div>
    <div class="row justify-content-center">
         <div class="col-12">
            <table id="clientslist" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Επωνυμία</th>
                        <th scope="col" class="text-center">ΑΦΜ</th>
                        <th scope="col" class="text-center">Τηλέφωνο</th>
                        <th scope="col" class="text-center">e-mail</th>
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
                    <td class="text-center"><?php echo $cl->name_client; ?></td>
                    <td class="text-center"><?php echo $cl->vatno_client; ?></td>
                    <td class="text-center"><?php echo $cl->tel_client; ?></td>
                    <td class="text-center"><?php echo $cl->email_client; ?></td>
                    <td class="text-center"><a href="<?=base_url() ?>inspection/client_edit/<?= $cl->id_client ?>"><i class="fal fa-edit"></i></a>
                    <?php if (!isset($cl->id_vhcl)) { ?>
                        <a href="<?=base_url() ?>inspection/client_delete/<?= $cl->id_client ?>" class="show-alert"><i class="fal fa-times text-danger"></i></a>                    
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

$(document).on("click", ".show-alert", function(e) {
            bootbox.confirm("Are you sure?", function(result){
    /* your callback code */ 
})
        });

$(document).ready(function() {
    $('#clientslist').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Greek.json"
            }
        });
} );
</script>