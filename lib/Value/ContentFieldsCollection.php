<?php
/*
 * ibexadesignbundle.
 *
 * @package   ibexadesignbundle
 *
 * @author    florian
 * @copyright 2023-present Florian ALEXANDRE
 * @license   https://github.com/erdnaxelaweb/ibexadesignintegration/blob/main/LICENSE
 */

namespace ErdnaxelaWeb\IbexaDesignIntegration\Value;

use ErdnaxelaWeb\IbexaDesignIntegration\Transformer\FieldValueTransformer;
use ErdnaxelaWeb\StaticFakeDesign\Value\ContentFieldsCollection as BaseContentFieldsCollection;
use Ibexa\Contracts\Core\Repository\Values\Content\Content as IbexaContent;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentType;

class ContentFieldsCollection extends BaseContentFieldsCollection
{
    protected array $initState = [];

    public function __construct(
        protected IbexaContent $ibexaContent,
        protected ContentType  $contentType,
        protected array        $contentFieldsConfiguration,
        protected FieldValueTransformer $fieldValueTransformers
    ) {
        parent::__construct();

        foreach ($contentFieldsConfiguration as $fieldIdentifier => $fieldConfiguration) {
            $this->initState[$fieldIdentifier] = false;
            $this->set($fieldIdentifier, null);
        }
    }

    public function get(string|int $key)
    {
        if (isset($this->initState[$key]) && $this->initState[$key] === false) {
            $this->initState[$key] = true;
            $this->set(
                $key,
                $this->fieldValueTransformers->transform(
                    $this->ibexaContent,
                    $this->contentType,
                    $key,
                    $this->contentFieldsConfiguration[$key]
                )
            );
        }
        return parent::get($key);
    }
}
