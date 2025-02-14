<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    public function findUserById($id)
    {
        return User::find($id);
    }

    public function updateUser($id, $data)
    {
        $user = $this->findUserById($id);
        $user?->update($data);
        return $user;
    }

    public function deleteUser($id): bool
    {
        $user = $this->findUserById($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
