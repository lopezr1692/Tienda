<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }

    public function create(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }

    public function update(User $user, Product $product): bool
    {
        return $user->hasVerifiedEmail();
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->hasVerifiedEmail();
    }
}
