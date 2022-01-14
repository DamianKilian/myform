<?php

namespace MyForm\Controller;

// use PrestaShop\PrestaShop\Adapter\Configuration;

use PrestaShop\PrestaShop\Adapter\Entity\Configuration;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;

class MyFormController extends FrameworkBundleAdminController
{
    // private $cache;

    // // you can use symfony DI to inject services
    // public function __construct(CacheProvider $cache)
    // {
    //     $this->cache = $cache;
    // }

    public function myformAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $newHtml = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $request->request->get('myform'));
            Configuration::updateValue('MYFORM_HTML', $newHtml);
        }

        return $this->render('@Modules/myform/templates/admin/myform.html.twig', [
            'html' => Configuration::get('MYFORM_HTML'),
        ]);
    }
}
