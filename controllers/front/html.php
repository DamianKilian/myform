<?php

use MyForm\Entity\MyFormHtml;

class myformhtmlModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $em = $this->container->get('doctrine.orm.entity_manager');
        $repoMyFormHtml = $em->getRepository(MyFormHtml::class);
        $htmlEntity = $repoMyFormHtml->findOneById(1);
        $this->context->smarty->assign(array(
            'html' => $htmlEntity->getHtml()
        ));
        $this->setTemplate('module:myform/views/templates/front/html.tpl');
    }
}
