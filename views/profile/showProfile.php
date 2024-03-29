<section style="background-color: #eee;">
  <div class="container py-5">
    <div style="margin-bottom: 2rem;" class="row justify-content-center align-items-center g-2 mt-10">
          <h1>Profile user</h1>
          
      </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $model->user_firstname; ?></h5>
            
            <p class="text-muted mb-4"><?php echo $model->user_address; ?></p>
            <div class="d-flex justify-content-center mb-2">
              <a href="/profile/editProfile" style="margin-right: 2%;"> <button class="btn btn-primary">Update Profile</button></a> 
              <a href="/user-order"style="margin-left: 2%;"> <button class="btn btn-primary">Đơn hàng</button></a>     
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="text-muted mb-0">First Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $model->user_firstname; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $model->user_lastname; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $model->user_email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $model->user_phone ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $model->user_address; ?></p>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
