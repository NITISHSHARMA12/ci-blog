
    <section>
      <div class="container">
         <div class="col-md-6 col-md-offset-2">
          <p class="bg-primary" style="padding-top: 3px; padding-bottom: 3px; padding-left: 10px;"> Login Here </p>
          <form method="post" accept-charset="utf-8" action="<?php echo site_url('/login');?>">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <?php if (form_error('email') === ''): ?>
              <?php else: ?>
                <div class="alert alert-danger" role="alert">
                  <h3> <?php echo form_error('email'); ?></h3>
                </div>
            <?php endif; ?>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="pwd" id="password" placeholder="Password">
            </div>
            <?php if (form_error('pwd') === ''): ?>
              <?php else: ?>
                <div class="alert alert-danger" role="alert">
                  <h3> <?php echo form_error('pwd'); ?></h3>
                </div>
            <?php endif; ?>
           
           
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </section>
