
<?= $this->extend('layouts/app.php'); ?>
<?= $this->section('content'); ?>

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= base_url('public/assets/images/hero_1.jpg')?>');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Results for <?= $title; ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?= url_to('home')?>">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Searches</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

<section class="site-section">
<div class="container">

  <div class="row mb-5 justify-content-center">
    <div class="col-md-7 text-center">
      <h2 class="section-title mb-2"><?= $title; ?></h2>
    </div>
  </div>
  
  <ul class="job-listings mb-5">
  <?php if(count($searches) > 0) : ?>
    <?php foreach($searches as $job) : ?>
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            
        <a href="<?php echo url_to('single.jobs', $job['id']); ?>"></a>
        <div class="job-listing-logo">
            <img src="<?= base_url('public/assets/images/'.$job['company_image'].'')?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2><?= $job['title']; ?></h2>
            <strong><?= $job['company_name']; ?></strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> <?= $job['location']; ?>
            </div>
            <div class="job-listing-meta">
            <span class="badge badge-danger"><?= $job['job_type']; ?></span>
            </div>
        </div>
        
        </li>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="alert alert-success">there are no searches with this keyword</p>
    <?php endif; ?>        
    

    

    
  </ul>



</div>
</section>
<?php $this->endsection(); ?>