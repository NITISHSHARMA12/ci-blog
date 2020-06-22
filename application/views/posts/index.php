<section>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Your Story</div>
          <div class="panel-body">
            <table class="table table-bordered"> 
            	<thead> 
            		<tr> 
            			<th>S.No</th> 
            			<th>Title</th> 
            			<th>Story</th> 
            			<th>Create Date</th> 
            			<th>action</th> 
            		</tr> 
            	</thead> 
            	<?php foreach($posts as $key =>$post):?>
            	<tbody> 
            		<tr> 
            			<th scope="row"><?php echo $key+1;?></th> 
            			<td><?php echo $post->title ;?></td> 
            			<td><?php echo $post->description ;?></td> 
            			<td><?php echo date("d-m-y",strtotime($post->created));?></td> 
            			<td  style="display: inline-flex;">
                    <a href="" class="btn btn-default" type="submit">View</a>
                    <a href="" class="btn btn-default" type="submit">Edit</a>
                    <form>
            				  <a href="<?php echo site_url('view/post/').$post->id?>" class="btn btn-default" type="submit">Delete</a>
                    </form>
            			</td> 
            		</tr> 
            	</tbody>
            	<?php endforeach; ?> 
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="single category">
          <h3 class="side-title">Category</h3>
          <ul class="list-unstyled">
            <?php foreach($categories  as $category): ?>
              <li><a href="<?php echo site_url('category/').$category->id;?>" title=""><?php echo $category->name; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="latest category">
          <h3 class="side-title">Latest Category</h3>
          <ul class="list-unstyled">
            <?php foreach($latests  as $latest): ?>
              <li><a href="<?php echo site_url('category/').$category->id;?>" title=""><?php echo $latest->name; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
</section>