<?php
namespace App\Repositories;

use App\Models\Registration;

class RegistrationRepository
{
    public function create($data)
    {
        return Registration::create($data);
    }

    public function getById($id)
    {
        return Registration::find($id);
    }

    public function getRegistrationsByMemberId($memberId)
    {
        return Registration::where('member_id', $memberId)->get();
    }

    public function updateById($id, $data)
    {
        $registration = $this->getById($id);
        $registration?->update($data);
        return $registration?->refresh();
    }

    public function deleteById($id): bool
    {
        $registration = $this->getById($id);
        if ($registration) {
            $registration->delete();
            return true;
        }
        return false;
    }

    public function getActiveRegistration($memberId)
    {
        return $this->getRegistrationsByMemberId($memberId)->where('status', 4)->sortByDesc('valid_thru')->first();
    }
}
