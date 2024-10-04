<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
use App\Http\Requests\DevicesRequest;
interface DevicesInterface{
    public function getDevicesUser(Request $req);
    public function createDevices(DevicesRequest $req);
}