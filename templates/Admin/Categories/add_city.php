<div class="row justify-content-md-center">
    <div class="col-5">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <div class="form-group">
                <legend><?= __('Add City') ?></legend>
                <div id="result"></div>
                <?= $this->Form->control('parent_id', ['label'=>'State','options' => $parentCategories, 'class'=>'form-control mb-2']); ?>
                <?= $this->Form->control('name',['label'=>'City','class'=>'form-control']); ?>
                <div id="error_name" class="text-danger"></div>
            </div>
                <button type="button" name="btn_submit" id="btn_submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">Submit</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btn_submit').click(function(){
            var error_name='';
            if ($.trim($('#name').val()).length == 0) {
                error_name='*City name is required';
                $('#error_name').html(error_name);
                $('#name').addClass('has-error');
            }
            else{
                error_name = '';
                $('#error_name').html(error_name);
                $('#name').removeClass('has-error');
            }

            if (error_name != '') {
                return false;
            }
            else
            {
                var parent_id=$('#parent-id').val();
                var name=$('#name').val();
                var dataString='parent_id='+parent_id+'&name='+name;
                $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( ['controller' => 'Categories', 'action' => 'add-city' ] ); ?>",
                    data:dataString,
                    success: function( response )
                    {       
                        $( '#result' ).html(response);
                    }
                });
            }
        });
    });
</script>