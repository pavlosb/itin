<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-lg-8 mt-5">
        <div class="row">
            <div class="col-sm-4 px-1 py-5  text-white text-center"><a href="<?php echo base_url(); ?>inspection/client_add" class="btn btn-success btn-lg btn-block"><i class="fal fa-user-tie fa-5x mb-2"></i><h4 ><?= $this->lang->line('new_client'); ?></h4></a></div>
            <div class="col-sm-4 px-1 py-5  text-white text-center"><a href="<?php echo base_url(); ?>inspection/vehicle_add" class="btn btn-secondary btn-lg btn-block"><i class="fal fa-car fa-5x mb-2"></i><h4><?= $this->lang->line('new_vehicle'); ?></h4></a></div>
            <div class="col-sm-4 px-1 py-5  text-white text-center"><a href="<?php echo base_url(); ?>inspection/inspection_new" class="btn btn-primary btn-lg btn-block"><i class="fal fa-clipboard-check fa-5x mb-2"></i><h4 ><?= $this->lang->line('new_inspection'); ?></h4></a></div>
        </div>
    </div>
    </div>
</div>