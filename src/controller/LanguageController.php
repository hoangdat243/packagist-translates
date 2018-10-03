<?php

namespace Datht\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App;
use Storage;
//use Datht\Language\Language;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        //
       $data= Language::all();
    //    $data = \DB::table('translates') -> get();
		// $data = Translate::all();
		//App::setLocale($lang);
    	return view('language::list', compact(['data','lang']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        //
        return view('language::create', compact('lang'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($lang,Request $request)
    {
        //
        $incode = $request['incode'];
    	$en = $request['en'];
    	$vn = $request['vn'];
    	$pages = $request['pages'];
    	DB::table('translates') -> insert([
    		'in_code' => $incode,
    		'en' => $en,
    		'vn' => $vn,
    		'pages' => $pages
    	]);
    	return redirect($lang.'/lol');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function updateTrans($lang,Request $request)
    {
        $data = DB::table('translates') -> get();
		$trans_en_string = '<?php return [';
		$trans_vn_string = '<?php return [';
		foreach ($data as $trans) {
			$trans_en_string .= '"' . $trans->in_code . '"' . ' => ' . '"' . str_replace('"', '\"', $trans->en) .'"' .',';
			$trans_vn_string .= '"' . $trans->in_code . '"' . ' => ' . '"' . str_replace('"', '\"', $trans->vn) .'"' .',';
		}
		$trans_en_string .= '];';
		$trans_vn_string .= '];';
    	//Storage::disk('lang')->put('en/test2.php', $trans_en_string);
    	//Storage::disk('lang')->put('vn/test2.php', $trans_vn_string);
       
        
        $file1 = "../resources/lang/en/test2.php";
        $file2 = "../resources/lang/vn/test2.php";

        $en_trans_file = fopen($file1, "w");
        $result1 = fwrite($en_trans_file, $trans_en_string);

        $vn_trans_file = fopen($file2, "w");
        $result2 = fwrite($vn_trans_file, $trans_vn_string);
        return redirect() -> back();
    }
}
