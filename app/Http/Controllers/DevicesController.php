<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DevicesRequest;
use App\Interfaces\DeviceInterface;
use App\Models\Devices;

class DevicesController extends Controller
{
    protected $deviceInterface;

    public function __construct(DeviceInterface $deviceInterface)
    {
        $this->deviceInterface = $deviceInterface;
    }

    public function index (Request $req)
    {
        return $this->deviceInterface->getDevicesUser($req);
    }

    public function store (DevicesRequest $req)
    {
        return $this->deviceInterface->createDevices($req);
    }
}
