
<?php
if (isset($user_lang) && $user_lang == "greek") {
  $langprefix ="";
} else {
  $langprefix ="en_";
  }
?><div class="container mt-5 mb-5">
    <div class="row justify-content-center">
         <div class="col-12">
            <table id="inspectlist" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center"><small><?= $this->lang->line('number_inspection'); ?></small></th>
                        <th scope="col" class="text-center"><small><?= $this->lang->line('date_inspection'); ?></small></th>
						<th scope="col" class="text-center"><small><?= $this->lang->line('make_vhcl'); ?></small></th>
						<th scope="col" class="text-center"><small><?= $this->lang->line('model_vhcl'); ?></small></th>
                        <th scope="col" class="text-center"><small><?= $this->lang->line('reg_vhcl'); ?></small></th>
						<th scope="col" class="text-center"><small><?= $this->lang->line('vin_vhcl'); ?></small></th>
                        <th scope="col" class="text-center"><small><?= $this->lang->line('client_vhcl'); ?></small></th>
						<th scope="col" class="text-center"><small><?= $this->lang->line('inspector'); ?></small></th>
                        <th scope="col" class="text-center"><i class="fal fa-file-alt"></i></th>
                        <th scope="col" class="text-center"><i class="fal fa-tachometer-fast"></i></th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($inspections as $insp): ?>
                    <tr>
                    <td class="text-left"><small><?php echo $insp->number_inspection; ?></small></td>
                    <td class="text-center"><?php echo $insp->date_inspection; ?></td>
					<td class="text-center"><?php echo $insp->make_vhcl; ?></td>
					<td class="text-center"><?php echo $insp->model_vhcl; ?></td>
                    <td class="text-center"><?php echo $insp->reg_vhcl; ?></td>
                    <td class="text-center"><small><?php echo $insp->vin_vhcl; ?></small></td>
                    <td class="text-center"><?php echo $insp->name_client; ?></td>
					<td class="text-center"><?php echo $insp->last_name; ?> <?php echo $insp->first_name; ?></td>
                    <td class="text-center"><?php 
                    if ($insp->filename_inspection != NULL) {?>
                    <a href="<?= base_url()?>assets/pdfs/<?= $insp->filename_inspection ?>" target="_blank"><i class="fal fa-file-pdf fa-lg"></i></a>
                    <a href="<?= base_url()?>assets/pdfs/<?= $insp->en_filename_inspection ?>" target="_blank"><i class="fal fa-file-pdf fa-lg"></i></a>
                    <?php } else { ?>
                        <button type="button" class="createrpt btn btn-outline-success btn-sm" data-inspid="<?= $insp->id_inspection ?>"><i class="fas fa-plus"></i></button>
                        <span class="prep" style="display:none;"><a class="repel" href="" target="_blank"><i class="fal fa-file-pdf fa-lg"></i></a></span>
                        <span class="prep" style="display:none;"><a class="repen" href="" target="_blank"><i class="fal fa-file-pdf fa-lg"></i></a></span>
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
    
</div>
<div id="spinner" class="d-flex justify-content-center" style="position: absolute; width: 100%; height: 100%; top: 0px; left: 0; z-index: 9999; background: rgba(255,255,255,0.7);">
  <div class="spinner-border align-self-center" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<script>
var ulang = '<?= ucfirst($user_lang) ?>';
const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();
let hr = date.getHours();
let mint = date.getMinutes();
let scn =   date.getSeconds();

// This arrangement can be altered based on how we want the date's format to appear.
let currentDate = day + '-' + month + '-' + year+'_'+ hr + mint + scn;
new DataTable('#inspectlist', {
	responsive: true,
	layout: {
        topStart: {
            buttons: [{
                    extend: 'excel',
					className: 'btn btn-success',
					filename: "itin-inspection_list_"+currentDate,
						title: "ITIN - Κατάλογος Επιθεωρήσεων",
                    exportOptions: {
                        modifier: {
                            page: 'current',
							
                        },
						columns: [0,1,2,3,4,5,6,7]
                    }
                }, 'print'],
			
        }, bottomStart: 'pageLength'
    },
    order: [[1, 'desc']],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/"+ ulang +".json"
            },
			stateSave: true,
            columnDefs: [
                {searchable: false, orderable: false, targets: [8,9,10] },
				{targets: 1, render: DataTable.render.date('YYYY-MM-DD', 'DD-MM-YYYY', 'el')},
				{ visible: false, targets: [5,7] }
        ],
        lengthMenu: [ 25, 50, 100 ]
        });

$(document).ready(function() {
    $("#spinner").removeClass("d-flex").hide();
    $('.prep').hide();
    var ulang = '<?= ucfirst($user_lang) ?>';
        $( ".createrpt" ).click(function() {
        var inspid =$(this).data("inspid");
        $('.prep').hide();
        $("#spinner").addClass("d-flex").show();
    $.ajax({
		type: "POST",
		dataType: "JSON",
		data: {id:inspid},
		url: "<?= base_url()?>inspection/inspections_pdf",
		success: function(data){
			//$.each(data, function(i,item){
				if (data.created == 'ok'){
                   // alert(data.created);
                   // alert(data.en_certfile_inspection);
                   // alert(data.certfile_inspection);
                    $( ".createrpt" ).hide();
                    $('.repel').attr('href','<?= base_url()?>assets/pdfs/'+ data.certfile_inspection);
                    $('.repen').attr('href','<?= base_url()?>assets/pdfs/'+ data.en_certfile_inspection);
                    $("#spinner").removeClass("d-flex").hide();
                    $('.prep').show();
                    window.location.reload(true);
		
				} else {
		  
						}
			//});
			}
		
	  
	});

        });
} );
</script>
