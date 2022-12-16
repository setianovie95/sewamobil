<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>Transaksi Selesai</h1>
        </div>
    </section>


    <?php foreach ($transaksi as $tr ) : ?>
    <form method="POST" action="<?php echo base_url('rental/transaksi/transaksi_selesai_aksi') ?>">
        <input type="hidden" name="id_rental" value="<?php echo $tr->id_rental ?>">
        <input type="hidden" name="id_mobil" value="<?php echo $tr->id_mobil ?>">

        <input type="hidden" name="tanggal_kembali" value="<?php echo $tr->tanggal_kembali ?>">
        <input type="hidden" name="denda" value="<?php echo $tr->denda ?>">
        <div class="form-group">
            <label>Tanggal Pengembalian</label>
            <input type="date" name="tanggal_pengembalian" class="form-control"
                value="<?php echo $tr->tanggal_pengembalian ?>">
        </div>

        <div class="form-group">
            <label>Status Pengembalian</label>
            <select name="status_pengembalian" class="form-control">
                <option value="<?php echo $tr->status_pengembalian ?>"><?php echo $tr->status_pengembalian ?></option>
                <option value="<?php 
					if ($tr->status_pengembalian == "Kembali"){
						echo "Belum Kembali";
					} else {
						echo "Kembali";
					}
					?>"><?php 
					if ($tr->status_pengembalian == "Kembali"){
						echo "Belum Kembali";
					} else {
						echo "Kembali";
					}
					?></option>
            </select>
        </div>

        <div class="form-group">
            <label>Status Rental</label>
            <select name="status_rental" class="form-control">
                <option value="<?php echo $tr->status_rental ?>"><?php echo $tr->status_rental ?></option>
                <option value="<?php 
					if ($tr->status_rental == "Selesai"){
						echo "Belum Selesai";
					} else {
						echo "Selesai";
					}
					?>"><?php 
					if ($tr->status_rental == "Selesai"){
						echo "Belum Selesai";
					} else {
						echo "Selesai";
					}
					?></option>
            </select>
        </div>

        <!--Menu denda, jika ada denda maka muncul formnya-->

        <?php 
			if ($tr->total_denda > 0){
                ?>

        <input type="hidden" name="tanggal_denda" value="<?php echo date("Y-m-d"); ?>">
        <div class="form-group">
            <label>Status Denda</label>
            <select name="status_denda" class="form-control">
                <option value="<?php 
					if ($tr->status_denda == "0"){
						echo "0";
					} else {
						echo "1";
					}
					?>"><?php 
					if ($tr->status_denda == "0"){
						echo "Belum Lunas";
					} else {
						echo "Lunas";
					}
					?></option>
                <option value="<?php 
					if ($tr->status_denda !== "0"){
						echo "0";
					} else {
						echo "1";
					}
					?>"><?php 
					if ($tr->status_denda !== "0"){
						echo "Belum Lunas";
					} else {
						echo "Lunas";
					}
					?></option>
            </select>
        </div>
        <?php
            }else{
            }?>

        <button type="submit" class="btn btn-success">Submit</button>

    </form>
    <?php endforeach; ?>

</div>