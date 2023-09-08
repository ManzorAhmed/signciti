<?php

namespace App\Http\Controllers\User;

use App\BillingAddress;
use App\Font;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Service;
use App\Setting;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use URL;

/** All Paypal Details class **/
class ProductController extends Controller
{
/*    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
//        $product = Product::findorfail($request->product_id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $product_id => [
                    'row1' => [
                        'Text' => $request->fname1,
                        'Font' => $request->font1,
                        'Thickness' => $request->thickness1 . ' Inch',
                        'Height' => $request->height1 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware1,
                        'Paper Template' => $request->paper_template1,
                        'Project Spacer Length' => $request->projected_spacer_length,
                        'Text Area' => $request->text_area1,
                        'Price' => $request->price1,
                    ],
                    'row2' => [
                        'Text' => $request->fname2,
                        'Font' => $request->font1,
                        'Thickness' => $request->thickness2 . ' Inch',
                        'Height' => $request->height2 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware2,
                        'Paper Template' => $request->paper_template2,
                        'Project Spacer Length' => $request->projected_spacer_length2,
                        'Text Area' => $request->text_area2,
                        'Price' => $request->price2,
                    ],
                    'row3' => [
                        'Text' => $request->fname3,
                        'Font' => $request->font3,
                        'Thickness' => $request->thickness3 . ' Inch',
                        'Height' => $request->height3 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware3,
                        'Paper Template' => $request->paper_template3,
                        'Project Spacer Length' => $request->projected_spacer_length3,
                        'Text Area' => $request->text_area3,
                        'Price' => $request->price3,
                    ],
                    'row4' => [
                        'Text' => $request->fname4,
                        'Font' => $request->font4,
                        'Thickness' => $request->thickness4,
                        'Height' => $request->height4 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware4,
                        'Paper Template' => $request->paper_template4,
                        'Project Spacer Length' => $request->projected_spacer_length4,
                        'Text Area' => $request->text_area4,
                        'Price' => $request->price4,
                    ],
                ]
            ];
            session()->put('cart', $cart);
            Session::flash('success_message', 'Products successfully added to cart!');
            return redirect()->route('cart');
        }
        $cart[$product_id] = [
            'row1' => [
                'Text' => $request->fname1,
                'Font' => $request->font1,
                'Thickness' => $request->thickness1 . ' Inch',
                'Height' => $request->height1 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware1,
                'Paper Template' => $request->paper_template1,
                'Project Spacer Length' => $request->projected_spacer_length,
                'Text Area' => $request->text_area1,
                'Price' => $request->price1,
            ],
            'row2' => [
                'Text' => $request->fname2,
                'Font' => $request->font1,
                'Thickness' => $request->thickness2 . ' Inch',
                'Height' => $request->height2 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware2,
                'Paper Template' => $request->paper_template2,
                'Project Spacer Length' => $request->projected_spacer_length2,
                'Text Area' => $request->text_area2,
                'Price' => $request->price2,
            ],
            'row3' => [
                'Text' => $request->fname3,
                'Font' => $request->font3,
                'Thickness' => $request->thickness3 . ' Inch',
                'Height' => $request->height3 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware3,
                'Paper Template' => $request->paper_template3,
                'Project Spacer Length' => $request->projected_spacer_length3,
                'Text Area' => $request->text_area3,
                'Price' => $request->price3,
            ],
            'row4' => [
                'Text' => $request->fname4,
                'Font' => $request->font4,
                'thickness4' => $request->thickness4,
                'height4' => $request->height4 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware4,
                'Paper Template' => $request->paper_template4,
                'Project Spacer Length' => $request->projected_spacer_length4,
                'Text Area' => $request->text_area4,
                'Price' => $request->price4,
            ],
        ];
        session()->put('cart', $cart);

        Session::flash('success_message', 'Products successfully added to cart!');
        return redirect()->route('cart');
    }*/

    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
//        $product = Product::findorfail($request->product_id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $product_id => [
                    'row1' => [
                        'Text' => $request->fname1,
                        'Font' => $request->font1,
                        'Thickness' => $request->thickness1 . ' Inch',
                        'Height' => $request->height1 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware1,
                        'Paper Template' => $request->paper_template1,
                        'Project Spacer Length' => $request->projected_spacer_length,
                        'Text Area' => $request->text_area1,
                        'Price' => $request->price1,
                    ],
                    'row2' => [
                        'Text' => $request->fname2,
                        'Font' => $request->font1,
                        'Thickness' => $request->thickness2 . ' Inch',
                        'Height' => $request->height2 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware2,
                        'Paper Template' => $request->paper_template2,
                        'Project Spacer Length' => $request->projected_spacer_length2,
                        'Text Area' => $request->text_area2,
                        'Price' => $request->price2,
                    ],
                    'row3' => [
                        'Text' => $request->fname3,
                        'Font' => $request->font3,
                        'Thickness' => $request->thickness3 . ' Inch',
                        'Height' => $request->height3 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware3,
                        'Paper Template' => $request->paper_template3,
                        'Project Spacer Length' => $request->projected_spacer_length3,
                        'Text Area' => $request->text_area3,
                        'Price' => $request->price3,
                    ],
                    'row4' => [
                        'Text' => $request->fname4,
                        'Font' => $request->font4,
                        'Thickness' => $request->thickness4,
                        'Height' => $request->height4 . ' Inch',
                        'Mounting Hardware' => $request->mounting_hardware4,
                        'Paper Template' => $request->paper_template4,
                        'Project Spacer Length' => $request->projected_spacer_length4,
                        'Text Area' => $request->text_area4,
                        'Price' => $request->price4,
                    ],
                ]
            ];
            session()->put('cart', $cart);
            Session::flash('success_message', 'Products successfully added to cart!');
            return redirect()->route('cart');
        }
        $cart[$product_id] = [
            'row1' => [
                'Text' => $request->fname1,
                'Font' => $request->font1,
                'Thickness' => $request->thickness1 . ' Inch',
                'Height' => $request->height1 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware1,
                'Paper Template' => $request->paper_template1,
                'Project Spacer Length' => $request->projected_spacer_length,
                'Text Area' => $request->text_area1,
                'Price' => $request->price1,
            ],
            'row2' => [
                'Text' => $request->fname2,
                'Font' => $request->font1,
                'Thickness' => $request->thickness2 . ' Inch',
                'Height' => $request->height2 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware2,
                'Paper Template' => $request->paper_template2,
                'Project Spacer Length' => $request->projected_spacer_length2,
                'Text Area' => $request->text_area2,
                'Price' => $request->price2,
            ],
            'row3' => [
                'Text' => $request->fname3,
                'Font' => $request->font3,
                'Thickness' => $request->thickness3 . ' Inch',
                'Height' => $request->height3 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware3,
                'Paper Template' => $request->paper_template3,
                'Project Spacer Length' => $request->projected_spacer_length3,
                'Text Area' => $request->text_area3,
                'Price' => $request->price3,
            ],
            'row4' => [
                'Text' => $request->fname4,
                'Font' => $request->font4,
                'thickness4' => $request->thickness4,
                'height4' => $request->height4 . ' Inch',
                'Mounting Hardware' => $request->mounting_hardware4,
                'Paper Template' => $request->paper_template4,
                'Project Spacer Length' => $request->projected_spacer_length4,
                'Text Area' => $request->text_area4,
                'Price' => $request->price4,
            ],
        ];
        session()->put('cart', $cart);

        Session::flash('success_message', 'Products successfully added to cart!');
        return redirect()->route('cart');
    }


    public function fontWidth(Request $request)
    {
        $font = Font::where('name', $request->sec_curnt_font_val1)->first();
        return $font;
    }

    public function cart()
    {
        return view('theme.shoping_cart_2');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        $grand_total = session()->get('grand_total');
        Session::flash('success_message', 'Products successfully removed from cart!');
        return redirect()->back();
    }

    public function updatePrice(Request $request, $id)
    {
        /*$cart_quantity = session()->get('cart_quantity');
        $cart_quantity = [
            $id => [
                'quantity' => $request->quantity
            ]
        ];
        session()->put('cart_quantity', $cart_quantity);*/
        $quantity_cart = session()->get('quantity_cart');
        if (!$quantity_cart) {
            $quantity_cart = [
                $id = [
                    'quantity' => $request->quantity,
                ]

            ];
            session()->put('quantity_cart', $quantity_cart);
            Session::flash('success_message', 'Price successfully updated!');
            return redirect()->route('cart');
        }
        $quantity_cart[$id] = [
            'quantity' => $request->quantity,
        ];
        session()->put('quantity_cart', $quantity_cart);
        Session::flash('success_message', 'Price successfully updated!');
        return redirect()->back();
    }

    public function grandTotal(Request $request)
    {
        session()->put('estimate',$request->estimate_method);
        $estimate = session()->get('estimate');
        $sub_total = session()->get('sub_total');
        $total = $estimate + $sub_total;
        $grand_total = session()->get('grand_total');
        if (!$grand_total) {
            $grand_total = $total;
            session()->put('grand_total', $grand_total);
            Session::flash('success_message', 'Price successfully updated!');
            return redirect()->route('cart');
        }
        $grand_total = $total;
        session()->put('grand_total', $grand_total);
        Session::flash('success_message', 'Price successfully updated!');
        return redirect()->route('cart');
    }

/*    public function grandTotal(Request $request)
    {
        $estimate = $request->estimate_method;
        $sub_total = $request->sub_total;
        $total = $estimate + $sub_total;
        $grand_total = session()->get('grand_total');
        if (!$grand_total) {
            $grand_total = $total;
            session()->put('grand_total', $grand_total);
            Session::flash('success_message', 'Price successfully updated!');
            return redirect()->route('cart');
        }
        $grand_total = $total;
        session()->put('grand_total', $grand_total);
        Session::flash('success_message', 'Price successfully updated!');
        return redirect()->route('cart');
    }*/


    public function checkOut()
    {
        return redirect()->route('product.shipping_address');
    }

    public function shippingAddress()
    {
        return view('theme.shipping_address');
    }

    public function storeShippingAddress(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip_code' => 'required|max:255',
            'country' => 'required|max:255',
            'telephone' => 'required|max:255',
        ]);
        if (!$request->shipping) {
            $this->validate($request, [
                'shipping_email' => 'required|max:255',
                'shipping_name' => 'required|max:255',
                'shipping_company' => 'required|max:255',
                'shipping_address' => 'required|max:255',
                'shipping_city' => 'required|max:255',
                'shipping_state' => 'required|max:255',
                'shipping_zip_code' => 'required|max:255',
                'shipping_country' => 'required|max:255',
                'shipping_telephone' => 'required|max:255',
            ]);
        }

        $billing_address = new BillingAddress();
        $billing_address->email = $request->email;
        $billing_address->name = $request->name;
        $billing_address->company = $request->company;
        $billing_address->address = $request->address;
        $billing_address->city = $request->city;
        $billing_address->state = $request->state;
        $billing_address->zip_code = $request->zip_code;
        $billing_address->country = $request->country;
        $billing_address->telephone = $request->telephone;
        if (!$request->shipping) {
            $shipping_address = new ShippingAddress();
            $shipping_address->email = $request->shipping_email;
            $shipping_address->name = $request->shipping_name;
            $shipping_address->company = $request->shipping_company;
            $shipping_address->address = $request->shipping_address;
            $shipping_address->city = $request->shipping_city;
            $shipping_address->state = $request->shipping_state;
            $shipping_address->zip_code = $request->shipping_zip_code;
            $shipping_address->country = $request->shipping_country;
            $shipping_address->telephone = $request->shipping_telephone;
        }
        $grand_total = session()->get('grand_total');
        $quantity_cart = session()->get('quantity_cart');
        $cart = session()->get('cart');

        $order = new Order();
        $order->order_no = rand(1000000000, 9999999999);
        $order->grand_total = $grand_total;
        $order->save();
        $json_cart = json_encode($cart);
        $order_items = new OrderItem();
        $order_items->order_id = $order->id;
        $order_items->items = $json_cart;
        $order_items->save();

        $settings = Setting::pluck('value', 'name')->all();

        $billing_address->order_id = $order->id;
        $billing_address->save();
        if (!$request->shipping) {
            $shipping_address->order_id = $order->id;
            $shipping_address->save();
        }

        $data = array(
            'name' => $billing_address->name,
            'user_email' => $billing_address->email,
            'subject' => "Order Placed",
            'msg' => "Your order is placed successfully .Total amount of order is $$order->grand_total",
            'admin_email' => isset($settings['email']) ? $settings['email'] : 'support@test.signciti.com',
            'logo' => isset($settings['logo']) ? $settings['logo'] : '',
            'site_title' => isset($settings['site_title']) ? $settings['site_title'] : 'SignCiti',
        );

        Mail::send('theme.emails.order', $data, function ($message) use ($data) {
            $message->to($data['user_email'], '')
                ->from('support@test.signciti.com')
                ->subject('Order Placed');
        });

        $admin_data = array(
            'name' => 'Admin',
            'user_email' => $billing_address->email,
            'subject' => "Order Placed",
            'msg' => "You received order from the $billing_address->name and email is $billing_address->email. Total amount of order is $$order->grand_total",
            'admin_email' => isset($settings['email']) ? $settings['email'] : 'support@test.signciti.com',
            'logo' => isset($settings['logo']) ? $settings['logo'] : '',
            'site_title' => isset($settings['site_title']) ? $settings['site_title'] : 'SignCiti',
        );

        Mail::send('theme.emails.admin_order', $admin_data, function ($message) use ($admin_data) {
            $message->to($admin_data['admin_email'], '')
                ->from('support@test.signciti.com')
                ->subject('Order Placed');
        });

        $order = session()->put('order', $order);

        if ($request->payment) {
            return redirect()->route('make-payment-paypal');
        }

        session()->forget('grand_total');
        session()->forget('quantity_cart');
        session()->forget('cart');
        session()->forget('order');
        session()->forget('sub_total');
        session()->forget('estimate');

        return redirect()->route('product.success', $billing_address->order_id);
    }

    public function makePaymentPayPal()
    {
        $grand_total = session()->get('grand_total');
        return view('theme.paypal', ['grand_total' => $grand_total]);
    }

    public function processPayPalCheckout(Request $request)
    {
        $order = session()->get('order');

        $totalAmount = number_format((float)session()->get('grand_total'), 2);

        $totalAmount = session()->get('grand_total');

        $settings = Setting::pluck('value', 'name')->toArray();
        if (isset($settings['p_client_id'])) {
            $client_id = $settings['p_client_id'];
        } else {
            $client_id = "";
        }
        if (isset($settings['p_secret'])) {
            $secret = $settings['p_secret'];
        } else {
            $secret = "";
        }
        if (isset($settings['p_mode'])) {
            $value = $settings['p_mode'];
            if ($value == 0) {
                $mode = "live";
            } else {
                $mode = "sandbox";
            }
        } else {
            $mode = "sandbox";
        }

        $paypal_conf = [
            'client_id' => $client_id,
            'secret' => $secret,
            'settings' => array(
                'mode' => $mode,
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            ),
        ];

        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $client_id,
                $secret)
        );

        $this->_api_context->setConfig($paypal_conf['settings']);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($totalAmount);
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($totalAmount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Payment');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment_status', $order->id))
            ->setCancelUrl(URL::route('payment_status', $order->id));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }

    public function getPaymentStatus($id)
    {
        session()->forget('grand_total');
        session()->forget('quantity_cart');
        session()->forget('cart');
        session()->forget('order');
        session()->forget('sub_total');
        session()->forget('estimate');

        return redirect()->route('product.success', $id);
    }

    public function success($id)
    {
        $order = Order::findorfail($id);
        $order->payment_status = 'completed';
        $order->save();
        $order_items = OrderItem::where('order_id', $order->id)->first();
        return view('theme.success', ['order' => $order, 'order_items' => $order_items]);
    }


}

