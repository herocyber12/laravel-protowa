<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Interfaces\DevicesInterface;
use App\Models\Devices;
use App\Http\Requests\DevicesRequest;
use Illuminate\Support\Facades\Str;
class DevicesRepository implements DevicesInterface{
    public function getAllDevices(Request $req)
    {
        $data = Devices::where('user_id',$req->user()->id)->get();

        return response()->json([
            'stats' => true,
            'data' => $data    
        ],200);
    }

    public function createDevices (DevicesRequest $req)
    {
        try {
            Device::create([
                'device_name' => $req->device_name,
                'user_id' => $req->user()->id,
                'device_id' => 'client'.mt_rand(0,9999999).$req->user()->id,
            ]); 
    
            return response()->json([
                'stats' => true,
                'Message' => 'Berhasil Menambahkan Device Baru',
            ],200);
        } catch (\Throwable $th) {
            throw new Exception([
                'stats' => false,
                'message' => 'Gagal memproses request'
            ],1);
        }
    }
}