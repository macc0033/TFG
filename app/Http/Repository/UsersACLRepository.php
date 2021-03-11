<?php

namespace App\Http\Repository;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;

class UsersACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return session()->get('usuario_id');
    }

    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
        
        if (can('gestor-archivos',false)) {
            return [
                ['disk' => 'public', 'path' => '*', 'access' => 2],
                ['disk' => 'private', 'path' => '*', 'access' => 2],
                ['disk' => 'images', 'path' => '*', 'access' => 2],
            ];
        }
        
        return [
            ['disk' => 'private', 'path' => '/', 'access' => 1],                                  // main folder - read
            ['disk' => 'private', 'path' => 'personal', 'access' => 1],                              // only read
            ['disk' => 'private', 'path' => 'personal/'.session()->get('usuario'), 'access' => 1],        // only read
            ['disk' => 'private', 'path' => 'personal/'.session()->get('usuario').'/*', 'access' => 2],  // read and write
        ];
    }
}