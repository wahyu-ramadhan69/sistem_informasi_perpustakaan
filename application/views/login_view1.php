<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
  <h1 id="message">Selamat Datang</h1><small id="smallMessage"> </small>
  <form action="<?= base_url('login/auth'); ?>" method="POST">
    <div class="field">
      <input id="username" type="username" id="user" name="user" placeholder="Username" autocomplete="off" />
      <label for="username">Username</label>
    </div>
    <div class="field">
      <input id="password" type="password" id="pass" name="pass" placeholder="Password" autocomplete="new-password" />
      <label for="password">Password</label>
    </div>
    <div class="col-xs-4">
      <button type="submit" id="loding" class="btn btn-primary btn-block btn-flat" style="background:#05c46b;border:none;border-radius:10px;"> Sign In </button>
      <div id="loadingcuy"></div>
    </div>
  </form>
  <!-- /.col -->
</div>
</div>
</div>
<!-- /.login-box -->
<!-- Response Ajax -->
<div id="tampilkan"></div>
<p>By signing up, I agree to to the Terms of Service and Privacy Policy</p>
</div>