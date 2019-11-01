


<div class="card border-primary mb-3" style="max-width: auto">
  <div class="card-header border-primary">
    LOG IN AS USER
  </div>
  <div class="card-body">
    <h3 class="card-title"></h3>
    <form method="POST" action="/users/user_main.php">
    
    <div class="form-group">
    <label for="Email">Username</label>
    <input type="Text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter enter username" required>
    <small id="emailHelp" class="form-text text-muted"><!--We'll never share your email with anyone else.--></small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" id="password1" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-primary" name="login">Log In</button>
  </form>
  </div>
  <div class="card-footer text-muted border-primary">
   welcome
  </div>
</div>



