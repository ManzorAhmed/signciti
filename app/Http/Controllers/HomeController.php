<?php


namespace App\Http\Controllers;


use App\BlogPost;
use App\Category;
use App\Contact;
use App\Font;
use App\Image;
use App\InnerSubCategory;
use App\Jobs\ContactMessageJob;
use App\PriceHeight;
use App\Pricing;
use App\Product;
use App\Question;
use App\Section;
use App\Setting;
use App\StampImage;
use App\SubCategory;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller

{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()

    {

        Artisan::call('config:clear');

        Artisan::call('cache:clear');

//        Artisan::call('config:cache');

        Artisan::call('view:clear');

        $slug = 'letters-and-numbers';

        $categories = Category::where('slug', $slug)->get();

        $blog_posts = BlogPost::where('status', 1)->get();

        return view('theme.index', ['categories' => $categories, 'blog_posts' => $blog_posts]);

    }


    public function FAQs()
    {
        $questions = Question::orderBy('show_order', 'asc')->where('status', '1')->get();
        return view('theme.faq', ['questions' => $questions, 'title' => "FAQs"]);
    }


    public function aboutUs()
    {
        $section = Section::findorfail(1);
        $about_us = json_decode($section->content);
        return view('theme.about_us', ['title' => "About Us", 'about_us' => $about_us]);
    }


    public function shippingrates()

    {

        return view('theme.shipping_rates', ['title' => "Shipping Rates"]);

    }

    public function customsign()
    {

        return view('theme.custom-signs', ['title' => "Custom Sign"]);

    }

    public function signform()

    {

        return view('theme.sign_form', ['title' => "Sign Form"]);

    }

    public function articlepage($slug)
    {

        $blog_post = BlogPost::where('slug', $slug)->first();

        return view('theme.article_page', ['title' => "Article Page", 'blog_post' => $blog_post]);

    }


    public function contact_us()
    {
        return view('theme.contact', ['title' => "Contact Us"]);
    }

    public function termandcondition()
    {
        return view('theme.term&condition', ['title' => "Term And Condition"]);
    }

    public function privacyPolicy()
    {
        return view('theme.privacy_policy', ['title' => "Privacy And Policy"]);
    }

    public function designhelp()
    {
        return view('theme.designhelp', ['title' => "Design Help"]);
    }


    public function shopingcard()
    {
        return view('theme.shoping-card', ['title' => "shoping card"]);
    }

    public function storeSubscribe(Request $request)
    {

        $this->validate($request, [
            'subscriber_email' => 'required|unique:subscribers,email',
        ]);
        $subscribe = new Subscriber();
        $subscribe->email = $request->subscriber_email;
        $subscribe->save();
        Session::flash('success', 'Your email is subscribed successfully!');
        return redirect()->back();
    }

    public function subCategory($slug)
    {
        $categories = SubCategory::where('slug', $slug)->get();
        return view('theme.sub_categories', ['categories' => $categories]);
    }


    public function allProducts($slug)
    {
        $sub_category = InnerSubCategory::where('slug', $slug)->first();
        return view('theme.products', ['sub_category' => $sub_category]);
    }


    /**
     * Image Upload Code
     *
     * @return void
     */

    public function fileCreate()

    {

        return view('theme.imageupload');

    }


    public function fileStore(Request $request)

    {

        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();

        $path = public_path('uploads/products');

        $image->move($path, $imageName);


        $imageUpload = new Image();

        $imageUpload->images = $imageName;

        $imageUpload->save();

        return response()->json(['success' => $imageName]);

    }


    public function fileDestroy(Request $request)
    {
        $filename = $request->get('filename');
        Image::where('images', $filename)->delete();
        $path = public_path() . 'uploads/products/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }


    public function getPrice(Request $request)
    {
        $product_slug = Product::findorfail($request->product_id);
        if (
            $product_slug->slug == 'galvanized-steel-metal-letters' or
            $product_slug->slug == 'rustic-metal-letters' or
            $product_slug->slug == 'steel-metal-signs' or
            $product_slug->slug == 'painted-steel-metal-signs' or
            $product_slug->slug == 'flat-metal-wall-letter' or
            $product_slug->slug == 'architectural-cast-metal-letters' or
            $product_slug->slug == 'standard-block-bronze-letters' or
            $product_slug->slug == 'metal-faced-wood-letters' or
            $product_slug->slug == 'charcoal-metal-wood-letters' or
            $product_slug->slug == 'metal-faced-wood-letters-1'
        ) {
            $product = PriceHeight::where('height', $request->height)
                ->where('product_id', $request->product_id)->first();
        } else {
            $product = Pricing::where('height', $request->height)
                ->where('thickness', $request->thickness)
                ->where('product_id', $request->product_id)->first();
        }
        return $product;
    }


    public function storeContact(Request $request)
    {
        $input = $request->all();
        $contact = new Contact();
        $contact->name = $input['name'];
        $contact->email = $input['email'];
        $contact->subject = $input['subject'];
        $contact->message = $input['message'];
        $contact->save();
        $settings = Setting::pluck('value', 'name')->all();
        $data = array(
            'name' => $contact->name,
            'user_email' => $contact->email,
            'subject' => $contact->subject,
            'msg' => $contact->message,
            'admin_email' => isset($settings['email']) ? $settings['email'] : 'support@test.signciti.com',
            'logo' => isset($settings['logo']) ? $settings['logo'] : '',
            'site_title' => isset($settings['site_title']) ? $settings['site_title'] : 'SignCiti',
        );
        Mail::send('theme.emails.contact_message_2', $data, function ($message) use ($data) {
            $message->to($data['admin_email'], '')
                ->from('support@signciti.com')
                ->subject($data['subject']);
        });
        /*$user_name = $contact->name;
        $user_email = $contact->email;
        $subject = $contact->subject;
        $message = $contact->message;
        $send_mail = isset($settings['email']) ? $settings['email'] : 'support@test.signciti.com';
        dispatch(new ContactMessageJob($send_mail, $message, $subject, $user_email, $user_name));
        */
        Session::flash('success_message', 'Great! Message has been sent successfully!');
        return redirect()->back();

    }


    public function productCalculator($slug)

    {
        $product = Product::where('slug', $slug)->first();
        $fonts = Font::orderBy('created_at', 'desc')->get();
        $height = array(

            '1',

            '1.5',

            '2',

            '3',

            '4',

            '5',

            '6',

            '7',

            '8',

            '9',

            '10',

            '11',

            '12',

            '13',

            '14',

            '15',

            '16',

            '17',

            '18',

            '19',

            '20',

            '21',

            '22',

            '23',

            '24',

            '25',

            '26',

            '27',

            '28',

            '29',

            '30',

            '31',

            '32',

            '33',

            '34',

            '35',

            '36',

            '37',

            '38',

            '39',

            '40',

            '41',

            '42',

            '43',

            '44',

            '45',

            '46',

        );
        $thickness = array(

            '1/8',

            '1/4',

            '3/8',

            '1/2',

            '3/4',

            '1',

        );

        if ($slug == 'aluminum-numbers') {
            return view('theme.calculators.aluminum_letters.aluminum_numbers', [
                'product' => $product,
                'height' => $height,
                'thickness' => $thickness,
                'fonts' => $fonts,
            ]);

        } elseif ($slug == 'painted-metal-letters' || $slug == 'outdoor-painted-metal-letters' || $slug == 'oxidized-copper-letters' || $slug == 'plastic-numbers-acrylic' || $slug == 'plastic-letters-acrylic' || $slug == 'standard-block-plastic-sign-letters' || $slug == 'architectural-plastic-sign-letters') {

            $calculator_mode = '2';

            return view('theme.calculators.aluminum_letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'tinted-metal-letters' or $slug == 'oxidized-aluminum-letters') {

            $calculator_mode = '1';

            return view('theme.calculators.aluminum_letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'anodized-aluminum-letters' or $slug == 'polished-anodized-aluminum-letters') {

            $calculator_mode = '3';

            return view('theme.calculators.aluminum_letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'steel-metal-signs') {

            $calculator_mode = '2';

            return view('theme.calculators.cut-metal-letters.mild-steel-metal-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'rustic-metal-letters') {
            $calculator_mode = '1';

            return view('theme.calculators.cut-metal-letters.rustic-metal-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'galvanized-steel-metal-letters') {

            $calculator_mode = '1';

            return view('theme.calculators.cut-metal-letters.mild-steel-metal-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'painted-steel-metal-signs') {

            $calculator_mode = '3';

            return view('theme.calculators.cut-metal-letters.mild-steel-metal-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'steel-metal-signs') {

            $calculator_mode = '2';

            return view('theme.calculators.cut-metal-letters.mild-steel-metal-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'flat-metal-wall-letter') {

            $calculator_mode = '4';

            return view('theme.calculators.cut-metal-letters.mild-steel-metal-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'painted-steel-metal-signs') {

            $calculator_mode = '2';

            return view('theme.calculators.cut-metal-letters.mild-steel-metal-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'hardwood-letters') {

            $calculator_mode = '1';

            return view('theme.calculators.wood-letters.hardwood-letters', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'baltic-birch' || $slug == 'script-sign-letters' || $slug == 'mdf-wood-letters' || $slug == 'wood-words' || $slug == 'mdo-letters-outdoor-plywood' || $slug == 'outdoor-mdo-letters-outdoor-plywood' || $slug == 'indoor-baltic-birch') {

            $calculator_mode = '1';

            return view('theme.calculators.wood-letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'outdoor-wood-letters' || $slug == 'outdoor-wood-numbers' || $slug == 'outdoor-signs-wood-numbers') {

            $calculator_mode = '1';

            return view('theme.calculators.outdoor-wood-letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'painted-wood-letters-baltic-birch' || $slug == 'indoor-painted-wood-letters-baltic-birch') {

            $calculator_mode = '1';

            return view('theme.calculators.indoor-painted.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'painted-mdf-wood-letters' || $slug == 'premium-indoor-painted-letters' || $slug == 'indoor-painted-mdf-wood-letters') {

            $calculator_mode = '2';

            return view('theme.calculators.indoor-painted.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'architectural-cast-metal-letters' || $slug == 'standard-block-bronze-letters' || $slug == 'craw-clarendon-condensed-cast-metal-lettering') {

            $calculator_mode = '1';

            return view('theme.calculators.cast-metal-letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'stained-cedar-letters') {

            $calculator_mode = '1';

            return view('theme.calculators.indoor.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'letter-stencils' || $slug == 'number-stencils') {

            $calculator_mode = '1';

            return view('theme.calculators.letter-stencils.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'single-use-stick-on-stencils' || $slug == 'reusable-stencil') {

            $calculator_mode = '2';

            return view('theme.calculators.letter-stencils.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'halo-lit-metal-letters-script') {

            $calculator_mode = '1';

            return view('theme.calculators.fabricated-metal-letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'spacers') {

            $calculator_mode = '1';

            return view('theme.calculators.resource.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'charcoal-metal-wood-letters' || $slug == 'metal-faced-wood-letters' || $slug == 'metal-faced-wood-letters-1') {

            $calculator_mode = '1';

            return view('theme.calculators.metal-faced-letters.calculator2', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($slug == 'business-signage' || $slug == '	store-signs' || $slug == 'salon-signs' || $slug == 'mission-statement-signs-core-values' || $slug == 'church-signs') {

            return view('theme.sign_form');

        } else {

            return view('theme.calculator', [

                'product' => $product,

                'height' => $height,

                'thickness' => $thickness,

                'fonts' => $fonts,

            ]);

        }

    }


    public function newSection(Request $request)

    {

        $count = $request->count;

        $product_id = $request->product_id;

        $product = Product::findorfail($product_id);

        $height = array(

            '1',

            '1.5',

            '2',

            '3',

            '4',

            '5',

            '6',

            '7',

            '8',

            '9',

            '10',

            '11',

            '12',

            '13',

            '14',

            '15',

            '16',

            '17',

            '18',

            '19',

            '20',

            '21',

            '22',

            '23',

            '24',

            '25',

            '26',

            '27',

            '28',

            '29',

            '30',

            '31',

            '32',

            '33',

            '34',

            '35',

            '36',

            '37',

            '38',

            '39',

            '40',

            '41',

            '42',

            '43',

            '44',

            '45',

            '46',

        );

        $thickness = array(

            '1/8',

            '1/4',

            '3/8',

            '1/2',

            '3/4',

            '1',

        );

        $finish = array(

            'Bronze',

            'Brass',

            'Cross',

        );

        if ($product->slug == 'aluminum-numbers') {

            return view('theme.calculators.aluminum_letters.aluminum_number_section', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

            ]);

        } elseif ($product->slug == 'painted-metal-letters' || $product->slug == 'outdoor-painted-metal-letters' || $product->slug == 'oxidized-copper-letters' || $product->slug == 'plastic-numbers-acrylic' || $product->slug == 'plastic-letters-acrylic' || $product->slug == 'standard-block-plastic-sign-letters' || $product->slug == 'architectural-plastic-sign-letters') {

            $calculator_mode = '2';

            return view('theme.calculators.aluminum_letters.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'tinted-metal-letters' or $product->slug == 'oxidized-aluminum-letters') {

            $calculator_mode = '1';

            return view('theme.calculators.aluminum_letters.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'anodized-aluminum-letters' or $product->slug == 'polished-anodized-aluminum-letters') {

            $calculator_mode = '3';

            return view('theme.calculators.aluminum_letters.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'hardwood-letters') {

            $calculator_mode = '1';

            return view('theme.calculators.wood-letters.hardwood-letters2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'rustic-metal-letters') {
            $calculator_mode = '1';

            return view('theme.calculators.cut-metal-letters.rustic-metal-letters2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'baltic-birch' || $product->slug == 'script-sign-letters' || $product->slug == 'mdf-wood-letters' || $product->slug == 'wood-words' || $product->slug == 'mdo-letters-outdoor-plywood' || $product->slug == 'outdoor-mdo-letters-outdoor-plywood' || $product->slug == 'indoor-baltic-birch') {

            $calculator_mode = '1';

            return view('theme.calculators.wood-letters.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'outdoor-wood-letters' || $product->slug == 'outdoor-wood-numbers' || $product->slug == 'outdoor-signs-wood-numbers') {

            $calculator_mode = '1';

            return view('theme.calculators.outdoor-wood-letters.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'painted-wood-letters-baltic-birch' || $product->slug == 'indoor-painted-wood-letters-baltic-birch') {

            $calculator_mode = '1';

            return view('theme.calculators.indoor-painted.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'painted-mdf-wood-letters' || $product->slug == 'premium-indoor-painted-letters' || $product->slug == 'indoor-painted-mdf-wood-letters') {

            $calculator_mode = '2';

            return view('theme.calculators.indoor-painted.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'architectural-cast-metal-letters' || $product->slug == 'standard-block-bronze-letters' || $product->slug == 'craw-clarendon-condensed-cast-metal-lettering') {

            $calculator_mode = '1';

            return view('theme.calculators.cast-metal-letters.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'stained-cedar-letters') {

            $calculator_mode = '1';

            return view('theme.calculators.indoor.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'letter-stencils' || $product->slug == 'number-stencils') {

            $calculator_mode = '1';

            return view('theme.calculators.letter-stencils.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'single-use-stick-on-stencils' || $product->slug == 'reusable-stencil') {

            $calculator_mode = '2';

            return view('theme.calculators.letter-stencils.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } elseif ($product->slug == 'charcoal-metal-wood-letters' || $product->slug == 'metal-faced-wood-letters' || $product->slug == 'metal-faced-wood-letters-1') {

            $calculator_mode = '1';

            return view('theme.calculators.metal-faced-letters.new_section2', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

                'calculator_mode' => $calculator_mode,

            ]);

        } else {

            return view('theme.new_section', [

                'count' => $count,

                'product_id' => $product_id,

                'height' => $height,

                'thickness' => $thickness,

            ]);

        }

    }


    public function newSectionAlumNumber(Request $request)
    {
        $count = $request->count;
        $product_id = $request->product_id;
        return view('theme.calculators.aluminum_letters.aluminum_number_section', ['count' => $count, 'product_id' => $product_id]);

    }


    public function alumNewSection(Request $request)
    {
        $count = $request->count;

        $product_id = $request->product_id;

        return view('theme.calculators.aluminum_letters.new_section2', ['count' => $count, 'product_id' => $product_id]);

    }

    public function sessionClear()
    {
        session()->forget('grand_total');
        session()->forget('quantity_cart');
        session()->forget('cart');
        session()->forget('order');
        session()->forget('sub_total');
        session()->forget('estimate');
        dd("session cleared");
    }


}

