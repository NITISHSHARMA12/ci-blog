<section>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <?php foreach($posts  as $key => $post): ?>
        <div class="well">
          <div class="media">
            <p><?php echo substr($post->name, 0, 1)?></p>
            <a class="pull-left" href="#">
            <img class="media-object" src="http://placekitten.com/150/150">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><?php echo $post->title;?></h4>
              <p class="text-right">By <?php echo $post->name;?></p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
               Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.  Aliquam in felis sit amet augue...<a href="" class="read_more">Read More</a></p>
              <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i><?php echo date("jS F, Y",strtotime($post->created));?></span> ||</li>

              <?php if ($this->session->has_userdata('isUserLoggedIn')): ?>
                <?php if($post->self): ?>
                  <!-- <li>
                    <form method="post" action="<?php echo site_url('delete/like');?>">
                      <div class="form-group">
                        <input name="user_id" type="hidden" class="form-control" value="<?php echo $this->session->user_id;?>">
                        <input name="post_id" type="hidden" value="<?php echo $post->id ?>" class="form-control" type="hidden"placeholder="comments">
                      </div>
                      <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="<?php echo $post->like_str.' '.$post->self ?>"><i class="glyphicon glyphicon-thumbs-up" style="padding-right: 2px;"></i>unlike</button>
                    </form>
                  </li> -->

                <?php else :?>
                   <li>
                    <form method="post" action="<?php echo site_url('like');?>">
                      <div class="form-group">
                        <input name="user_id" type="hidden" class="form-control" value="<?php echo $this->session->user_id;?>">
                        <input name="post_id" type="hidden" value="<?php echo $post->id ?>" class="form-control" type="hidden"placeholder="comments">
                      </div>
                      <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="<?php echo $post->like_str.' '.$post->self ?>"><i class="glyphicon glyphicon-thumbs-up" style="padding-right: 2px;"></i>like</button>
                    </form>
                  </li>

                <?php endif; ?>

                <?php endif; ?>
                  <li><span><?php echo $post->like_str ?></span> ||</li>
                
                <li>
                  <button class="comment-button"  value="txt-<?php echo $post->id ?>" ><i class="glyphicon glyphicon-comment"></i> Comment</button>
                </li>
              </ul>

              <div  id="txt-<?php echo $post->id ?>" hidden>
              <hr style="border-top: 3px double #8c8b8b;"></hr>
              <ul class="media-list">
                <?php foreach ($post->comments as $comment):?>
                <li class="media">
                  <!-- <div class="media-left">
                    <a href="#">
                      <img class="media-object"  alt="ns">
                    </a>
                  </div> -->

                  <div class="media-body">
                    <h4 class="media-heading" style="text-transform: capitalize;"><?php echo $comment->name?></h4>
                    <p style="padding-left: 10px;"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> 
                      <?php echo $comment->comment?></p>
                  </div>
                </li>
                <?php endforeach; ?>
               
              </ul>
              <?php if ($this->session->has_userdata('isUserLoggedIn')): ?>
                <form method="post" action="<?php echo site_url('comments');?>">
                  <div class="form-group">
                     <label>Write Something</label>
                    <textarea class="form-control"  name="comment"class="form-control" placeholder="comments"rows="3"></textarea>
                    <input name="post_id" value="<?php echo $post->id ?>" class="form-control" type="hidden"placeholder="comments">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>

              <?php else :?>

              <?php endif; ?>
              </div>

           </div>
        </div>
      </div>
      <?php endforeach; ?>
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




