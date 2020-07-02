<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  <div class="auth__header">
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="/register" method="post">
      <div class="auth__form_body">
        <h3 class="auth__form_title">
        <img src="images/logo.svg" alt="" width="50">
        Peperoni App
        </h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="text" class="form-control" placeholder="Enter email" name = "email">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" placeholder="Password" name = "password">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Address</label>
            <textarea class="form-control" placeholder="Address" name = "address"></textarea>
          </div>
          <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name = "checkUser"value="1">I'm a manager
            </label>
        </div>
        <!-- alert message error if form empty -->
        <?php if(isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <a href="/signin" class="small text-uppercase">
            SIGN IN INSTEAD
          </a>
        </div>
      </div>

    </form>
 
</div>
<?= $this->endSection() ?>