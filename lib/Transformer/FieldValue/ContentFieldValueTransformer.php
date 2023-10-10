<?php
/*
 * ibexadesignbundle.
 *
 * @package   ibexadesignbundle
 *
 * @author    florian
 * @copyright 2018 Novactive
 * @license   https://github.com/Novactive/NovaHtmlIntegrationBundle/blob/master/LICENSE
 */

namespace ErdnaxelaWeb\IbexaDesignIntegration\Transformer\FieldValue;

use Ibexa\Contracts\Core\Repository\Values\Content\Content;
use Ibexa\Contracts\Core\Repository\Values\ContentType\FieldDefinition;
use Ibexa\Core\FieldType\Relation\Value as RelationValue;

class ContentFieldValueTransformer implements FieldValueTransformerInterface
{
    public function transformFieldValue(
        Content         $content,
        string          $fieldIdentifier,
        FieldDefinition $fieldDefinition
    ) {
        /** @var \Ibexa\Core\FieldType\RelationList\Value $fieldValue */
        $fieldValue = $content->getFieldValue($fieldIdentifier);
        if ($fieldValue instanceof RelationValue) {
            return [
                [
                    'contentId' => $fieldValue->destinationContentId,
                ],
            ];
        }

        return array_map(function (int $destinationContentId) {
            return [
                'contentId' => $destinationContentId,
            ];
        }, $fieldValue->destinationContentIds);
    }
}
