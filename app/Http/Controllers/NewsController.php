<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function GetNewsByID($id) {
        $news = news::find($id);
        return view('SingleNews',['news'=> $news]);

    }
    
    public function index() {
        $newses = news::get();
        return view('news',['newses'=> $newses]);
    }

    public function ckupload(Request $request) {
        $response = [
            'uploaded' => false,
            'url' => '',
            'error' => [
                'message' => ''
            ]
        ];
    
        if ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            $file = $request->file('upload');
    
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $path = public_path('ckeditor');
            $file->move($path, $fileName);
    
            $url = asset('ckeditor/' . $fileName);
    
            $response['uploaded'] = true;
            $response['url'] = $url;
        } else {
            $response['error']['message'] = 'Failed to upload file';
        }
    
        return response()->json($response);
    }

    public function UpdateNews($id) {
        $news = news::find($id);
        return view('admin.PostNews', ['news'=>$news]);
    }
    public function PostNews(Request $request) {
        // dd($request->all()); 
        $request->validate([
            'newstitle' => 'required|string',
            'shortDec' => 'required|string',
            'dec' => 'required|string',
            'id' => 'nullable|numeric',
        ]);
        $post = null;
        if($request->input('id')){
            $post = news::find($request->input('id'))->first();
            if($post){
                $post->update([
                    'title' => $request->input('newstitle'),
                    'short_dec' => $request->input('shortDec'),
                    'dec' => $request->input('dec'),
                    'added_by' => auth()->user()->id,
                ]);
                return redirect(route('postnews'))->with('message', 'Post Update Successfully!');
            }

        return redirect(route('postnews'))->with('message', 'Post Fail To Update!');
        }else{

            $post = new news();
            
            $post->title = $request->input('newstitle');
            $post->short_dec = $request->input('shortDec');
            $post->dec = $request->input('dec');
            $post->added_by = auth()->user()->id;
            
            $post->save();
            return redirect(route('postnews'))->with('message', 'Post Added Successfully!');
        }

    }
}
