<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-plus" style="color:green"> </i> <?= $title_web; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
      <li class="active"><i class="fa fa-plus"></i>&nbsp; <?= $title_web; ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
          </div>
          <div class="box-body">
            <form action="<?php echo base_url('transaksi/prosespinjam'); ?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-5">
                  <table class="table table-striped">
                    <tr style="background:yellowgreen">
                      <td colspan="3">Data Transaksi</td>
                    </tr>
                    <tr>
                      <td>No Peminjaman</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nopinjam" value="<?= $nop; ?>" readonly class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>Tgl Peminjaman</td>
                      <td>:</td>
                      <td>
                        <input type="date" value="<?= date('Y-m-d'); ?>" name="tgl" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td>ID Anggota</td>
                      <td>:</td>
                      <td>
                        <div class="input-group">
                          <input type="text" class="form-control" required autocomplete="off" name="anggota_id" id="search-box" placeholder="Contoh ID Anggota : AG001" value="<?= $anggota_id; ?>" <?= $level == 'Anggota' ? 'readonly' : ''; ?>>
                          <?php if ($level != 'Anggota') : ?>
                            <span class="input-group-btn">
                              <a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search"></i></a>
                            </span>
                          <?php endif; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Biodata</td>
                      <td>:</td>
                      <td>
                        <div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
                        <div id="result"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>Lama Peminjaman</td>
                      <td>:</td>
                      <td>
                        <input type="number" required placeholder="Lama Pinjam Contoh : 2 Hari (2)" name="lama" class="form-control">
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-7">
                  <table class="table table-striped">
                    <tr style="background:yellowgreen">
                      <td colspan="3">Pinjam Buku</td>
                    </tr>
                    <tr>
                      <td>Kode Buku</td>
                      <td>:</td>
                      <td>
                        <div class="input-group">
                          <input type="text" class="form-control" autocomplete="off" name="buku_id" id="buku-search" placeholder="Contoh ID Buku : BK001" value="">
                          <span class="input-group-btn">
                            <a data-toggle="modal" data-target="#TableBuku" class="btn btn-primary"><i class="fa fa-search"></i></a>
                          </span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Data Buku</td>
                      <td>:</td>
                      <td>
                        <div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
                        <div id="result_buku"></div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="pull-right">
                <input type="hidden" name="tambah" value="tambah">
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-md">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal Buku -->
<div class="modal fade" id="TableBuku">
  <div class="modal-dialog" style="width:80%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Buku</h4>
      </div>
      <div id="modal_body" class="modal-body fileSelection1">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>ISBN</th>
              <th>Title</th>
              <th>Penerbit</th>
              <th>Tahun Buku</th>
              <th>Stok Buku</th>
              <th>Tanggal Masuk</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($buku->result_array() as $isi) { ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $isi['isbn']; ?></td>
                <td><?= $isi['title']; ?></td>
                <td><?= $isi['penerbit']; ?></td>
                <td><?= $isi['thn_buku']; ?></td>
                <td><?= $isi['jml']; ?></td>
                <td><?= $isi['tgl_masuk']; ?></td>
                <td style="width:17%">
                  <button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['buku_id']; ?>">
                    <i class="fa fa-check"> </i> Pilih
                  </button>
                  <a href="<?= base_url('data/bukudetail/' . $isi['id_buku']); ?>" target="_blank">
                    <button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
                </td>
              </tr>
            <?php $no++;
            } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Anggota -->
<div class="modal fade" id="TableAnggota">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Anggota</h4>
      </div>
      <div id="modal_body" class="modal-body fileSelection1">
        <table id="example3" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Jenkel</th>
              <th>Telepon</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($user as $isi) {
              if ($isi['level'] == 'Anggota') {
            ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $isi['anggota_id']; ?></td>
                  <td><?= $isi['nama']; ?></td>
                  <td><?= $isi['jenkel']; ?></td>
                  <td><?= $isi['telepon']; ?></td>
                  <td><?= $isi['level']; ?></td>
                  <td style="width:20%;">
                    <button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['anggota_id']; ?>">
                      <i class="fa fa-check"> </i> Pilih
                    </button>
                  </td>
                </tr>
            <?php $no++;
              }
            } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    // Fungsi untuk memuat data anggota berdasarkan ID anggota
    function loadAnggotaData(kode_anggota) {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('transaksi/result'); ?>",
        data: { kode_anggota: kode_anggota },
        beforeSend: function () {
          $("#result").html("");
          $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
        },
        success: function (html) {
          $("#result").html(html);
          $("#result_tunggu").html('');
        }
      });
    }

    // Panggil fungsi loadAnggotaData saat halaman dimuat jika search-box sudah memiliki nilai
    if ($('#search-box').val()) {
      loadAnggotaData($('#search-box').val());
    }

    // Panggil fungsi loadAnggotaData saat input di search-box berubah
    $("#search-box").on("change", function () {
      loadAnggotaData($(this).val());
    });

    // Panggil fungsi loadAnggotaData saat tombol Pilih di modal anggota diklik
    $(".fileSelection1 #Select_File1").click(function (e) {
      var anggota_id = $(this).attr("data_id");
      document.getElementsByName('anggota_id')[0].value = anggota_id;
      $('#TableAnggota').modal('hide');
      loadAnggotaData(anggota_id);
    });

    // Fungsi untuk memuat data buku berdasarkan ID buku
    function loadBukuData(kode_buku) {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('transaksi/buku'); ?>",
        data: { kode_buku: kode_buku },
        beforeSend: function () {
          $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
        },
        success: function (html) {
          $("#result_buku").load("<?= base_url('transaksi/buku_list'); ?>");
          $("#result_tunggu_buku").html('');
        }
      });
    }

    // Panggil fungsi loadBukuData saat input di buku-search berubah
    $("#buku-search").keyup(function () {
      loadBukuData($(this).val());
    });

    // Panggil fungsi loadBukuData saat tombol Pilih di modal buku diklik
    $(".fileSelection1 #Select_File2").click(function (e) {
      var buku_id = $(this).attr("data_id");
      document.getElementsByName('buku_id')[0].value = buku_id;
      $('#TableBuku').modal('hide');
      loadBukuData(buku_id);
    });
  });
</script>
