<div class="categories index content">
    <h3><?= __('Cities') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name',['label'=>'City']) ?></th>
                    <th><?= $this->Paginator->sort('parent_id',['label'=>'city']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr id="<?=$category->id?>">
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td id="cityname<?=$category->id?>"><?= h($category->name) ?></td>
                    <td id="cityparent<?=$category->id?>"><?= h($category->parent_category->name) ?></td>
                    <td class="actions">
                        <!-- Modal button -->
                        <?= $this->Form->button('Edit',['class'=>'btn btn-outline-success btn-rounded mr-2','data-toggle'=>'modal','data-target'=>"#exampleModal$category->id"]) ?>
                        <?php echo "<button onclick='remove($category->id);' class='btn btn-outline-danger btn-rounded mr-2' id='remove$category->id'>Remove</button>"; ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $category->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div id="result<?=$category->id?>"></div>
                                <?= $this->Form->create() ?>
                                    <div class="form-group">
                                        <?= $this->Form->control('name',['class'=>'form-control mb-2','id'=>'name'.$category->id,'value'=>$category->name]); ?>
                                        <div class="text-danger" id="error_name<?=$category->id?>" ></div>
                                        <?= $this->Form->control('parent_id', ['options' => $parentCategories,'id'=>'parent'.$category->id,'class'=>'form-control mb-2','default'=>$category->parent_category->id]); ?>
                                        <div class="text-md-center">
                                            <button onclick="edit(<?=$category->id?>);" class='btn btn-outline-success btn-rounded mr-2 edit'>Submit</button>
                        
                                        </div>
                                    </div>
                                <?= $this->Form->end() ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

<script type="text/javascript">
    function remove(categoryid)
    {
        if (!confirm("Do you want to remove this city")){
        return false;
        }
        else
        {  
            var dataString='id='+categoryid;
            $.ajax({
                method: 'post',
                url : "<?php echo $this->Url->build( ['controller' => 'Categories', 'action' => 'delete' ] ); ?>",
                data:dataString,
                success: function( response )
                {    
                    $('#result').html(response);
                    $('#'+categoryid).remove();
                }
            });   
        }        
    }
    function edit(categoryid)
    {
        if ($.trim($('#name'+categoryid).val()).length !=0) {
            $('#error_name'+categoryid).html('');
            var categoryname=$('#name'+categoryid).val();
            var parentcategoryid=$('#parent'+categoryid).val();
            var dataString='id='+categoryid+'&name='+categoryname+'&parent_id='+parentcategoryid ;
            $.ajax({
                method: 'post',
                url : "<?php echo $this->Url->build( ['controller' => 'Categories', 'action' => 'edit' ] ); ?>",
                data:dataString,
                success: function( response )
                {    
                    $('#result'+categoryid).html(response);
                    $('#cityname'+categoryid).html(categoryname);

                }
            });
        } 
        else{
            $('#name'+categoryid).addClass('has-error');
            $('#result'+categoryid).html('');
            $('#error_name'+categoryid).html('*City name required!');
        }         
    }
    $('.edit').click(function(){
            return false;
        });
</script>