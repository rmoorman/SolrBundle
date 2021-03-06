<?php
namespace FS\SolrBundle\Doctrine\ODM\Listener;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use FS\SolrBundle\SolrFacade;
use FS\SolrBundle\SolrQueryFacade;

class UpdateDocumentListener
{

    /**
     * @var SolrFacade
     */
    private $solrFacade = null;

    /**
     * @param SolrFacade $solrFacade
     */
    public function __construct(SolrFacade $solrFacade)
    {
        $this->solrFacade = $solrFacade;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getDocument();

        try {
            $this->solrFacade->updateDocument($entity);
        } catch (\RuntimeException $e) {
        }
    }
}
