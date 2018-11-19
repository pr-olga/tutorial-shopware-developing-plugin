<?php

namespace PrOlgaStartup;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Models\Media\Media;

class PrOlgaStartup extends Plugin
{
    public function install(InstallContext $context)
    {
        $attributeService = $this->container->get('shopware_attribute.crud_service');

        $attributeService->update(
            's_articles_attributes',
            'alt_image',
            'single_selection',
            [
                'displayInBackend' => true,
                'label' => 'Alternatives Bild',
                'entity' => Media::class,
            ]
        );
    }

    public function uninstall(UninstallContext $context)
    {
        $attributeService = $this->container->get('shopware_attribute.crud_service');

        $attributeExist = $attributeService->get('s_articles_attributes', 'alt_image');

        if($attributeExist){
            $attributeService->delete(
                's_articles_attributes',
                'alt_image'
            );
        }

        $context->sheduleClearChache(InstallContext::CACHE_LIST_ALL);
    }
}