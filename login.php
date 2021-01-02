
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo $url; ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input autocomplete="off" type="text" id="inputName" class="form-control" name="username" placeholder="User Name Anda" required="required" autofocus="autofocus">
              <label for="inputName">User Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <label for="level">Level</label>
              <!-- <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required"> -->
              <select class="form-control" id="level" name="level">
                <option>Pilih :</option>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
              </select>
              
          </div>
          <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
        </form>
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
      </div>
    </div>
  </div>

