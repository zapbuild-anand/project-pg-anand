<style>
.container {
  position: relative;
  width: 25%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  cursor: pointer;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>


<div class="row mt-3">
    <div class="col">
        <?php 
            foreach ($images as $image) {
                echo '<div class="container d-inline-block">';
                    echo $this->Html->image($image->image, ['class'=>'image','style'=>'width:290px;height:190px;','alt' => 'CakePHP']);
                    echo '<a href="/images/edit-image/'.$image->id.'">';
                        echo '<div class="middle">';
                        echo '<div class="text">Cilck here to change</div>';
                        echo '</div>';
                    echo '</a>';
                echo '</div>';
            }
        ?>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <div class="float-left">
            <?= $this->Html->link(__('Back'), ['controller'=>'pgs','action' => 'edit',$id], ['class'=>'btn btn-outline-info btn-rounded mr-2']) ?>
        </div>
        <div>
            <?= $this->Html->link(__('Add new'), ['controller'=>'images','action' => 'add',$id], ['class'=>'btn btn-outline-info btn-rounded mr-2']) ?>
        </div>
    </div>
</div>
