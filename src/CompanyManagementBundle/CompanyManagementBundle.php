<?php

namespace CompanyManagementBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CompanyManagementBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
