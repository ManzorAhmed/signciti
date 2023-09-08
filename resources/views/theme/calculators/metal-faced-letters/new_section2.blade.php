<?php
$status_count = $count;
/*$height = App\Height::where('product_id', $product_id)->pluck('height', 'id');
$thickness = App\Thickness::where('product_id', $product_id)->pluck('thickness', 'id');*/
$calculator_mode = $calculator_mode; 

?>
<div class="delete_section<?php echo $status_count; ?> isempty">
    <style>
        .textarea_section<?php echo $status_count; ?>, .projected_section<?php echo $status_count; ?>, .finish<?php echo $status_count; ?>,.color<?php echo $status_count; ?>, .mounting_section<?php echo $status_count; ?>, .thickness_section<?php echo $status_count; ?>, .paper_template<?php echo $status_count; ?>, .other_font<?php echo $status_count; ?>
		{
            display:none;
        }
		.bg-light {
			color: #212529 !important;
			background-color: #e5e5e5 !important;
			border-color: #e5e5e5 !important;
		}
    </style>
    <script>

    </script>
    <div>
        <div class="col-md-12 align-self-center p-2">
            <textarea type="text" Placeholder="Enter Your Text" id="fname<?php echo $status_count; ?>" name="fname<?php echo $status_count; ?>" onkeyup="gettext2(this.id)" class="form-control select_box" required></textarea>
        </div>
        <div class="d-flex border-bottom border-top p-2">
            <div class="col-lg-3 text-lg-right align-self-center p-md-2">
                Choose font
            </div>
            <div class="col-lg-8 align-self-center p-2">
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
            <div class="col-md-1 p-0 d-flex">
                <div class="align-self-center">
                    <a href="#" onclick="delete_section(this.id)" id="delete_section<?php echo $status_count; ?>"><i class="fas fa-times-circle" style="font-size:20px;"></i></a>
                </div>
            </div>
        </div>
        <div class="other_font<?php echo $status_count; ?>">
            <div class="d-lg-flex border-bottom border-top p-2">
                <div class="col-lg-3 text-lg-right align-self-center ">
                    Select Font
                </div>
                <div class="col-lg-8 align-self-center">
                    <input id="other_font_val<?php echo $status_count; ?>" type="text" class="form-control" placeholder="Select other font" />
                </div>
            </div>
        </div> 
        <div class="d-lg-flex border-bottom border-top p-2">
            <div class="col-lg-3 text-lg-right align-self-center ">
                Height
            </div>
            <div class="col-lg-8 align-self-center p-2">
                <select id="height<?php echo $status_count; ?>" class="form-control" onchange="onchange_fun_sec2(this.id)" name="height<?php echo $status_count; ?>"  required>
                    <option value="" disabled selected>Choose Height...</option>
                    @foreach($height as $key=>$value)
                        <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div> 
		<div class="">

			<div class="d-lg-flex border-bottom border-top p-2">

				<div class="col-lg-3 text-lg-right align-self-center">

					Edge Color

				</div>

				<div class="col-lg-8 align-self-center p-2">

					<input type="color" id="color<?php echo $status_count; ?>" name="color<?php echo $status_count; ?>" onchange="onchange_fun_sec2(this.id)" class="form-control"/>

				</div>

			</div>

		</div> 
        <div class="d-lg-flex border-bottom border-top p-3">
            <div class="col-md-12 text-center align-self-center">
                <b>Approx. Width:</b> <span class="apr_width<?php echo $status_count; ?>" > Enter text and select a Height to see Approx. Width.</span>
            </div>
        </div>
        <div class="w_c_p_section<?php echo $status_count; ?> sec">
            <div class="count_section<?php echo $status_count; ?>">
                <div class="d-lg-flex border-bottom border-top p-2">
                    <div class="col-md-6 align-self-center p-md-2">
                        Total Letter Count: <span class="w_count<?php echo $status_count; ?>"></span>
                    </div>
                    <div class="col-md-6 align-self-end">
                        <div class="btn btn-light btn-block bg-light border-light add_new_section" id="" onclick="add_new_section()"><i class="fas fa-plus"></i> Add New Line</div>
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
                <div class="d-lg-flex border-bottom border-top p-2">
					<div class="col-lg-4 align-self-center">
						<input type="hidden" name="price<?php echo $status_count; ?>" class="price<?php echo $status_count; ?>"/>
						Amount: <b>$<span class="price<?php echo $status_count; ?>">2.00</span></b>
					</div>
                   {{-- <div class="col-md-4 align-self-center">
                        Starting At: <b>$<span class="price<?php echo $status_count; ?>">2.00</span></b>
                    </div>--}}
                    <div class="col-lg-3 align-self-center d-flex p-md-2 p-lg-0">
                        <span class="pt-2 mr-2 ml-md-2  ml-lg-0">QTY: </span> <input type="number" id="qty<?php echo $status_count; ?>" class="form-control w-50 onchange_fun" min="1" value="1">
                    </div>
                    <div class="col-lg-5 align-self-end">
                        <button type="button" class="btn btn-light bg-danger border-danger btn-block" >Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
