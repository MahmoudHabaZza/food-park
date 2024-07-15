<?php
namespace App\Repositories\Admin;

use App\DataTables\SubscriberDataTable;
use App\Interfaces\Admin\NewsLetterRepositoryInterface;
use App\Mail\NewsLetterMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Mail;

class NewsLetterRepository implements NewsLetterRepositoryInterface {
    public function index(SubscriberDataTable $dataTable)
    {
        return $dataTable->render('Admin.NewsLetter.index');
    }
    public function sendNewsLetter(Request $request)
    {
        $request->validate([
            'subject' => ['required','max:255'],
            'message' => ['required']
        ]);

        $subscribers = Subscriber::pluck('email')->toArray();
        Mail::to($subscribers)->send(new NewsLetterMail($request->subject, $request->message));
        toastr()->success('Mail sent successfully');
        return redirect()->back();
    }
    public function destroyEmail(string $id)
    {
        try{
            $subscriber = Subscriber::findOrFail($id);
            $subscriber->delete();
            return response(['status' => 'success','message' => 'Deleted Successfully']);
        }catch(\Exception $e){
            return response(['status' => 'error','message' => 'There is an error']);
        }
    }
}
