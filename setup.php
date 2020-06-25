<?php 
  require_once('files/header.php');
 ?>

<div class="container-lg container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">

            <!-- Form -->
            <form class="tab-content py-6" id="wizardSteps">
              <div class="tab-pane fade active show" id="wizardStepOne" role="tabpanel" aria-labelledby="wizardTabOne">

                <!-- Header -->
                <div class="row justify-content-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Pretitle -->
                    <h6 class="mb-4 text-uppercase text-muted">
                      Step 1 of 3
                    </h6>

                    <!-- Title -->
                    <h1 class="mb-3">
                      Github Info
                    </h1>

                    <!-- Subtitle -->
                    <p class="mb-5 text-muted">
                      Complete the form with correct 
                    </p>

                  </div>
                </div> <!-- / .row -->

                <!-- Team name -->
                <div class="form-group">
                  <label>
                    GitHhub Username
                  </label>
                  <input type="text" class="form-control" placeholder="Ahmerjutt">
                </div>
                <!-- Team name -->
                <div class="form-group">
                  <label>
                    GitHhub Repo
                  </label>
                  <input type="text" class="form-control" placeholder="KargarOnline">
                </div>
                <!-- Team name -->
                <div class="form-group">
                  <label>
                    GitHhub Branch
                  </label>
                  <input type="text" class="form-control" placeholder="master">
                </div>
                <!-- Team name -->
                <div class="form-group">
                  <label>
                    Personal Token
                  </label>
                  <input type="text" class="form-control" placeholder="e672b9a371a879143caa3078ad96d0b227316037">
                </div>
                <!-- Divider -->
                <hr class="my-5">

                <!-- Footer -->
                <div class="row align-items-center">
                  <div class="col-auto">

                    <!-- Button -->
                    <button class="btn btn-lg btn-white" type="reset">Cancel</button>

                  </div>
                  <div class="col text-center">

                    <!-- Step -->
                    <h6 class="text-uppercase text-muted mb-0">Step 1 of 3</h6>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-primary" data-toggle="wizard" href="#wizardStepTwo">Continue</a>

                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="wizardStepTwo" role="tabpanel" aria-labelledby="wizardTabTwo">

                <!-- Header -->
                <div class="row justify-content-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Pretitle -->
                    <h6 class="mb-4 text-uppercase text-muted">
                      Step 2 of 3
                    </h6>

                    <!-- Title -->
                    <h1 class="mb-3">
                      Getting Live Server Info
                    </h1>

                    <!-- Subtitle -->
                    <p class="mb-5 text-muted">
                      we need to confirm live server information for CodeDeployment
                    </p>

                  </div>
                </div> <!-- / .row -->
                <!-- Team name -->
                <div class="form-group">
                  <label>
                    Web Url
                  </label>
                  <input type="text" class="form-control" placeholder="https://example.com">
                </div>
                <!-- Team name -->
                <div class="form-group">
                  <label>
                    Database host
                  </label>
                  <input type="text" class="form-control" placeholder="www.web.server.com/sitename">
                </div>
                <!-- Team name -->
                <div class="form-group">
                  <label>
                    DB Username
                  </label>
                  <input type="text" class="form-control" placeholder="DB Username">
                </div>
                <!-- Team name -->
                <div class="form-group">
                  <label>
                    DB Password
                  </label>
                  <input type="text" class="form-control" placeholder="DB Password">
                </div>
                <!-- Divider -->

                <!-- Divider -->
                <hr class="my-5">

                <!-- Footer -->
                <div class="row align-items-center">
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepOne">Back</a>

                  </div>
                  <div class="col text-center">

                    <!-- Step -->
                    <h6 class="text-uppercase text-muted mb-0">Step 2 of 3</h6>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-primary" data-toggle="wizard" href="#wizardStepThree">Continue</a>

                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="wizardStepThree" role="tabpanel" aria-labelledby="wizardTabThree">

                <!-- Header -->
                <div class="row justify-content-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Pretitle -->
                    <h6 class="mb-4 text-uppercase text-muted">
                      Step 3 of 3
                    </h6>

                    <!-- Title -->
                    <h1 class="mb-3">
                      Let’s get some last details.
                    </h1>

                    <!-- Subtitle -->
                    <p class="mb-5 text-muted">
                      Setting up tags, dates, and permissions makes sure to keep your team organized and safe.
                    </p>

                  </div>
                </div> <!-- / .row -->

                <!-- Project tags -->
                <div class="form-group">

                  <!-- Label -->
                  <label>
                    Project tags
                  </label>

                  <!-- Select -->
                  <select class="form-control select2-hidden-accessible" data-toggle="select" multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true">
                    <option>CSS</option>
                    <option>HTML</option>
                    <option>JavaScript</option>
                    <option>Bootstrap</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="4" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--multiple form-control" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                </div>

                <div class="row">
                  <div class="col-12 col-md-6">

                    <!-- Start date -->
                    <div class="form-group">

                      <!-- Label -->
                      <label>
                        Start date
                      </label>

                      <!-- Input -->
                      <input type="text" class="form-control flatpickr-input" data-toggle="flatpickr" readonly="readonly">

                    </div>

                  </div>
                  <div class="col-12 col-md-6">

                    <!-- Start date -->
                    <div class="form-group">

                      <!-- Label -->
                      <label>
                        End date
                      </label>

                      <!-- Input -->
                      <input type="text" class="form-control flatpickr-input" data-toggle="flatpickr" readonly="readonly">

                    </div>

                  </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr class="mt-5 mb-5">

                <div class="row">
                  <div class="col-12 col-md-6">

                    <!-- Private project -->
                    <div class="form-group">

                      <!-- Label -->
                      <label class="mb-1">
                        Private project
                      </label>

                      <!-- Text -->
                      <small class="form-text text-muted">
                        If you are available for hire outside of the current situation, you can encourage others to hire you.
                      </small>

                      <!-- Switch -->
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchOne">
                        <label class="custom-control-label" for="switchOne"></label>
                      </div>

                    </div>

                  </div>
                  <div class="col-12 col-md-6">

                    <!-- Warning -->
                    <div class="card bg-light border">
                      <div class="card-body">

                        <!-- Heading -->
                        <h4 class="mb-2">
                          <i class="fe fe-alert-triangle"></i> Warning
                        </h4>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Once a project is made private, you cannot revert it to a public project.
                        </p>

                      </div>
                    </div>

                  </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr class="my-5">

                <!-- Footer -->
                <div class="row align-items-center">
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepTwo">Back</a>

                  </div>
                  <div class="col text-center">

                    <!-- Step -->
                    <h6 class="text-uppercase text-muted mb-0">Step 3 of 3</h6>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <button class="btn btn-lg btn-primary" type="submit">Create</button>

                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
 <?php require_once('files/footer.php'); ?>