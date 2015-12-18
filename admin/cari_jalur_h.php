<h2><span>Hasil Pencarian Jalur</span></h2>
<div class="clr"></div>
<?php
$start = $_POST['dari'];
$finish = $_POST['menuju'];

$awal = microtime(true);
	
$query_jalur = mysql_query("select * from jalur order by id_angkot");
while($view_jalur=mysql_fetch_array($query_jalur))
{
	$jalur[$view_jalur['id_angkot']][$view_jalur['no_urut']]	= $view_jalur['nama_jalan'];
}


$query_jalan = mysql_query("select * from jalan order by id_jalan");
while($view_jalan=mysql_fetch_array($query_jalan))
{
	$jalan_rute[$view_jalan['id_jalan']]['nama_jalan']	= $view_jalan['nama_jalan'];
	$jalan_rute[$view_jalan['id_jalan']]['jarak']		= $view_jalan['jarak'];
}

$query_angkot = mysql_query("select * from angkot order by id_angkot");
while($view_angkot=mysql_fetch_array($query_angkot))
{
	$angkot_rute[$view_angkot['id_angkot']]['nama_angkot']	= $view_angkot['nama_angkot'];
	$angkot_rute[$view_angkot['id_angkot']]['tarif']		= $view_angkot['tarif_angkot'];
}

//STRAT DAN FINISH KALAU SAMA
if($start==$finish)
{
	foreach($jalur as $angkot=>$urut)
	{
		foreach($urut as $i=>$jalurnya)
		{
			//CARI START
			if($start==$jalurnya)
			{
				$ketemu_start[$angkot][$i]	= $jalurnya;
			}
		}
	}
	if(!empty($ketemu_start))
	{
		echo "<h2>Jalur '".$jalan_rute[$start]['nama_jalan']."'</h2>";
		foreach($ketemu_start as $angkot=>$urutannya)
		{
			$posisi=1;
			foreach($urutannya as $urut=>$jalurnya)
			{
				echo "<h2>Alternatif $posisi</h2>";
				echo "<b>Naik Angkot ".$angkot_rute[$angkot]['nama_angkot'].'</b><br>';
				echo 'Jarak : '.$jalan_rute[$jalurnya]['jarak'].' Km <br>';
				echo 'Biaya : Rp. '.$angkot_rute[$angkot]['tarif'];
				echo "<hr />";
				$posisi++;
			}
		}
	}
}else{
	
	//echo '<pre>';
	//print_r($jalur);
	
	function cari_start($jalur, $start)
	{
		foreach($jalur as $angkot=>$urut)
		{
			foreach($urut as $i=>$jalurnya)
			{
				//CARI START
				if($start==$jalurnya)
				{
					$ketemu_start[$angkot][$i]	= $jalurnya;
					//$ketemu_start_key[$angkot][$i]	= $jalurnya;
				}
			}
		}
		return $ketemu_start;
	}
	function cari_finish($jalur, $finish)
	{
		foreach($jalur as $angkot=>$urut)
		{
			foreach($urut as $i=>$jalurnya)
			{
				//CARI FINISH
				if($finish==$jalurnya)
				{
					$ketemu_finish[$angkot][$i]	= $jalurnya;
					//$ketemu_finish_key[$angkot][$i]	= $jalurnya;
				}
			}
		}
		return $ketemu_finish;
	}
	
	
	//PENGECUALIAN JALUR
	function pengecualian_jalur($ketemu_finish)
	{
		foreach($ketemu_finish as $angkot=>$urutan)
		{
			$pengecualian[$angkot]	= $angkot;
		}
		return $pengecualian;
	}
	
	//CARI PELUANG DARI FINISH
	function cari_peluang_dari_finish($ketemu_finish, $jalur)
	{
		foreach($ketemu_finish as $angkot=>$urut)
		{
			$posisi = key($urut);
			//PERULANGAN SETIAP KESEMPATAN
			foreach($jalur[$angkot] as $urutan=>$jalur_kesempatan)
			{
				//TEMPATKAN YANG BUKAN FINISH
				if($urutan != $posisi)
				{
					$peluang[$angkot][$urutan] = $jalur_kesempatan;
				}
			}
		}
		return $peluang;	
	}
	
	//CARI SEMUA PELUANG YANG ADA
	function cari_peluang_all($peluang_pertama, $jalur, $kecuali_jalur, $start)
	{
		$peluang = array();
		foreach($peluang_pertama as $angkot=>$urut)
		{
			foreach($urut as $urutan_peluang=>$jalur_peluang)
			{
				//PERULANGAN SETIAP KESEMPATAN
				foreach($jalur as $angkot_kesempatan=>$urutan_kesempatan)
				{
					foreach($urutan_kesempatan as $urutan=>$jalur_kesempatan)
					{
						//TEMPATKAN YANG BUKAN FINISH DAN TERMASUK DALAM START
						if($urutan != $urutan_peluang && !in_array($angkot_kesempatan, $kecuali_jalur) && !empty($start[$angkot_kesempatan]))
						{
							$peluang[$angkot][$angkot_kesempatan][$urutan] = $jalur_kesempatan;
						}
					}
				}
			}
		}
		return $peluang;	
	}
	
	//============================================================================================
	
	//JIKA START - FINISH BEDA JALUR
	
	$peluang = cari_peluang_dari_finish(cari_finish($jalur, $finish), $jalur);
	$peluang_all = cari_peluang_all($peluang, $jalur, pengecualian_jalur(cari_finish($jalur, $finish)), cari_start($jalur, $start));
	
	//print_r($peluang_all);
	
	//print_r($peluang);
	
	//echo array_search("J7", $peluang["A3"]);
	
	if(!empty($peluang_all))
	{
		foreach($peluang_all as $angkot_1=>$angkot_2)
		{
			foreach($angkot_2 as $angkot=>$urutan)
			{
				foreach($urutan as $urut=>$jalurnya)
				{
					//CEK ADA DI PELUANG PERTAMA/TIDAK
					foreach($peluang as $angkot_peluang=>$peluangnya)
					{
						//echo $jalurnya.'=>'.$angkot_peluang.'><br>';
						if(isset($peluang[$angkot_peluang]))
						{
							$cari = array_search($jalurnya, $peluang[$angkot_peluang]);
							//echo $cari.'='.$jalurnya.'=>'.$angkot.'><br>';
							if($cari>0)
							{
								$urut_peluang = array_search($jalurnya, $jalur[$angkot_peluang]);
								$peluang_berikut[$angkot_peluang][$angkot][$urut] 		= $jalurnya;
								$peluang_posisi[$angkot_peluang][$urut_peluang]     = $jalurnya;
							}
						}
					}
				}
			}
		}
		
		//echo '<pre>';
		///print_r($peluang_berikut);
		//echo '</pre>';
		
		// PROSES BERIKUTNYA
		foreach($peluang_berikut as $angkot_1=>$angkot_2)
		{
			foreach($angkot_2 as $angkot=>$urutan)
			{
				foreach($urutan as $urut=>$jalurnya)
				{
					//CEK ADA START
					$cari_start = cari_start($jalur, $start);
					$angkot_finish =  key(cari_finish($jalur, $finish));
					echo '<pre>';
					//print_r($jalurnya);
					echo '</pre>';
					foreach($cari_start as $angkot_start=>$urutan_start)
					{
						$cari = array_search($jalurnya, $jalur[$angkot_start]);
						//echo $cari.'='.$jalurnya.'<br>';
						if($cari>0 && $angkot_start!=$angkot_finish)
						{
							//echo $cari.'='.$jalurnya.'=>'.$angkot_start.'<br>';
							$ketemu[$angkot_1][$angkot_start][$cari] = $jalurnya;
						}
					}
				}
			}
		}
	}
	
	//print_r($peluang_berikut);
	//print_r($ketemu);
	
	//JIKA SUDAH KETEMU
	if(!empty($ketemu))
	{
		foreach($ketemu as $angkot=>$urut)
		{
			ksort($ketemu[$angkot], SORT_NUMERIC);
		}
		
		echo '<pre>';
		//print_r($ketemu);
		echo '</pre>';
		
		$posisi_angkot=1;
		foreach($ketemu as $angkot_finish=>$angkot_start)
		{
			foreach($angkot_start as $angkot=>$urut)
			{
				$posisi_ketemu=1;
				foreach($urut as $posisi=>$jalurnya)
				{
					$ktm = $angkot;
					$ktf = $angkot_finish; // INI PERLU PERULANGAN LAGI ????
					
					//print_r($angkot_finish);
					
					//START
					$ktm_s	= key($ketemu[$angkot_finish][$ktm]);	
					$ktm_f	= $posisi;
					
					//FINISH
					$ktf_s	= array_search($jalur[$ktm][$ktm_f], $jalur[$ktf]);
					$ktf_f	= key($peluang_posisi[$ktf]);
					
					//echo $jalur[$ktm][$ktm_f];
					//echo '<br>'.$ktf_s."->".$jalur[$ktm][$ktm_f].'='.$ktf;
					
					if(1)
					{
						
						$strart_s = array_search($start, $jalur[$ktm]);
						$finish_s = array_search($finish, $jalur[$ktf]);
						
						//echo '<br>'.$jalur[$ktm][$ktm_f].'=>'.$ktf_s."->";
			
						//JML DATA JALUR START
						$ktm_jml = count($jalur[$ktm]);
						//JML DATA JALUR FINISH
						$ktf_jml = count($jalur[$ktf]);
						
						
						//echo $ktm_s.'=>'.$strart_s.'<br>';
						
						//START AWAL
						if($strart_s>$ktm_f)
						{
							for($i=$strart_s; $i<=$ktm_jml; $i++)
							{
								$jalur_akhir[$posisi_angkot][$posisi_ketemu][$ktm][] = $i;
							}
							for($i=1; $i<=$ktm_s; $i++)
							{
								$jalur_akhir[$posisi_angkot][$posisi_ketemu][$ktm][] = $i;
							}
						}else{
							for($i=$strart_s; $i<=$ktm_f; $i++)
							{
								$jalur_akhir[$posisi_angkot][$posisi_ketemu][$ktm][] = $i;
							}
						}
						//FINISH
						
						if($ktf_s>$finish_s)
						{
							for($i=$ktf_s; $i<=$ktf_jml; $i++)
							{
								$jalur_akhir[$posisi_angkot][$posisi_ketemu][$ktf][] = $i;
							}
							for($i=1; $i<=$finish_s; $i++)
							{
								$jalur_akhir[$posisi_angkot][$posisi_ketemu][$ktf][] = $i;
							}
						}else{
							for($i=$ktf_s; $i<=$finish_s; $i++)
							{
								$jalur_akhir[$posisi_angkot][$posisi_ketemu][$ktf][] = $i;
							}
						}
					}
				$posisi_ketemu++;
				}
			$posisi_angkot++;
			}
		}
		
		//echo '<pre>';
		//print_r($jalur_akhir);
		//echo '</pre>';
		//TAMPILKAN YANG KETEMU
		
		foreach($jalur_akhir as $posisi_angkot=>$angkot_array1)
		{
			foreach($angkot_array1 as $i=>$angkot_array)
			{
				$k=1;
				foreach($angkot_array as $angkot=>$urutan)
				{
					if($k==1)
					{
						//echo "<br >";
						$angkotnya[$i] = $angkot;
						//echo "Naik Angkot ".$angkot_rute[$angkotnya[$i]]['nama_angkot']." : <br />";
						$jalur_finish[$i][]= "naik";
						$jalur_finish[$i][]= $angkotnya[$i];
						foreach($urutan as $j=>$urutannya)
						{
							if($j==0)
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish[$i][]= $jalur[$angkot][$urutannya];
							}
							else if($j>0 && $urutan[$j] != $urutan[$j-1])
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish[$i][]= $jalur[$angkot][$urutannya];
							}
						}
					}else{
						//echo "<br />Pindah Naik Angkot ".$angkot_rute[$angkot]['nama_angkot']." : <br />";
						$jalur_finish[$i][]= "pindah";
						$jalur_finish[$i][]= $angkot;
						foreach($urutan as $j=>$urutannya)
						{
							if($j==0)
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish[$i][]= $jalur[$angkot][$urutannya];
							}
							else if($j>0 && $urutan[$j] != $urutan[$j-1])
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish[$i][]= $jalur[$angkot][$urutannya];
							}
						}
					}
				$k++;
				}
			}
		}
		//JALUR FINISH
		if(!empty($jalur_finish))
		{
		
			$alternatif = 0;
			foreach($jalur_finish as $kesempatan=>$urutan)
			{
				foreach($urutan as $i=>$jalan)
				{
					//JIKA NAIK
					if($jalan=='naik')
					{
						$alternatif++;
						$jalan_alternatif[$alternatif]['naik']	= $urutan[$i+1];
						@$angkot_alternatif_jarak[$alternatif] += $angkot_rute[$urutan[$i+1]]['tarif'];
						@$alternatif_jalan[$alternatif] 		.= "<b>Naik Angkot ".$angkot_rute[$urutan[$i+1]]['nama_angkot']." : </b><br />";
					}else if($jalan=='pindah'){
						$jalan_alternatif[$alternatif]['pindah'] = $urutan[$i+1];
						@$angkot_alternatif_jarak[$alternatif] += $angkot_rute[$urutan[$i+1]]['tarif'];
						@$alternatif_jalan[$alternatif] 		.= "<br /><b>Pindah Naik Angkot ".$angkot_rute[$urutan[$i+1]]['nama_angkot']." : </b><br />";
						//$alternatif++;
					}else if(isset($urutan[$i+1])){
						if($urutan[$i+1]!='naik' && $urutan[$i+1]!='pindah')
						{
							$jalan_alternatif[$alternatif][]		= $urutan[$i+1];
							@$jalan_alternatif_jarak[$alternatif]	+= $jalan_rute[$urutan[$i+1]]['jarak'];
							@$alternatif_jalan[$alternatif] 		.=" -> ".$jalan_rute[$urutan[$i+1]]['nama_jalan'];
						}
					}else{
						//$jalan_alternatif[$alternatif][] = $urutan[$i];
					}
				}
			}
			
			//print_r($angkot_rute);
			//print_r($peluang_berikut);
			//print_r($jalan_alternatif);
			//print_r($jalan_alternatif_jarak);
			//print_r($angkot_alternatif_jarak);
			//print_r($alternatif_jalan);
		}
		
	}
	
	//============================================================================================
	
	//JIKA START - FINISH SATU JALUR
	
	if(!empty($peluang))
	{
		foreach($peluang as $angkot=>$urutannya)
		{
			foreach($urutannya as $urutan=>$jalurnya)
			{
				//Start ada di finish
				if($start==$jalurnya)
				{
					$ketemu2[$angkot][$urutan] = $jalurnya;
				}
			}
		}
	}
	//JIKA SUDAH KETEMU
	if(isset($ketemu2))
	{
		$posisi_angkot=1;
		foreach($ketemu2 as $angkot=>$urut)
		{
			$posisi_ketemu=1;
			foreach($urut as $posisi=>$jalurnya)
			{
				$ktm = $angkot;
				$ktf = $angkot;
				
				//START
				$ktm_s	= key($ketemu2[$ktm]);	
				$ktm_f	= $posisi;
				
				//FINISH
				$ktf_s	= array_search($jalur[$ktm][$ktm_f], $jalur[$ktf]);
				//$ktf_f	= key($peluang_posisi[$ktf]);
				$ktf_f	= $angkot;
				
				if(1)
				{
					
					$strart_s = array_search($start, $jalur[$ktm]);
					$finish_s = array_search($finish, $jalur[$ktf]);
					
					//echo '<br>'.$jalur[$ktm][$ktm_f].'=>'.$ktf_s."->";
		
					//JML DATA JALUR START
					$ktm_jml = count($jalur[$ktm]);
					//JML DATA JALUR FINISH
					$ktf_jml = count($jalur[$ktf]);
					
					
					//echo $ktm_s.'=>'.$strart_s.'<br>';
					
					//START AWAL
					if($strart_s>$ktm_f)
					{
						for($i=$strart_s; $i<=$ktm_jml; $i++)
						{
							$jalur_akhir2[$posisi_angkot][$posisi_ketemu][$ktm][] = $i;
						}
						for($i=1; $i<=$ktm_s; $i++)
						{
							$jalur_akhir2[$posisi_angkot][$posisi_ketemu][$ktm][] = $i;
						}
					}else{
						for($i=$strart_s; $i<=$ktm_f; $i++)
						{
							$jalur_akhir2[$posisi_angkot][$posisi_ketemu][$ktm][] = $i;
						}
					}
					//FINISH
					
					if($ktf_s>$finish_s)
					{
						for($i=$ktf_s; $i<=$ktf_jml; $i++)
						{
							$jalur_akhir2[$posisi_angkot][$posisi_ketemu][$ktf][] = $i;
						}
						for($i=1; $i<=$finish_s; $i++)
						{
							$jalur_akhir2[$posisi_angkot][$posisi_ketemu][$ktf][] = $i;
						}
					}else{
						for($i=$ktf_s; $i<=$finish_s; $i++)
						{
							$jalur_akhir2[$posisi_angkot][$posisi_ketemu][$ktf][] = $i;
						}
					}
				}
			$posisi_ketemu++;
			}
		$posisi_angkot++;
		}
		
		//print_r($jalur_akhir);
		//TAMPILKAN YANG KETEMU
		
		foreach($jalur_akhir2 as $posisi_angkot=>$angkot_array1)
		{
			foreach($angkot_array1 as $i=>$angkot_array)
			{
				$k=1;
				foreach($angkot_array as $angkot=>$urutan)
				{
					if($k==1)
					{
						//echo "<br >";
						$angkotnya[$i] = $angkot;
						//echo "Naik Angkot ".$angkot_rute[$angkotnya[$i]]['nama_angkot']." : <br />";
						$jalur_finish2[$i][]= "naik";
						$jalur_finish2[$i][]= $angkotnya[$i];
						foreach($urutan as $j=>$urutannya)
						{
							if($j==0)
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish2[$i][]= $jalur[$angkot][$urutannya];
							}
							else if($j>0 && $urutan[$j] != $urutan[$j-1])
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish2[$i][]= $jalur[$angkot][$urutannya];
							}
						}
					}else{
						//echo "<br />Pindah Naik Angkot ".$angkot_rute[$angkot]['nama_angkot']." : <br />";
						$jalur_finish2[$i][]= "pindah";
						$jalur_finish2[$i][]= $angkot;
						foreach($urutan as $j=>$urutannya)
						{
							if($j==0)
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish2[$i][]= $jalur[$angkot][$urutannya];
							}
							else if($j>0 && $urutan[$j] != $urutan[$j-1])
							{
								//echo " -> ".$jalan_rute[$jalur[$angkot][$urutannya]]['nama_jalan'];
								$jalur_finish2[$i][]= $jalur[$angkot][$urutannya];
							}
						}
					}
				$k++;
				}
			}
		}
		//JALUR FINISH
		
		if(!empty($jalur_finish2))
		{
			$alternatif = (!empty($alternatif_jalan))?count($alternatif_jalan)+1:0;
	
			foreach($jalur_finish2 as $kesempatan=>$urutan)
			{
				foreach($urutan as $i=>$jalan)
				{
					//JIKA NAIK
					if($jalan=='naik')
					{
						$alternatif++;
						$jalan_alternatif[$alternatif]['naik']	= $urutan[$i+1];
						@$angkot_alternatif_jarak[$alternatif] += $angkot_rute[$urutan[$i+1]]['tarif'];
						@$alternatif_jalan[$alternatif] 		.= "<b>Naik Angkot ".$angkot_rute[$urutan[$i+1]]['nama_angkot']." : </b><br />";
					}else if($jalan=='pindah'){
						$jalan_alternatif[$alternatif]['pindah'] = $urutan[$i+1];
						@$angkot_alternatif_jarak[$alternatif] += $angkot_rute[$urutan[$i+1]]['tarif'];
						@$alternatif_jalan[$alternatif] 		.= "<br /><b>Pindah Naik Angkot ".$angkot_rute[$urutan[$i+1]]['nama_angkot']." : </b><br />";
						//$alternatif++;
					}else if(isset($urutan[$i+1])){
						if($urutan[$i+1]!='naik' && $urutan[$i+1]!='pindah')
						{
							$jalan_alternatif[$alternatif][]		= $urutan[$i+1];
							@$jalan_alternatif_jarak[$alternatif]	+= $jalan_rute[$urutan[$i+1]]['jarak'];
							@$alternatif_jalan[$alternatif] 		.=" -> ".$jalan_rute[$urutan[$i+1]]['nama_jalan'];
						}
					}else{
						//$jalan_alternatif[$alternatif][] = $urutan[$i];
					}
				}
			}
			
			//print_r($angkot_rute);
			//print_r($peluang_berikut);
			//print_r($jalan_alternatif);
			//print_r($jalan_alternatif_jarak);
			//print_r($angkot_alternatif_jarak);
			//print_r($alternatif_jalan);
		}
		
	}
	/*print_r($alternatif_jalan);
	if(!empty($alternatif_jalan))
	{
		foreach($alternatif_jalan as $i=>$alurnya){
			//echo $alurnya;
			//echo "<hr />";
			//echo "<br />";
		}
	}*/
	//kalau ketemu
	//print_r($jalan_alternatif_jarak);
	//print_r($angkot_alternatif_jarak);
	//echo count($peluang_berikut);
	//print_r($jalur_finish);
	//print_r($akhirnya);
	echo '<hr />';
	if(isset($_POST['jenis']))
	{
		$jenis = $_POST['jenis'];
		if($jenis == 'termurah')
		{
			$termurah = min($angkot_alternatif_jarak);
			foreach($angkot_alternatif_jarak as $i=>$biaya)
			{
				if($biaya==$termurah)
				{
					$angkot_termurah[$i]=$biaya;
				}
			}
			//TAMPILKAN JALURNYA
			echo "<h2>Jalur Termurah Dari '".$jalan_rute[$start]['nama_jalan']."' Menuju '".$jalan_rute[$finish]['nama_jalan']."'</h2>";
			$posisi=1;
			foreach($angkot_termurah as $i=>$biaya)
			{
				echo "<h2>Alternatif $posisi</h2>";
				echo $alternatif_jalan[$i].'<br>';
				echo 'Biaya : Rp. '.$angkot_alternatif_jarak[$i].'<br>';
				echo 'Jarak : '.$jalan_alternatif_jarak[$i].' Km';
				echo "<hr />";
				$posisi++;
			}
		}else if($jenis == 'terdekat'){
			$terdekat = min($jalan_alternatif_jarak);
			foreach($jalan_alternatif_jarak as $i=>$jarak)
			{
				if($jarak==$terdekat)
				{
					$angkot_terdekat[$i]=$jarak;
				}
			}
			//TAMPILKAN JALURNYA
			echo "<h2>Jalur Terpendek Dari '".$jalan_rute[$start]['nama_jalan']."' Menuju '".$jalan_rute[$finish]['nama_jalan']."'</h2>";
			$posisi=1;
			foreach($angkot_terdekat as $i=>$jarak)
			{
				echo "<h2>Alternatif $posisi</h2>";
				echo $alternatif_jalan[$i].'<br>';
				echo 'Jarak : '.$jalan_alternatif_jarak[$i].' Km <br>';
				echo 'Biaya : Rp. '.$angkot_alternatif_jarak[$i];
				echo "<hr />";
				$posisi++;
			}
		}else if($jenis=='lain'){
			//TAMPILKAN JALURNYA
			echo "<h2>Jalur Lain Dari '".$jalan_rute[$start]['nama_jalan']."' Menuju '".$jalan_rute[$finish]['nama_jalan']."'</h2>";
			$posisi=1;
			foreach($jalan_alternatif_jarak as $i=>$jarak)
			{
				echo "<h2>Alternatif $posisi</h2>";
				echo $alternatif_jalan[$i].'<br>';
				echo 'Jarak : '.$jalan_alternatif_jarak[$i].' Km <br>';
				echo 'Biaya : Rp. '.$angkot_alternatif_jarak[$i];
				echo "<hr />";
				$posisi++;
			}
		}
	}
	//print_r($peluang_2);
	//echo '<hr />';
	//print_r($jalur_akhir);
	//echo '<hr />';
	$akhir = microtime(true);
	$lama = $akhir - $awal;
	echo "Lama eksekusi pencarian jalur adalah: ".$lama." detik";
	
	//print_r($bukan_start_finish);
	//echo '</pre>';
}
?>