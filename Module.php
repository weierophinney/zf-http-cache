<?php
namespace ZF\HttpCache;

class Module
{
    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return array('Zend\Loader\StandardAutoloader' => array('namespaces' => array(
            __NAMESPACE__ => __DIR__.'/src/',
        )));
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function onBootstrap(\Zend\Mvc\MvcEvent $e)
    {
        $app = $e->getApplication();
        $em  = $app->getEventManager();
        $sm  = $app->getServiceManager();

        $em->attachAggregate($sm->get('ZF\HttpCache\HttpCacheListener'));
    }
}
