<?php

namespace App\Controller;

use CoreDB;
use Src\Controller\AdminController as ControllerAdminController;

class AdminController extends ControllerAdminController
{
    public function checkAccess(): bool
    {
        $user = CoreDB::currentUser();
        return $user->isAdmin() || $user->isUserInRole("Editor");
    }
}
