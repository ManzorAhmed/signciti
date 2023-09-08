<?php
$status_count = $count;
$height = App\Height::where('product_id', $product_id)->pluck('height', 'id');
$thickness = App\Thickness::where('product_id', $product_id)->pluck('thickness', 'id'); 

?>
<div class="delete_section<?php echo $status_count; ?> isempty">
    <style>
        .textarea_section<?php echo $status_count; ?>, .projected_section<?php echo $status_count; ?>, .mounting_section<?php echo $status_count; ?>, .thickness_section<?php echo $status_count; ?>, .paper_template<?php echo $status_count; ?>, .other_font<?php echo $status_count; ?>, .finish<?php echo $status_count; ?>, .color<?php echo $status_count; ?>
		{
            display:none;
        } 
		.bg-light {
			color: #212529 !important;
			background-color: #e5e5e5 !important;
			border-color: #e5e5e5 !important;
		}
    </style> 
    <div>
        <div class="col-md-12 align-self-center p-2">
            <textarea type="text" Placeholder="Enter Your Text" id="fname<?php echo $status_count; ?>" name="fname<?php echo $status_count; ?>" onkeyup="gettext2(this.id)" class="form-control select_box"></textarea>
        </div>
        <div class="d-flex border-bottom border-top p-2">
            <div class="col-md-3 text-right align-self-center">
                Choose font
            </div>
            <div class="col-md-8 align-self-center">
                <div class="example">
                    <div>
                        <input onchange="onchange_fun_sec2(this.id)" id="font<?php echo $status_count; ?>" type="text" class="" />
                        <script>
                            var current_font_val;
                            $('#font<?php echo $status_count; ?>').fontselect({
                                systemFonts: true,
								localFonts: false, 
								//localFonts: ['Basic-Regular', 'Typewriter-DemiBold', 'Ribeye','Piedra', 'Other Font'],
								googleFonts: ['Ribeye','Piedra'],
								systemFonts: ['Verdana','Basic-Regular','TypewriterDemi-Bold','ActionMan','AlegreyaSCBlack',
								'AlegreyaSC-Regular','astounder-squared-lc-bb','BioRhyme-Bold','Calligrapher-font','BioRhyme-ExtraBold',
								'AlegreyaSC-Bold','Anton-Regular','bank-gothic','Bubble','CalligraphyUnicase','Canciller-Demibold',
								'HOBON','ClarendonCondensedBold','Clarendon-Regular','basicsanssf-bold','Bauer','ClarendonTMed',
								'CloisterBlack','CocoBiker-Regular-Trial','CrimsonText-Bold','CrimsonText-Regular','D-DIN',
								'D-DINCondensed-Bold','D-DINExp-Bold','GiuliaDEMO-Bold','GOTHICB','LibreBodoni-Bold','LibreBodoni-BoldItalic',
								'RobotoSlab-Regular','Typewriter-Medium','Other Font'],
								localFontsUrl: 'fonts/' // End with a slash!
							}).on('change', function(obj) {
								// alert($( this ).parent().get( 0 ).tagName);
								current_font_val = this.value;
								applyFont('.fname<?php echo $status_count; ?>', this.value);
								var count2 = $('.fname<?php echo $status_count; ?>').text().replace(/\s+/g, '').length;
								$(".w_count<?php echo $status_count; ?>").text(count2);
							})
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-1 p-0">
                <div class="p-1 m-2">
                    <a href="#" onclick="delete_section(this.id)" id="delete_section<?php echo $status_count; ?>"><i class="fas fa-times-circle" style="font-size:20px;"></i></a>
                </div>
            </div>
        </div>
        <div class="other_font<?php echo $status_count; ?>">
            <div class="d-flex border-bottom border-top p-2">
                <div class="col-md-3 text-right align-self-center">
                    Select Font
                </div>
                <div class="col-md-8 align-self-center">
                    <input id="other_font_val<?php echo $status_count; ?>" type="text" class="form-control" placeholder="Select other font" />
                </div>
            </div>
        </div>
        <div class="d-flex border-bottom border-top p-2">
            <div class="col-md-3 text-right align-self-center">
                Height
            </div>
            <div class="col-md-8 align-self-center">
                <select id="height<?php echo $status_count; ?>" class="form-control" onchange="onchange_fun_sec2(this.id)" name="height<?php echo $status_count; ?>">
                    <option disabled selected>Choose Height...</option>
                    @foreach($height as $key=>$value)
                        <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="thickness_section<?php echo $status_count; ?>">
            <div class="d-flex border-bottom border-top p-2">
                <div class="col-md-3 text-right align-self-center">
                    Thickness
                </div>
                <div class="col-md-8 align-self-center">
                    <select class=" form-control" onchange="onchange_fun_sec2(this.id)" id="thickness<?php echo $status_count; ?>" name="thickness<?php echo $status_count; ?>">
                        <option disabled selected>Choose Thickness...</option>
                        @foreach($thickness as $key=>$value)
                        <option value="{{$value}}">{{$value}} inch</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
		<div class="finish<?php echo $status_count; ?>">
			<div class="d-flex border-bottom border-top p-2">
				<div class="col-md-3 text-right align-self-center">
					Finish
				</div>
				<div class="col-md-8 align-self-center">  
					 <select class="form-control" onchange="onchange_fun_sec2(this.id)" id="finish<?php echo $status_count; ?>" name="finish<?php echo $status_count; ?>">
						<option value="">Choose Thickness...</option>
						<option value="brushed" class="" style="color:#91b6bc; font-size:19px;">&#9634; Brushed</option> 
						<option value="painted" class="">Painted</option> 
					</select>
				</div>
			</div>
		</div>  
		<div class="color<?php echo $status_count; ?>">
			<div class="d-flex border-bottom border-top p-2">
				<div class="col-md-3 text-right align-self-center">
					Color
				</div>
				<div class="col-md-8 align-self-center"> 
					<input type="color" id="color<?php echo $status_count; ?>" name="color<?php echo $status_count; ?>" class="form-control" onchange="onchange_fun_sec2(this.id)" />
				</div>
			</div>
			<div class="d-flex border-bottom border-top p-2">
				<div class="col-md-3 text-right align-self-center">
					Finish
				</div>
				<div class="col-md-8 align-self-center"> 
					<select name="finish_val<?php echo $status_count; ?>" class="form-control finish_val2" onchange="finish_val2()" id="finish_val<?php echo $status_count; ?>">
						<option value="" id="">- Select an Option -</option>
						<option value="" id="">Satin</option>
						<option value="10" id="">High Gloss (+10%)</option>
						<option value="10" id="">Mate (+10%)</option>
					</select>		
				</div>
			</div>
		</div> 
        <div class="mounting_section<?php echo $status_count; ?>">
            <div class="d-flex border-bottom border-top p-2">
                <div class="col-md-3 text-right align-self-center">
                    Mounting Hardware
                </div>
                <div class="col-md-8 align-self-center">
                    <select name="mounting_hardware<?php echo $status_count; ?>" onchange="add_mounting_hardware2(this.id)" class=" form-control select_box" id="mounting_hardware<?php echo $status_count; ?>">
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
        <div class="paper_template<?php echo $status_count; ?>">
            <div class="d-flex border-bottom border-top p-2">
                <div class="col-md-3 text-right align-self-center">
                    Paper Template
                </div>
                <div class="col-md-8 align-self-center">
                    <select name="paper_template<?php echo $status_count; ?>" class="form-control select_box" onchange="add_paper_template2(this.id)" id="paper_template<?php echo $status_count; ?>">
                        <option value="">- Select an Option -</option>
                        <option value="1">Yes ($1.00 per letter)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="projected_section<?php echo $status_count; ?>">
            <div class="d-flex border-bottom border-top p-2 ">
                <div class="col-md-3 text-right align-self-center">
                    Projected Spacer Length
                </div>
                <div class="col-md-8 align-self-center">
                    <select name="projected_spacer_length<?php echo $status_count; ?>" onchange="onchange_fun_sec2(this.id)" class="form-control select_box" id="projected_spacer_length<?php echo $status_count; ?>">
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
        <div class="d-flex border-bottom border-top p-3">
            <div class="col-md-12 text-center align-self-center">
                <b>Approx. Width:</b> <span class="apr_width<?php echo $status_count; ?>" > Enter text and select a Height to see Approx. Width.</span>
            </div>
        </div>
        <div class="w_c_p_section<?php echo $status_count; ?> sec">
            <div class="count_section<?php echo $status_count; ?>">
                <div class="d-flex border-bottom border-top p-2">
                    <div class="col-md-6 align-self-center">
                        Total Letter Count: <span class="w_count<?php echo $status_count; ?>"></span>
                    </div>
                    <div class="col-md-6 align-self-end">
                        <button type="button" class="btn btn-light btn-block bg-light border-light add_new_section" id="" onclick="add_new_section()"><i class="fas fa-plus"></i> Add New Line</button>
                    </div>
                </div>
            </div>
            <div class="comments_section<?php echo $status_count; ?>">
                <div class="col-md-12">
                    <div class="form-check-inline p-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" onclick="comments2(this.id)" id="comments<?php echo $status_count; ?>" name="comments<?php echo $status_count; ?>">Comments
                        </label>
                    </div>
                </div>
            </div>
            <div class="textarea_section<?php echo $status_count; ?>">
                <div class="col-md-12 p-2">
                    <textarea type="text" class="form-control" rows="7" id="text_area<?php echo $status_count; ?>" name="text_area<?php echo $status_count; ?>" value=""></textarea>
                </div>
            </div>
            <div class="price_section<?php echo $status_count; ?>">
                <div class="d-flex border-bottom border-top p-2">
					<div class="col-md-4 align-self-center">
						<input type="hidden" name="price<?php echo $status_count; ?>" class="price<?php echo $status_count; ?>"/>
						Amount: <b>$<span class="price<?php echo $status_count; ?>">6.20</span></b>
					</div>
                   {{-- <div class="col-md-4 align-self-center">
                        Starting At: <b>$<span class="price<?php echo $status_count; ?>">6.20</span></b>
                    </div>--}}
                    <div class="col-md-3 align-self-center d-flex">
                        <span class="pt-2 mr-2">QTY: </span> <input type="number" id="qty<?php echo $status_count; ?>" class="form-control w-50 onchange_fun" min="1" value="1">
                    </div>
                    <div class="col-md-5 align-self-end">
                        <button type="button" class="btn btn-light bg-danger border-danger btn-block" >Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var previous;
        (function () {
            $(".select_box").on('focus', function () {
                // Store the current value on focus and on change
                previous = this.value;
            }).change(function() {
                // Do something with the previous value after the change
                // alert(previous);

                // Make sure the previous value is updated
                previous = this.value;
            });
        })();
		var f_val1_previous2;
		(function () { 
			$(".finish_val2").on('focus', function () { 
				f_val1_previous2 = this.value;
			}).change(function() { 
				f_val1_previous2 = this.value;
			});
		})();
    </script>
</div>
