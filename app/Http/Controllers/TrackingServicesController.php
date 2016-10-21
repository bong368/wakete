<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Mongoquent;
use Carbon\Carbon;
use Curl;
use Cache;

class TrackingServicesController extends Controller
{
    static function tracking(Request $request, $platform, $action, $id_content)
    {
    	$key = md5($_SERVER['SERVER_NAME']."-".$_SERVER['REMOTE_ADDR']);
    	/* Cargamos el cliente */
		$clientRequest = ($request->cookie('client'))?$request->cookie('client'):Cache::get($key);
		$dataReport['client']       = $clientRequest;
		$dataReport['content']      = $platform;
		$dataReport['action']       = $action; 
		$dataReport['date']         = Carbon::now()->format('Y-m-d H:i:s');
		if ($platform != 'football' && $platform != 'wallpapers' ) {
			/* Cargamos los datos del contenido que ha visto el cliente */
			$id = new \MongoDB\BSON\ObjectId(base64_decode($id_content));
			$content = DB::connection('dbo')->collection($platform)->whereRaw([ '_id' => $id ])->get();
			unset($content[0]['_id']);

			$dataReport['data_content'] = $content[0];
			
		}elseif($platform == 'football'){
			$id                         = base64_decode($id_content);
			$dataReport['data_content'] = FootballController::getDataMatchById($id);
			 
		}elseif ($platform == 'wallpapers') {
			$dataReport['data_content'] = base64_decode($id_content);
		}

		// echo "<pre>";
		// print_r($dataReport);
		$reported = DB::connection('dbo')->collection('reports')->insert($dataReport);
		if ($reported) {
			return "true";
		}else{
			return "false";
		}
		
    }
}
