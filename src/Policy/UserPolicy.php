<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

/**
 * User policy
 */
class UserPolicy
{
    public function canIndex(IdentityInterface $user, User $resource)
    {
        // All logged in users can create articles.
        return true;
    }
    /**
     * Check if $user can add User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canAdd(IdentityInterface $user, User $resource)
    {
        // All logged in users can create articles.
        return true;
    }

    /**
     * Check if $user can edit User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canEdit(IdentityInterface $user, User $resource)
    {
        // logged in users can edit their own articles.
        return $this->isAuthor($user, $resource);
    }

    /**
     * Check if $user can delete User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canDelete(IdentityInterface $user, User $resource)
    {
        // logged in users can delete their own articles.
        return $this->isAuthor($user, $resource);
    }

    /**
     * Check if $user can view User
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\User $resource
     * @return bool
     */
    public function canView(IdentityInterface $user, User $resource)
    {
        // logged in users can edit their own articles.
        return $this->isAuthor($user, $resource);
        // return true;

    }

    protected function isAuthor(IdentityInterface $user, User $resource)
    {
        return $resource->user_id === $user->getIdentifier();
    }
}
