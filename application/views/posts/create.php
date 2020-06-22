<section>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Create a Post</div>
          <div class="panel-body">
            <form method="post" accept-charset="utf-8" action="<?php echo site_url('create/post');?>">
              <?php echo validation_errors(); ?>
              <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" class="form-control" name="title" id="post_title" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control" style="text-transform: capitalize;">
                  <?php foreach($categories  as $category): ?>
                    <option value="<?php echo $category->id?>"><?php echo $category->name; ?></option>
                  <?php endforeach; ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Your Story</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
              </div>
              <button  style="float: right;" type="submit" class="btn btn-default">Submit</button>
            </form>
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