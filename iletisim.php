<?php

	if($_POST){
		if(trim($_POST['isim']) && trim($_POST['kategori']) && trim($_POST['mail']) && trim($_POST['mesaj'])){
			
			if($_POST['kategori'] == "genel")
			{
				$kategori = "Genel";
			}
			else if($_POST['kategori'] == "sikayet")
			{
				$kategori = "Şikayet";
			}
			else if($_POST['kategori'] == "dilek")
			{
				$kategori = "Dilek";
			}
			else
			{
				$kategori = "Genel";
			}
			
					$isim = $_POST['isim'];
					$mail = $_POST['mail'];
					$mesaj = $_POST['mesaj'];
			
			$dosya = fopen("mesajlar.txt","a");
			if($dosya){
				$veri = '
					İsim : '.$isim.' \t\t Mail : '.$mail.' \t\t Kategori : '.$kategori.' \t\t Mesaj : '.$mesaj.' \n \n
				';
				$yaz = fwrite($dosya,$veri);
				if($yaz){
					echo '<font style="color: green;">İleti başarıyla gönderildi.</font>';
				}else{
					die('Veri yazılırken bir hata meydana geldi.<br><h2>Kullandığınız veriler : </h2><br>İsim : '.$_POST['isim'].'<br>Mail : '.$_POST['mail'].'<br>Kategori : '.$kategori.'<br>Mesaj : '.$_POST['mesaj']);
				}
			}else{
				die('Veri gönderilirken bir hata meydana geldi.<br><h2>Kullandığınız veriler : </h2><br>İsim : '.$_POST['isim'].'<br>Mail : '.$_POST['mail'].'<br>Kategori : '.$kategori.'<br>Mesaj : '.$_POST['mesaj']);
			}
			
			
		}else{
			echo "Boş alan bırakmayınız.";
			header("Refresh: 2; url=index.php");
		}
	}else{
		echo '
			<form action="" method="POST">
				<table>
					<tr>
						<td>Adınız - Soyadınız : <font style="color: red">*</font></td>
						<td><input type="text" name="isim"></td>
					</tr>
					<tr>
						<td>Kategori : <font style="color: red">*</font></td>
						<td><select name="kategori">
							<option name="genel" selected>Genel</option>
							<option name="sikayet">Şikayet</option>
							<option name="dilek">Dilek</option>
						</select></td>
					</tr>
					<tr>
						<td>Mail : <font style="color: red">*</font></td>
						<td><input type="text" name="mail"></td>
					</tr>
					<tr>
						<td>Mesaj : <font style="color: red">*</font></td>
						<td><textarea name="mesaj"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Gönder"></td>
					</tr>
				</table>
			</form>
		';
	}

?>
