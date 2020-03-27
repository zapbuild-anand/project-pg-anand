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
              <?= $this->Html->image('home11.jpg', ['width'=>'1100','height'=>'480','class'=>'d-block w-100','alt' => 'Second slide']) ?>
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
            <div class="form-group border rounded p-2">
                <fieldset>
                    <legend class="text-center"><?= __('Login') ?></legend>
                    <?php
                        echo $this->Form->control('email',['class'=>'form-control mb-4','placeholder'=>'E-mail','required'=>true]);
                        echo $this->Form->control('password',['class'=>'form-control mb-4','placeholder'=>'Password','required'=>true]);
                    ?>
                </fieldset>
                <div class="mb-5">
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox float-left">
                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                        </div>
                    <div class="float-right">
                        <a href="">Forgot password?</a>
                    </div>
                </div>
                <?= $this->Form->button('Login',['class'=>'btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
                <div class="text-md-center">
                  Don't have an account! <?= $this->Html->link(__('Register here'), ['action' => 'add']) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>