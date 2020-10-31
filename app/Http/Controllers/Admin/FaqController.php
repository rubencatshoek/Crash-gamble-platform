<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', ['faqs' => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.faq.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Faq $faq)
    {
        $faq->create(request()->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]));
        return redirect(route('faq.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Faq $faq
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('admin.faq.edit', ['faq' => $faq, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Faq $faq
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Faq $faq)
    {
        $faq->update(request()->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]));
        return redirect(route('faq.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faq $faq
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect(route('faq.index'));
    }
}
