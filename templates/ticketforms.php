<!-- SERVICE REQUEST FORM -->
<form id="service" name="service" method="post">
  <div id="service" class="servicet">
      <span class="table-title" id="form">New Service Request</span>
      <div class="row">
        <div class="col s12 m12 l6" id="form">
          <div class="row" id="request-form-row3">
            <div class="col s12">
              <div class="input-field" id="request-form">
                <input placeholder="<?php echo $_SESSION['first_name'] . ' '. $_SESSION['last_name'] ?>" name="rname" type="text" disabled>
                <label for="rname">Requestor's Name</label>
              </div>
            </div>
          </div>
          <div class="row" id="request-form-row2">
            <div class="col s12">
              <!-- <i class="tiny material-icons" id="form">event</i>Date Prepared: -->
              <div class="input-field" id="request-form">
                <input type="text"  id="date_prepared" name="date_prepared" disabled>
                <label for="date_prepared">Date Prepared (YYYY/MM/DD)</label>
              </div>
            </div>
          </div>
          <div class="row" id="request-form-row3">
            <div class="col s12">
              <div class="input-field" id="request-form">
                <input placeholder=" " class="title" name="title" type="text" data-length="40" class="validate" required>
                <label for="title">Request Title</label>
              </div>
            </div>
          </div>
          <div class="row" id="request-form-row">
            <div class="input-field">
              <textarea id="textarea1" placeholder=" " class="materialize-textarea" name="request_details" required></textarea>
              <label for="textarea1" required>Details</label>
            </div>
          </div>

          <div class="row" id="request-form-controls">
            <input class="waves-effect waves-light" id="btn-cancel" name="submit" type="submit" value="Cancel">
            <input class="waves-effect waves-light" id="btn-submit" name="submit" type="submit" value="Submit">
          </div>
        </div>
        </div>
      </div>
</form> <!-- End of Service Request Form -->

<!-- USER ACCESS FORM  -->
<form id="access" name="access" method="post">
  <div id="access" class="accesst">
    <span class="table-title" id="form">New User Access Request</span>
    <!-- Preloader and it's background. -->
    <div class="preloader-background">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of preloader -->
        <div class="row">
          <!-- Start of LEFT column -->
          <div class="col s12 m12 l6" id="form">
            <h6>Requestor Details</h6>

            <div class="col s12 m12 l6">
              <div class="row" id="request-form-row4">
                <div class="col s12">
                  <!-- <i class="tiny material-icons" id="form">event</i>Date Prepared: -->
                  <div class="input-field" id="request-form">
                    <input type="text"  id="date_prepared2" name="date_prepared2" disabled>
                    <label for="date_prepared2">Date Prepared (YYYY/MM/DD)</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m12 l6">
              <div class="row" id="request-form-row4">
                <div class="col s12">
                  <div class="input-field" id="request-form">
                    <input placeholder="Project Number" name="rc_no" type="number" required>
                    <label for="rc_no">R.C. Number</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="request-form-row2">
              <div class="col s12">
                <div class="input-field" id="request-form">
                  <input placeholder=" " name="company" type="text" required>
                  <label for="company">Company</label>
                </div>
              </div>
            </div>
            <div class="row" id="request-form-row2">
              <div class="col s12">
                <div class="input-field" id="request-form">
                  <input placeholder=" " name="dp" type="text" required>
                  <label for="Department/Project">Department/Project</label>
                </div>
              </div>
            </div>
          </div> <!-- End of LEFT column -->


          <!-- Start of RIGHT column -->
          <div class="col s12 m12 l6" id="form">
            <h6>Request Details</h6>
            <div class="row" id="request-form-row">
              <div class="col s12">
                <div class="input-field" id="request-form">
                  <input placeholder=" " class="title" name="title" type="text" data-length="40" required>
                  <label for="title">Request Title</label>
                </div>
              </div>
            </div>
            <div class="col s12 m12 l6">
              <div class="row" id="request-form-row3">
                <div class="col s12">
                  <div class="input-field" id="request-form">
                    <input placeholder=" " name="app_name" type="text" required>
                    <label for="Access Request">Name of Application</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m12 l6">
              <div class="row" id="request-form-row3">
                <div class="col s12">
                  <div class="input-field" id="request-form">
                    <input placeholder="New, Additional, Deactivate, Reset Password, etc" name="access_type" type="text" class="validate" required>
                    <label for="Access Request">Type of Access Request</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="request-form-row">
              <div class="col s12">
                <div class="input-field" id="request-form">
                  <input placeholder=" " name="names" type="text" class="validate" required>
                  <label for="Names">Name/s</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m12 l12" id="form">
              <h6>Reviewed By:</h6>
              <div class="col s12 m12 l6">
                <div class="row" id="request-form-row3">
                  <div class="col s12 m12 l6">
                    <div class="input-field search-box" id="request-form">
                      <input placeholder=" " name="checker" autocomplete="off" type="text" validate required>
                      <div class="result"></div>
                        <label for="approver">Checker *<i>optional</i></label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m12 l6">
                <div class="row" id="request-form-row3">
                  <div class="col s12 m12 l6">
                    <div class="input-field search-box" id="request-form">
                      <input placeholder="Department's or Group's PM or Person-In-Charge" name="approver" autocomplete="off" type="text"  required>
                      <div class="result"></div>
                      <label for="approver">Approver *<i>optional</i></label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" id="request-form-controls">
                <input class="waves-effect waves-light" id="btn-cancel" name="cancel" type="submit" value="Cancel">
                <input class="waves-effect waves-light" id="btn-submit" name="submit" type="submit" value="Submit">
              </div>
          </div>  <!-- End of RIGHT column -->
        </div> <!-- End of row -->
</form> <!-- End of User Access Request Form -->
<!-- END OF HIDDEN FORMS  -->
