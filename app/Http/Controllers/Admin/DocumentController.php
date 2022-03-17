<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserDocumentRequest;
use App\Http\Requests\Users\UpdateUserDocumentRequest;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = UserDocument::with(['user'])->orderBy('created_at', 'desc')->paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.documents.list', ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\StoreUserHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserDocumentRequest $request)
    {
        $fields = $request->safe()->only(['user_id', 'title', 'notice']);
        $document = UserDocument::create($fields);
        $document->saveFile($request);

        $request->session()->flash('status', __('vars.document_was_created'));

        return redirect()->to(route('documents.edit', ['document' => $document]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDocument $document)
    {
        return view('admin.views.documents.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Users\UpdateUserHistoryRequest  $request
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserDocumentRequest $request, UserDocument $document)
    {
        $fields = $request->safe()->only(['title', 'notice', 'path']);
        $document->update($fields);

        $request->session()->flash('status', __('vars.document_was_updated'));

        return redirect()->to(route('documents.edit', ['document' => $document]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDocument $document)
    {
        UserDocument::destroy($document->id);

        request()->session()->flash('status', __('vars.document_was_deleted'));

        return redirect()->to(route('documents.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('documents');
        UserDocument::destroy($ids);
        $request->session()->flash('status', __('vars.documents_were_deleted'));

        return redirect()->to(route('documents.index'));
    }
}
