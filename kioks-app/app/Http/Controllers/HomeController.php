<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $active_data = Data::join('users', 'users.id', '=', 'data.user_id')
        ->join('units','units.id','=','data.unit_id')
        ->join('units_main','units_main.id','=','data.unit_main_id')
        ->where('data.status_id', 0)
        ->select('data.*', 'users.name as user_name','units.name as unit_name','units_main.name as unitMainName')
        ->get();
    


        return view("index",compact('active_data'));
    }

    public function salesInfo(Request $request)
    {
        try {
            $sales_persons = User::where("department_id", 1)
                ->pluck("id")
                ->toArray();

            if (empty($sales_persons)) {
                return response()->json([
                    "success" => false,
                    "message" => "Satış personeli bulunamadı.",
                ]);
            }

            $lastData = Data::whereIn("user_id", $sales_persons)
                ->latest()
                ->first();

            if ($lastData) {
                $lastIndex = array_search($lastData->user_id, $sales_persons);
                $nextIndex = ($lastIndex + 1) % count($sales_persons);
                $nextUserId = $sales_persons[$nextIndex];
            } else {
                $nextUserId = $sales_persons[0];
            }

            $data = new Data();
            $data->phone = $request->input("phone");
            $data->user_id = $nextUserId;
            $data->unit_id = 1;
            $data->unit_main_id = 1;
            $data->status_id = 0;
            $data->save();

            return response()->json([
                "success" => true,
                "message" => "Satış Talebi Başarıyla Oluşturuldu.",
                "assigned_user_id" => $nextUserId,
            ]);
        } catch (Exception $error) {
            return response()->json([
                "success" => false,
                "error" => $error->getMessage(),
                "message" => "Satış ve Satın Alma Talebi Oluşturulamadı!",
            ]);
        }
    }

    public function serviceSupport(Request $request)
    {
        try {
            $service_persons = User::where("department_id", 2)
                ->pluck("id")
                ->toArray();

            if (empty($service_persons)) {
                return response()->json([
                    "success" => false,
                    "message" => "Servis Personeli Bulunamadı.",
                ]);
            }

            $lastData = Data::whereIn("user_id", $service_persons)
                ->latest()
                ->first();

            if ($lastData) {
                $lastIndex = array_search($lastData->user_id, $service_persons);
                $nextIndex = ($lastIndex + 1) % count($service_persons);
                $nextUserId = $service_persons[$nextIndex];
            } else {
                $nextUserId = $service_persons[0];
            }

            $data = new Data();
            $data->phone = $request->input("phone");
            $data->user_id = $nextUserId;
            $data->unit_id = 2;
            $data->unit_main_id = 3;
            $data->status_id = 0;
            $data->save();

            return response()->json([
                "success" => true,
                "message" => "Teknik Servis Talebi Başarıyla Oluşturuldu.",
                "assigned_user_id" => $nextUserId,
            ]);
        } catch (Exception $error) {
            return response()->json([
                "success" => false,
                "error" => $error->getMessage(),
                "message" => "Teknik Servis Talebi Başarıyla Oluşturulamadı.!",
            ]);
        }
    }

    public function giveServiceProduct(Request $request)
    {
        try {
            $service_persons = User::where("department_id", 2)
                ->pluck("id")
                ->toArray();

            if (empty($service_persons)) {
                return response()->json([
                    "success" => false,
                    "message" => "Servis Personeli Bulunamadı.",
                ]);
            }

            $lastData = Data::whereIn("user_id", $service_persons)
                ->latest()
                ->first();

            if ($lastData) {
                $lastIndex = array_search($lastData->user_id, $service_persons);
                $nextIndex = ($lastIndex + 1) % count($service_persons);
                $nextUserId = $service_persons[$nextIndex];
            } else {
                $nextUserId = $service_persons[0];
            }

            $data = new Data();
            $data->phone = $request->input("phone");
            $data->user_id = $nextUserId;
            $data->unit_id = 2;
            $data->unit_main_id = 4;
            $data->status_id = 0;
            $data->save();

            return response()->json([
                "success" => true,
                "message" => "Teknik Servis Cihaz Teslim Etme Talebi Başarıyla Oluşturuldu.",
                "assigned_user_id" => $nextUserId,
            ]);
        } catch (Exception $error) {
            return response()->json([
                "success" => false,
                "error" => $error->getMessage(),
                "message" => "Teknik Servis Cihaz Teslim Etme Talebi Başarıyla Oluşturulamadı.!",
            ]);
        }
    }
   
    public function receiveServiceProduct(Request $request)
    {
        try {
            $service_persons = User::where("department_id", 2)
                ->pluck("id")
                ->toArray();

            if (empty($service_persons)) {
                return response()->json([
                    "success" => false,
                    "message" => "Servis Personeli Bulunamadı.",
                ]);
            }

            $lastData = Data::whereIn("user_id", $service_persons)
                ->latest()
                ->first();

            if ($lastData) {
                $lastIndex = array_search($lastData->user_id, $service_persons);
                $nextIndex = ($lastIndex + 1) % count($service_persons);
                $nextUserId = $service_persons[$nextIndex];
            } else {
                $nextUserId = $service_persons[0];
            }

            $data = new Data();
            $data->phone = $request->input("phone");
            $data->user_id = $nextUserId;
            $data->unit_id = 2;
            $data->unit_main_id = 5;
            $data->status_id = 0;
            $data->save();

            return response()->json([
                "success" => true,
                "message" => "Teknik Servis Cihaz Teslim Alma Talebi Başarıyla Oluşturuldu.",
                "assigned_user_id" => $nextUserId,
            ]);
        } catch (Exception $error) {
            return response()->json([
                "success" => false,
                "error" => $error->getMessage(),
                "message" => "Teknik Servis Cihaz Teslim Alma Talebi Başarıyla Oluşturulamadı!",
            ]);
        }
    }
}
