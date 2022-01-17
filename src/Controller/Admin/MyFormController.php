<?php

namespace MyForm\Controller\Admin;

use Context;
use MyForm\Entity\MyFormHtml;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;

class MyFormController extends FrameworkBundleAdminController
{
    public function myformAction(Request $request)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $repoMyFormHtml = $em->getRepository(MyFormHtml::class);
        $htmlEntity = $repoMyFormHtml->findOneById(1);
        if ($request->isMethod('post')) {
            $newHtml = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $request->request->get('myform'));
            $htmlEntity->setHtml($newHtml);
            $em->flush();
        }

        return $this->render('@Modules/myform/templates/admin/myform.html.twig', [
            'html' => $htmlEntity->getHtml(),
        ]);
    }
}
