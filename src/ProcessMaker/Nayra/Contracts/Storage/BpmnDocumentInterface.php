<?php

namespace ProcessMaker\Nayra\Contracts\Storage;

use ProcessMaker\Nayra\Contracts\Bpmn\EntityInterface;
use ProcessMaker\Nayra\Contracts\Repositories\StorageInterface;

/**
 * BPMN DOM file interface
 *
 * @package \ProcessMaker\Nayra\Contracts\Storage
 * 
 * @method DOMNodeList getElementsByTagName(string $name)
 * @method DOMNodeList getElementsByTagNameNS(string $namespaceURI, string $localName)
 */
interface BpmnDocumentInterface extends StorageInterface
{

    /**
     * Get the BPMN elements mapping.
     *
     * @return array
     */
    public function getBpmnElementsMapping();

    /**
     * Set a BPMN element mapping.
     *
     * @param string $namespace
     * @param string $tagName
     * @param mixed $mapping
     *
     * @return $this
     */
    public function setBpmnElementMapping($namespace, $tagName, $mapping);

    /**
     * Find a element by id.
     *
     * @param string $id
     *
     * @return BpmnElement
     */
    public function findElementById($id);

    /**
     * Index a BPMN element by id.
     *
     * @param string $id
     * @param EntityInterface $bpmn
     */
    public function indexBpmnElement($id, EntityInterface $bpmn);

    /**
     * Verify if the BPMN element identified by id was previously loaded.
     *
     * @param string $id
     *
     * @return boolean
     */
    public function hasBpmnInstance($id);

    /**
     * Get a BPMN element by id.
     *
     * @param string $id
     *
     * @return \ProcessMaker\Nayra\Contracts\Bpmn\EntityInterface
     */
    public function getElementInstanceById($id);

    /**
     * Return true if the element instance exists in the Process.
     *
     * @param string $id
     *
     * @return bool
     */
    public function hasElementInstance($id);

    /**
     * Get skipElementsNotImplemented property.
     *
     * If set to TRUE, skip loading elements that are not implemented
     * If set to FALSE, throw ElementNotImplementedException
     *
     * @return bool
     */
    public function getSkipElementsNotImplemented();

    /**
     * Set skipElementsNotImplemented property.
     *
     * If set to TRUE, skip loading elements that are not implemented
     * If set to FALSE, throw ElementNotImplementedException
     *
     * @param bool $skipElementsNotImplemented
     *
     * @return BpmnDocument
     */
    public function setSkipElementsNotImplemented($skipElementsNotImplemented);

    /**
     * Validate document with BPMN schemas.
     *
     * @param string $schema
     */
    public function validateBPMNSchema($schema);

    /**
     * Get BPMN validation errors.
     *
     * @return array
     */
    public function getValidationErrors();
}
