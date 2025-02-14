<?php
namespace App\Services;

use App\Repositories\MemberRepository;
use App\Repositories\RegistrationRepository;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class RegistrationService
{
    public function __construct(
        private MemberRepository $memberRepository,
        private RegistrationRepository $registrationRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function register($data)
    {
        try {
            $member = $this->memberRepository->create($data);
            if ($member) {
                $data['member_id'] = $member->id;
                $registration = $this->registrationRepository->create($data);
                if ($registration) {
                    $registration->cost = Arr::get($registration, 'membership.price', 0);
                    $registration->save();
                }
                $personalDetail = $this->memberRepository->savePersonalDetail($data);
                $contactDetail = $this->memberRepository->saveContactDetail($data);
            }
            return $member->refresh();
        } catch (Exception $e) {
            Log::error('Error while registering the member:', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }
}
