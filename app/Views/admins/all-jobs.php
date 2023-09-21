<?= $this->extend('layouts/admin.php'); ?>
<?= $this->section('content'); ?>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">

                <?php if(session()->getFlashdata('save')) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('save'); ?></div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('delete')) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('delete'); ?></div>
                <?php endif; ?>

              <h5 class="card-title mb-4 d-inline">Jobs</h5>
              <a  href="<?= url_to('jobs.create'); ?>" class="btn btn-primary mb-4 text-center float-right">Create Jobs</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">job title</th>
                    <th scope="col">category</th>
                    <th scope="col">company</th>
                    <th scope="col">location</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($allJobs as $job) : ?>
                        <tr>
                            <th scope="row"><?= $job['id']; ?></th>
                            <td><?= $job['title']; ?></td>
                            <td><?= $job['category']; ?></td>
                            <td><?= $job['company_name']; ?></td>
                            <td><?= $job['location']; ?></td>
                            <td><a href="<?= url_to('jobs.delete', $job['id']); ?>" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                  <?php endforeach; ?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
 <?= $this->endsection(); ?>