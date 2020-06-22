
    <section>
      <div class="container">
        <div class="col-md-6 col-md-offset-2">
          <p class="bg-primary" style="padding-top: 3px; padding-bottom: 3px; padding-left: 10px;"> Registration Here </p>
          <form method="post" accept-charset="utf-8" action="<?php echo site_url('register');?>">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
            <?php if (form_error('name') === ''): ?>
              <?php else: ?>
                <div class="alert alert-danger" role="alert">
                  <h3> <?php echo form_error('name'); ?></h3>
                </div>
            <?php endif; ?>

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

            <div class="form-group">
              <label for="cpassword">Password</label>
              <input type="password" class="form-control" name="cpwd" id="cpassword" placeholder="Confirm Password">

            </div>
            <?php if (form_error('cpwd') === ''): ?>
              <?php else: ?>
                <div class="alert alert-danger" role="alert">
                  <h3> <?php echo form_error('cpwd'); ?></h3>
                </div>
            <?php endif; ?>
         
           
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </section>
