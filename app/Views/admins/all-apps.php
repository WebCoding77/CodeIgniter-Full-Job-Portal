
<?= $this->extend('layouts/admin.php'); ?>
<?= $this->section('content'); ?>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">

                <?php if(session()->getFlashdata('delete')) : ?>
                 <div class="alert alert-success"><?= session()->getFlashdata('delete'); ?></div>
                <?php endif; ?>
              <h5 class="card-title mb-4 d-inline">Job Applications</h5>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">cv</th>
                    <th scope="col">job_id</th>
                    <th scope="col">job_title</th>
                    <th scope="col">company</th>
                    <th scope="col">email</th>
                    <th scope="col">location</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($allApps as $app) : ?>
                        <tr>
                            <th scope="row"><?= $app['id']; ?></th>
                            <td><a class="btn btn-success" href="<?= base_url('public/assets/cvs/'.$app['cv'].''); ?>">CV</a></td>
                            <td><?= $app['job_id']; ?></td>
                            <td><?= $app['title']; ?></td>
                            <td><?= $app['company_name']; ?></td>
                            <td><?= $app['email']; ?></td>
                            <td><?= $app['location']; ?></td>
                            <td><a href="<?= url_to('apps.delete', $app['id']); ?>" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                  <?php endforeach; ?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?= $this->endsection(); ?>  