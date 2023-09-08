
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Wood Land Manufacturing</title> 
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/github.min.css">
	<link rel="stylesheet" type="text/css" href="jquery.fontselect.css"> 
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<style>
		body {
			background-color: #fff;
			color: #000;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
		}

		p {
			line-height: 1.4em;
		}

		.btn {
			background-color: #4caf50;
			color: #fff;
			padding: 5px 10px;
			text-align: center;
			display: inline-block;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid #080;
			margin: 2px 0;
			cursor: pointer;
		}

		.btn-link {
			font-weight: 400;
			color: #00bc8c;
  			text-decoration: none;
  			border: none;
  			padding: 0;
  			background: none;
  			color: #00f;
  			font-size: 14px;
		}

		tt {
			background-color: #eff0f1;
			padding: 4px;
		}

		.example > div {
			margin-top: 15px;
		}

		@media (min-width: 768px) {
			.example {
				display: flex;
			}
			.example > div, .example > pre {
				flex: 1;
				margin: 0 10px 0 0;
			}
		}
		.font-select {
			font-size: 16px;
			width: 103%;
			position: relative;
			display: inline-block;
			font-size: 21px;
			text-align: center;
			font-weight: bold; 
			outline: 0;
			border-radius: 0.25rem;  
		} 
		.font-select > span { 
			height: 44px;
			line-height: 32px;
			padding: 4px 8px 3px 8px; 
		}
		/* Chrome, Safari, Edge, Opera */
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
			  -webkit-appearance: none;
			  margin: 0;
			}

			/* Firefox */
			input[type=number] {
			  -moz-appearance: textfield;
			}
			
			
			
			.carousel-inner img {
				width: 100%;
				height: 100%
			}

			#custCarousel .carousel-indicators {
				position: static;
				margin-top: 20px
			}

			#custCarousel .carousel-indicators>li {
				width: 100px
			}

			#custCarousel .carousel-indicators li img {
				display: block;
				opacity: 0.5
			}

			#custCarousel .carousel-indicators li.active img {
				opacity: 1
			}

			#custCarousel .carousel-indicators li:hover img {
				opacity: 0.75
			}

			.carousel-item img {
				width: 80%
			}
			.textarea_section1, .projected_section1, .mounting_section1, .thickness_section1, .paper_template1, .other_font1
			{
				display:none;
			}
	</style>
	<!-- For Internet Explorer 11: include intersection observer polyfill
	<script src="https://cdn.jsdelivr.net/npm/intersection-observer/intersection-observer.js"></script>
	--> 
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script> 
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="jquery.fontselect.js"></script>
	<script>

	var apr_width = 0;
	var sec_curnt_font_val1 = '';
	function applyFont(element, fontSpec) {
		if(fontSpec != 'Other Font')
		{ 
			 apr_width = 0;
			if (!fontSpec) 
			{
				// Font was cleared
				console.log('You cleared font');

				$(element).css({
					fontFamily: 'inherit',
					fontWeight: 'normal',
					fontStyle: 'normal'
				});
				return;
			} 
			console.log('You selected font: ' + fontSpec);
			
			// Split font into family and weight/style
			var tmp = fontSpec.split(':'),
				family = tmp[0],
				variant = tmp[1] || '400',
				weight = parseInt(variant,10),
				italic = /i$/.test(variant);

			// Apply selected font to element
			$(element).css({
				fontFamily: "'" + family + "'",
				fontWeight: weight,
				fontStyle: italic ? 'italic' : 'normal'
			});
		}
		else
		{ 
			fontSpec = 'Inter';
			console.log('You selected font: ' + fontSpec);
			// Split font into family and weight/style
			var tmp = fontSpec.split(':'),
				family = tmp[0],
				variant = tmp[1] || '400',
				weight = parseInt(variant,10),
				italic = /i$/.test(variant);

			// Apply selected font to element
			$(element).css({
				fontFamily: "'" + family + "'",
				fontWeight: weight,
				fontStyle: italic ? 'italic' : 'normal'
			});	
		}
		$(function() {
			// Highlight code samples:
			hljs.configure({
				tabReplace: '   ', // 3 spaces
			});
			$('pre code').each(function() {
				hljs.highlightBlock(this);
			});

		}); 
	}
	</script>
</head>
<body>

	<!-- Example 3 -->
	<div class="container mt-4">
		<div class="row"> 
			<div class="col-md-6">  
				<div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
					<!-- slides -->
					<div class="carousel-inner">
						<div class="carousel-item active"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_800,q_auto,w_800/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-stanley.jpg" alt="Hills"> </div>
						<div class="carousel-item"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letters.jpg" alt="Hills"> </div>
						<div class="carousel-item"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letter-wood-sign.jpg" alt="Hills"> </div> 
						<div class="carousel-item"> <img  src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-neighborhood.jpg" alt="Hills"> </div> 
						<div class="carousel-item"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-neighborhood.jpg" alt="Hills"> </div> 
					</div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
					<ol class="carousel-indicators list-inline">
						<li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_800,q_auto,w_800/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-stanley.jpg" class="img-fluid"> </a> </li>
						<li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letters.jpg" class="img-fluid"> </a> </li>
						<li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letter-wood-sign.jpg" class="img-fluid"> </a> </li>
						<li class="list-inline-item"> <a id="carousel-selector-3" data-slide-to="3" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-neighborhood.jpg" class="img-fluid"> </a> </li>
						<li class="list-inline-item"> <a id="carousel-selector-4" data-slide-to="4" data-target="#custCarousel"> <img src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_150,q_auto,w_150/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-sign-neighborhood.jpg" class="img-fluid"> </a> </li>
					</ol>
				</div> 
			</div>
			<div class="col-md-6 pt-2 p-0">
				<div class="col-md-12 p-5 text-center">
					<h3>Painted Metal Letters</h3>
				</div>
				<div class="border">
					<div class="section_1">
						<h3><p id="sample1" class="p-3 text-center border" style="font-size: 50px;overflow: auto;">Enter Your Text</p></h3>
						<div class="col-md-12 align-self-center p-2">
							<textarea type="text" Placeholder="Enter Your Text" id="fname1" name="fname1" onkeyup="gettext(this.id)" class="form-control onchange_fun"></textarea>
						</div>
						<div class="d-flex border-bottom border-top p-2">
							<div class="col-md-3 text-right align-self-center">
								Choose font
							</div>
							<div class="col-md-8 align-self-center">
								<div class="example"> 
									<div class="">
										<input id="font1" type="text" class="onchange_fun">
										<script>
											$('#font1').fontselect({
												systemFonts: false,
												localFonts: false,
												// systemFonts: ['Arial','Times+New+Roman', 'Verdana'],
												// localFonts: ['Action Man', 'Bauer', 'Bubble'],
												googleFonts: ['Piedra', 'Questrial', 'Ribeye', 'Other Font'],
												// localFontsUrl: 'fonts/' // End with a slash!

											}).on('change', function() { 
												applyFont(".sple1", this.value); 
												var count = $('.sple1').text().replace(/\s+/g, '').length;  
												$(".w_count1").text(count);
												sec_curnt_font_val1 = this.value;
											}); 
										</script> 		 
									</div>
								</div>
							</div> 
						</div>
						<div class="other_font1">
							<div class="d-flex border-bottom border-top p-2">
								<div class="col-md-3 text-right align-self-center">
									Select Font
								</div>
								<div class="col-md-8 align-self-center"> 
									<input id="other_font_val" type="text" class="form-control" placeholder="Select other font" />
								</div>
							</div>
						</div>
						<div class="d-flex border-bottom border-top p-2">
							<div class="col-md-3 text-right align-self-center">
								Height
							</div>
							<div class="col-md-8 align-self-center">
								<select id="height1" class="form-control onchange_fun" name="height1">
									<option value="">Choose Height...</option>
									<?php 
										foreach($Heights as $Height) 
										{
										?>
										<option value="1" class="1">1 inch</option>
										........php...... code
										<?php
										} 
									?>
								</select>
							</div>
						</div>
						<div class="thickness_section1">
							<div class="d-flex border-bottom border-top p-2">
								<div class="col-md-3 text-right align-self-center">
									Thickness
								</div>
								<div class="col-md-8 align-self-center">
									<select class="onchange_fun form-control thickness1" id="thickness1" name="thickness1">
										<option value="">Choose Thickness...</option>
										<?php 
											foreach($Thickness as $Thicknes) 
											{
											?>
											........php...... code 
											<option value="1/8" class="80" id="" >1/8 inch</option>
											<option value="1/4" class="81" id="">1/4 inch</option>
											<option value="3/8" class="82" id="">3/8 inch</option>
											<option value="1/2" class="82" id="">1/2 inch</option>
											<option value="3/4" class="83" id="">3/4 inch</option>
											<option value="1" class="84" id="">1 inch</option>
											<?php
											} 
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="color1">
							<div class="d-flex border-bottom border-top p-2">
								<div class="col-md-3 text-right align-self-center">
									Color
								</div>
								<div class="col-md-8 align-self-center"> 
									<input type="color" id="color1" name="color1" class="form-control onchange_fun" />
								</div>
							</div>
						</div>
						<div class="mounting_section1">
							<div class="d-flex border-bottom border-top p-2">
								<div class="col-md-3 text-right align-self-center">
									Mounting Hardware
								</div>
								<div class="col-md-8 align-self-center">
									<select name="mounting_hardware1" class="form-control" onchange="add_mounting_hardware1()" id="mounting_hardware1">
										<option value="" id="none">- Select an Option -</option> 
										<option value="1">Flush Stud Mount ($4.50 per letter)</option>
										<option value="2">Projected Spacer ($4.50 per letter)</option>
										<option value="3">Projected Jam Nut ($4.50 per letter)</option>
										<option value="4">Corrugated Stud Mount ($4.50 per letter)</option>
										<option value="5">Flat Metal Wall Stud Mount ($4.50 per letter)</option>
									</select>
								</div>
							</div>
						</div>
						<div class="paper_template1">
							<div class="d-flex border-bottom border-top p-2 ">
								<div class="col-md-3 text-right align-self-center">
									Paper Template
								</div>
								<div class="col-md-8 align-self-center">
									<select name="paper_template1" class="form-control" onchange="add_paper_template1()" id="paper_template1">
										<option value="">- Select an Option -</option>
										<option value="1">Yes ($1.00 per letter)</option> 
									</select>
								</div>
							</div>
						</div>
						<div class="projected_section1">
							<div class="d-flex border-bottom border-top p-2 ">
								<div class="col-md-3 text-right align-self-center">
									Projected Spacer Length
								</div>
								<div class="col-md-8 align-self-center">
									<select name="projected_spacer_length" class="onchange_fun form-control" id="projected_spacer_length">
										<option value="">- Select an Option -</option>
										<option value="1">1/2 Inch</option>
										<option value="2">1 Inch</option>
										<option value="3">2 Inch</option>
										<option value="4">3 Inch</option>
										<option value="5">4 Inch</option> 
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex border-bottom border-top p-3">
						<div class="col-md-12 text-center align-self-center">
							<b>Approx. Width:</b> <span class="apr_width1">Enter text and select a Height to see Approx. Width.</span>
						</div> 
					</div>
					<div class="w_c_p_section1">	
						<div class="count_section1">
							<div class="d-flex border-bottom border-top p-2">
								<div class="col-md-6 align-self-center">
									Total Letter Count: <span class="w_count1"></span>
								</div>
								<div class="col-md-6 align-self-end">
									<button type="button" class="btn btn-primary btn-block bg-primary border-primary add_new_section" id="add_new_section" onclick="add_new_section()"><i class="fas fa-plus"></i> Add New Line</button>		
								</div>
							</div> 
						</div> 
						<div class="comments_section1">
							<div class="col-md-12">
								<div class="form-check-inline p-2">
								  <label class="form-check-label">
									<input type="checkbox" class="form-check-input" id="comments1" name="comments1">Comments
								  </label>
								</div>
							</div> 
						</div> 
						<div class="textarea_section1"> 
							<div class="col-md-12 p-2"> 
								<textarea type="text" class="form-control" rows="7" id="text_area1" name="text_area1" value=""></textarea>
							</div> 
						</div>   
						<div class="price_section1"> 
							<div class="d-flex border-bottom border-top p-2">
								<div class="col-md-4 align-self-center">
									Starting At: <b>$<span class="price1">10.00</span></b>
								</div>
								<div class="col-md-3 align-self-center d-flex">  
									<span class="pt-2 mr-2">QTY: </span> <input type="number" id="qty1" class="form-control w-50 onchange_fun" min="1" value="1">  
								</div>
								<div class="col-md-5 align-self-end">
									<button type="button" class="btn btn-primary bg-danger border-danger btn-block">Add to card</button>		
								</div>
							</div>
						</div> 
					</div>
					<div id="new_section" class="isempty"></div>
					<div class="col-md-12 text-center align-self-center p-3">
						<p>Manufacturing Time: Please Select Options</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Example 3 -->
	<?php
		$h_p1_8 = array("1"=>"6.20",
						"1.5"=>"7.30",
						"2"=>"9.30",
						"3"=>"12.40",
						"4"=>"17.60",
						"5"=>"19.60", 
						"6"=>"22.70",
						"7"=>"25.80",
						"8"=>"27.90",
						"9"=>"29.90",
						"10"=>"35.10",
						"11"=>"38.20",
						"12"=>"41.20", 
						"13"=>"46.40",
						"14"=>"51.50",
						"15"=>"61.80", 
						"16"=>"66.00", 
						"17"=>"73.20");  // 1/8 thickness
						
		$h_p1_4 = array("1"=>"9.30",
					"1.5"=>"10.30",
					"2"=>"11.40",
					"3"=>"14.50",
					"4"=>"19.60",
					"5"=>"23.70",
					"6"=>"28.90",
					"7"=>"35.10",
					"8"=>"37.10",
					"9"=>"39.20",
					"10"=>"43.30",
					"11"=>"46.40",
					"12"=>"49.50",
					"13"=>"53.60",
					"14"=>"58.80",
					"15"=>"64.90",
					"16"=>"69.10",
					"17"=>"76.30",
					"18"=>"78.30",
					"19"=>"87.60",
					"20"=>"97.90",
					"21"=>"108.20",
					"22"=>"117.50",
					"23"=>"128.80",
					"24"=>"156.60");  // 1/4 thickness
					
	$h_p3_8 = array("1"=>"13.00",
					"1.5"=>"16.00",
					"2"=>"18.00",
					"3"=>"22.00",
					"4"=>"30.00",
					"5"=>"36.00",
					"6"=>"39.00",
					"7"=>"47.00",
					"8"=>"51.00",
					"9"=>"56.00",
					"10"=>"60.00",
					"11"=>"65.00",
					"12"=>"71.00",
					"13"=>"77.00",
					"14"=>"84.00",
					"15"=>"95.00",
					"16"=>"105.00",
					"17"=>"114.00",
					"18"=>"124.00",
					"19"=>"135.00",
					"20"=>"145.00",
					"21"=>"156.00",
					"22"=>"167.00",
					"23"=>"178.00",
					"24"=>"188.00",
					"25"=>"200.00",
					"26"=>"213.00",
					"27"=>"227.00",
					"28"=>"241.00",
					"29"=>"255.00",
					"30"=>"270.00",
					"31"=>"294.00",
					"32"=>"319.00",
					"33"=>"344.00",
					"34"=>"370.00",
					"35"=>"396.00",
					"36"=>"420.00",
					"37"=>"446.00",
					"38"=>"472.00",
					"39"=>"498.00",
					"40"=>"525.00",
					"41"=>"551.00",
					"42"=>"577.00",
					"43"=>"604.00",
					"44"=>"629.00",
					"45"=>"656.00",
					"46"=>"682.00");  // 3/8 thickness	
					
	$h_p1_2 = array("2"=>"26.00", 
					"3"=>"31.00", 
					"4"=>"37.00", 
					"5"=>"41.00", 
					"6"=>"46.00", 
					"7"=>"52.00", 
					"8"=>"55.00", 
					"9"=>"61.00", 
					"10"=>"65.00", 
					"11"=>"75.00", 
					"12"=>"82.00", 
					"13"=>"94.00", 
					"14"=>"104.00", 
					"15"=>"115.00", 
					"16"=>"126.00", 
					"17"=>"142.00", 
					"18"=>"157.00", 
					"19"=>"171.00", 
					"20"=>"188.00", 
					"21"=>"204.00", 
					"22"=>"221.00", 
					"23"=>"236.00", 
					"24"=>"253.00", 
					"25"=>"269.00", 
					"26"=>"286.00", 
					"27"=>"304.00", 
					"28"=>"323.00", 
					"29"=>"340.00", 
					"30"=>"360.00", 
					"31"=>"392.00", 
					"32"=>"427.00", 
					"33"=>"462.00", 
					"34"=>"497.00", 
					"35"=>"532.00", 
					"36"=>"567.00", 
					"37"=>"603.00", 
					"38"=>"638.00", 
					"39"=>"674.00", 
					"40"=>"710.00", 
					"41"=>"746.00", 
					"42"=>"782.00", 
					"43"=>"818.00", 
					"44"=>"854.00", 
					"45"=>"891.00", 
					"46"=>"926.00");  // 1/4 thickness
									
	$h_p3_4 = array("2"=>"28.00", 
					"3"=>"33.00", 
					"4"=>"38.00", 
					"5"=>"43.00", 
					"6"=>"52.00", 
					"7"=>"63.00", 
					"8"=>"73.00", 
					"9"=>"82.00", 
					"10"=>"95.00", 
					"11"=>"107.00", 
					"12"=>"122.00", 
					"13"=>"138.00", 
					"14"=>"155.00", 
					"15"=>"173.00", 
					"16"=>"193.00", 
					"17"=>"217.00", 
					"18"=>"241.00", 
					"19"=>"266.00", 
					"20"=>"290.00", 
					"21"=>"316.00", 
					"22"=>"342.00", 
					"23"=>"369.00", 
					"24"=>"396.00", 
					"25"=>"416.00", 
					"26"=>"439.00", 
					"27"=>"461.00", 
					"28"=>"485.00", 
					"29"=>"509.00", 
					"30"=>"536.00", 
					"31"=>"604.00", 
					"32"=>"674.00", 
					"33"=>"744.00", 
					"34"=>"814.00", 
					"35"=>"884.00", 
					"36"=>"973.00", 
					"37"=>"1025.00", 
					"38"=>"1094.00", 
					"39"=>"1164.00", 
					"40"=>"1235.00", 
					"41"=>"1306.00", 
					"42"=>"1377.00", 
					"43"=>"1448.00", 
					"44"=>"1520.00", 
					"45"=>"1590.00", 
					"46"=>"1661.00");  // 3/4 thickness
									
	$h_p1 = array("2"=>"33.00", 
					"3"=>"37.00", 
					"4"=>"42.00", 
					"5"=>"50.00", 
					"6"=>"57.00", 
					"7"=>"70.00", 
					"8"=>"83.00", 
					"9"=>"100.00", 
					"10"=>"119.00", 
					"11"=>"139.00", 
					"12"=>"160.00", 
					"13"=>"182.00", 
					"14"=>"206.00", 
					"15"=>"229.00", 
					"16"=>"257.00", 
					"17"=>"286.00", 
					"18"=>"316.00", 
					"19"=>"353.00", 
					"20"=>"394.00", 
					"21"=>"435.00", 
					"22"=>"478.00", 
					"23"=>"523.00", 
					"24"=>"571.00", 
					"25"=>"608.00", 
					"26"=>"648.00", 
					"27"=>"688.00", 
					"28"=>"729.00", 
					"29"=>"769.00", 
					"30"=>"816.00", 
					"31"=>"886.00", 
					"32"=>"964.00", 
					"33"=>"1041.00", 
					"34"=>"1118.00", 
					"35"=>"1196.00", 
					"36"=>"1272.00", 
					"37"=>"1349.00", 
					"38"=>"1426.00", 
					"39"=>"1504.00", 
					"40"=>"1582.00", 
					"41"=>"1660.00", 
					"42"=>"1738.00", 
					"43"=>"1817.00", 
					"44"=>"1895.00", 
					"45"=>"1972.00", 
					"46"=>"2051.00");  // 3/4 thickness 
	?>
	<script>
		var status_count = 1;    
		var add_new_section_count = 1;    
		var show_section = 0;    
		var pr_count1 = 0;
		var m_hcount1 = 0;
		var last_price = 0;
		var current_price = 0;
		var btn_count = 0;
		var final_apr_width = 1;
		//find privious value of selection box
		
		$(".onchange_fun").change(function(){
			var height1 = $("#height1").val();
			var thickness1 = $("#thickness1").val();
			var mounting_hardware1 = $("#mounting_hardware1").val(); 
			var paper_template1 = $("#paper_template1").val(); 
			var price1 = $(".price1").text(); 
			var check =  $(this).attr("id"); 
			// alert(check);
			var cout_val1 = $(".w_count1").text();
			var qty1 = $("#qty1").val(); 
			
			$('.sple1').css("color", $("#"+check).val()); 
			if(check == 'height1')
			{ 
				$(".thickness_section1").show();
			}
			if(check == 'thickness1')
			{ 
				if(height1 <= 17 && thickness1 == "1/8")
				{  
					$(".mounting_section1").hide();
					$(".paper_template1").show(); 
					$('#paper_template1 option:eq(0)').prop('selected', true);  
					$('#mounting_hardware1 option:eq(0)').prop('selected', true);  
					pr_count1 = 0;
					m_hcount1 = 0; 
				}
				else
				{ 
					$(".mounting_section1").show();
					$(".paper_template1").hide(); 
					$('#paper_template1 option:eq(0)').prop('selected', true);  
					$('#mounting_hardware1 option:eq(0)').prop('selected', true); 
					pr_count1 = 0;
					m_hcount1 = 0;
				}
			}
			if(check == 'mounting_hardware1')
			{
				$(".projected_section1").show();
			}  
			//hide thickness value
				if(height1 >= 18)
				{
					if(height1 >= 18 && thickness1 == "1/8")
					{
						$('#thickness1 option:eq(0)').prop('selected', true);  
						$(".price1").text("6.20");  
						$(".mounting_section1").hide();
						$(".paper_template1").hide(); 
						$('#paper_template1 option:eq(0)').prop('selected', true);  
						$('#mounting_hardware1 option:eq(0)').prop('selected', true); 
					}  
					// $('#1_8_inch1').hide(); 
					$('#thickness1 option:eq(1)').hide();
				} 
				else
				{ 
					$('#thickness1 option:eq(1)').show();	
				}
				if(height1 >= 25)
				{
					if(height1 >= 25 && (thickness1 == "1/8" ||  thickness1 == "1/4"))
					{
						$('#thickness1 option:eq(0)').prop('selected', true);  
						$(".price1").text("6.20");  
						$(".mounting_section1").hide();
						$(".paper_template1").hide(); 
						$('#paper_template1 option:eq(0)').prop('selected', true);  
						$('#mounting_hardware1 option:eq(0)').prop('selected', true); 
					}
					$('#thickness1 option:eq(2)').hide();
					// $('#1_4_inch2').hide();	
				} 
				else
				{ 
					$('#thickness1 option:eq(2)').show();
					// $('#1_4_inch2').show();	
				}
				
				if(height1 <= 1.5 )
				{
					if(height1 <= 11.5 && (thickness1 == "1/2" ||  thickness1 == "3/4" ||  thickness1 == "1"))
					{
						$('#thickness1 option:eq(0)').prop('selected', true);  
						$(".price1").text("6.20");  
						$(".mounting_section1").hide();
						$(".paper_template1").hide(); 
						$('#paper_template1 option:eq(0)').prop('selected', true);  
						$('#mounting_hardware1 option:eq(0)').prop('selected', true); 
					}
					$('#thickness1 option:eq(4)').hide();
					$('#thickness1 option:eq(5)').hide();
					$('#thickness1 option:eq(6)').hide();
					// $('#1_2_inch4').hide();	
					// $('#3_4_inch5').hide();	
					// $('#1_inch6').hide();	
				} 
				else
				{ 
					$('#thickness1 option:eq(4)').show();
					$('#thickness1 option:eq(5)').show();
					$('#thickness1 option:eq(6)').show();
					// $('#1_2_inch4').show();	
					// $('#3_4_inch5').show();	
					// $('#1_inch6').show();	
				}
				
			//////////////
			<?php 
			foreach($h_p1_8 as $height => $price) 
			{
			?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1/8")
				{ 
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php } foreach($h_p1_4 as $height => $price) { ?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1/4")
				{ 
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php } foreach($h_p3_8 as $height => $price) { ?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "3/8")
				{ 
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
				<?php } foreach($h_p1_2 as $height => $price) { ?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1/2")
				{ 
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php }  foreach($h_p3_4 as $height => $price) {?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "3/4")
				{ 
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php } foreach($h_p1 as $height => $price) {?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1")
				{ 
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php } ?>
			if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Piedra' && height1 != '')
			{  
				$(".other_font1").hide(); 
				var textarea = $("#fname1").val();
				if(textarea == textarea.toUpperCase())  
				{
					apr_width = 1.1; 
				}
				else
				{
					apr_width = 0.8; 
				} 
				final_apr_width = 1;
				$(".apr_width1").text("");	 
				cout_val1 = $(".w_count1").text();	
				cout_val1 = parseInt(cout_val1);
				final_apr_width = height1 * apr_width;      
				final_apr_width = final_apr_width * cout_val1; 
				$(".apr_width1").text(final_apr_width.toFixed(1)); 
			} 
			else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Questrial' && height1 != '')
			{
				$(".other_font1").hide();
				var textarea = $("#fname1").val();
				if(textarea == textarea.toUpperCase())  
				{
					apr_width = 1; 
				}
				else
				{
					apr_width = 0.7; 
				}
				
				final_apr_width = 1;
				$(".apr_width1").text(""); 
				cout_val1 = $(".w_count1").text();	
				cout_val1 = parseInt(cout_val1);   
				final_apr_width = height1 * apr_width;  
				final_apr_width = final_apr_width + cout_val1; 
				$(".apr_width1").text(final_apr_width.toFixed(1));
				
			}
			else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Ribeye' && height1 != '')
			{
				apr_width = 1.1;
				$(".other_font1").hide(); 
				final_apr_width = 1;
				$(".apr_width1").text(""); 
				cout_val1 = $(".w_count1").text();	
				cout_val1 = parseInt(cout_val1);   
				final_apr_width = height1 * apr_width;  
				final_apr_width = final_apr_width + cout_val1; 
				$(".apr_width1").text(final_apr_width.toFixed(1));
			}
			else if(sec_curnt_font_val1 != '' && sec_curnt_font_val1 == 'Other Font' && height1 != '')
			{
				//A//
				$(".other_font1").show(); 
				final_apr_width = 1; 
				$(".apr_width1").text("Enter text and select a Height to see Approx. Width.");
			} 	
			if(sec_curnt_font_val1 == 'Other Font')
			{
				$(".other_font1").show(); 
			}
			else
			{
				$(".other_font1").hide();  
			}
			
		});   
		
		function add_paper_template1() 
		{ 
			var height1 = $("#height1").val();
			var thickness1 = $("#thickness1").val();
			var mounting_hardware1 = $("#mounting_hardware1").val(); 
			var paper_template1 = $("#paper_template1").val(); 
			var price1 = $(".price1").text(); 
			var cout_val1 = $(".w_count1").text();
			var qty1 = $("#qty1").val(); 
			if(paper_template1 <= 1 && paper_template1 != '')
			{
				// alert(pr_count1);	
				if(pr_count1 == 0){
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val(); 
					cout_val1 = parseFloat(cout_val1); 
					price1 = parseFloat(price1);   
					cout_val1 = ((cout_val1)*1);
					price1 = (price1+cout_val1);	
					price1 = (price1.toFixed(2)); 
					// alert(price1);	
					$(".price1").text(price1);
					pr_count1 = 1;
				}
			} 
			else
			{
				cout_val1 = $(".w_count1").text(); 
				qty1 = $("#qty1").val(); 
				cout_val1 = parseFloat(cout_val1); 
				price1 = parseFloat(price1);   
				cout_val1 = ((cout_val1)*1);
				price1 = (price1-cout_val1);	
				price1 = (price1.toFixed(2));  
				$(".price1").text(price1);
				pr_count1 = 0;
			}
		}
		 
		function add_mounting_hardware1() 
		{ 
			var height1 = $("#height1").val();
			var thickness1 = $("#thickness1").val();
			var mounting_hardware1 = $("#mounting_hardware1").val(); 
			var paper_template1 = $("#paper_template1").val(); 
			var price1 = $(".price1").text(); 
			var check =  $(this).attr("id"); 
			// alert(check);
			var cout_val1 = $(".w_count1").text();
			var qty1 = $("#qty1").val(); 
			if(mounting_hardware1 <= 5 && mounting_hardware1 != '')
			{
				// alert(m_hcount1);
				if(m_hcount1 == 0){
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val(); 
					cout_val1 = parseFloat(cout_val1); 
					price1 = parseFloat(price1);   
					cout_val1 = ((cout_val1)*4.50);
					price1 = (price1+cout_val1);	
					price1 = (price1.toFixed(2)); 
					// alert(price1);	
					$(".price1").text(price1);
					m_hcount1 = 1;	
				}
			}	
			else
			{
				cout_val1 = $(".w_count1").text(); 
				qty1 = $("#qty1").val(); 
				cout_val1 = parseFloat(cout_val1); 
				price1 = parseFloat(price1);   
				cout_val1 = ((cout_val1)*4.50);
				price1 = (price1-cout_val1);	
				price1 = (price1.toFixed(2));  
				$(".price1").text(price1);
				m_hcount1 = 0;
			}
		}
		var count = $('.sple1').text().replace(/\s+/g, '').length;  
		$(".w_count1").text(count);
		$('#comments1').click(function() { 
			if ($('#comments1').is(":checked"))
			{ 
				$(".textarea_section1").show();
			}
			else
			{ 
				$(".textarea_section1").hide();
			}			
		});
		//////////////////////////////////////////////////////////////////////////////add_new_line code start//////////////////////////////////////////////////////////////////////////////////////////////////////////
		function add_new_section() { 
			if(btn_count <= 2){
			add_new_section_count += 1;  
			btn_count += 1;  
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() 
			{
				if (this.readyState == 4 && this.status == 200) {
				 $("#new_section").append(this.responseText); 
					
				}
			};
			xhttp.open("GET", "cut metal letters2.php?status_count="+add_new_section_count, true);
			xhttp.send();  
			show_section += 1;  			
			$(".w_c_p_section1").hide();
			$("#new_section").children().last().find(".sec").hide();
			$(".w_c_p_section"+show_section).hide();
			$(".w_c_p_section"+add_new_section_count).show();
			// last_price = $('.price1').text();
			// $('.price1').text("6.20");
			// $( ".fp-sample" ).addClass("fp-sample")  
			}
			else
			{
				$(".add_new_section").hide();
			}
		}
		
		//////////////////////////////////////////////////////////////////////////////add_new_line code end//////////////////////////////////////////////////////////////////////////////////////////////////////////
		//next page funtion show different div
		function onchange_fun_sec2(id)
		{
			var height2 = $("#height"+status_count).val();
			var thickness2 = $("#thickness"+status_count).val();
			var mounting_hardware2 = $("#mounting_hardware"+status_count).val(); 
			var paper_template2 = $("#paper_template"+status_count).val(); 
			var price2 = $(".price"+status_count).text();   
			var cout_val2 = $(".w_count"+status_count).text();
			var qty2 = $("#qty"+status_count).val(); 
			var check = id; 
			// status_count = id.slice(-1);  //get the last value of id which will be in numeric form  
			//alert(status_count);
			// status_count = parseInt(status_count);
			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form 
			status_count = parseInt(status_count); 
			if(current_font_val == 'Other Font')
			{
				$(".other_font"+status_count).show(); 
			}
			else
			{
				$(".other_font"+status_count).hide();  
			}
			var fname_txt = $('#fname'+status_count).text();  
			
			if(check == 'height'+status_count)
			{
				$(".thickness_section"+status_count).show();
			}
			if(check == 'thickness'+status_count)
			{ 
				if(height2 <=17 && thickness2 == "1/8")
				{  
					$(".mounting_section"+status_count).hide();
					$(".paper_template"+status_count).show(); 
					$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
					$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true);  
					///pr_count1 = 0;
					///m_hcount1 = 0;
				}
				else
				{ 
					$(".mounting_section"+status_count).show();
					$(".paper_template"+status_count).hide(); 
					$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
					$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					///pr_count1 = 0;
					///m_hcount1 = 0;
				} 
			}
			if(check == 'mounting_hardware'+status_count)
			{
				$(".projected_section"+status_count).show();
			}
			//hide thickness value
				if(height2 >= 18)
				{
					if(height2 >= 18 && thickness2 == "1/8")
					{
						$('#thickness'+status_count+' option:eq(0)').prop('selected', true);  
						$(".price"+status_count).text("6.20");  
						$(".mounting_section"+status_count).hide();
						$(".paper_template"+status_count).hide(); 
						$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
						$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					}  
					// $('#1_8_inch1'+status_count).hide(); 
					$('#thickness'+status_count+' option:eq(1)').hide();	
				} 
				else
				{ 
					$('#thickness'+status_count+' option:eq(1)').show();
					// $('#1_8_inch1'+status_count).show();	
				}
				if(height2 >= 25)
				{
					if(height2 >= 25 && (thickness2 == "1/8" ||  thickness2 == "1/4"))
					{
						$('#thickness'+status_count+' option:eq(0)').prop('selected', true);  
						$(".pric"+status_count).text("6.20");  
						$(".mounting_section"+status_count).hide();
						$(".paper_template"+status_count).hide(); 
						$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
						$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					}
					$('#thickness'+status_count+' option:eq(2)').hide();
					// $('#1_4_inch2'+status_count).hide();	
				} 
				else
				{ 
					$('#thickness'+status_count+' option:eq(2)').show();
					// $('#1_4_inch2'+status_count).show();	
				}
				
				if(height2 <= 1.5 )
				{
					if(height2 <= 11.5 && (thickness2 == "1/2" ||  thickness2 == "3/4" ||  thickness2 == "1"))
					{
						$('#thickness'+status_count+' option:eq(0)').prop('selected', true);  
						$(".price"+status_count).text("6.20");  
						$(".mounting_section"+status_count).hide();
						$(".paper_template"+status_count).hide(); 
						$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
						$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					}
					$('#thickness'+status_count+' option:eq(4)').hide();
					$('#thickness'+status_count+' option:eq(5)').hide();
					$('#thickness'+status_count+' option:eq(6)').hide();
					// $('#1_2_inch4'+status_count).hide();	
					// $('#3_4_inch5'+status_count).hide();	
					// $('#1_inch6'+status_count).hide();	
				} 
				else
				{ 
					$('#thickness'+status_count+' option:eq(4)').show();
					$('#thickness'+status_count+' option:eq(5)').show();
					$('#thickness'+status_count+' option:eq(6)').show();
					// $('#1_2_inch4'+status_count).show();	
					// $('#3_4_inch5'+status_count).show();	
					// $('#1_inch6'+status_count).show();	
				} 	
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			<?php 
			foreach($h_p1_8 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1/8")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p1_4 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1/4")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p3_8 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "3/8")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p1_2 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1/2")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p3_4 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "3/4")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			} 
			foreach($h_p1 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			} 
			?>   	
			///////////////////////////////////////////////////////////// 1 /////////////////////////////////////////////////////////////////////////////////////////////////
			var price2 = $(".price"+status_count+"").text(); 
			if(price2 == "NaN")
			{  
				$(".price"+status_count).text("6.20");	
			}
			
			if(current_font_val != '' && current_font_val == "Piedra" && height2 != '')
			{   
				$(".other_font"+status_count).hide(); 
				var textarea = $("#fname"+status_count).val();
				if(textarea == textarea.toUpperCase())  
				{
					apr_width = 1.1;
				}
				else
				{
					apr_width = 0.8; 
				}
				
				final_apr_width = 1;
				$(".apr_width"+status_count).text("");	 
				cout_val2 = $(".w_count"+status_count).text();	
				cout_val2 = parseInt(cout_val2);  
				final_apr_width = height2 * apr_width;    
				final_apr_width = final_apr_width * cout_val2; 
				$(".apr_width"+status_count).text(final_apr_width.toFixed(1)); 
			}
			else if(current_font_val != '' && current_font_val == "Questrial" && height2 != '')
			{   
				$(".other_font"+status_count).hide(); 
				var textarea = $("#fname"+status_count).val();
				if(textarea == textarea.toUpperCase())  
				{
					apr_width = 1; 
				}
				else
				{
					apr_width = 0.7; 
				}
				
				final_apr_width = 1;
				$(".apr_width"+status_count).text("");	 
				cout_val2 = $(".w_count"+status_count).text();	
				cout_val2 = parseInt(cout_val2); 
				final_apr_width = height2 * apr_width;     
				final_apr_width = final_apr_width * cout_val2; 
				$(".apr_width"+status_count).text(final_apr_width.toFixed(1)); 
			}
			else if(current_font_val != '' && current_font_val == "Ribeye" && height2 != '')
			{   
				apr_width = 1.1; 
				$(".other_font"+status_count).hide(); 
				final_apr_width = 1;
				$(".apr_width"+status_count).text("");  
				cout_val2 = $(".w_count"+status_count).text();	
				cout_val2 = parseInt(cout_val2);   
				final_apr_width = height2 * apr_width;  
				final_apr_width = final_apr_width + cout_val2; 
				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));
			}
			else if(current_font_val != '' && current_font_val == "Other Font" && height2 != '')
			{    
				$(".other_font"+status_count).show(); 
				final_apr_width = 1; 
				$(".apr_width"+status_count).text("Enter text and select a Height to see Approx. Width.");
			} 
			$('.fname'+status_count).css("color", $("#color"+status_count).val());
		} 
		///////////////////////////////////////////////////////////// end and add_paper_templatefuntion for section 2/////////////////////////////////////////////////////////////////////////////////////////////////
		function add_paper_template2() 
		{ 
			var height2 = $("#height"+status_count).val();
			var thickness2 = $("#thickness"+status_count).val();
			var mounting_hardware2 = $("#mounting_hardware"+status_count).val(); 
			var paper_template2 = $("#paper_template"+status_count).val(); 
			var price2 = $(".price"+status_count).text();   
			var cout_val1 = $(".w_count"+status_count).text();
			var qty2 = $("#qty"+status_count).val(); 
				// alert("1");
				///previous is come from new_section,php file
			if(paper_template2 != '' && previous == '')
			{ 
				// alert("2")
					cout_val = $(".w_count1").text(); 
					qty2 = $("#qty"+status_count).val(); 
					cout_val2 = $(".w_count"+status_count).text();
					price2 = parseFloat(price2);   
					cout_val2 = ((cout_val2)*1);
					price2 = (price2+cout_val2);	
					price2 = (price2.toFixed(2)); 
					// alert(price2);	
					$(".price"+status_count).text(price2); 
			} 
			else if(paper_template2 == '' && previous != '')
			{
				// alert("3")
				cout_val2 = $(".w_count"+status_count).text();
				qty2 = $("#qty"+status_count).val(); 
				cout_val2 = parseFloat(cout_val2); 
				price2 = parseFloat(price2);   
				cout_val2 = ((cout_val2)*1);
				price2 = (price2-cout_val2);	
				price2 = (price2.toFixed(2));  
				$(".price"+status_count).text(price2); 
			}
		}
		function add_mounting_hardware2() 
		{ 
			var height2 = $("#height"+status_count).val();
			var thickness2 = $("#thickness"+status_count).val();
			var mounting_hardware2 = $("#mounting_hardware"+status_count).val(); 
			var paper_template2 = $("#paper_template"+status_count).val(); 
			var price2 = $(".price"+status_count).text();   
			var cout_val1 = $(".w_count"+status_count).text();
			var qty2 = $("#qty"+status_count).val(); 
				// alert("1");
				///previous is come from new_section,php file
			if(mounting_hardware2 != '' && previous == '')
			{ 
				// alert("2")
					cout_val = $(".w_count1").text(); 
					qty2 = $("#qty"+status_count).val(); 
					cout_val2 = $(".w_count"+status_count).text();
					price2 = parseFloat(price2);   
					cout_val2 = ((cout_val2)*4.00);
					price2 = (price2+cout_val2);	
					price2 = (price2.toFixed(2)); 
					// alert(price2);	
					$(".price"+status_count).text(price2); 
			} 
			else if(mounting_hardware2 == '' && previous != '')
			{
				// alert("3")
				cout_val2 = $(".w_count"+status_count).text();
				qty2 = $("#qty"+status_count).val(); 
				cout_val2 = parseFloat(cout_val2); 
				price2 = parseFloat(price2);   
				cout_val2 = ((cout_val2)*4.00);
				price2 = (price2-cout_val2);	
				price2 = (price2.toFixed(2));  
				$(".price"+status_count).text(price2); 
			}
		}
		
		///////////////////////////////////////////////////////////////////////////////////////////////  end ////////////////////////////////////////////////////////////////////////////////////////////////////
		function delete_section(id){ 
			// $('#new_section').children().last().remove();
			$(".add_new_section").show();
			$('.'+id).remove();
			btn_count -=1; 
			$("#new_section").children().last().find(".sec").show();
			if($('.isempty').length == 1)
			{ 
				$('.w_c_p_section1').show();
			}
			var delete_section = id;  
			// $("."+id).removeClass("sec");
			var hide_sec =  $('.sec').length; 
			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form 
			// alert(status_count);  
			// $("#new_section").is(':empty'); 
			status_count = parseInt(status_count);  	
			$(".fname"+status_count).html("");
			var count = $('.sple1').text().replace(/\s+/g, '').length;									
			$(".w_count1").text(count);
			var count2 = $('.fname'+status_count).text().replace(/\s+/g, '').length;									
			$(".w_count"+status_count).text(count2);
			current_price = $('.price1').text();
		} 
		
		function gettext(id)
		{ 
			var price1 = $(".price1").text(); 
			var gettext = $("#"+id).val();  
			var txt = $('#sample1').text();
			var height1 = $("#height1").val();
			var thickness1 = $("#thickness1").val();
			var mounting_hardware1 = $("#mounting_hardware1").val();			
			var cout_val1 = $(".w_count1").text();
			var qty1 = $("#qty1").val();
			if(txt == "Enter Your Text")
			{ 	
				$("#sample1").html("");
				$("#sample1").append('<div class="sple1">'+gettext+'<div>');	
			}
			else
			{ 
				$(".sple1").remove("");
				$("#sample1").append('<div class="sple1">'+gettext+'<div>');	
			} 
			var count = $('.sple1').text().replace(/\s+/g, '').length;
			$(".w_count1").text(count);  
			applyFont('.sple1', sec_curnt_font_val1);
			$('.sple1').css("color", $("#color1").val());   
			
			<?php 
			foreach($h_p1_8 as $height => $price) 
			{
			?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1/8")
				{ 
					cout_val1 = $(".w_count1").text(); 
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php 
			}  
			foreach($h_p1_4 as $height => $price) 
			{?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1/4")
				{ 
					cout_val1 = $(".w_count1").text();
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php 
			}  
			foreach($h_p3_8 as $height => $price) 
			{?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "3/8")
				{ 
					cout_val1 = $(".w_count1").text();
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php 
			}   
			foreach($h_p1_2 as $height => $price) 
			{?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1/2")
				{ 
					cout_val1 = $(".w_count1").text();
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php 
			}  
			foreach($h_p3_4 as $height => $price) 
			{?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "3/4")
				{ 
					cout_val1 = $(".w_count1").text();
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php 
			}  
			foreach($h_p1 as $height => $price) 
			{?>
				if(height1 == "<?php echo $height ?>" && thickness1 == "1")
				{ 
					cout_val1 = $(".w_count1").text();
					qty1 = $("#qty1").val();
					cout_val1 = parseFloat(cout_val1); 
					cout_val1 = ((cout_val1)*<?php echo $price?>);
					cout_val1 = (cout_val1.toFixed(2));
					$(".price1").text(" ");
					$(".price1").text(cout_val1);
				} 
			<?php 
			} 
			?>
			
			$('#paper_template1 option:eq(0)').prop('selected', true);  
			$('#mounting_hardware1 option:eq(0)').prop('selected', true);
			m_hcount1 =0;	
			pr_count1 =0; 		
		} 
		function gettext2(id)
		{
			var gettext = $("#"+id).val(); 
			var txt = $('#sample1').text(); 
			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form 
			// status_count = id.slice(-1);	
			status_count = parseInt(status_count); 
			var fname_txt = $('#fname'+status_count).text(); 
			var height2 = $("#height"+status_count).val();
			var thickness2 = $("#thickness"+status_count).val();
			var mounting_hardware2 = $("#mounting_hardware"+status_count).val(); 
			var paper_template2 = $("#paper_template"+status_count).val(); 
			var price2 = $(".price"+status_count).text();   
			var cout_val2 = $(".w_count"+status_count).text();
			var qty2 = $("#qty"+status_count).val(); 
			var check = id; 
			// status_count = id.slice(-1);  //get the last value of id which will be in numeric form  
			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form 
			// alert(status_count);
			// status_count = parseInt(status_count);
			status_count = parseInt(status_count);
			if(txt == "Enter Your Text")
			{ 	
				$("#sample1").html(""); 
				$("#sample1").append('<div class="'+id+'">'+gettext+'</div>'); 
			}else
			{
				$("."+id).remove();
				$("#sample1").append('<div class="'+id+'">'+gettext+'</div>');
				
			}  
			var count2 = $('.'+id).text().replace(/\s+/g, '').length;	 
			$(".w_count"+status_count).text(count2);  			
			var find_class_name = $('div.'+id+'').length; 
			var fontfamily2 = $("#font"+status_count).val(); 
			// applyFont('.fname'+status_count, $(".fname"+status_count).css("font-family")); ///check font style/// after remove text in text box/// 
			applyFont('.fname'+status_count, fontfamily2); 
			
			if(check == 'height'+status_count)
			{
				$(".thickness_section"+status_count).show();
			}
			if(check == 'thickness'+status_count)
			{ 
				if(height2 <=17 && thickness2 == "1/8")
				{  
					$(".mounting_section"+status_count).hide();
					$(".paper_template"+status_count).show(); 
					$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
					$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true);  
					///pr_count1 = 0;
					///m_hcount1 = 0;
				}
				else
				{ 
					$(".mounting_section"+status_count).show();
					$(".paper_template"+status_count).hide(); 
					$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
					$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					///pr_count1 = 0;
					///m_hcount1 = 0;
				} 
			}
			if(check == 'mounting_hardware'+status_count)
			{
				$(".projected_section"+status_count).show();
			}
			//hide thickness value
				if(height2 >= 18)
				{
					if(height2 >= 18 && thickness2 == "1/8")
					{
						$('#thickness'+status_count+' option:eq(0)').prop('selected', true);  
						$(".price"+status_count).text("6.20");  
						$(".mounting_section"+status_count).hide();
						$(".paper_template"+status_count).hide(); 
						$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
						$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					}
					$('#thickness'+status_count+' option:eq(1)').hide();  
					// $('#1_8_inch1'+status_count).hide();   
				} 
				else
				{ 
					$('#thickness'+status_count+' option:eq(1)').show(); 
					// $('#1_8_inch1'+status_count).show();	
				}
				if(height2 >= 25)
				{
					if(height2 >= 25 && (thickness2 == "1/8" ||  thickness2 == "1/4"))
					{
						$('#thickness'+status_count+' option:eq(0)').prop('selected', true);  
						$(".pric"+status_count).text("6.20");  
						$(".mounting_section"+status_count).hide();
						$(".paper_template"+status_count).hide(); 
						$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
						$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					}
					$('#thickness'+status_count+' option:eq(2)').hide();
					// $('#1_4_inch2'+status_count).hide();	
				} 
				else
				{ 
					$('#thickness'+status_count+' option:eq(2)').show();
					// $('#1_4_inch2'+status_count).show();	
				}
				
				if(height2 <= 1.5 )
				{
					if(height2 <= 11.5 && (thickness2 == "1/2" ||  thickness2 == "3/4" ||  thickness2 == "1"))
					{
						$('#thickness'+status_count+' option:eq(0)').prop('selected', true);  
						$(".price"+status_count).text("6.20");  
						$(".mounting_section"+status_count).hide();
						$(".paper_template"+status_count).hide(); 
						$('#paper_template'+status_count+' option:eq(0)').prop('selected', true);  
						$('#mounting_hardware'+status_count+' option:eq(0)').prop('selected', true); 
					}
					$('#thickness'+status_count+' option:eq(4)').hide();
					$('#thickness'+status_count+' option:eq(5)').hide();
					$('#thickness'+status_count+' option:eq(6)').hide();
					// $('#1_2_inch4'+status_count).hide();	
					// $('#3_4_inch5'+status_count).hide();	
					// $('#1_inch6'+status_count).hide();	
				} 
				else
				{ 
					$('#thickness'+status_count+' option:eq(4)').show();
					$('#thickness'+status_count+' option:eq(5)').show();
					$('#thickness'+status_count+' option:eq(6)').show();
					// $('#1_2_inch4'+status_count).show();	
					// $('#3_4_inch5'+status_count).show();	
					// $('#1_inch6'+status_count).show();	
				}
				
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			<?php 
			foreach($h_p1_8 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1/8")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p1_4 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1/4")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p3_8 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "3/8")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p1_2 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1/2")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			}  
			foreach($h_p3_4 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "3/4")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			} 
			foreach($h_p1 as $height => $price) 
			{?>
				if(height2 == "<?php echo $height ?>" && thickness2 == "1")
				{ 
					cout_val2 = $(".w_count"+status_count).text(); 
					qty2 = $("#qty"+status_count).val();
					cout_val2 = parseFloat(cout_val2); 
					cout_val2 = ((cout_val2)*<?php echo $price?>);
					cout_val2 = (cout_val2.toFixed(2));
					$(".price"+status_count).text(" ");
					$(".price"+status_count).text(cout_val2); 
				} 
			<?php 
			} 
			?>
			$('#paper_template2 option:eq(0)').prop('selected', true);  
			$('#mounting_hardware2 option:eq(0)').prop('selected', true); 	
			///////////////////////////////////////////////////////////// 1 /////////////////////////////////////////////////////////////////////////////////////////////////
			var price2 = $(".price"+status_count+"").text();
			if(price2 == "NaN")
			{ 
				$(".price"+status_count).text("6.20");	
			}
			if(current_font_val != '' && current_font_val == "Piedra" && height2 != '')
			{   
				$(".other_font"+status_count).hide(); 
				var textarea = $("#fname"+status_count).val();
				if(textarea == textarea.toUpperCase())  
				{
					apr_width = 1.1;
				}
				else
				{
					apr_width = 0.8; 
				}
				
				final_apr_width = 1;
				$(".apr_width"+status_count).text("");	 
				cout_val2 = $(".w_count"+status_count).text();	
				cout_val2 = parseInt(cout_val2);  
				final_apr_width = height2 * apr_width;    
				final_apr_width = final_apr_width * cout_val2; 
				$(".apr_width"+status_count).text(final_apr_width.toFixed(1)); 
			}
			else if(current_font_val != '' && current_font_val == "Questrial" && height2 != '')
			{   
				$(".other_font"+status_count).hide(); 
				var textarea = $("#fname"+status_count).val();
				if(textarea == textarea.toUpperCase())  
				{
					apr_width = 1; 
				}
				else
				{
					apr_width = 0.7; 
				}
				
				final_apr_width = 1;
				$(".apr_width"+status_count).text("");	 
				cout_val2 = $(".w_count"+status_count).text();	
				cout_val2 = parseInt(cout_val2);
				final_apr_width = height2 * apr_width;      
				final_apr_width = final_apr_width * cout_val2; 
				$(".apr_width"+status_count).text(final_apr_width.toFixed(1)); 
			}
			else if(current_font_val != '' && current_font_val == "Ribeye" && height2 != '')
			{   
				apr_width = 1.1;
				$(".other_font"+status_count).hide(); 
				final_apr_width = 1;
				$(".apr_width"+status_count).text("");  
				cout_val2 = $(".w_count"+status_count).text();	
				cout_val2 = parseInt(cout_val2);   
				final_apr_width = height2 * apr_width;  
				final_apr_width = final_apr_width + cout_val2; 
				$(".apr_width"+status_count).text(final_apr_width.toFixed(1));
			}
			else if(current_font_val != '' && current_font_val == "Other Font" && height2 != '')
			{    
				$(".other_font"+status_count).show(); 
				final_apr_width = 1; 
				$(".apr_width"+status_count).text("Enter text and select a Height to see Approx. Width.");
			}
		// alert(id+" "+previous) 
			$('.fname'+status_count).css("color", $("#color"+status_count).val());
		}
		function comments2(id)	
		{
			status_count = id.match(/\d+/);	//get the last value of id which will be in numeric form 
			// alert(status_count); 
			status_count = parseInt(status_count); 
			if ($('#comments'+status_count).is(":checked"))
			{ 
				$(".textarea_section"+status_count).show();
			}
			else
			{ 
				$(".textarea_section"+status_count).hide();
			}			
		}  
		// var colorWell = document.querySelector("#color1");
		// colorWell.addEventListener("input", updateFirst1, false);
		// function updateFirst1(event) 
		// {
		  // var p = document.querySelector(".sple1");

		  // if (p) {
			// p.style.color = event.target.value;
		  // }
		// }
	</script>

</body>
</html>
 