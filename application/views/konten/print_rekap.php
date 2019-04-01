<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	table tr td { padding: 7px 5px; font-size: 10px; border:1px solid black;}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
		border:1px solid black;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	table tr td { padding: 7px 5px; font-size: 10px; border:1px solid black;}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
		padding: 8px 0;
		border:1px solid black;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Cetak Rekapitulasi Dokumen Laporan Keuangan</title>
</head>

<body onload="window.print()">
	<center>
		<h3 style="letter-spacing: 2;">INSTITUT AGAMA ISLAM NEGERI BENGKULU</h3><br>
	REKAPITULASI DOKUMEN LAPORAN KEUANGAN<br>
	dari tanggal <b><?php echo date('d-m-Y', strtotime($tgl_start))."</b> sampai dengan tanggal <b>".date('d-m-Y', strtotime($tgl_end))."</b>"; ?>
	</center><br>
	
	<table>
		<thead>
			<tr>
				<th width="">No</td>
				<th width="10%">Tanggal Dokumen</td>
				<th width="">Kode Kegiatan</td>
				<th width="">Nama Kegiatan</td>
				<th width="">Tahun Kegiatan</td>
				<th width="">Keterangan</td>
				<th width="" colspan="2">Pagu</td>
				<th width="" colspan="2">Realisasi</td>
				<th width="" colspan="2">Sisa Pagu Anggaran</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (!empty($data)) {
				$no = 0;
				$totalpagu = 0;
				$totalanggaran = 0;
				$totalsisa = 0;

				foreach ($data as $d) {
					$no++;
			?>
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td align="center"><?php echo date('d-m-Y',strtotime($d->tanggal)); ?></td>
				<td align="center"><?php echo $d->kode_kegiatan; ?></td>
				<td><?php echo $d->nama; ?></td>
				<td align="center"><?php echo $d->tahun; ?></td>
				<td align="center"><?php echo $d->keterangan; ?></td>
				<td style="border-right-color: transparent;">RP. </td>
				<td align="right"><?php echo number_format($d->pagu,2,',','.'); ?></td>
				<td style="border-right-color: transparent;">RP. </td>
				<td align="right"><?php echo number_format($d->anggaran,2,',','.'); ?></td>
				<td style="border-right-color: transparent;">RP. </td>
				<td align="right">
					<?php
						$sisa = $d->pagu - $d->anggaran;
						echo number_format($sisa,2,',','.'); ?>
				</td>
				<?php 
					$totalpagu = $totalpagu+=$d->pagu;
					$totalanggaran = $totalanggaran+=$d->anggaran;
					$totalsisa = $totalsisa+=$sisa;
				?>
			</tr>
				
			<?php } ?>

			<tr>
				<td colspan="6" align="center"><span style="font-size: 15px;font-weight: 600;">TOTAL</span></td>
				<td style="border-right-color: transparent;"><span style="font-size: 15px;font-weight: 600;">RP.</span></td>
				<td align="right"><span style="font-size: 15px;font-weight: 600;"><?php echo number_format($totalpagu,2,',','.'); ?></span></td>
				<td style="border-right-color: transparent;"><span style="font-size: 15px;font-weight: 600;">RP.</span></td>
				<td align="right"><span style="font-size: 15px;font-weight: 600;"><?php echo number_format($totalanggaran,2,',','.'); ?></span></td>
				<td style="border-right-color: transparent;"><span style="font-size: 15px;font-weight: 600;">RP.</span></td>
				<td align="right"><span style="font-size: 15px;font-weight: 600;"><?php echo number_format($totalsisa,2,',','.'); ?></span></td>
			</tr>
			<?php } else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>

