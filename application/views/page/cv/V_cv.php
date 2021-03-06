<?php $Segment = $this->uri->segment(2); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<style type="text/css">	

	body {
		background: #eaeaea;
	}

	.card {
		border-radius: 0px;
		border: 0px;
		box-shadow: none;
	}

	h1 {
		font-size: 5.5rem;
	}

	h2 {

		color: #143f52;
		font-weight: 600;
		/* border-bottom: 2px solid #b4b6b7; */

		/* color: #0505f996;
		border-bottom: 2px solid #f1c2b8; */
		/* padding-bottom: 10px; */
	}

	.card-body-title {
		/*background: #154053;*/
		background: var(--color-primary);
	}

	.card-body-title>h2 {
		/*background: #154053;*/
		color: var(--color-second);
	}

	p {
		font-size: 1.5rem;
	}

	.btn {
		border-radius: 3rem;
		padding: 5px 10px;
	}

	.bg-2 {
		background: linear-gradient(180deg,
				#f1c2b8 20%, #ffffff 16%, #ffffff 80%, #ffffff 80%, #18217c 60%);
		background: -moz-linear-gradient(-90deg,
				#f1c2b8 20%, #ffffff 16%, #ffffff 80%, #ffffff 80%, #18217c 60%);
		background: -webkit-linear-gradient(-90deg,
				#f1c2b8 20%, #ffffff 16%, #f1cffffff2b8 80%, #ffffff 80%, #18217c 60%);

	}

	.bg {
		background: linear-gradient(180deg, var(--color-primary) 20%, #ffffff 16%, #ffffff 80%, #ffffff 80%, #ffffff 60%);
		background: -moz-linear-gradient(-90deg, #f1c2b8 20%, #ffffff 16%, #ffffff 80%, #ffffff 80%, #18217c 60%);
		background: -webkit-linear-gradient(-90deg, #f1c2b8 20%, #ffffff 16%, #f1cffffff2b8 80%, #ffffff 80%, #18217c 60%);
	}

	.progress {
		height: 1.3rem;
	}

	.row {
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		flex-wrap: wrap;
	}

	.row>[class*='col-'] {
		display: flex;
		flex-direction: column;
	}

	.row.display-flex {
		display: flex;
		flex-wrap: wrap;
	}

	/* not requied only for demo * */
	.row [class*='col-'] {
		background-clip: content-box;
	}

	.panel {
		height: 100%;
	}
	.panel-bg{
		background: var(--color-bg);		
	}

	ul.timeline {
		list-style-type: none;
		position: relative;
	}

	ul.timeline:before {
		content: ' ';
		background: #eaeaea;
		display: inline-block;
		position: absolute;
		left: 29px;
		width: 2px;
		height: 100%;
		z-index: 400;
	}

	ul.timeline>li {
		margin: 20px 0;
		padding-left: 20px;
	}

	ul.timeline>li:before {
		content: ' ';
		background: white;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 3px solid var(--color-primary);
		left: 20px;
		width: 20px;
		height: 20px;
		z-index: 400;
	}
	.btn-color	{
		background: var(--color-primary);
		color: #fff;
		font-weight: 400;
	}
	.color-nm{
		color: var(--color-primary);
	}
	.color-prodi{
		color: var(--color-second);
	}
	.btn:hover, .btn:focus {
    color: #fff;
    text-decoration: none;
}

</style>

<div class="container mb-5">
	<div class="row mb-4">
		<div class="col align-self-center text-center">
			<h1 class="text-center fw-bold my-4 ">CURRICULUM VITAE</h1>
			<div class="col">
				<button class="btn btn-color btn-lg m-1 mb-3" onclick="getPDF()" id="downloadbtn">Download CV to PDF <i class="fa fa-download ms-2"></i></button>
				<span id="genmsg" style="display:none;">Generating ...</span>
				<button class="btn btn-color btn-lg m-1 mb-3"  id="downloadbtnpng">Download CV to PNG <i class="fa fa-download ms-2"></i></button>
				<span id="genmsgimg" style="display:none;">Generating ...</span>
			</div>
		</div>
	</div>
</div>

<section class="">

	<div class="container bg canvas_div_pdf mb-5" id="canvas_div_pdf">

		<div class="row p-4 display-flex">

			<div class="col-md-12 mb-5 mt-5 pb-4">

				<!-- Card -->
				<div class="card pt-3 pb-3 ml-4 mr-4 mt-4 ">
					<div class="row no-gutters p-4" id="viewOne">



					</div>

					<div class="row no-gutters p-4">
						<!--1-->
						<div class="col-md-4">
							<div class="card mb-4 ml-4 mr-4 ">
								<div class="row no-gutters">
									<div class="col-md-12 mb-4">
										<div class="card panel panel-bg" >
											<div class="card-body card-body-title">
												<div class="title-cv ">
													<h2 class="text-left" style="text-transform: uppercase;color: white;"> PERSONAL INFORMATION </h2>
												</div>
											</div>

											<div class="card-body">
												<div class="row" id="viewTwo">

												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-4">
										<div class="card panel panel-bg" >

											<div class="card-body card-body-title">
												<div class="title-cv">
													<H2 class=" text-left" style="text-transform: uppercase;color: white;"> SCHOOLS ATTENDED</H2>
												</div>
											</div>
											<div class="card-body">
												<div class="row" id="viewThree">

												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-4">
										<div class="card panel panel-bg" >

											<div class="card-body card-body-title">
												<div class="title-cv">
													<H2 class=" text-left" style="text-transform: uppercase;color: white;"> Organization</H2>
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
										<div class="card panel mb-0">

											<!-- <div class="card-body card-body-title">
												<div class="title-cv">
													<H2 class=" text-left"> ACHIEVMENTS</H2>
												</div>
											</div> -->
											<div class="card-body pt-0">
												<div class="row">
													<div class="col-md-12 mb-1">
														<div class="card-body-title" style="background: #ffffff;">
															<h2 class=" text-left p-3 pb-4" style="text-transform: uppercase;
															    margin-bottom: 15px;
															    border-bottom: 2px solid;"> 
															 	<i class="fa-2x fa fa-suitcase" style="font-size: 1.5em"></i> 
															    <span style="padding-left: 7px;">ACHIEVEMENTS</span>
															</h2>
														</div>
														<ul class="timeline mb-0" id="viewFive">

														</ul>
													</div>

												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12 mb-4">
										<div class="card panel mb-0">

											<!-- <div class="card-body card-body-title">
												<div class="title-cv">
													<H2 class=" text-left"> Training / Seminar / Workshop</H2>
												</div>
											</div> -->
											<div class="card-body pt-0">
												<div class="row">
													<div class="col-md-12 mb-1">
														<div class="card-body-title" style="background: #ffffff;">
															<h2 class=" text-left p-3 pb-4" style="text-transform: uppercase;
															    margin-bottom: 15px;
															    border-bottom: 2px solid;"> 
															 	<i class="fa-2x fa fa-certificate" style="font-size: 1.7em"></i> 
															    <span style="padding-left: 7px;"> Training / Seminar / Workshop</span>
															</h2>
														</div>
														<ul class="timeline mb-0" id="viewSix">

														</ul>
													</div>

												</div>
											</div>
										</div>
									</div>


									<div class="col-md-12 mb-4">
										<div class="card panel mb-0">

											<!-- <div class="card-body card-body-title">
												<div class="title-cv">
													<H2 class=" text-left"> EXPERIENCE</H2>
												</div>
											</div> -->
											<div class="card-body pt-0">
												<div class="row">
													<div class="col-md-12 mb-1">
														<div class="card-body-title" style="background: #ffffff;">
															<h2 class=" text-left p-3 pb-4" style="text-transform: uppercase;
															    margin-bottom: 15px;
															    border-bottom: 2px solid;"> 
															 	<i class="fa-2x fa fa-graduation-cap" style="font-size: 1.5em"></i> 
															    <span style="padding-left: 7px;"> EXPERIENCE</span>
															</h2>
														</div>
														<ul class="timeline mb-0" id="viewSeven">

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


	<script type="text/javascript">
		function getPDF() {
			$("#downloadbtn").hide();
			$("#genmsg").show();
			var HTML_Width = $(".canvas_div_pdf").width();
			var HTML_Height = $(".canvas_div_pdf").height();
			var top_left_margin = 15;
			var PDF_Width = HTML_Width + (top_left_margin * 2);
			var PDF_Height = (PDF_Width * 1.2) + (top_left_margin * 1.2);
			var canvas_image_width = HTML_Width;
			var canvas_image_height = HTML_Height;

			var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


			html2canvas($(".canvas_div_pdf")[0], {
				allowTaint: false,
				useCORS: true,
				logging: true,
				letterRendering: true,
				// dpi: 300,
				scale:1.5,
			}).then(function(canvas) {
				var ctx = canvas.getContext('2d');
				ctx.webkitImageSmoothingEnabled = false;
				ctx.mozImageSmoothingEnabled = false;
				ctx.imageSmoothingEnabled = false;
				var image = new Image();
				var image = canvas.toDataURL("image/png ", 1.9);
				var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);

				pdf.addImage(image, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);

				for (var i = 1; i <= totalPDFPages; i++) {
					pdf.addPage(PDF_Width, PDF_Height);
					pdf.addImage(image, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
				}

				pdf.save("CV-<?= $Segment ?>.pdf");

				setTimeout(function() {
					$("#downloadbtn").show();
					$("#genmsg").hide();
				}, 0);

			});
		};
		
		setUpDownloadPageAsImage();
		function setUpDownloadPageAsImage() {		
		  document.getElementById("downloadbtnpng").addEventListener("click", function() {
		  	$("#downloadbtnpng").hide();
			$("#genmsgimg").show();
		    html2canvas($(".canvas_div_pdf")[0],{
		    	allowTaint: false,
		    	taintTest: false,
				useCORS: true,
				letterRendering: true,
				dpi: window.devicePixelRatio * 4, //Increase the resolution to a specific DPI by four times
                scale: 4
			}).then(function(canvas) {
		      simulateDownloadImageClick(canvas.toDataURL(), 'CV-PNG-<?= $Segment ?>.png');
		      setTimeout(function() {
					$("#downloadbtnpng").show();
					$("#genmsgimg").hide();
				}, 0);
		    });
		  });
		}

		function simulateDownloadImageClick(uri, filename) {
		  var link = document.createElement('a');
		  if (typeof link.download !== 'string') {
		    window.open(uri);
		  } else {
		    link.href = uri;
		    link.download = filename;
		    accountForFirefox(clickLink, link);
		  }
		}

		function clickLink(link) {
		  link.click();
		}

		function accountForFirefox(click) { // wrapper function
		  let link = arguments[1];
		  document.body.appendChild(link);
		  click(link);
		  document.body.removeChild(link);
		}
	</script>

	<script>
		$(document).ready(function() {
			loadOne();
			loadTwo();
			loadThree();
			loadFour();
			loadFive();
			loadSix();
			loadSeven();

		});
		// adds CORS headers to the proxied request
		// https://github.com/Rob--W/cors-anywhere
		const proxyUrl = "https://cors-anywhere.herokuapp.com/";

		function imageSrcToBase64(img) {
			const isBase64 = /^data:image\/(png|jpeg);base64,/.test(img.src);
			if (isBase64) {
				return;
			}
			return fetch(proxyUrl + img.src)
				.then((res) => res.blob())
				.then(
					(blob) =>
					new Promise((resolve, reject) => {
						const reader = new FileReader();
						reader.onerror = reject;
						reader.onload = () => {
							resolve(reader.result);
						};
						reader.readAsDataURL(blob);
					})
				)
				.then((dataURL) => {
					img.src = dataURL;
				});
		}

		function loadOne() {
			NPM = "<?= $Segment ?>";
			var data = {
				action: 'read',
				NPM: NPM,
			};
			var token = jwt_encode(data, 'UAP)(*');
			var url = base_url_js + 'data/' + NPM;

			$.post(url, {
				token: token
			}, function(jsonResult) {
				var response = jQuery.parseJSON(jsonResult);
				$('#viewOne').empty();
				if (jsonResult.length > 0) {
					var no = 1;
					$.each(response, function(i, v) {
						var tlp = (v[0].Phone != "" && v[0].Phone != null) ? v[0].Phone : '-';
						var eml = (v[0].EmailPU != "" && v[0].EmailPU != null) ? v[0].EmailPU : '-';
						var Address = (v[0].Address != "" && v[0].Address != null) ? v[0].Address : '-';
						var Name = (v[0].Name != "" && v[0].Name != null) ? v[0].Name : '-';
						var ProdiEng = (v[0].ProdiEng != "" && v[0].ProdiEng != null) ? v[0].ProdiEng : '-';



						$('#viewOne').append('<div class="col-md-4" id="img1" style="min-height:340px">' +
							'<div class="card-body pb-0">' +
							'<p style="-webkit-background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/' + v[0].DB + '/' + v[0].Photo + ');-moz-background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/' + v[0].DB + '/' + v[0].Photo + ');background-image: url(https://pcam.podomorouniversity.ac.id/uploads/students/' + v[0].DB + '/' + v[0].Photo + ');background-position:50% 10%;background-size: cover;background-repeat: no-repeat;min-height: 100%;min-width: 100%;">' +
							'</p>' +
							'</div>' +
							'</div>' +
							'<div class="col-md-8">' +
							'<div class="card-body ml-4 mr-4 pb-0">' +
							'<div class="pb-4">' +
							'<h1 class="text-left mb-5 color-nm">' + Name + '</h1>' +
							'<h2 class="color-prodi" style="text-transform: uppercase;">' + ProdiEng + '</h2>' +
							'</div>' +
							'<div class="row">' +
							'<div class="col-2">' +
							'<p class="font-weight-bold">Telephone</p>' +
							'<p class="font-weight-bold">Email</p>' +
							'<p class="font-weight-bold">Address</p>' +
							'</div>' +
							'<div class="card col-1">' +
							'<p >:</p>' +
							'<p >:</p>' +
							'<p >:</p>' +
							'</div>' +
							'<div class="card col-8">' +
							'<p >' + tlp + '</p>' +
							'<p >' + eml + '</p>' +
							'<p class="uppercase">' + Address + '</p>' +
							'</div>' +
							'</div>' +
							'</div>' +
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
				action: 'read',
				NPM: NPM,
			};
			var token = jwt_encode(data, 'UAP)(*');
			var url = base_url_js + 'data/' + NPM;

			$.post(url, {
				token: token
			}, function(jsonResult) {
				var response = jQuery.parseJSON(jsonResult);
				$('#viewTwo').empty();
				if (jsonResult.length > 0) {
					var no = 1;
					$.each(response, function(i, v) {
						var l = v[0].Gender;
						var date = v[0].DateOfBirth;
						var dateFramat = moment(date).format('D MMMM, YYYY');
						var dateStd = (dateFramat != "" && dateFramat != null) ? dateFramat : '-';						
						var Gender = (l = "L") ? 'Male' : 'Female';
						var GraduationYear = (v[0].GraduationYear != "" && v[0].GraduationYear != null) ? v[0].GraduationYear : '-';
						var PlaceOfBirth = (v[0].PlaceOfBirth != "" && v[0].PlaceOfBirth != null) ? v[0].PlaceOfBirth : '-';
						var Address = (v[0].Address != "" && v[0].Address != null) ? v[0].Address : '-';

						$('#viewTwo').append('<div class="col-md-12 mb-4">' +
							'<p class="font-weight-bold">Date and Place of Brith</p>' +
							'<p >' + PlaceOfBirth + ', ' + dateStd + '</p>' +
							'</div>' +

							'<div class="col-md-12 mb-4">' +
							'<p class="font-weight-bold">Year of Completion</p>' +
							'<p >' + GraduationYear + '</p>' +
							'</div>' +

							'<div class="col-md-12 mb-4">' +
							'<p class="font-weight-bold">Address</p>' +
							'<p >' + Address + '</p>' +
							'</div>' +

							'<div class="col-md-12 mb-4">' +
							'<p class="font-weight-bold">Gender</p>' +
							'<p >' + Gender + '</p>' +
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
				action: 'read',
				NPM: NPM,
			};
			var token = jwt_encode(data, 'UAP)(*');
			var url = base_url_js + 'data/' + NPM;

			$.post(url, {
				token: token
			}, function(jsonResult) {
				var response = jQuery.parseJSON(jsonResult);
				$('#viewThree').empty();
				if (jsonResult.length > 0) {
					var no = 1;
					$.each(response, function(i, v) {
						var GraduationYear = (v[0].GraduationYear != "" && v[0].GraduationYear != null) ? v[0].GraduationYear : '-';
						var HighSchool = (v[0].HighSchool != "" && v[0].HighSchool != null) ? v[0].HighSchool : '-';
						var MajorsHighSchool = (v[0].MajorsHighSchool != "" && v[0].MajorsHighSchool != null) ? v[0].MajorsHighSchool : '-';


						$('#viewThree').append('<div class="col-md-12 mb-4">' +
							'<p class="font-weight-bold">Date and Place of Brith</p>' +
							'<p >' + GraduationYear + ' | Podomoro University</p>' +
							'</div>' +

							'<div class="col-md-12 mb-4">' +
							'<p >' + HighSchool + '</p>' +
							'</div>'

							// '<div class="col-md-12 mb-4">' +
							// '<p >' + MajorsHighSchool + '</p>' +
							// '</div>' +

							);
					});

				} else {
					$('#viewThree').html('<div class="col-md-12 well">Data not yet</div>');
				}

			});
		}

		function loadFour() {
			NPM = "<?= $Segment ?>";
			var data = {
				action: 'read',
				NPM: NPM,
			};
			var token = jwt_encode(data, 'UAP)(*');
			var url = base_url_js + 'data/' + NPM;

			$.post(url, {
				token: token
			}, function(jsonResult) {
				var response = jQuery.parseJSON(jsonResult);
				$('#viewFour').empty();
				if (jsonResult.length > 0) {
					var no = 1;
					$.each(response, function(i, v) {
						for (var x = 0; x < v[0].Participation.length; x++) {
							var Achievement = (v[0].Participation[x].Achievement != '' && v[0].Participation[x].Achievement != null) ? v[0].Participation[0].Achievement : '-';
							var Year= (v[0].Participation[x].Year != '' && v[0].Participation[x].Year != null) ? v[0].Participation[x].Year : '-';
							var Event= (v[0].Participation[x].Event != '' && v[0].Participation[x].Event != null) ? v[0].Participation[x].Event : '-';
							var Level= (v[0].Participation[x].Level != '' && v[0].Participation[x].Level != null) ? v[0].Participation[x].Level : '-';
							var Location= (v[0].Participation[x].Location != '' && v[0].Participation[x].Location != null) ? v[0].Participation[x].Location : '-';


							$('#viewFour').append('<p class="font-weight-bold">' + Year + ' | ' + Event + '</p>' +
								'<p>Level : ' + Level + ' | <span class="event-juara">' + Achievement + '</span></p>' +
								'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> ' + Location + '</p>');
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
				action: 'read',
				NPM: NPM,
			};
			var token = jwt_encode(data, 'UAP)(*');
			var url = base_url_js + 'data/' + NPM;

			$.post(url, {
				token: token
			}, function(jsonResult) {
				var response = jQuery.parseJSON(jsonResult);
				$('#viewFive').empty();
				if (jsonResult.length > 0) {
					var no = 1;
					$.each(response, function(i, v) {
						for (var x = 0; x < v[0].Achievement.length; x++) {
							var Achievement = (v[0].Achievement[x].Achievement != '' && v[0].Achievement[x].Achievement != null) ? v[0].Achievement[0].Achievement : '-';
							var Year= (v[0].Achievement[x].Year != '' && v[0].Achievement[x].Year != null) ? v[0].Achievement[x].Year : '-';
							var Event= (v[0].Achievement[x].Event != '' && v[0].Achievement[x].Event != null) ? v[0].Achievement[x].Event : '-';
							var Level= (v[0].Achievement[x].Level != '' && v[0].Achievement[x].Level != null) ? v[0].Achievement[x].Level : '-';
							var Location= (v[0].Achievement[x].Location != '' && v[0].Achievement[x].Location != null) ? v[0].Achievement[x].Location : '-';

							$('#viewFive').append('<li><p class="font-weight-bold">' + Year + ' | ' + Event + '</p>' +
								'<p>Level : ' + Level + ' | <span class="event-juara">' + Achievement + '</span></p>' +
								'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> ' + Location + '</p></li>');
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
				action: 'read',
				NPM: NPM,
			};
			var token = jwt_encode(data, 'UAP)(*');
			var url = base_url_js + 'data/' + NPM;

			$.post(url, {
				token: token
			}, function(jsonResult) {
				var response = jQuery.parseJSON(jsonResult);
				$('#viewSix').empty();
				if (jsonResult.length > 0) {
					var no = 1;
					$.each(response, function(i, v) {
						for (var x = 0; x < v[0].Training.length; x++) {
							var Achievement = (v[0].Training[x].Achievement != '' && v[0].Training[x].Achievement != null) ? v[0].Training[x].Achievement : '-';
							var Year= (v[0].Training[x].Year != '' && v[0].Training[x].Year != null) ? v[0].Training[x].Year : '-';
							var Event= (v[0].Training[x].Event != '' && v[0].Training[x].Event != null) ? v[0].Training[x].Event : '-';
							var Level= (v[0].Training[x].Level != '' && v[0].Training[x].Level != null) ? v[0].Training[x].Level : '-';
							var Location= (v[0].Training[x].Location != '' && v[0].Training[x].Location != null) ? v[0].Training[x].Location : '-';

							$('#viewSix').append('<li><p class="font-weight-bold">' + Year + ' | ' + Event + '</p>' +
								'<p>Level : ' + Level + ' | <span class="event-juara">' + Achievement + '</span></p>' +
								'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> ' + Location + '</p></li>');
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
				action: 'read',
				NPM: NPM,
			};
			var token = jwt_encode(data, 'UAP)(*');
			var url = base_url_js + 'data/' + NPM;

			$.post(url, {
				token: token
			}, function(jsonResult) {
				var response = jQuery.parseJSON(jsonResult);
				$('#viewSeven').empty();
				if (jsonResult.length > 0) {
					var no = 1;
					$.each(response, function(i, v) {
						for (var x = 0; x < v[0].Internship.length; x++) {
							var Achievement = (v[0].Internship[x].Achievement != '' && v[0].Internship[x].Achievement != null) ? v[0].Internship[x].Achievement : '-';
							var Year= (v[0].Internship[x].Year != '' && v[0].Internship[x].Year != null) ? v[0].Internship[x].Year : '-';
							var Event= (v[0].Internship[x].Event != '' && v[0].Internship[x].Event != null) ? v[0].Internship[x].Event : '-';
							var Level= (v[0].Internship[x].Level != '' && v[0].Internship[x].Level != null) ? v[0].Internship[x].Level : '-';
							var Location= (v[0].Internship[x].Location != '' && v[0].Internship[x].Location != null) ? v[0].Internship[x].Location : '-';

							$('#viewSeven').append('<li><p class="font-weight-bold">' + Year + ' | ' + Event + '</p>' +
								'<p>Level : ' + Level + ' | <span class="event-juara">' + Achievement + '</span></p>' +
								'<p class="mb-4 pb-3"><i class="fa fa-map-marker"></i> ' + Location + '</p></li>');
						};

					});

				} else {
					$('#viewSeven').html('<div class="col-md-12 well">Data not yet</div>');
				}

			});
		}
	</script>

</section>
	
	