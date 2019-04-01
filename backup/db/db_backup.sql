#
# TABLE STRUCTURE FOR: tb_dokumen
#

DROP TABLE IF EXISTS `tb_dokumen`;

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kegiatan` varchar(30) NOT NULL,
  `nama` varchar(201) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `file` varchar(201) NOT NULL,
  `pagu` int(11) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

INSERT INTO `tb_dokumen` (`id_dokumen`, `kode_kegiatan`, `nama`, `tanggal`, `tahun`, `file`, `pagu`, `anggaran`, `keterangan`) VALUES ('49', '2234', 'kegiatan wisuda', '2018-09-27', '2018', 'ai_2.rar', '40000000', '35000000', '-');
INSERT INTO `tb_dokumen` (`id_dokumen`, `kode_kegiatan`, `nama`, `tanggal`, `tahun`, `file`, `pagu`, `anggaran`, `keterangan`) VALUES ('50', '223', 'laporan kegiatan', '2018-09-27', '2018', 'Compress_21-06-2013_pram-software.rar', '42500000', '42000000', '-');
INSERT INTO `tb_dokumen` (`id_dokumen`, `kode_kegiatan`, `nama`, `tanggal`, `tahun`, `file`, `pagu`, `anggaran`, `keterangan`) VALUES ('51', '11', 'kegiatan 1', '2018-09-27', '2018', '_www_gigapurbalingga_com__Driver_Booster_2.rar', '800000', '540000', '-');
INSERT INTO `tb_dokumen` (`id_dokumen`, `kode_kegiatan`, `nama`, `tanggal`, `tahun`, `file`, `pagu`, `anggaran`, `keterangan`) VALUES ('52', '222', '222', '2018-09-27', '2018', 'BAGAS31_Sublime_Text_3_(64-bit).zip', '3000000', '2800000', '-');


#
# TABLE STRUCTURE FOR: tb_user
#

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lvl_user` enum('admin','operator') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `lvl_user`) VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');


