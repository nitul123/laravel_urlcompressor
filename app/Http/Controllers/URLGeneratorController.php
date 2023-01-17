<?php

namespace App\Http\Controllers;

use App\Models\URLGenerator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Auth;
class URLGeneratorController extends Controller
{
    public function search_data($id)
    {
       $url=URLGenerator::where('short_url',$id)->first();
       
       if($url!=null)
       {
            if($url->maximum_limit==0)
            {
                $url->update([
                    'clicked'=> $url->clicked + 1,
                ]);
                return redirect()->to($url->url);
            }elseif($url->maximum_limit > $url->clicked)
            {
                $url->update([
                    'clicked'=> $url->clicked + 1,
                ]);
                return redirect()->to($url->url);
                
    
            }else
            {
            dd("URL not valid");

            }

        }else
        {
            dd("URL not valid");
        }

        // return view('welcome',compact('data'));
    }
    public function index(Request $request)
    {
        $urls=URLGenerator::all();
        
        return view('home',compact('urls'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $random_int = random_int(0, 999);
        $randomString = Str::random(4).$random_int;
        $date = Carbon::now()->format('HisYmd');
        $short_url=$randomString.$date;

        $this->validate($request, [
            'url' => 'required|url',
        ]);
    

        URLGenerator::create([
            'url'=>$request->url,
            'maximum_limit'=> $request->maximum_limit,
            'short_url'=>$short_url,
            'user_id'=>Auth::user()->id,
        ]);
        
        return redirect()->back();
    }

    public function show(URLGenerator $uRLGenerator)
    {
        //
    }

    public function edit(URLGenerator $uRLGenerator)
    {
        //
    }

    public function update(Request $request, URLGenerator $uRLGenerator)
    {
        //
    }

    public function destroy(URLGenerator $uRLGenerator)
    {
        //
    }
}
