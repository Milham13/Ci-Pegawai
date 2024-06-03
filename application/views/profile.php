<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-square"
                       src="<?php echo base_url()?>assets/foto/iam.jpeg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Muhamad ilham</h3>

                <p class="text-muted text-center">About Me</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <p>Mau tau aja apa mau tau banget?</p>
                  </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <h3 class="card-title">About Me</h3>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                  <li class="list-group-item">
                    <strong><i class="fas fa-book mr-1"></i>Pendidikan</strong>
                    <p class="text-muted">S1 Teknik Informatika</p>
                  </li>
                  <li class="list-group-item">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Home</strong>
                    <p class="text-muted">Kuningan barat, Jakarta selatan</p>
                  </li>
                  <li class="list-group-item">
                    <strong><i class="far fa-file-alt mr-1"></i>MyContact</strong>
                    <p class="text-muted">
                      <ul>
                        <li>Email: milham1382002@gmail.com</li>
                        <li>No.Telp: 08584593356</li>
                      </ul>
                    </p>
                  </li>
                  <li class="list-group-item">
                  <strong><i class="fas fa-pencil-alt mr-1"></i>skills</strong>
                  <p class="text-muted">
                    <ul>
                      <li>Photoshop</li>
                      <li>Adobe Ilustrator</li>
                      <li>Adobe Audition</li>
                      <li>Ms Word</li>
                    </ul>
                  </p>
                  </li>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
