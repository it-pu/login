

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
	
	
	<script>
	
	function getPDF(){
		$("#downloadbtn").hide();
		$("#genmsg").show();
		var HTML_Width = $(".canvas_div_pdf").width();
		var HTML_Height = $(".canvas_div_pdf").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width+(top_left_margin*2);
		var PDF_Height = (PDF_Width*1.2)+(top_left_margin*2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;
		
		var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
		

		html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
			canvas.getContext('2d');
			
			console.log(canvas.height+"  "+canvas.width);
			
			
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
		    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
			
			
			for (var i = 1; i <= totalPDFPages; i++) { 
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
			}
			
		    pdf.save("HTML-Document.pdf");
			
			setTimeout(function(){ 			
				$("#downloadbtn").show();
				$("#genmsg").hide();
			}, 0);

        });
	};
	
	
	</script>
	
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
    ul.timeline {
        list-style-type: none;
        position: relative;
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
        padding-left: 20px;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #f1c2b8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>


<?php if(count($dataStd)>0){ $d = $dataStd[0];
?>	

	<div class="row mb-4">
		<div class="col align-self-center text-center">
			<h1 class="text-center fw-bold my-4">Curriculum Vitae</h1>
			<button class="btn btn-danger btn-lg m-1 mb-3" onclick="getPDF()" id="downloadbtn">Click to Download CV <i class="fa fa-download ms-2"></i></button>
			<span id="genmsg" style="display:none;">Generating ...</span>
		</div>
	</div> 			


<section class="canvas_div_pdf">

	<div class="container">
	
	  	<div class="row p-4 display-flex">
    	
    		<div class="col-md-12 mb-5 mt-5 pb-4">
        
	            <!-- Card -->		
				<div class="card pt-3 pb-3 ml-4 mr-4 mt-4 " >
					<div class="row no-gutters p-4 ">
					
						<div class="col-md-4">
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
						<div class="col-md-8">
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
				
					<div class="row no-gutters p-4">
						<!--1-->
                        <div class="col-md-4">
							<div class="card mb-4 ml-4 mr-4 ">
								<div class="row no-gutters">	
                                    <div class="col-md-12 mb-4">
                                        <div class="card panel" style="background-color:#18217c0a">
                                            <div class="card-body">
                                                <div class="title-cv ">
                                                    <h2 class=" text-left"> PERSONAL INFORMATION </h2>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12 mb-4">
                                                        <p class="font-weight-bold">Date and Place of Brith</p>
                                                        <p ><?= $d['PlaceOfBirth']; ?>, <?= $d['DateOfBirth']; ?></p>												
                                                    </div>
                                                    
                                                    <div class="col-md-12 mb-4">
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
                                                    <div class="col-md-12 mb-4">
                                                        <!-- Name -->
                                                        <p class="font-weight-bold">Gender</p>
                                                        <p class=""> <?= ($d['Gender']=='L') ? 'Male' : 'Female'; ?></p>												
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>	
									</div>		
									<div class="col-md-12 mb-4">
                                        <div class="card panel" style="background-color:#18217c0a">

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
												echo'<div class="col-md-12 mb-4">
												<div class="card panel" style="background-color:#18217c0a">
		
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
                                </div>
                            </div>
                        </div>
						<!--2-->
						<div class="col-md-8">
							<div class="card mb-4 ml-4 mr-4 ">
								<div class="row no-gutters">									
                                    
									<?php
										if(count($d['Achievement'])>0)
											{
												echo'<div class="col-md-12 mb-4">
												<div class="card panel" >
		
													<div class="card-body">
															<div class="title-cv">
																<H2 class=" text-left"> ACHIEVMENTS</H2>
															</div>
													</div>
													<div class="card-body">
														<div class="row">';
                                                echo '<div class="col-md-12 mb-4">
                                                        <ul class="timeline">';
												for($i=0;$i<count($d['Achievement']);$i++)
												{ $da = $d['Achievement'][$i];
													$Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
													?>
                                                    <li>
													<p class="font-weight-bold"><?= $da['Year']; ?> | <?= $da['Event']; ?></p>
													<p>Level : <?= $da['Level'].$Achievement; ?></p>
													<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></p>
													</li>

												<?php }

												echo '</ul></div>';
												echo'</div>
												</div>
											</div>
										</div>';
										} 
									?>	
									<?php
										if(count($d['Training'])>0)
											{
												echo'<div class="col-md-12 mb-4">
												<div class="card panel" >
		
													<div class="card-body">
															<div class="title-cv">
																<H2 class=" text-left">  Training / Seminar / Workshop</H2>
															</div>
													</div>
													<div class="card-body">
														<div class="row">';
                                                echo '<div class="col-md-12 mb-4">
                                                        <ul class="timeline">';
												for($i=0;$i<count($d['Training']);$i++)
												{ $da = $d['Training'][$i];
													$Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
													?>
                                                    <li>
													<p class="font-weight-bold"><?= $da['Year']; ?> | <?= $da['Event']; ?></p>
													<p>Level : <?= $da['Level'].$Achievement; ?></p>
													<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></p>
													</li>

												<?php }

												echo '</ul></div>';
												echo'</div>
												</div>
											</div>
										</div>';
										} 
									?>								
									<?php
										if(count($d['Internship'])>0)
										{
											echo'<div class="col-md-12 mb-4">
												<div class="card panel" >
													<div class="card-body">
															<div class="title-cv">
																<h2 class="text-left">EXPERIENCE</h2>
															</div>
													</div>
													<div class="card-body">
														<div class="row">';
                                            echo '<div class="col-md-12 mb-4">
                                                    <ul class="timeline">';
											for($i=0;$i<count($d['Internship']);$i++)
											{ $da = $d['Internship'][$i];
												$Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
												?>
                                                <li>
												<p class="font-weight-bold"><?= $da['Year']; ?> | <?= $da['Event']; ?></p>
												<p>Level : <?= $da['Level'].$Achievement; ?></p>
												<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i>  <?= $da['Location']; ?></p>
												</li>

											<?php }

											echo '</ul></div>';
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

	function loadOne() {
        var data = {
            action : 'read',
            Type : G_Type
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'c_cv/index';

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
        	
            $('#viewOne').empty();
            if(response.length>0){
            	var no=1;
                $.each(response,function (i,v) {
                    $('#viewOne').append('
						<div class="col-md-4">'+
							'<div class="card-body">'+
								'<p style="-webkit-background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/);background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/);background-position: center;background-size: cover;background-repeat: no-repeat;min-height: 100%;min-width: 100%;">'+
								'</p>'+
'							</div>'+
						'</div>'+
						'<div class="col-md-8">'+
							'<div class="card-body">'+
								'<div class="pb-4">'+
									'<h1 class="text-left mb-4 color-blue"><?= ucwords(strtoupper($d['Name'])); ?></h1>'+
									'<h2 class="" style="color: #0505f996;"><?= ucwords(strtoupper($d['ProdiEng'])); ?></h2>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-2">  '+
										'<p class="font-weight-bold">Telephone</p>'+
										'<p class="font-weight-bold">Email</p>'+
										'<p class="font-weight-bold">Address</p>'+
									'</div>'+
									'<div class="card col-1">'+
										'<p >:</p>'+
										'<p >:</p>'+
										'<p >:</p>'+
									'</div>'+
									'<div class="card col-8">'+
										'<p ><?= $d['Phone']; ?></p>'+
										'<p ><?= $d['EmailPU']; ?></p>'+
										'<p ><?= ucwords(strtolower($d['Address'])); ?></p>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>');
                });

            } else {
                $('#viewOne').html('<div class="well">Data not yet</div>');
            }

        });
    }

</script>

<?php } ?>