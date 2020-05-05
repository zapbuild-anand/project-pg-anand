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
                                <input type="checkbox" onclick="myFunction()" class="mb-2">Show Password
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('confirmpassword',['label'=>'Confirm Password','class'=>'form-control mb-2','type'=>'password', 'disabled'=>'true','placeholder'=>'Confirm Password']);?>
                                <span id="error_confirmpassword" class="text-danger"></span>
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
                                <?= $this->Form->control('image',['accept'=>['.jpg,','.jpeg','.png'],'type'=>'file','class'=>'form-control mb-2','id'=>'file','label'=>'Profile Picture','required'=>true]);?>
                                <span id="error_image" class="text-danger"></span>
                            </div>
                            <hr>
                             <p>By creating an account you agree to our <a href="#" data-toggle="modal" data-target="#exampleModal">Terms & Privacy</a>.</p>
                            <br>
                            <div class="text-center">
                                <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default">Previous</button>
                                <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info">Submit</button>
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


<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script type="text/javascript">
    var allowsubmit = false;
    $(document).ready(function(){
            //on keypress 
            $('#confirmpassword').keyup(function(e){
                //get values 
                var password = $('#password').val();
                var confirmpassword = $(this).val();
                
                //check the strings
                if(password == confirmpassword){
                    //if both are same remove the error and allow to submit
                    $('#error_confirmpassword').html('');
                    allowsubmit = true;
                    $('#confirmpassword').removeClass('has-error');
                }else{
                    //if not matching show error and not allow to submit
                    $('#error_confirmpassword').html('Password not matching');
                    $('#confirmpassword').addClass('has-error');
                    allowsubmit = false;
                }
            });

            $('#password').keyup(function(e){
                var password=$(this).val();
                var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,}$/;
                if (!regex.test(password)) {
                    error_password='The password does not meet the password policy requirements.<br>';
                    $('#error_password').html(error_password);
                    $('#password').addClass('has-error');
                    $('#confirmpassword').attr('disabled','true');
                    allowsubmit=false;

                } else {
                    error_password = '';
                    $('#error_password').html(error_password);
                    $('#password').removeClass('has-error');
                    $('#confirmpassword').removeAttr('disabled');
                }

            });

        $('#btn_login_details').click(function(){

            var error_email='';
            var error_password='';
            var error_confirmpassword='';
            var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if ($.trim($('#email').val()).length == 0) {
                error_email='*Email is required';
                $('#error_email').html(error_email);
                $('#email').addClass('has-error');
            }
            else{
                if (!filter.test($('#email').val())) {
                    error_email = 'Invalid Email';
                    $('#error_email').html(error_email);
                    $('#email').addClass('has-error');
                }
                else{
                    error_email = '';
                    $('#error_email').html(error_email);
                    $('#email').removeClass('has-error');
                }
            }
            if($.trim($('#password').val()).length == 0){
                error_password='*Password is required<br>';
                $('#error_password').html(error_password);
                $('#password').addClass('has-error');
            }
            else{
            
            }

            if($.trim($('#confirmpassword').val()).length == 0){
                error_confirmpassword='*Confirm Password is required';
                $('#error_confirmpassword').html(error_confirmpassword);
                $('#confirmpassword').addClass('has-error');

            }
            else{
                error_password = '';
                $('#error_password').html(error_password);
                $('#password').removeClass('has-error');
            }

                var password = $('#password').val();
                var confirmpassword = $('#confirmpassword').val();
 
                //just to make sure once again during submit
                //if both are true then only allow submit
                if(password == confirmpassword){
                    allowsubmit = true;
                }
                else{
                    allowsubmit=false;
                    error_confirmpassword='Password not matching';
                    $('#error_confirmpassword').html(error_confirmpassword);
                    $('#confirmpassword').addClass('has-error');
                }

            if (error_email != '' || error_password != '' || error_confirmpassword != '' || allowsubmit!=true) {
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
            var error_image='';
            var error_dob='';
            var mobile_validation= /^\d{10}$/;

            if ($.trim($('#firstname').val()).length == 0) {
                error_firstname='*First Name is required';
                $('#error_firstname').html(error_firstname);
                $('#firstname').addClass('has-error');
            }
            else{
                error_firstname = '';
                $('#error_firstname').html(error_firstname);
                $('#firstname').removeClass('has-error');
            }

            if ($.trim($('#lastname').val()).length == 0) {
                error_lastname='*Last Name is required';
                $('#error_lastname').html(error_lastname);
                $('#lastname').addClass('has-error');
            }
            else{
                error_lastname = '';
                $('#error_lastname').html(error_lastname);
                $('#lastname').removeClass('has-error');
            }  

            if ($.trim($('#phone').val()).length == 0) {
                error_phone='*Mobile Number is required';
                $('#error_phone').html(error_phone);
                $('#phone').addClass('has-error');
            }
            else{
                if (!mobile_validation.test($('#phone').val())) {
                    error_phone = 'Invalid Mobile Number';
                    $('#error_phone').html(error_phone);
                    $('#phone').addClass('has-error');
                }
                else{
                    error_phone = '';
                    $('#error_phone').html(error_phone);
                    $('#phone').removeClass('has-error');
                }
            } 

            var imgVal = $('#file').val(); 
            if(imgVal=='') 
            {  
                error_image='*Picture is required';
                $('#error_image').html(error_image);
                $('#file').addClass('has-error');
            }
            else{
                error_image = '';
                $('#error_image').html(error_image);
                $('#file').removeClass('has-error');
            }

            if ($('#dob').val() == '') {
                error_dob='*Bate of Birth is required';
                $('#error_dob').html(error_dob);
                $('#dob').addClass('has-error');
            }
            else{
                error_dob = '';
                $('#error_dob').html(error_dob);
                $('#dob').removeClass('has-error');
            } 
        

            if (error_firstname != '' || error_lastname != '' || error_phone != '' || error_image != '' || error_dob != '') {
                return false;
            }
            else{
                $('#btn_personal_details').attr("disabled","disabled");
                $(document).css('cursor','progress');
                $("#register_form").submit();
            }
        });
    });
</script>