<?php

// Define $tgl1 and $tgl2
$tgla = isset($user->tgl_bergabung) ? $user->tgl_bergabung : '';
$tglk = isset($user->tgl_lahir) ? $user->tgl_lahir : '';
$bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
);

$tgl1 = '';
if (!empty($tgla)) {
    $array1 = explode("-", $tgla);
    $tahun = $array1[0];
    $bulan1 = $array1[1];
    $hari = $array1[2];
    $bl1 = $bulan[$bulan1];
    $tgl1 = $hari . ' ' . $bl1 . ' ' . $tahun;
}

$tgl2 = '';
if (!empty($tglk)) {
    $array2 = explode("-", $tglk);
    $tahun2 = $array2[0];
    $bulan2 = $array2[1];
    $hari2 = $array2[2];
    $bl2 = $bulan[$bulan2];
    $tgl2 = $hari2 . ' ' . $bl2 . ' ' . $tahun2;
}

// Check user type based on 'level' column
$jenis_pengguna = isset($user->level) ? $user->level : 'anggota';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <title><?= $title_web; ?></title>
    <style>
        body {
            background: rgba(0, 0, 0, 0.2);
        }

        .card {
            width: 11cm; /* Standard ID card width */
            height: 6cm; /* Standard ID card height */
            display: block;
            margin: 2cm auto 0 auto; /* Add top margin to lower the card */
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            padding: 0.5cm;
        }

        .panel-body {
            padding: 10px;
            text-align: center;
            color: black;
        }

        .panel-body h4 {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .panel-body table {
            width: 100%;
            font-size: 12px;
            text-align: left;
        }

        .panel-body td {
            padding: 2px;
            color: black;
            vertical-align: top;
        }

        .profile-image {
            width: 2cm; /* Set image width */
            height: 2.5cm; /* Set image height */
            margin-top: 10px;
        }

        .left-corner-button {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .right-corner-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        @media print {
            body,
            .card {
                margin: 0;
                box-shadow: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-corner-button">
            <button type="button" class="btn btn-primary btn-md" onclick="location.href='<?php echo base_url(); ?>user'">
                <i class="fa fa-arrow-left"></i> Back to daftar data user
            </button>
        </div>
        <div class="right-corner-button">
            <button type="button" class="btn btn-success btn-md" onclick="printDiv('printableArea')">
                <i class="fa fa-print"> </i> Print File
            </button>
        </div>
    </div>
    <br />
    <div id="printableArea">
        <div class="card">
            <div class="panel panel-default">
                <div class="panel-body bg-primary">
                    <h4 class="text-center">
                        <?php if ($jenis_pengguna == 'Petugas'): ?>
                            KARTU PETUGAS PERPUSTAKAAN
                        <?php else: ?>
                            KARTU ANGGOTA PERPUSTAKAAN
                        <?php endif; ?>
                    </h4>
                    <br />
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $user->foto; ?>" class="profile-image img-responsive">
                        </div>
                        <div class="col-sm-8">
                            <table>
                                <tr>
                                    <td style="width: 30%;">Nama</td>
                                    <td style="width: 5%;">:</td>
                                    <td style="width: 65%;"><?= isset($user->nama) ? $user->nama : ''; ?></td>
                                </tr>
                                <tr>
                                    <td>TTL</td>
                                    <td>:</td>
                                    <td><?= isset($user->tempat_lahir) ? $user->tempat_lahir : ''; ?>, <?= $tgl2; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= isset($user->alamat) ? $user->alamat : ''; ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl Bergabung</td>
                                    <td>:</td>
                                    <td><?= $tgl1; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

</html>
