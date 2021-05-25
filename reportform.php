<?php

  require "koneksi1.php";
  require_once ("dompdf/autoload.inc.php");
  use Dompdf\Dompdf;

  $dompdf = new Dompdf();
  $sql = mysqli_query($koneksi, "SELECT * FROM formulir_peserta");
  $html = '<center><h3>Daftar Nama Siswa Pendaftaran</h3></center><hr/><br/>';
  $html .= '<table border="1" width="100%">
  <tr>
  <th>Id Peserta</th>
  <th>Jenis Daftar</th>
  <th>Tanggal Masuk</th>
  <th>NIS</th>
  <th>Nomor Peserta</th>
  <th>PAUD</th>
  <th>TK</th>
  <th>Nomor SKHUN</th>
  <th>Nomor Ijazah</th>
  <th>Hobi</th>
  <th>Cita-Cita</th>
  <th>Nama Lengkap</th>
  <th>Jenis Kelamin</th>
  <th>NISN</th>
  <th>NIK</th>
  <th>Tempat Lahir</th>
  <th>Tanggal Lahir</th>
  <th>Agama</th>
  <th>Khusus</th>
  <th>Alamat</th>
  <th>RT</th>
  <th>RW</th>
  <th>Dusun</th>
  <th>Kelurahan</th>
  <th>Kecamatan</th>
  <th>Kode Pos</th>
  <th>Tempat Tinggal</th>
  <th>Moda Transportasi</th>
  <th>Nomor HP</th>
  <th>Nomor Telepon</th>
  <th>Email Pribadi</th>
  <th>Penerima KPS/PKH/KIP</th>
  <th>Nomor KPS/PKH/KIP</th>
  <th>Kewarganegaraan</th>
  </tr>';

  $no = 1;
  while ($row = mysqli_fetch_array($sql)) {
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['jenis_daftar']."</td>
    <td>".$row['tanggal_masuk']."</td>
    <td>".$row['NIS']."</td>
    <td>".$row['nomor_peserta']."</td>
    <td>".$row['PAUD']."</td>
    <td>".$row['TK']."</td>
    <td>".$row['nomor_SKHUN']."</td>
    <td>".$row['nomor_ijazah']."</td>
    <td>".$row['hobi']."</td>
    <td>".$row['cita_cita']."</td>
    <td>".$row['nama_lengkap']."</td>
    <td>".$row['jenis_kelamin']."</td>
    <td>".$row['NISN']."</td>
    <td>".$row['NIK']."</td>
    <td>".$row['tempat_lahir']."</td>
    <td>".$row['tgl_lahir']."</td>
    <td>".$row['agama']."</td>
    <td>".$row['khusus']."</td>
    <td>".$row['alamat']."</td>
    <td>".$row['RT']."</td>
    <td>".$row['RW']."</td>
    <td>".$row['dusun']."</td>
    <td>".$row['kelurahan']."</td>
    <td>".$row['kecamatan']."</td>
    <td>".$row['kode_pos']."</td>
    <td>".$row['tempat_tinggal']."</td>
    <td>".$row['transportasi']."</td>
    <td>".$row['nomor_hp']."</td>
    <td>".$row['nomor_telepon']."</td>
    <td>".$row['email_pribadi']."</td>
    <td>".$row['penerima_KPS']."</td>
    <td>".$row['nomor_KPS']."</td>
    <td>".$row['kwn']."</td>
    </tr>";
    $no++;
  }

  $html .= "</html>";
  $dompdf ->loadHtml($html);

  // Setting Ukuran dan orientasi kertas
  $dompdf ->setPaper('A1','landscape');

  // Rendering dari HTMl ke PDF
  $dompdf ->render();

  // Melakukan output file PDF
  $dompdf ->stream('laporan_pendaftaran.pdf');

?>