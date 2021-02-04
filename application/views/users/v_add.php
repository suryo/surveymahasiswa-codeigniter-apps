<div class="col-md-12">


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Artikel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('users/save_add');?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>username</label>
                    <input name="username" class="form-control" placeholder="username">
                  </div>
                  <div class="form-group">
                    <label>password</label>
                    <input name="password" class="form-control" placeholder="password">
                  </div>
                  <div class="form-group">
                    <label>email</label>
                    <input name="email" class="form-control" placeholder="email">
                  </div>
                  <div class="form-group">
                    <label>fullname</label>
                    <input name="fullname" class="form-control" placeholder="fullname">
                  </div>
                  <div class="form-group">
                    <label>phone</label>
                    <input name="phone" class="form-control" placeholder="phone">
                  </div>
                  <div class="form-group">
                    <label>role</label>
                    <input name="role" class="form-control" placeholder="role">
                  </div>
   
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


</div