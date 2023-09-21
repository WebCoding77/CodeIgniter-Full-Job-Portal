<?= $this->extend('layouts/app.php'); ?>
<?= $this->section('content'); ?>


<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= base_url('public/assets/images/hero_1.jpg')?>');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update CV</h1>
            <div class="custom-breadcrumbs">
              <a href="<?= url_to('home')?>">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Update CV</strong></span>
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
            <form action="<?= url_to('submit.cv.users'); ?>" method="POST" class="p-4 border rounded" enctype="multipart/form-data">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">CV</label>
                  <input type="file" name="cv"  class="form-control">
                </div>
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