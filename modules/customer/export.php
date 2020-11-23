<?php 
/* panggil file database.php untuk koneksi ke database */
require_once "../../config/database.php";




// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Datatiket.xls"');
header('Cache-Control: max-age=0');


?>
<table border='1'>
            <!-- tampilan tabel header -->
            <thead>
								<tr>
								<th class='center'>No</th>
								
									
									<th class='center'>Create Date</th>
									<th class='center'>AS Support</th>
									<th class='center'>Corporate Name</th>
									<th class='center'>Product</th>
									<th class='center'>Case</th>
									
									<th class='center'>Comment</th>
									<th class='center'>Ticket Status</th>
									
								
								<!--<th class='center'>Action</th>-->
									
									
									
									
								</tr>
							</thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
		
			error_reporting(0);
            $no = 1;
			 
			   //$created_user = $_SESSION['id_user'];
	
            
            // fungsi query untuk menampilkan data dari tabel project
			
            $query = mysqli_query($mysqli, "SELECT a.`createuser`,a.`status_tiket`,b.`corporate`,e.`username`,c.`productname`,d.`casename`,a.`komentar`,a.`dokumen`

							FROM `is_tiket` AS a
							INNER JOIN  is_corporate AS b
							ON a.`corporateid`=b.`id`
							INNER JOIN is_product AS c
							ON a.`productid`=c.`idproduk`
							INNER JOIN is_case AS d
							ON a.`problemid`=d.`idcase`
							INNER JOIN is_users AS e
							ON a.`create_user`=e.`id_user`
							
							GROUP BY a.`idtiket`
							order by idtiket DESC ")
												or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
			 //$harga1=number_format($data['pospaid'],0,",",".");
			
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                        
						
              
                       <td>$data[created_user]</td>
                      
					  <td>$data[username]</td>
					  <td>$data[corporate]</td>
					  
					  <td>$data[productname]</td>
					  <td>$data[casename]</td>
					  
					  <td>$data[komentar]</td>
					  
					  <td>$data[status_tiket]</td>
					 
                      
					  
					
					 
					 
					
					  
					  
                    ";
            ?>
                         
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
			  
			  $total1= $total1 + $data[pospaid];
			  $total2= $total2 + $data[prepaid];
			  $total3= $total3 + $data[pos_rev];
			  $total4= $total4 + $data[pre_rev];
			  $total5= $total5 + $data[jml1];
			  $total6= $total6 + $data[jml2];
            }
            ?>
            </tbody>
			
          </table>
		  