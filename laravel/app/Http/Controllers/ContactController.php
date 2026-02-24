<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
{
    $categories = Category::all();
    return view('contact.create', compact('categories'));
}


    public function store(Request $request)
{
     $request->validate(
    [
        'last_name'  => 'required|string|max:8',
        'first_name' => 'required|string|max:8',

        'gender' => 'required',

        'email' => 'required|email',

        // 電話番号（3分割）
        'tel1' => 'required|digits_between:1,5',
        'tel2' => 'required|digits_between:1,5',
        'tel3' => 'required|digits_between:1,5',

        'address' => 'required',

        'category' => 'required',

        'message' => 'required|string|max:120',
    ],
    [
        'last_name.required'  => '姓を入力してください',
        'last_name.max'       => '姓は8文字以内で入力してください',
        'first_name.required' => '名を入力してください',
        'first_name.max'      => '名は8文字以内で入力してください',

        'gender.required' => '性別を選択してください',

        'email.required' => 'メールアドレスを入力してください',
        'email.email'    => 'メールアドレスはメール形式で入力してください',

        'tel1.required' => '電話番号を入力してください',
        'tel1.digits_between' => '電話番号は5桁以内の半角数字で入力してください',
        'tel2.digits_between' => '電話番号は5桁以内の半角数字で入力してください',
        'tel3.digits_between' => '電話番号は5桁以内の半角数字で入力してください',

        'address.required' => '住所を入力してください',

        'category.required' => 'お問い合わせの種類を選択してください',

        'message.required' => 'お問い合わせ内容を入力してください',
        'message.max'      => 'お問い合わせ内容は120文字以内で入力してください',
    ]
);

    // 電話番号を結合
    $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

    $category = Category::find($request->category);
    
    Contact::create([
        'name' => $request->last_name . ' ' . $request->first_name,
        'last_name' => $request->last_name,
        'first_name' => $request->first_name,
        'gender' => $request->gender,
        'email' => $request->email,
        'tel' => $tel,
        'address' => $request->address,
        'building' => $request->building,
        'category_id' => $request->category,
        'subject' => $category->content,
        'message' => $request->message,
        'user_id' => null,
    ]);

    return redirect()->route('contact.thanks');
}

   public function confirm(Request $request)
{
    $validated = $request->validate([
        'last_name' => 'required|string|max:8',
        'first_name' => 'required|string|max:8',
        'gender' => 'required',
        'email' => 'required|email',
        'tel1' => 'required|numeric|digits_between:1,5',
        'tel2' => 'required|numeric|digits_between:1,5',
        'tel3' => 'required|numeric|digits_between:1,5',
        'address' => 'required',
        'building'=> 'nullable|string|max:255',
        'category' => 'required',
        'message' => 'required|string|max:120',
    ],
    [
            'last_name.required' => '姓を入力してください',
            'last_name.max' => '姓は8文字以内で入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.max' => '名は8文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',

            'tel1.numeric' => '電話番号は半角英数字で入力してください',
            'tel2.numeric' => '電話番号は半角英数字で入力してください',
            'tel3.numeric' => '電話番号は半角英数字で入力してください',

            'tel1.digits_between' => '電話番号は5桁まで数字で入力してください',
            'tel2.digits_between' => '電話番号は5桁まで数字で入力してください',
            'tel3.digits_between' => '電話番号は5桁まで数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'message.required' => 'お問い合わせ内容を入力してください',
            'message.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ]
    );
   return view('confirm', ['contact' => $validated]);
}

    public function thanks()
{
    return view('contact.thanks');
}

}
