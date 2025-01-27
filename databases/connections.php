<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'spp_english';

try {

    $connect = mysqli_connect($host, $username, $password, $db_name);

    $create_table = [
        "CREATE TABLE IF NOT EXISTS `spp`(
            id_spp INT(11) AUTO_INCREMENT NOT NULL,
            tahun INT(11)  NULL,
            nominal INT(11) NULL,
            PRIMARY KEY (id_spp)
        )",

        "CREATE TABLE IF NOT EXISTS `kelas`(
            id_kelas INT(11) AUTO_INCREMENT NOT NULL,
            nama_kelas VARCHAR(10) NULL,
            kompetensi_keahlian VARCHAR(50) NULL,
            PRIMARY KEY (id_kelas)
        )",

        "CREATE TABLE IF NOT EXISTS `siswa`(
	        id_siswa INT(11)  AUTO_INCREMENT NOT NULL,
	        nisn CHAR(10) NULL,
	        nis CHAR(8) NULL,
	        nama VARCHAR(50)  NULL,
	        alamat text,
	        no_telp VARCHAR(13),
            id_spp INT DEFAULT NULL,
            id_kelas INT DEFAULT NULL,
            KEY id_spp (`id_spp`),
            KEY id_kelas (`id_kelas`),
            FOREIGN KEY (id_spp) REFERENCES spp(id_spp) ON DELETE SET NULL ON UPDATE CASCADE,
            FOREIGN KEY (id_kelas) REFERENCES kelas(id_kelas) ON DELETE SET NULL ON UPDATE CASCADE,
            PRIMARY KEY (id_siswa)
        )",

        "CREATE TABLE IF NOT EXISTS `petugas`(
            id_petugas INT(11) AUTO_INCREMENT NOT NULL,
            username VARCHAR(25) NULL,
            password varchar(32) NULL,
            nama_petugas VARCHAR(35) NULL,
            level enum('admin','petugas'),
            PRIMARY KEY (id_petugas)
        )",

        "CREATE TABLE IF NOT EXISTS `pembayaran`(
            id_pembayaran INT(11) AUTO_INCREMENT NOT NULL,
            nisn VARCHAR(10) NULL,
            tgl_bayar date,
            bulan_bayar VARCHAR(25) NULL,
            tahun_bayar VARCHAR(4) NULL,
            jumlah_bayar INT(11) NULL,
            id_spp INT(11) DEFAULT NULL,
            id_siswa INT(11) DEFAULT NULL,
            id_petugas INT(11) DEFAULT NULL,
            KEY id_spp (`id_spp`),
            KEY id_siswa (`id_siswa`),
            KEY id_petugas (`id_petugas`),
            FOREIGN KEY (id_spp) REFERENCES spp(id_spp) ON DELETE SET NULL ON UPDATE CASCADE,
            FOREIGN KEY (id_siswa) REFERENCES siswa(id_siswa) ON DELETE SET NULL ON UPDATE CASCADE,
            FOREIGN KEY (id_petugas) REFERENCES petugas(id_petugas) ON DELETE SET NULL ON UPDATE CASCADE,
            PRIMARY KEY (id_pembayaran)
        )"
    ];

    foreach ($create_table as $table) {
        try {
            $connect->execute_query($table);
            // echo "tabel berhasil di create\n";
        } catch (\Throwable $e) {
            die("error is " . $e);
        }
    }



    $connect = null;
} catch (\Throwable $th) {
    die("ERROR IS " . $th);
}
