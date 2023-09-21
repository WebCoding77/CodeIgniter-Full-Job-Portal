<?= $this->extend('layouts/admin.php'); ?>
<?= $this->section('content'); ?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
            <?php $validation =  \Config\Services::validation(); ?>
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="<?= url_to('admins.store'); ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control <?php if($validation->getError('email')): ?>is-invalid<?php endif; ?>" placeholder="email" />
                    <?php if ($validation->getError('email')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>                                
                  <?php endif; ?>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form2Example1" class="form-control <?php if($validation->getError('name')): ?>is-invalid<?php endif; ?>" placeholder="name" />
                    <?php if ($validation->getError('name')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name') ?>
                                    </div>                                
                  <?php endif; ?>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control <?php if($validation->getError('password')): ?>is-invalid<?php endif; ?>" placeholder="password" />
                    <?php if ($validation->getError('password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>                                
                  <?php endif; ?>
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      
<?= $this->endsection(); ?>