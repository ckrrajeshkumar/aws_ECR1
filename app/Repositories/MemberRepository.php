<?php
namespace App\Repositories;

use App\Models\ContactDetail;
use App\Models\Member;
use App\Models\PersonalDetail;

class MemberRepository
{
    public function generateConfirmationCode($id, $charLength = 2): string
    {
        // Generate a random 2-character prefix (alphanumeric)
        $prefix = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $charLength));

        // Pad the ID with leading zeros to ensure it is always 8 characters
        $paddedId = str_pad($id, 8, '0', STR_PAD_LEFT);

        // Combine the prefix and padded ID
        return $prefix . $paddedId;
    }

    public function create($data)
    {
        $member = Member::create($data);
        if ($member) {
            $member->confirmation_code = $this->generateConfirmationCode($member->id);
            $member->save();
        }
        return $member;
    }

    public function getById($id)
    {
        return Member::find($id);
    }

    public function getMemberByConfirmationCode($confirmation_code)
    {
        return Member::where('confirmation_code', $confirmation_code)->first();
    }

    public function updateById($id, $data)
    {
        $member = $this->getById($id);
        $member?->update($data);
        return $member?->refresh();
    }

    public function deleteById($id): bool
    {
        $member = $this->getById($id);
        if ($member) {
            $member->delete();
            return true;
        }
        return false;
    }

    public function getCheckDuplicateString($firstName, $lastName, $dob): string
    {
        $firstNameLength = config('properties.'.tenant('id').'.check_duplicate_char_length.first_name', 4);
        $lastNameLength = config('properties.'.tenant('id').'.check_duplicate_char_length.last_name', 4);
        return strtolower(substr($firstName, 0, $firstNameLength)) .
            strtolower(substr($lastName, 0, $lastNameLength)) .
            date('Y-m-d', strtotime($dob));
    }

    public function savePersonalDetail($data)
    {
        $personal = PersonalDetail::updateOrCreate(
            ['member_id' => $data['member_id']],
            $data
        );
        if ($personal) {
            $personal->check_duplicate_string = $this->getCheckDuplicateString(
                $personal->first_name,
                $personal->last_name,
                $personal->dob
            );
            $personal->save();
        }
        return $personal;
    }

    public function saveContactDetail($data)
    {
        return ContactDetail::updateOrCreate(
            ['member_id' => $data['member_id']],
            $data
        );
    }
}
