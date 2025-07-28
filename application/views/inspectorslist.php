<div class="container mt-5">
<div class="row justify-content-center">
  <div class="col-12">
<h1 class="display-4"><?= $this->lang->line('inspectors'); ?></h1>
<p class="lead"></p>
</div>
</div>
    <div class="row justify-content-center">
         <div class="col-12">
            <table id="inspectorslist" class="table table-striped table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center"><?= $this->lang->line('name_inspector'); ?></th>
                        <th scope="col" class="text-center">email</th>
                        <th scope="col" colspan="2" class="text-center"><?= $this->lang->line('inspections'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $cid = 0;
                foreach ($inspectors as $ispr): 
                  
                    ?>
                    <tr>
                    <td class="text-center name_client"><?php echo $ispr->last_name; ?> <?php echo $ispr->first_name; ?></td>
                    <td class="text-center"><?php echo $ispr->email; ?></td>
                    <td class="text-right"><?php echo $ispr->total_inspections; ?></td>
                    <td class="text-left"><?php if ($ispr->total_inspections > 0) { ?><a href="<?=base_url() ?>inspection/inspections_list/inspector_inspection/<?= $ispr->id; ?>"><i class="fa fa-list  text-success" aria-hidden="true"></i></a><?php } ?></td>
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

    $('#inspectorslist).DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/"+ ulang +".json"
            },
            "columnDefs": [
                {"searchable": false, "orderable": false, "targets": 3 }
        ],
        "lengthMenu": [ 25, 50, 100 ]
        });


      
   
});
</script>
