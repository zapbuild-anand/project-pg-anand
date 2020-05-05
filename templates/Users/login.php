<div class="row">
    <div class="col p-5">
        <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <?= $this->Html->image('pg1.jpeg', ['width'=>'1100','height'=>'480','class'=>'d-block w-100','alt' => 'Second slide']) ?>
              <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
              </div>   
            </div>
            <div class="carousel-item">
              <?= $this->Html->image('pg2.jpeg', ['width'=>'1100','height'=>'480','class'=>'d-block w-100','alt' => 'Second slide']) ?>
              <div class="carousel-caption">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
              </div>   
            </div>
            <div class="carousel-item">
              <?= $this->Html->image('home10.jpg', ['width'=>'1100','height'=>'480','class'=>'d-block w-100','alt' => 'Third slide']) ?>
              <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
              </div>   
            </div>
          </div>
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>

    </div>
    <div class="col-5 p-5 mt-5">
        <?= $this->Form->create() ?>
            <div class="form-group border rounded p-3">
                <fieldset>
                    <legend class="text-center"><?= __('Login') ?></legend>
                    <?php
                      if(isset($error))
                          echo '<h6 class="text-danger" id="error"><b>&times;</b> '.$error.'</h6>';
                        echo $this->Form->control('email',['class'=>'form-control mb-2','placeholder'=>'E-mail']);
                        echo '<span id="error_email" class="text-danger"></span>';
                        echo $this->Form->control('password',['class'=>'form-control mb-2','placeholder'=>'Password']);
                        echo '<span id="error_password" class="text-danger"></span>';
                        echo '<input type="checkbox" onclick="myFunction()" class="mb-4">Show Password';
                    ?>
                </fieldset>
                <div class="mb-4">
                        <!-- 
                        <div class="custom-control custom-checkbox float-left">
                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                        </div> -->
                    <div class="float-right">
                        <?= $this->Html->link(__('Forgot Password?'), ['controller'=>'users','action' => 'forgot-password']) ?>
                    </div>
                </div>
                <?= $this->Form->button('Login',['class'=>'btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0','id'=>'btn_login']) ?>
                <div class="text-md-center">
                  Don't have an account! <?= $this->Html->link(__('Register now'), ['action' => 'add']) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
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
  $(document).ready(function(){

    $('#error').click(function(){
      $('#error').hide();
    });

    $('#btn_login').click(function(){

      var error_email='';
      var error_password='';
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
          error_password = '';
          $('#error_password').html(error_password);
          $('#password').removeClass('has-error');
      }

      if (error_email != '' || error_password != '') {
        return false;
      }
    });
  });
</script>
