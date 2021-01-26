
	<?php $Segment = $this->uri->segment(2); ?>
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
			
			var image = new Image();
			var image = canvas.toDataURL("image/png ", 1.0);
			image.setAttribute('crossOrigin', 'anonymous');
			image.src = url;
			var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
		    pdf.addImage(image, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
			
			
			for (var i = 1; i <= totalPDFPages; i++) { 
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(image, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
			}
			
		    pdf.save("CV-<?= $Segment?>.pdf");
			
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
	
	.bg{
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


<div class="container mb-5">
	<div class="row mb-4">
		<div class="col align-self-center text-center">
			<h1 class="text-center fw-bold my-4">Curriculum Vitae</h1>
			<button class="btn btn-danger btn-lg m-1 mb-3" onclick="getPDF()" id="downloadbtn">Click to Download CV <i class="fa fa-download ms-2"></i></button>
			<span id="genmsg" style="display:none;">Generating ...</span>
		</div>
	</div> 			
</div>

<section class="canvas_div_pdf">

	<div class="container bg">
	
	  	<div class="row p-4 display-flex">
    	
    		<div class="col-md-12 mb-5 mt-5 pb-4">
        
	            <!-- Card -->		
				<div class="card pt-3 pb-3 ml-4 mr-4 mt-4 " >
					<div class="row no-gutters p-4" id="viewOne">
					
						

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
                                                <div class="row" id="viewTwo">
                                                
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
                                                <div class="row" id="viewThree">
                                                											
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-md-12 mb-4">
										<div class="card panel" style="background-color:#18217c0a">

											<div class="card-body">
													<div class="title-cv">
														<H2 class=" text-left"> Organization</H2>
													</div>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-12 mb-4" id="viewFour">
																	
													</div>
												</div>
											</div>
										</div>
									</div>

                                </div>
                            </div>
                        </div>
						<!--2-->
						<div class="col-md-8">
							<div class="card mb-4 ml-4 mr-4 ">
								<div class="row no-gutters">									
                                    
									<div class="col-md-12 mb-4">
										<div class="card panel" >

											<div class="card-body">
													<div class="title-cv">
														<H2 class=" text-left"> ACHIEVMENTS</H2>
													</div>
											</div>
											<div class="card-body">
												<div class="row">
                                            		<div class="col-md-12 mb-4">
                                                    	<ul class="timeline" id="viewFive">

                                                    	</ul>
                                                    </div>

												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12 mb-4">
										<div class="card panel" >

											<div class="card-body">
													<div class="title-cv">
														<H2 class=" text-left"> Training / Seminar / Workshop</H2>
													</div>
											</div>
											<div class="card-body">
												<div class="row">';
					                                <div class="col-md-12 mb-4">
				                                        <ul class="timeline" id="viewSix">

			                                        	</ul>
			                                        </div>

												</div>
											</div>
										</div>
									</div>							
										

									<div class="col-md-12 mb-4">
										<div class="card panel" >

											<div class="card-body">
													<div class="title-cv">
														<H2 class=" text-left"> EXPERIENCE</H2>
													</div>
											</div>
											<div class="card-body">
												<div class="row">';
					                                <div class="col-md-12 mb-4">
				                                        <ul class="timeline" id="viewSeven">
				                                        	
			                                        	</ul>
			                                        </div>

												</div>
											</div>
										</div>
									</div>

									
								</div>
							</div>
						</div>

													


					</div>   					
				</div>  
			</div>	
		</div>

	</div>




<script>
	$(document).ready(function () { 
		loadOne();
		loadTwo();
		loadThree();
		loadFour();
		loadFive();
		loadSix();
		loadSeven();

	});

	function loadOne() {
		NPM = "<?= $Segment ?>";
        var data = {
            action : 'read',
            NPM : NPM,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'data/'+NPM;

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
            $('#viewOne').empty();
            if(jsonResult.length>0){
            	var no=1;
                $.each(response,function (i,v) {
                	var tlp= (v[0].Phone !="" && v[0].Phone !=null) ? v[0].Phone :'-';
                	var eml= (v[0].EmailPU !="" && v[0].EmailPU !=null) ? v[0].EmailPU :'-';
                	var Address= (v[0].Address !="" && v[0].Address !=null) ? v[0].Address :'-';
                    $('#viewOne').append('<div class="col-md-4">'+
							'<div class="card-body">'+
								'<p style="-webkit-background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/'+v[0].DB+'/'+v[0].Photo+');-moz-background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/'+v[0].DB+'/'+v[0].Photo+');background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/'+v[0].DB+'/'+v[0].Photo+');background-position: center;background-size: cover;background-repeat: no-repeat;min-height: 100%;min-width: 100%;">'+
								'</p>'+
						'</div>'+
						'</div>'+
						'<div class="col-md-8">'+
							'<div class="card-body">'+
								'<div class="pb-4">'+
									'<h1 class="text-left mb-4 color-blue">'+v[0].Name+'</h1>'+
									'<h2 class="" style="color: #0505f996;">'+v[0].ProdiEng+'</h2>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-2">'+
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
										'<p >'+tlp+'</p>'+
										'<p >'+eml+'</p>'+
										'<p class="uppercase">'+Address+'</p>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>');
                });

            } else {
                $('#viewOne').html('<div class="col-md-12 well">Data not yet</div>');
            }

        });
    }

    function loadTwo() {
		NPM = "<?= $Segment ?>";
        var data = {
            action : 'read',
            NPM : NPM,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'data/'+NPM;

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
            $('#viewTwo').empty();
            if(jsonResult.length>0){
            	var no=1;
                $.each(response,function (i,v) {
                	var l = v[0].Gender;
                	var Gender = (l = "L") ? 'Male':'Female';
                    $('#viewTwo').append('<div class="col-md-12 mb-4">'+
                                            '<p class="font-weight-bold">Date and Place of Brith</p>'+
                                            '<p >'+v[0].PlaceOfBirth+', '+v[0].DateOfBirth+'</p>'+							
                                        '</div>'+
                                        
                                        '<div class="col-md-12 mb-4">'+
                                            '<p class="font-weight-bold">Year of Completion</p>'+
                                            '<p >'+v[0].GraduationYear+'</p>'+	
                                        '</div>'+

                                        '<div class="col-md-12 mb-4">'+
                                        	'<p class="font-weight-bold">Address</p>'+
                                            '<p >'+v[0].Address+'</p>'+				
                                        '</div>'+

                                        '<div class="col-md-12 mb-4">'+
                                            '<p class="font-weight-bold">Gender</p>'+
                                            '<p >'+Gender+'</p>'+
                                        '</div>'+

                                        '<div class="col-md-12 mb-4">'+
                                        '</div>');
                });

            } else {
                $('#viewTwo').html('<div class="col-md-12 well">Data not yet</div>');
            }

        });
    }

    function loadThree() {
		NPM = "<?= $Segment ?>";
        var data = {
            action : 'read',
            NPM : NPM,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'data/'+NPM;

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
            $('#viewThree').empty();
            if(jsonResult.length>0){
            	var no=1;
                $.each(response,function (i,v) {
                    $('#viewThree').append('<div class="col-md-12 mb-4">'+
                                            '<p class="font-weight-bold">Date and Place of Brith</p>'+
                                            '<p >'+v[0].GraduationYear+' | Podomoro University</p>'+
                                        '</div>'+
                                        
                                        '<div class="col-md-12 mb-4">'+
                                            '<p >'+v[0].HighSchool+'</p>'+	
                                        '</div>'+

                                        '<div class="col-md-12 mb-4">'+
                                            '<p >'+v[0].MajorsHighSchool+'</p>'+				
                                        '</div>'+
                                        
                                        '<div class="col-md-12 mb-4">'+
                                        '</div>');
                });

            } else {
                $('#viewThree').html('<div class="col-md-12 well">Data not yet</div>');
            }

        });
    }

    function loadFour() {
		NPM = "<?= $Segment ?>";
        var data = {
            action : 'read',
            NPM : NPM,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'data/'+NPM;     

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
            $('#viewFour').empty();
            if(jsonResult.length>0){            		
	            	var no=1;
	                $.each(response,function (i,v) {
	                	for(var x=0; x < v.length; x++){	                		
		                		var Achievement = (v[x].Participation[x].Achievement!='' && v[x].Participation[x].Achievement!=null) ? v[x].Participation[x].Achievement :'';
		                    	$('#viewFour').append('<p class="font-weight-bold">'+v[x].Participation[x].Year+' | '+v[x].Participation[x].Event+'</p>'+
												'<p>Level : '+v[x].Participation[x].Level+' | <span class="event-juara">'+Achievement+'</span></p>'+
												'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> '+v[x].Participation[x].Location+'</p>');		                   
	                	};
	                	
	                });	            

            } else {
                $('#viewFour').html('<div class="col-md-12 well">Data not yet</div>');
            }

        });

    }

    function loadFive() {
		NPM = "<?= $Segment ?>";
        var data = {
            action : 'read',
            NPM : NPM,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'data/'+NPM;

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
            $('#viewFive').empty();
            if(jsonResult.length>0){            		
	            	var no=1;
	                $.each(response,function (i,v) {
	                	for(var x=0; x < v.length; x++){	                		
		                		var Achievement = (v[x].Achievement[x].Achievement!='' && v[x].Achievement[x].Achievement!=null) ? v[x].Achievement[x].Achievement :'';
		                    	$('#viewFive').append('<p class="font-weight-bold">'+v[x].Achievement[x].Year+' | '+v[x].Achievement[x].Event+'</p>'+
												'<p>Level : '+v[x].Achievement[x].Level+' | <span class="event-juara">'+Achievement+'</span></p>'+
												'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> '+v[x].Achievement[x].Location+'</p>');		                   
	                	};
	                	
	                });	            

            } else {
                $('#viewFive').html('<div class="col-md-12 well">Data not yet</div>');
            }

        });
    }

    function loadSix() {
		NPM = "<?= $Segment ?>";
        var data = {
            action : 'read',
            NPM : NPM,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'data/'+NPM;

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
            $('#viewSix').empty();
            if(jsonResult.length>0){            		
	            	var no=1;
	                $.each(response,function (i,v) {
	                	for(var x=0; x < v.length; x++){	
		                		var Achievement = (v[x].Training[x].Achievement!='' && v[x].Training[x].Achievement!=null) ? v[x].Training[x].Achievement :'';
		                    	$('#viewSix').append('<p class="font-weight-bold">'+v[x].Training[x].Year+' | '+v[x].Training[x].Event+'</p>'+
												'<p>Level : '+v[x].Training[x].Level+' | <span class="event-juara">'+Achievement+'</span></p>'+
												'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> '+v[x].Training[x].Location+'</p>');		                   
	                	};
	                	
	                });	            

            } else {
                $('#viewSix').html('<div class="col-md-12 well">Data not yet</div>');
            }

        });
    }

    function loadSeven() {
		NPM = "<?= $Segment ?>";
        var data = {
            action : 'read',
            NPM : NPM,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = base_url_js+'data/'+NPM;

        $.post(url,{token:token},function (jsonResult) {
        	var response = jQuery.parseJSON(jsonResult);
            $('#viewSeven').empty();
            if(jsonResult.length>0){            		
	            	var no=1;
	                $.each(response,function (i,v) {
	                	for(var x=0; x < v.length; x++){	                		
		                		var Achievement = (v[x].Internship[x].Achievement!='' && v[x].Internship[x].Achievement!=null) ? v[x].Internship[x].Achievement :'';
		                    	$('#viewSeven').append('<p class="font-weight-bold">'+v[x].Internship[x].Year+' | '+v[x].Internship[x].Event+'</p>'+
												'<p>Level : '+v[x].Internship[x].Level+' | <span class="event-juara">'+Achievement+'</span></p>'+
												'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> '+v[x].Internship[x].Location+'</p>');		                   
	                	};
	                	
	                });	            

            } else {
                $('#viewSeven').html('<div class="col-md-12 well">Data not yet</div>');
            }

        });
    }
</script>

</section>
