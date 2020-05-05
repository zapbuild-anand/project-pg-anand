<div class="container box">
        <br>
        <h3 class="text-center">User Registration</h3><br>
        <?= $this->Form->create($user, ['type' => 'file','id'=>'register_form']) ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active active_tab1" data-toggle="tab" href="#login_details" style="border:1px solid #ccc" id="list_login_details">Login Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal Details</a>
                </li>
            </ul>
            <div class="tab-content" style="margin-top: 16px;">
                <div class="tab-pane active" id="login_details">
                    <div class="card">
                        <div class="card-header">Login Details</div>
                        <div class="card-body">
                            <div class="form-group">
                                <?= $this->Form->control('email',['class'=>'form-control mb-2']);?>
                                <span id="error_email" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <?= $this->Form->control('password',['class'=>'form-control mb-2']);?>
                                <span id="error_password" class="text-danger"></span>
                            </div>
                            <br>
                            <div align="center">
                                <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info">Next</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="personal_details">
                    <div class="card">
                        <div class="card-header">Personal Details</div>
                        <div class="card-body">
                            <div class="form-group">
                                <?= $this->Form->control('firstname',['class'=>'form-control mb-2','label'=>'First Name']);?>
                                <span id="error_firstname" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('lastname',['class'=>'form-control mb-2','label'=>'Last Name']);?>
                                <span id="error_lastname" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('phone',['class'=>'form-control mb-2','label'=>'Mobile No.']);?>
                                <span id="error_phone" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <div class="form-check-inline">
                                <?= $this->Form->control('gender', ['class'=>'form-check-input mb-2','label'=>'','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Male'],['value' => '2', 'text' => 'Female'],['value' => '3', 'text' => 'Other']],'required'=>true]) ; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('dob',['class'=>'form-control mb-2','label'=>'Date of Birth']); ?>
                                <span id="error_dob" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <div class="form-check-inline">
                                <?= $this->Form->control('type', ['class'=>'form-check-input mb-2','label'=>'','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Guest'],['value' => '2', 'text' => 'Owner']]]) ; ?>
                                </div>
                            </div>
                            <hr>
                             <p>By creating an account you agree to our <a href="#" data-toggle="modal" data-target="#exampleModal">Terms & Privacy</a>.</p>
                            <br>
                            <div class="text-center">
                                <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default">Previous</button>
                                <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info">Update</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        <?= $this->Form->end() ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms & Privacy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#btn_login_details').click(function(){

            var error_email='';
            var error_password='';
            var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if ($.trim($('#email').val()).length == 0) {
                error_email='*Email is required';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');
            }
            else{
                if (!filter.test($('#email').val())) {
                    error_email = 'Invalid Email';
                    $('#error_email').text(error_email);
                    $('#email').addClass('has-error');
                }
                else{
                    error_email = '';
                    $('#error_email').text(error_email);
                    $('#email').removeClass('has-error');
                }
            }
            if($.trim($('#password').val()).length == 0){
                error_password='*Password is required';
                $('#error_password').text(error_password);
                $('#password').addClass('has-error');
            }
            else{
                    error_password = '';
                    $('#error_password').text(error_password);
                    $('#password').removeClass('has-error');
            }

            if (error_email != '' || error_password != '') {
                return false;
            }
            else{
                $('#list_login_details').removeClass('active active_tab1');
                $('#list_login_details').removeAttr('href data-toggle');
                $('#list_login_details').removeClass('active');
                $('#login_details').removeClass('active');
                $('#list_login_details').addClass('inactive_tab1');
                $('#list_personal_details').removeClass('inactive_tab1');
                $('#list_personal_details').addClass('active_tab1 active');
                $('#list_personal_details').attr('href', '#personal_details');
                $('#list_personal_details').attr('data-toggle', 'tab');
                $('#list_personal_details').addClass('active');
                $('#personal_details').addClass('active');
            }
        });

        $('#previous_btn_personal_details').click(function(){
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#list_personal_details').removeClass('active');
            $('#personal_details').removeClass('active');
            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_login_details').removeClass('inactive_tab1');
            $('#list_login_details').addClass('active_tab1 active');
            $('#list_login_details').attr('href', '#login_details');
            $('#list_login_details').attr('data-toggle', 'tab');
            $('#list_login_details').addClass('active');
            $('#login_details').addClass('active');

        });

        $('#btn_personal_details').click(function(){
            var error_firstname='';
            var error_lastname='';
            var error_phone='';
            var error_dob='';
            var mobile_validation= /^\d{10}$/;

            if ($.trim($('#firstname').val()).length == 0) {
                error_firstname='*First Name is required';
                $('#error_firstname').text(error_firstname);
                $('#firstname').addClass('has-error');
            }
            else{
                error_firstname = '';
                $('#error_firstname').text(error_firstname);
                $('#firstname').removeClass('has-error');
            }

            if ($.trim($('#lastname').val()).length == 0) {
                error_lastname='*Last Name is required';
                $('#error_lastname').text(error_lastname);
                $('#lastname').addClass('has-error');
            }
            else{
                error_lastname = '';
                $('#error_lastname').text(error_lastname);
                $('#lastname').removeClass('has-error');
            }  

            if ($.trim($('#phone').val()).length == 0) {
                error_phone='*Mobile Number is required';
                $('#error_phone').text(error_phone);
                $('#phone').addClass('has-error');
            }
            else{
                if (!mobile_validation.test($('#phone').val())) {
                    error_phone = 'Invalid Mobile Number';
                    $('#error_phone').text(error_phone);
                    $('#phone').addClass('has-error');
                }
                else{
                    error_phone = '';
                    $('#error_phone').text(error_phone);
                    $('#phone').removeClass('has-error');
                }
            } 

            if ($('#dob').val() == '') {
                error_dob='*Bate of Birth is required';
                $('#error_dob').text(error_dob);
                $('#dob').addClass('has-error');
            }
            else{
                error_dob = '';
                $('#error_dob').text(error_dob);
                $('#dob').removeClass('has-error');
            } 
        

            if (error_firstname != '' || error_lastname != '' || error_phone != '' || error_dob != '') {
                return false;
            }
            else{
                $('#btn_contact_details').attr("disabled","disabled");
                $(document).css('cursor','progress');
                $("#register_form").submit();
            }
        });
    });
</script>