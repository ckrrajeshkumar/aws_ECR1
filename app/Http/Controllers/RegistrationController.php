<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct(private RegistrationService $registrationService)
    {
    }

    public function registerMember(RegistrationRequest $registrationRequest)
    {
        $response = $this->registrationService->register($registrationRequest->all());
        return response()->json([
            'success' => true,
            'message' => 'Registration Success!',
            'data' => $response
        ], 201);
    }
}
