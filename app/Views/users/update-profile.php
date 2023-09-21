<?= $this->extend('layouts/app.php'); ?>
<?= $this->section('content'); ?>


<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= base_url('public/assets/images/hero_1.jpg')?>');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update Profile</h1>
            <div class="custom-breadcrumbs">
              <a href="<?= url_to('home')?>">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Update Profile</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
      <?php if(session()->getFlashdata('update')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('update'); ?></div>
          <?php endif; ?>
        <div class="row">
      
          <div class="col-md-12">
            <form action="<?= url_to('submit.profile.users'); ?>" method="POST" class="p-4 border rounded">

            

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Job title</label>
                  <input type="text" name="job_title" value="<?= $singleUser->job_title; ?>" id="fname" class="form-control" placeholder="Job Title">
                </div>
              </div>


              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Facebook</label>
                  <input type="text" name="facebook" value="<?= $singleUser->facebook; ?>" id="fname" class="form-control" placeholder="Facebook">
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Linkedin</label>
                  <input type="text" name="linkedin" value="<?= $singleUser->linkedin; ?>" id="fname" class="form-control" placeholder="Linkedin">
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Twitter</label>
                  <input type="text" name="twitter" value="<?= $singleUser->twitter; ?>" id="fname" class="form-control" placeholder="Twitter">
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Bio</label>
                <textarea class="form-control" placeholder="Bio" name="bio" id="exampleFormControlTextarea1" rows="3">
                <?= $singleUser->bio; ?>
                </textarea>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Update" class="btn px-4 btn-primary text-white">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>

<?= $this->endsection(); ?>