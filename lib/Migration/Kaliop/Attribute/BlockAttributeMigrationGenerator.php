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

namespace ErdnaxelaWeb\IbexaDesignIntegration\Migration\Kaliop\Attribute;

use Exception;

class BlockAttributeMigrationGenerator implements AttributeMigrationGeneratorInterface
{
    public function generate( string $fieldIdentifier, array $field ): array
    {
        throw new Exception('not implemented');
    }

}
