<?php

namespace App\Domain\Service;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;

/**
 * Class HydratorService
 */
class HydratorService
{
    /** @var ArrayTransformerInterface */
    private $serializer;

    /**
     * HydratorService constructor.
     *
     * @param ArrayTransformerInterface $serializer
     */
    public function __construct(ArrayTransformerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param object        $sourceObject
     * @param string        $destinationClass
     * @param array         $groups
     * @param \Closure|null $callback
     * @return object
     */
    public function hydrate($sourceObject, $destinationClass, array $groups = [])
    {
        $context = $this->getSerializationContext($groups);

        $normalize = $this->serializer->toArray($sourceObject, $context);

        return $this->fromArray($normalize, $destinationClass);
    }

    /**
     * @param array $array
     * @param       $destinationClass
     * @param array $groups
     * @return object
     */
    public function fromArray(array $array, $destinationClass, $groups = [])
    {
        $context = $this->getDeserializationContext($groups);

        $destinationObject = $this->serializer->fromArray($array, $destinationClass, $context);

        return $destinationObject;
    }

    /**
     * @param       $object
     * @param array $groups
     * @return array
     */
    public function toArray($object, $groups = [])
    {
        $context = $this->getSerializationContext($groups);

        return $this->serializer->toArray($object, $context);
    }

    /**
     * @param array $groups
     * @return SerializationContext
     */
    protected function getSerializationContext(array $groups): SerializationContext
    {
        $context = SerializationContext::create();

        if (!empty($groups)) {
            $context->setGroups($groups);
        }
        return $context;
    }

    /**
     * /**
     * @param array $groups
     * @return DeserializationContext
     */
    protected function getDeserializationContext(array $groups): DeserializationContext
    {
        $context = DeserializationContext::create();

        if (!empty($groups)) {
            $context->setGroups($groups);
        }
        return $context;
    }

}
