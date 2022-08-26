<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Weather;
use Response;
use Validator;


class WeatherController extends Controller
{
    public function getReport(Request $request){
         $validator = Validator::make($request->all(),[
              'city' => 'required|string|max:255',
          ]);
        if($validator->fails()){
        return response()->json($validator->errors()->toJson(),400); 
        }
        $city = $request->city;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.openweathermap.org/geo/1.0/direct?q=$city&limit=1&appid=d43db2815b40f13783918f1901a956f1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

    $response = curl_exec($curl);
    curl_close($curl);
    $data =json_decode($response,true);
    if($response && !isset($data['cod'])){
        $lat =$data[0]['lat'] ;
        $lon = $data[0]['lon'];
        $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL =>
    "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=d43db2815b40f13783918f1901a956f1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $data =json_decode($response);
    $insert['city'] = str_replace(' ', '', $data->name);
    $insert['visibility'] = $data->visibility;
    $insert['description'] = $data->weather[0]->description;
    $insert['temp'] = $data->main->temp;
    $insert['feels_like'] = $data->main->feels_like;
    $insert['temp_min'] = $data->main->temp_min;
    $insert['temp_max'] = $data->main->temp_max;
    $insert['pressure'] = $data->main->pressure;
    $insert['humidity'] = $data->main->humidity;
    $city_name = str_replace(' ', '', $data->name);
    $data_insert = Weather::create($insert);
    if($data_insert){
        $getData = Weather::where('city',$city_name)->first();
        return response()->json([
                'status'=>200,
                'message' => "Data inserted",
                'data'=> $getData,
            ]);
    }else{
        return response()->json([
                'status'=>201,
                'message' => "Unable to insert data",
            ]);
    }    
}else{
    return response()->json([
                'status'=>401,
                'message' => "Please Enter Correct City",
            ]);
}

}
}