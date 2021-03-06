<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Setup\Test\Unit\Module\Di\Code\Scanner;

use \Magento\Setup\Module\Di\Code\Scanner\ServiceDataAttributesScanner;

class ServiceDataAttributesScannerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Setup\Module\Di\Code\Scanner\ServiceDataAttributesScanner
     */
    protected $model;

    /**
     * @var string
     */
    protected $testFile;

    protected function setUp()
    {
        $this->model = new ServiceDataAttributesScanner();
        $this->testFile = str_replace('\\', '/', realpath(__DIR__ . '/../../') . '/_files/service_data_attributes.xml');
    }

    public function testCollectEntities()
    {
        $files = [$this->testFile];
        $expectedResult = [
            'Magento\Sales\Api\Data\OrderExtensionInterface',
            'Magento\Sales\Api\Data\OrderExtension',
            'Magento\Sales\Api\Data\OrderItemExtensionInterface',
            'Magento\Sales\Api\Data\OrderItemExtension',
            'Magento\GiftMessage\Api\Data\MessageExtensionInterface',
            'Magento\GiftMessage\Api\Data\MessageExtension',
            'Magento\Quote\Api\Data\TotalsAdditionalDataExtensionInterface',
            'Magento\Quote\Api\Data\TotalsAdditionalDataExtension'
        ];

        $this->assertSame($expectedResult, $this->model->collectEntities($files));
    }
}
