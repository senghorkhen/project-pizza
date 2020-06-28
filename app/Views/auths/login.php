<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  <div class="auth__header">
    <div class="auth__logo">
      <img height="90" src="images/logo.svg" alt="">
    </div>
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="viewPizza" method="post">
      <div class="auth__form_body">
        <h3 class="auth__form_title">Peperoni App</h3>
        <hr>
        <?php if(session()->get('success')) :?>
          <div class="alert alert-success" role="alert">
           <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?= set_value('email') ?>">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>">
          </div>
          <?php if(isset($validation)): ?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors(); ?>
            </div>
          </div>
          <?php endif; ?>
          <br>
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <a href="/signup" class="small text-uppercase">
            CREATE ACCOUNT
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>