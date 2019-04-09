<div class="container mt-5">
    <div class="row justify-content-center">
 <?php print_r($inspections); ?>
        <div class="col-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Αριθμός</th>
                        <th scope="col" class="text-center">Ημερομηνία</th>
                        <th scope="col" class="text-center">Όχημα</th>
                        <th scope="col" class="text-center">Πελάτης</th>
                        <th scope="col" class="text-center"></th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($inspections as $insp): ?>
                    <tr>
                    <td class="text-center"><?php echo $insp->number_inspection; ?></td>
                    <td class="text-center"><?php echo $insp->date_inspection; ?></td>
                    <td class="text-center"><?php echo $insp->reg_vhcl; ?> <?php echo $insp->make_vhcl; ?></td>
                    <td class="text-center"><?php echo $insp->name_client; ?></td>
                    <td class="text-center"><?php echo ($insp->status_inspection > 0 ? '<i class="fal fa-check text-success"></i>' : '<i class="fal fa-hourglass-half text-secondary"></i>') ?></td>
                    <td class="text-center"><?php echo ($insp->status_inspection > 0 ? '<i class="fal fa-eye text-secondary"></i>' : '<a herf="'.base_url().'inspection/inspection_edit?id='.$insp->id_inspection.'"><i class="fal fa-edit text-secondary"></i></a>') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
