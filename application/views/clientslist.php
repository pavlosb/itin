<div class="container mt-5">
<div class="row justify-content-center">
  <div class="col-12">
<h1 class="display-4">Πελάτες</h1>
<p class="lead"></p>
</div>
</div>
    <div class="row justify-content-center">
         <div class="col-12">
            <table id="clentslist" class="table table-striped table-sm">
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
                <?php foreach ($clients as $cl): ?>
                    <tr>
                    <td class="text-center"><?php echo $cl->name_client; ?></td>
                    <td class="text-center"><?php echo $cl->vatno_client; ?></td>
                    <td class="text-center"><?php echo $cl->tel_client; ?></td>
                    <td class="text-center"><?php echo $cl->email_client; ?></td>
                    <td class="text-center"><a href="<?=base_url() ?>inspection/client_edit/<?= $cl->id_client ?>"><i class="fal fa-edit"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#inspectlist').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Greek.json"
            }
        });
} );
</script>