<h2>Administrator</h2>

<form id="tambah" name="tambah" method="post" action="<?php echo base_url()?>index.php/admin/simpanPassword">
<fieldset>
		<legend>Ubah Password</legend>
		<ul>
			<li>
				<label for="pwd1" style="width:220px;">Masukkan password lama anda</label>
				<input id="pass_lama" name="pass_lama" class="required" type="password" size="30" />
			</li>
			<li>
				<label for="pwd2" style="width:220px">Masukkan password baru</label>
				<input id="pass1" name="pass1" class="required" type="password" size="30" />
			</li>
			<li>
				<label for="pwd2" style="width:220px">Ketik Ulang password baru</label>
				<input id="pass2" name="pass2" class="required" type="password" size="30" />
			</li>
		</ul>
		</fieldset>
		<fieldset class="button">
		<center>
			<input name="submit" class="btn" type="submit" value="Submit" />
			<input  name="reset" class="btn" type="reset" value="Reset" />
		</center>
		</fieldset>
</form>
<p>&nbsp;</p>
<?php
if(isset($err_code)){
	if($err_code==1) echo '<script type="text/javascript">alert("Password lama tidak sama")</script>';
	else if($err_code==2) echo '<script type="text/javascript">alert("Password baru tidak sama")</script>';
	$this->session->unset_userdata('err_code');
}
?>
