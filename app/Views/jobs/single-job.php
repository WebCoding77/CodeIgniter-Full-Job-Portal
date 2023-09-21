<?= $this->extend('layouts/app.php'); ?>
<?= $this->section('content'); ?>


 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= base_url('public/assets/images/hero_1.jpg'); ?>');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?= $singleJob['title']; ?></h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?= $singleJob['title']; ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section">
      <div class="container">
          <?php if(session()->getFlashdata('save')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('save'); ?></div>
          <?php endif; ?>

          <?php if(session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
          <?php endif; ?>


          <?php if(session()->getFlashdata('applyed')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('applyed'); ?></div>
          <?php endif; ?>
        <div class="row align-items-center mb-5">
         
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="<?= base_url('public/assets/images/'.$singleJob['company_image'].'')?>" alt="Image">
              </div>
              <div>
                <h2><?= $singleJob['title']; ?></h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?= $singleJob['company_name']; ?></span>
                  <span class="m-2"><span class="icon-room mr-2"></span><?= $singleJob['location']; ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?= $singleJob['job_type']; ?></span></span>
                </div>
              </div>
            </div>
          </div>
    
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <figure class="mb-5"><img src="<?= base_url('public/assets/images/job_single_img_1.jpg'); ?>" alt="Image" class="img-fluid rounded"></figure>
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
              <p>
              <?= $singleJob['job_description']; ?>
              </p>
            </div>
            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>
                <?= $singleJob['responsibilities']; ?>
                </span></li>
                
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>
                    <?= $singleJob['education_experience']; ?>
                </span></li>
                
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>
                    <?= $singleJob['other_benifits']; ?>

                </span></li>
                
              </ul>
            </div>

            <div class="row mb-5">
              <div class="col-6">
              <?php if(isset(auth()->user()->id)) : ?>  

                  <?php if($checkForSavedJobs > 0) : ?>

                    <button type="submit" disabled class="btn btn-block btn-light btn-md">You Saved this Job</button>
                  <?php else :?>  
                    <form method="POST" action="<?= url_to('save.jobs', $singleJob['id']); ?>">
                      <input type="hidden" name="title"         value="<?=  $singleJob['title'] ?>">
                      <input type="hidden" name="company_image" value="<?=  $singleJob['company_image'] ?>">
                      <input type="hidden" name="company_name"  value="<?=  $singleJob['company_name'] ?>">
                      <input type="hidden" name="location"      value="<?=  $singleJob['location'] ?>">
                      <input type="hidden" name="job_type"      value="<?=  $singleJob['job_type'] ?>">
                      <input type="hidden" name="job_id"        value="<?=  $singleJob['id'] ?>">

                      <button type="submit"  class="btn btn-block btn-light btn-md">Save Job</button>
                    <!--add text-danger to it to make it read-->
                    </form>
                  <?php endif; ?>
                <?php else: ?>
                  <p class="alert alert-success">login in to apply for this job or save it</p>
                <?php endif; ?>
                
                
              </div>
              <div class="col-6">

              <?php if(isset(auth()->user()->id)) : ?>  

                  <?php if($checkForApplyedJobs > 0) : ?>

                    <button type="submit" disabled class="btn btn-block btn-light btn-md">You Applyed for this Job</button>
                  <?php else :?>  
                    <form method="POST" action="<?= url_to('apply.jobs', $singleJob['id']); ?>">
                        <input type="hidden" name="title"         value="<?=  $singleJob['title'] ?>">
                        <input type="hidden" name="company_image" value="<?=  $singleJob['company_image'] ?>">
                        <input type="hidden" name="company_name"  value="<?=  $singleJob['company_name'] ?>">
                        <input type="hidden" name="location"      value="<?=  $singleJob['location'] ?>">
                        <input type="hidden" name="job_type"      value="<?=  $singleJob['job_type'] ?>">
                        <input type="hidden" name="job_id"        value="<?=  $singleJob['id'] ?>">
                        <input type="hidden" name="cv"            value="<?=  auth()->user()->cv ?>">
                        <input type="hidden" name="job_title"     value="<?=  auth()->user()->job_title ?>">

                      <button type="submit" class="btn btn-block btn-primary btn-md">Apply Now</button>
                    </form>
                  <?php endif; ?>
              <?php endif; ?>  

              </div>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong> <?= $singleJob['published_on']; ?></li>
                <li class="mb-2"><strong class="text-black">Vacancy:</strong> <?= $singleJob['vacancy']; ?></li>
                <li class="mb-2"><strong class="text-black">Employment Status:</strong> <?= $singleJob['job_type']; ?></li>
                <li class="mb-2"><strong class="text-black">Experience:</strong> <?= $singleJob['experience']; ?></li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong> <?= $singleJob['location']; ?></li>
                <li class="mb-2"><strong class="text-black">Salary:</strong> <?= $singleJob['salary']; ?></li>
                <li class="mb-2"><strong class="text-black">Gender:</strong> <?= $singleJob['gender']; ?></li>
                <li class="mb-2"><strong class="text-black">Application Deadline:</strong> <?= $singleJob['application_deadline']; ?></li>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('jobs/single-job/'.$singleJob['id'].''); ?>&quote=<?php echo $singleJob['title'] ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="https://twitter.com/intent/tweet?text=<?php echo $singleJob['title'] ?>&url=<?php echo base_url('jobs/single-job/'.$singleJob['id'].''); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo base_url('jobs/single-job/'.$singleJob['id'].''); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
              </div>
            </div>


            <div class="bg-light p-3 border rounded mb-4 mt-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Categories</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <?php foreach($allCateories as $category) : ?>
                   <li class="mb-2"><a style="text-decoration: none;" href="<?= url_to('category.jobs', $category['name']); ?>"><strong class="text-black"><?= $category['name']; ?></strong></a></li>
                <?php endforeach; ?>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2"><?= $numRelatedJobs; ?> Related Jobs</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <?php foreach($relatedJobs as $job) : ?>
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
              <a href="<?php echo url_to('single.jobs', $job->id); ?>"></a>
              <div class="job-listing-logo">
                <img src="<?= base_url('public/assets/images/'.$job->company_image.'')?>" alt="Image" class="img-fluid">
              </div>

              <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                  <h2><?= $job->title ?></h2>
                  <strong><?= $job->company_name ?></strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                  <span class="icon-room"></span> <?= $job->location ?>
                </div>
                <div class="job-listing-meta">
                  <span class="badge badge-danger"><?= $job->job_type ?></span>
                </div>
              </div>
              
            </li>
          <?php endforeach; ?>
          
          

          
        </ul>

     

      </div>
    </section>
    

    <section class="bg-light pt-5 testimony-full">
        
        <div class="owl-carousel single-carousel">

        
          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                  <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                  <p><cite> &mdash; Chris Peters, @Google</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
              </div>
            </div>
          </div>

      </div>

    </section>

    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('<?php echo base_url('public/assets/images/hero_1.jpg'); ?>');">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
            <h2 class="text-white">Get The Mobile Apps</h2>
            <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
            <p class="mb-0">
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
            </p>
          </div>
          <div class="col-md-6 ml-auto align-self-end">
            <img src="<?php echo base_url('public/assets/images/apps.png'); ?>" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <?= $this->endsection(); ?>