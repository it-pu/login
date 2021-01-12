<link href="<?php echo base_url(); ?>assets/mdb/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/mdb/css/mdb.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/mdb/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/mdb/js/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#contnet").html();
            var printWindow = window.open('', '', 'height=1600,width=1300');
            // printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script> -->
<style type="text/css">
	body {
        background: #eaeaea;
    }
	.card{
		border-radius: 0px;
		border: 0px;
		box-shadow: none;
	}
	h1{
		font-size: 5.5rem;
	}
	h2{
		color: #0505f996;
		border-bottom: 2px solid #f1c2b8;
    	padding-bottom: 10px;
	}
	p{
		font-size:1.5rem;
	}
	.btn{
		border-radius: 3rem;
    	padding: 5px 10px;
	}
	
	.container{
		background: linear-gradient(180deg,
        #f1c2b8 20%,#ffffff 16%,#ffffff 80%,#ffffff 80%, #18217c 60%);
		background: -moz-linear-gradient(-90deg,
        #f1c2b8 20%,#ffffff 16%,#ffffff 80%,#ffffff 80%, #18217c 60%);
		background: -webkit-linear-gradient(-90deg,
        #f1c2b8 20%,#ffffff 16%,#f1cffffff2b8 80%,#ffffff 80%, #18217c 60%);

	}
	.progress{
		height:1.3rem;
	}
    .row {
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display:         flex;
		flex-wrap: wrap;
		}
	.row > [class*='col-'] {
	display: flex;
	flex-direction: column;
	}
	.row.display-flex {
		display: flex;
		flex-wrap: wrap;
		}
	

	/* not requied only for demo * */
	.row [class*='col-'] {
		background-colo: #cceeee;
		background-clip: content-box;
	}
	.panel {
		height: 100%;
	}
</style>


<?php if(count($dataStd)>0){ $d = $dataStd[0];
?>


<section id="contnet">
	<!-- <button id="btnPrint">generate PDF</button> -->
	<div class="container">
	
	  	<div class="row p-4 display-flex">
    	
    		<div class="col-md-12 mb-5 mt-5 pb-4">
        
	      <!-- Card -->		
				<div class="card pt-3 pb-3 ml-4 mr-4 mt-4 " >
					<div class="row no-gutters p-4 ">
					
						<div class="col-md-3">
							<div class="card-body">
								<p style="-webkit-background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/<?= $d['DB'].'/'.$d['Photo']; ?>);
											-moz-background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/<?= $d['DB'].'/'.$d['Photo']; ?>);
											background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/<?= $d['DB'].'/'.$d['Photo']; ?>);
											background-position: center;
											background-size: cover;
											background-repeat: no-repeat;
											min-height: 100%;
											min-width: 100%;">
								</p>
							</div>
						</div>
						<div class="col-md-9">
							<div class="card-body">
								<div class="pb-4">
									<h1 class="text-left mb-4 color-blue"><?= ucwords(strtoupper($d['Name'])); ?></h1>
									<h2 class="" style="color: #0505f996;"><?= ucwords(strtoupper($d['ProdiEng'])); ?></h2>
								</div>
								<div class="row">			
									<div class="col-2">  
										<p class="font-weight-bold">Telephone</p>
										<p class="font-weight-bold">Email</p>
										<p class="font-weight-bold">Address</p>		
									</div> 
									<div class="card col-1">
										<p >:</p>
										<p >:</p>
										<p >:</p>
									</div>	
									<div class="card col-8">
										<p ><?= $d['Phone']; ?></p>
										<p ><?= $d['EmailPU']; ?></p>
										<p ><?= ucwords(strtolower($d['Address'])); ?></p>
									</div>
								</div>
							</div>
						</div>

					</div>
				
					<div class="row">
						
						<!--2-->
						<div class="col-md-12">
							<div class="card mb-4 ml-4 mr-4 ">
								<div class="row no-gutters pl-0 pr-4">									
									<div class="col-md-6 mb-4">
											<div class="card p-2 mb-5 panel" style="border: 1px solid #f1c2b8; margin:1rem">
												<div class="card-body">
													<div class="title-cv ">
														<h2 class=" text-left"> PERSONAL INFORMATION </h2>
													</div>
												</div>
												
												<div class="card-body">
													<div class="row">
														
														<div class="col-md-6 mb-4">
															<p class="font-weight-bold">Date and Place of Brith</p>
															<p ><?= $d['PlaceOfBirth']; ?>, <?= $d['DateOfBirth']; ?></p>												
														</div>
														
														<div class="col-md-6 mb-4">
															<!-- Name -->
															<p class="font-weight-bold">Year of Completion</p>
															<p ><?= $d['GraduationYear']; ?></p>												
														</div>

														<div class="col-md-12 mb-4">
															<!-- Name -->
															<p class="font-weight-bold">Address</p>
														
															<!-- Quotation -->
															<p ><?= ucwords(strtolower($d['Address'])); ?></p>												
														</div>
														<div class="col-md-6 mb-4">
															<!-- Name -->
															<p class="font-weight-bold">Gender</p>
															<p class=""> <?= ($d['Gender']=='L') ? 'Male' : 'Female'; ?></p>												
														</div>
													
													</div>
												</div>
											</div>	
										</div>		
										<div class="col-md-6 mb-4">
											<div class="card p-2 mb-5 panel" style="border: 1px solid #f1c2b8; margin:1rem">

												<div class="card-body">
													<div class="title-cv">
														<H2 class=" text-left"> SCHOOLS ATTENDED</H2>
													</div>
												</div>
												<div class="card-body">
													<div class="row">
													<div class="col-md-12 mb-4">
															<!-- Name -->
															<p class="font-weight-bold"><?= $d['GraduationYear']; ?> | Podomoro University</p>
															
														</div>
														<div class="col-md-12 mb-4">
															<!-- Name -->
															<p class="font-weight-bold"> <?= $d['HighSchool']; ?></p>
															
														</div>
														<div class="col-md-12 mb-4">
															<p class="font-weight-bold"><?= $d['MajorsHighSchool']; ?></p>
														</div>											
													</div>
												</div>
											</div>
										</div>
									<?php
										if(count($d['Participation'])>0)
											{
												echo'<div class="col-md-6 mb-4">
												<div class="card p-2 mb-5 panel" style="border: 1px solid #f1c2b8; margin:1rem">
		
													<div class="card-body">
															<div class="title-cv">
																<H2 class=" text-left"> Organization</H2>
															</div>
													</div>
													<div class="card-body">
														<div class="row">';
												echo '<div class="col-md-12 mb-4">';
												for($i=0;$i<count($d['Participation']);$i++)
												{ $da = $d['Participation'][$i];
													$Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
													?>
													<p class="font-weight-bold"><?= $da['Year']; ?> | <?= $da['Event']; ?></p>
													<p>Level : <?= $da['Level'].$Achievement; ?></p>
													<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></p>
													

												<?php }

												echo '</div>';
												echo'</div>
												</div>
											</div>
										</div>';
										} 
									?>
									<?php
										if(count($d['Achievement'])>0)
											{
												echo'<div class="col-md-6 mb-4">
												<div class="card p-2 mb-5 panel" style="border: 1px solid #f1c2b8; margin:1rem">
		
													<div class="card-body">
															<div class="title-cv">
																<H2 class=" text-left"> ACHIEVMENTS</H2>
															</div>
													</div>
													<div class="card-body">
														<div class="row">';
												echo '<div class="col-md-12 mb-4">';
												for($i=0;$i<count($d['Achievement']);$i++)
												{ $da = $d['Achievement'][$i];
													$Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
													?>
													<p class="font-weight-bold"><?= $da['Year']; ?> | <?= $da['Event']; ?></p>
													<p>Level : <?= $da['Level'].$Achievement; ?></p>
													<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></p>
													

												<?php }

												echo '</div>';
												echo'</div>
												</div>
											</div>
										</div>';
										} 
									?>		
									<?php
										if(count($d['Training'])>0)
											{
												echo'<div class="col-md-6 mb-4">
												<div class="card p-2 mb-5 panel" style="border: 1px solid #f1c2b8; margin:1rem">
		
													<div class="card-body">
															<div class="title-cv">
																<H2 class=" text-left">  Training / Seminar / Workshop</H2>
															</div>
													</div>
													<div class="card-body">
														<div class="row">';
												echo '<div class="col-md-12 mb-4">';
												for($i=0;$i<count($d['Training']);$i++)
												{ $da = $d['Training'][$i];
													$Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
													?>
													<p class="font-weight-bold"><?= $da['Year']; ?> | <?= $da['Event']; ?></p>
													<p>Level : <?= $da['Level'].$Achievement; ?></p>
													<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></p>
													

												<?php }

												echo '</div>';
												echo'</div>
												</div>
											</div>
										</div>';
										} 
									?>								
									<?php
										if(count($d['Internship'])>0)
										{
											echo'<div class="col-md-6 mb-4">
												<div class="card p-2 mb-5 panel" style="border: 1px solid #f1c2b8; margin:1rem">
													<div class="card-body">
															<div class="title-cv">
																<h2 class="text-left">EXPERIENCE</h2>
															</div>
													</div>
													<div class="card-body">
														<div class="row">';
											echo '<div class="col-md-12 mb-4">';
											for($i=0;$i<count($d['Internship']);$i++)
											{ $da = $d['Internship'][$i];
												$Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
												?>
												<p class="font-weight-bold"><?= $da['Year']; ?> | <?= $da['Event']; ?></p>
												<p>Level : <?= $da['Level'].$Achievement; ?></p>
												<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i>  <?= $da['Location']; ?></p>
												

											<?php }

											echo '</div>';
											echo'</div>
												</div>
											</div>
										</div>';
										} 
									?>										
												
									</div>
								</div>
							</div>
						</div>
					</div>   					
				</div>  
			</div>	
		</div>

	</div>

</section>

<script>

        $(document).ready(function () {

            window.dt_NPM = "<?= $d['NPM']; ?>";
            window.dt_Name = "<?= ucwords(strtolower($d['Name'])); ?>";

            addingLastSeen(dt_NPM,'std',dt_Name);

            try {
                $.getJSON("https://api.ipify.org/?format=json", function(e) {
                    inputLogging(dt_NPM,e.ip);
                });
            } catch (e){
                inputLogging(dt_NPM,'');
            }

        });

        function inputLogging(NPM,IP_Public) {

            var token = jwt_encode({
                action : 'setDataLoggingStudent',
                NPM : NPM,
                IP_Public : IP_Public
            });
            var url = dt_base_url_js+'__getDetailsPeople';

            $.post(url,{token:token},function(result) {

            });

        }

    </script>

<?php } ?>