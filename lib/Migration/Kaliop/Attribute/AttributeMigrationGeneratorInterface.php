<?php

declare(strict_types=1);

/*
 * Ibexa Design Bundle.
 *
 * @author    Florian ALEXANDRE
 * @copyright 2023-present Florian ALEXANDRE
 * @license   https://github.com/erdnaxelaweb/ibexadesignintegration/blob/main/LICENSE
 */

namespace ErdnaxelaWeb\IbexaDesignIntegration\Migration\Kaliop\Attribute;

use ErdnaxelaWeb\IbexaDesignIntegration\Definition\ContentFieldDefinition;

interface AttributeMigrationGeneratorInterface
{
    /**
     * @return array<string, mixed>
     */
    public function generate(string $fieldIdentifier, ContentFieldDefinition $field): array;
}
