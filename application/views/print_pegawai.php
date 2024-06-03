<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$print_pegawai;?></title>
    <style>
         #table{
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #table td, #table th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #table tr:nth-child(even){
            background-color: #f2f2f2;
        }
        #table tr:hover{
            background-color: #ddd;
        }
        #table th{
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>DAFTAR PEGAWAI</h1>
    <table id="table">
        <thead>
            <tr>
                <th>no</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($pegawai as $pgw) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $pgw->nip ?></td>
                    <td><?php echo $pgw->nama ?></td>
                    <td><?php echo $pgw->tgl_lahir ?></td>
                    <td><?php echo $pgw->alamat ?></td>
                    <td><?php echo $pgw->no_telp ?></td>
                    <td><img src="<?php echo base_url()?>assets/foto/<?php echo $pgw->foto;?>" width="90" height="100" alt=""></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>