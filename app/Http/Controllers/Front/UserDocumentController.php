<?php

namespace App\Http\Controllers\Front;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserDocumentRequest;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDocumentController extends Controller
{
    public function documents()
    {
        $documents = UserDocument::where('user_id', Auth::user()->id)->paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.profile.index', ['documents' => $documents]);
    }

    public function storeDocument(StoreUserDocumentRequest $request)
    {
        $fields = $request->safe()->only(['title', 'notice', 'path']);
        $user = Auth::user();
        $user->document()->create($fields);

        $request->session()->flash('status', __('vars.document_was_save'));

        return redirect()->to('front.documents');
    }

    public function deleteDocument(Request $request, UserDocument $document)
    {
        UserDocument::destroy($document);
        $request->session()->flash('status', __('vars.document_was_delete'));

        return redirect()->to('front.documents');
    }
}
