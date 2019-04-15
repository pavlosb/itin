<div class="container mt-5">
    <div class="row justify-content-center">
         <div class="col-12">
            <table class="table table-striped table-sm">
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
                    <td class="text-center"><?php echo $cl->tel_client; ?> <?php echo $insp->make_vhcl; ?></td>
                    <td class="text-center"><?php echo $cl->email_client; ?></td>
                    <td class="text-center"><a href="<?=base_url() ?>inspection/client_edit/<?= $cl->name_client ?>"><i class="fal fa-edit"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
