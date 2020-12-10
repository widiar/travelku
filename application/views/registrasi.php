<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registrasi Travelku</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/datepicker.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.css') ?>">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Registrasi User</h1>
                  </div>
                  <form class="user" method="post" action="<?= base_url('user/registrasi') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap..." value="<?= set_value('nama') ?>">
                      <?= form_error('nama', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="email" placeholder="Alamat Email..." value="<?= set_value('email') ?>">
                      <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="tLahir" name="tLahir" placeholder="Tanggal Lahir..." value="<?= set_value('tLahir') ?>">
                      <?= form_error('tLahir', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <!-- <label for="">Alamat</label> -->
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Lengkap..." value="<?= set_value('alamat') ?>">
                      <?= form_error('alamat', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="provinsi" class="selectpicker provinsi" data-live-search="true" required title="Provinsi" data-size="7">
                          <?php foreach($provinsi as $prov) : ?>
                          <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <select name="kabupaten" class="selectpicker kabupaten" id="kabupaten" data-live-search="true" required title="Kabupaten" data-size="7">
                          <option value=""></option>
                        </select>
                      </div>                      
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="kecamatan" class="selectpicker kecamatan" id="kecamatan" data-live-search="true" required title="Kecamatan" data-size="7">
                          <option value=""></option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <select name="kelurahan" class="selectpicker kelurahan" id="kelurahan" data-live-search="true" required title="Kelurahan" data-size="7">
                          <option value=""></option>
                        </select>
                      </div>                      
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                      </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" name="password2" placeholder="Ulangi Password">
                        </div>
                        <?= form_error('password', '<small class="text-danger ml-4">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Registrasi
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('user/login') ?>">Sudah punya akun? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/js/bootstrap-select.js') ?>"></script>
  <script src="<?= base_url('assets/js/select/defaults-id_ID.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/datepicker.js') ?>"></script>
  
    <script>
        $('#tLahir').datepicker({
            autoHide: true,
            format: 'yyyy-mm-dd'
        });
        // $(document).ready(function(){
            $(".provinsi").change(function () {
                var id = $(this).val();
                var urel = "<?= base_url('user/alamat/') ?>kabupaten";
                $.ajax({
                    type : "post",
                    url : urel,
                    dataType : "html",
                    data : "id_provinsi=" + id,
                    success : function(msg){
                        $("#kabupaten").html(msg).selectpicker('refresh');
                        $(".kabupaten").selectpicker('refresh');
                        ambildatakecamatan();
                    }
                });
            });
            $("#kabupaten").change(ambildatakecamatan);
            function ambildatakecamatan(){
              var idkb = $("#kabupaten").val();
              var urelkc = "<?= base_url('user/alamat/') ?>kecamatan";
              $.ajax({
                type : "post",
                url : urelkc,
                dataType : "html",
                data : "id_kabupaten=" + idkb,
                success : function(msg){
                  $("#kecamatan").html(msg).selectpicker('refresh');
                  $("select.kecamatan").selectpicker('refresh');
                  ambildatakelurahan();
                }
              });
            }
            $("#kecamatan").change(ambildatakelurahan);
            function ambildatakelurahan(){
              var idkc = $("#kecamatan").val();
              var urlkl = "<?= base_url('user/alamat/') ?>kelurahan";
              $.ajax({
                type : 'post',
                url : urlkl,
                dataType : 'html',
                data : "id_kecamatan=" + idkc,
                success : function(msg){
                  $("#kelurahan").html(msg).selectpicker('refresh');
                  $("select.kelurahan").selectpicker('refresh');
                }
              });
            }
        // });
    </script>

</body>

</html>
