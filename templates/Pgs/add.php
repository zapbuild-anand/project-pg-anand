<div class="container box">
        <br>
        <h2 class="text-center">PG Registration</h2><br>
        <?= $this->Form->create([$pg,$facility], ['id'=>'register_form']) ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active active_tab1" data-toggle="tab" href="#pg_details" style="border:1px solid #ccc" id="list_pg_details">PG Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_address_details" style="border:1px solid #ccc">Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_facility_details" style="border:1px solid #ccc">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_pricing_details" style="border:1px solid #ccc">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_rule_details" style="border:1px solid #ccc">Rules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_image_details" style="border:1px solid #ccc">Images</a>
                </li>
            </ul>
            <div class="tab-content" style="margin-top: 16px;">
                <div class="tab-pane active" id="pg_details">
                    <div class="card">
                        <div class="card-header">PG Details</div>
                        <div class="card-body">
                            <div class="form-group">
                                <?= $this->Form->control('name',['label'=>'PG Name','class'=>'form-control mb-2']); ?>
                                <span id="error_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <?php
                                    echo '<div class="form-check-inline">';
                                    echo '<label class="mr-2">Type</label>';
                                    echo $this->Form->control('type', ['label'=>'','class'=>'form-check-input','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Boys', 'checked'=>true],['value' => '2', 'text' => 'Girls'],['value' => '3', 'text' => 'All']]]) ;
                                    echo '</div><br>';
                                        echo '<label for="sel1">Sharing</label>
                                            <select class="form-control mb-2" id="sel1" name="sharing">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>';
                                    echo '<div class="border shadow p-3 mb-3">';
                                        echo '<h5 class="text-center">Building Details</h5>';
                                        echo $this->Form->control('totalFloors',['class'=>'form-control mb-2']);
                                        echo $this->Form->control('pgOnFloor',['class'=>'form-control mb-2']);
                                        echo $this->Form->control('noOfRooms',['class'=>'form-control mb-2']);
                                        echo $this->Form->control('houseNumber',['class'=>'form-control mb-2']);
                                    echo '</div>';
                                    echo $this->Form->control('landmark',['class'=>'form-control mb-2']);
                                    echo $this->Form->control('availableFrom',['class'=>'form-control mb-2']);
                                    echo $this->Form->control('description',['class'=>'form-control mb-2']);
                                ?>
                            </div>
                            <br>
                            <div align="center">
                                <button type="button" name="btn_pg_details" id="btn_pg_details" class="btn btn-info">Next</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="address_details">
                    <div class="card">
                        <div class="card-header">Address</div>
                        <div class="card-body">
                            <div class="form-group">
                                <?php
                                    echo '<label for="district">City</label>
                                            <select class="form-control mb-2" id="district" name="district">
                                            <option disabled selected value> -- select-- </option>';
                                                foreach ($categories as $key) {
                                                   if($key->parent_id!=null)
                                                    echo '<option>'.$key->name.'</option>';
                                                }
                                        echo '</select>';

                                    echo '<label for="district">State</label>
                                            <select class="form-control mb-2" id="state" name="state">
                                            <option disabled selected value> -- select-- </option>';
                                                foreach ($categories as $key) {
                                                   if($key->parent_id==null)
                                                    echo '<option>'.$key->name.'</option>';
                                                }
                                        echo '</select>';
                                    echo $this->Form->control('sector',['label'=>'Sector / Area','class'=>'form-control mb-2']);
                                ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('pincode',['class'=>'form-control mb-2']); ?>
                                <span id="error_pincode" class="text-danger"></span>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" name="previous_btn_address_details" id="previous_btn_address_details" class="btn btn-default">Previous</button>
                                <button type="button" name="btn_address_details" id="btn_address_details" class="btn btn-info">Next</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="facility_details">
                    <div class="card">
                        <div class="card-header">Facilities</div>
                        <div class="card-body">
                            <div class="form-group">
                                <?php
                                    echo $this->Form->control('furnishing', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Furnished'],['value' => '2', 'text' => 'SemiFurnished'],['value' => '3', 'text' => 'UnFurnished']]]) ;
                                    echo $this->Form->control('balcony', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('chair', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('sofa', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('electricity', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('powerBackup', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('wifi', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('led', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('refrigerator', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('AC', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('RO', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('geaser', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('cooler', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('laundary', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('pgsecurity', ['label'=>'Security','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('cctv', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                    echo $this->Form->control('parking', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                ?>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" name="previous_btn_facility_details" id="previous_btn_facility_details" class="btn btn-default">Previous</button>
                                <button type="button" name="btn_facility_details" id="btn_facility_details" class="btn btn-info">Next</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pricing_details">
                    <div class="card">
                        <div class="card-header">Pricing</div>
                        <div class="card-body">
                            <div class="form-group">
                               <?php
                                echo $this->Form->control('rent',['class'=>'form-control mb-2']);
                                echo $this->Form->control('per', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'bed'],['value' => '2', 'text' => 'bedroom']]]) ;
                                echo $this->Form->control('security',['class'=>'form-control mb-2']);
                                echo $this->Form->control('minimumDuration',['class'=>'form-control mb-2']);
                                echo $this->Form->control('leavingNotice',['class'=>'form-control mb-2']);
                                echo $this->Form->control('earlyLeavingCharge',['class'=>'form-control mb-2']);
                                echo '<label for="sel1">Services Included</label>';
                                echo $this->Form->control('food', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                echo $this->Form->control('laundary', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                echo $this->Form->control('electricity', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                echo $this->Form->control('wifi', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                echo $this->Form->control('housekeeping', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                echo $this->Form->control('dth', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                                ?> 
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" name="previous_btn_pricing_details" id="previous_btn_pricing_details" class="btn btn-default">Previous</button>
                                <button type="button" name="btn_pricing_details" id="btn_pricing_details" class="btn btn-info">Next</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="rule_details">
                    <div class="card">
                        <div class="card-header">Rules regarding PG</div>
                        <div class="card-body">
                            <div class="form-group">
                                <?php
                                    echo $this->Form->control('pets', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                                    echo $this->Form->control('smoking', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                                    echo $this->Form->control('alcohal', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                                    echo $this->Form->control('events', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                                    echo $this->Form->control('lateEntry', ['empty' => true,'class'=>'form-control mb-2']);
                                    echo $this->Form->control('others',['class'=>'form-control mb-2']);
                                ?>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" name="previous_btn_rule_details" id="previous_btn_rule_details" class="btn btn-default">Previous</button>
                                <button type="button" name="btn_rule_details" id="btn_rule_details" class="btn btn-info">Next</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="image_details">
                    <div class="card">
                        <div class="card-header">Images</div>
                        <div class="card-body">
                            <div class="form-group">
                                <?php
                                    echo $this->Form->control('image',['class'=>'form-control mb-2']);
                                    //echo $this->Form->control('image',['accept'=>['.jpg,','.jpeg,','.png'],'type'=>'file','class'=>'form-control mb-2','id'=>'file']);
                                ?>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" name="previous_btn_image_details" id="previous_btn_image_details" class="btn btn-default">Previous</button>
                                <button type="button" name="btn_image_details" id="btn_image_details" class="btn btn-info">Submit</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>




<script type="text/javascript">
    $(document).ready(function(){
        $('#btn_pg_details').click(function(){

            var error_name='';
            if ($.trim($('#name').val()).length == 0) {
                error_name='*Name is required';
                $('#error_name').text(error_name);
                $('#name').addClass('has-error');
            }
            else{
                error_name = '';
                $('#error_name').text(error_name);
                $('#name').removeClass('has-error');
            }

            if (error_name != '') {
                return false;
            }
            else{
                $('#list_pg_details').removeClass('active active_tab1');
                $('#list_pg_details').removeAttr('href data-toggle');
                $('#list_pg_details').removeClass('active');
                $('#pg_details').removeClass('active');
                $('#list_pg_details').addClass('inactive_tab1');
                $('#list_address_details').removeClass('inactive_tab1');
                $('#list_address_details').addClass('active_tab1 active');
                $('#list_address_details').attr('href', '#address_details');
                $('#list_address_details').attr('data-toggle', 'tab');
                $('#list_address_details').addClass('active');
                $('#address_details').addClass('active');
            }
        });

        $('#previous_btn_address_details').click(function(){
            $('#list_address_details').removeClass('active active_tab1');
            $('#list_address_details').removeAttr('href data-toggle');
            $('#list_address_details').removeClass('active');
            $('#address_details').removeClass('active');
            $('#list_address_details').addClass('inactive_tab1');
            $('#list_pg_details').removeClass('inactive_tab1');
            $('#list_pg_details').addClass('active_tab1 active');
            $('#list_pg_details').attr('href', '#pg_details');
            $('#list_pg_details').attr('data-toggle', 'tab');
            $('#list_pg_details').addClass('active');
            $('#pg_details').addClass('active');

        });

        $('#btn_address_details').click(function(){
            var error_pincode='';

            if ($.trim($('#pincode').val()).length == 0) {
                error_pincode='*Pincode is required';
                $('#error_pincode').text(error_pincode);
                $('#pincode').addClass('has-error');
            }
            else{
                error_pincode = '';
                $('#error_pincode').text(error_pincode);
                $('#pincode').removeClass('has-error');
            }    

            if (error_pincode != '') {
                return false;
            }
            else{
                $('#list_address_details').removeClass('active active_tab1');
                $('#list_address_details').removeAttr('href data-toggle');
                $('#list_address_details').removeClass('active');
                $('#address_details').removeClass('active');
                $('#list_address_details').addClass('inactive_tab1');
                $('#list_facility_details').removeClass('inactive_tab1');
                $('#list_facility_details').addClass('active_tab1 active');
                $('#list_facility_details').attr('href', '#address_details');
                $('#list_facility_details').attr('data-toggle', 'tab');
                $('#list_facility_details').addClass('active');
                $('#facility_details').addClass('active');
            }
        });

        $('#previous_btn_facility_details').click(function(){
            $('#list_facility_details').removeClass('active active_tab1');
            $('#list_facility_details').removeAttr('href data-toggle');
            $('#list_facility_details').removeClass('active');
            $('#facility_details').removeClass('active');
            $('#list_facility_details').addClass('inactive_tab1');
            $('#list_address_details').removeClass('inactive_tab1');
            $('#list_address_details').addClass('active_tab1 active');
            $('#list_address_details').attr('href', '#pg_details');
            $('#list_address_details').attr('data-toggle', 'tab');
            $('#list_address_details').addClass('active');
            $('#address_details').addClass('active');

        });

        $('#btn_facility_details').click(function(){
                $('#list_facility_details').removeClass('active active_tab1');
                $('#list_facility_details').removeAttr('href data-toggle');
                $('#list_facility_details').removeClass('active');
                $('#facility_details').removeClass('active');
                $('#list_facility_details').addClass('inactive_tab1');
                $('#list_pricing_details').removeClass('inactive_tab1');
                $('#list_pricing_details').addClass('active_tab1 active');
                $('#list_pricing_details').attr('href', '#pricing_details');
                $('#list_pricing_details').attr('data-toggle', 'tab');
                $('#list_pricing_details').addClass('active');
                $('#pricing_details').addClass('active');
        });

        $('#previous_btn_pricing_details').click(function(){
            $('#list_pricing_details').removeClass('active active_tab1');
            $('#list_pricing_details').removeAttr('href data-toggle');
            $('#list_pricing_details').removeClass('active');
            $('#pricing_details').removeClass('active');
            $('#list_pricing_details').addClass('inactive_tab1');
            $('#list_facility_details').removeClass('inactive_tab1');
            $('#list_facility_details').addClass('active_tab1 active');
            $('#list_facility_details').attr('href', '#pg_details');
            $('#list_facility_details').attr('data-toggle', 'tab');
            $('#list_facility_details').addClass('active');
            $('#facility_details').addClass('active');

        });

        $('#btn_pricing_details').click(function(){
                $('#list_pricing_details').removeClass('active active_tab1');
                $('#list_pricing_details').removeAttr('href data-toggle');
                $('#list_pricing_details').removeClass('active');
                $('#pricing_details').removeClass('active');
                $('#list_pricing_details').addClass('inactive_tab1');
                $('#list_rule_details').removeClass('inactive_tab1');
                $('#list_rule_details').addClass('active_tab1 active');
                $('#list_rule_details').attr('href', '#rule_details');
                $('#list_rule_details').attr('data-toggle', 'tab');
                $('#list_rule_details').addClass('active');
                $('#rule_details').addClass('active');
        });

        $('#previous_btn_rule_details').click(function(){
            $('#list_rule_details').removeClass('active active_tab1');
            $('#list_rule_details').removeAttr('href data-toggle');
            $('#list_rule_details').removeClass('active');
            $('#rule_details').removeClass('active');
            $('#list_rule_details').addClass('inactive_tab1');
            $('#list_pricing_details').removeClass('inactive_tab1');
            $('#list_pricing_details').addClass('active_tab1 active');
            $('#list_pricing_details').attr('href', '#pg_details');
            $('#list_pricing_details').attr('data-toggle', 'tab');
            $('#list_pricing_details').addClass('active');
            $('#pricing_details').addClass('active');

        });

        $('#btn_rule_details').click(function(){
                $('#list_rule_details').removeClass('active active_tab1');
                $('#list_rule_details').removeAttr('href data-toggle');
                $('#list_rule_details').removeClass('active');
                $('#rule_details').removeClass('active');
                $('#list_rule_details').addClass('inactive_tab1');
                $('#list_image_details').removeClass('inactive_tab1');
                $('#list_image_details').addClass('active_tab1 active');
                $('#list_image_details').attr('href', '#image_details');
                $('#list_image_details').attr('data-toggle', 'tab');
                $('#list_image_details').addClass('active');
                $('#image_details').addClass('active');    
        });

        $('#previous_btn_image_details').click(function(){
            $('#list_image_details').removeClass('active active_tab1');
            $('#list_image_details').removeAttr('href data-toggle');
            $('#list_image_details').removeClass('active');
            $('#image_details').removeClass('active');
            $('#list_image_details').addClass('inactive_tab1');
            $('#list_rule_details').removeClass('inactive_tab1');
            $('#list_rule_details').addClass('active_tab1 active');
            $('#list_rule_details').attr('href', '#pg_details');
            $('#list_rule_details').attr('data-toggle', 'tab');
            $('#list_rule_details').addClass('active');
            $('#rule_details').addClass('active');

        });

        $('#btn_image_details').click(function(){
                $('#btn_image_details').attr("disabled","disabled");
                $(document).css('cursor','progress');
                $("#register_form").submit();
        });        
    });
</script>