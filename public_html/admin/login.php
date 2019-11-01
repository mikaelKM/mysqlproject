<div class="card border-primary mb-3" style="max-width: auto">
  <div class="card-header border-primary">
    LOG IN AS ADMIN
  </div>
  <div class="card-body">
    <h3 class="card-title"></h3>
    <form method="POST" action="/admin/admin_main.php">
    
    <div class="form-group">
    <label for="Email">Username</label>
    <input type="text" name="username" class="form-control" id="Email" aria-describedby="emailHelp" value="Admin" disabled="disabled">
    <small id="emailHelp" class="form-text text-muted"><!--We'll never share your email with anyone else.--></small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" id="password1" placeholder="Password" reuired>
  </div>
  <button type="submit" class="btn btn-primary" name='login'>Submit</button>
  </form>
  </div>
  <div class="card-footer text-muted border-primary">
   welcome
  </div>
</div>