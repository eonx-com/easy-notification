<?php

declare(strict_types=1);

namespace EonX\EasyNotification\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

/**
 * This class has for objective to provide common features to all tests without having to update
 * the class they all extend.
 */
abstract class AbstractTestCase extends TestCase
{
    /**
     * @var string[]
     */
    protected static $defaultConfig = [
        'algorithm' => 'sha256',
        'apiKey' => 'my-api-key',
        'apiUrl' => 'http://eonx.com/',
        'externalId' => 'my-provider',
        'queueRegion' => 'ap-southeast-2',
        'queueUrl' => 'https://sqs.my-queue',
        'secret' => 'my-secret',
    ];

    protected function tearDown(): void
    {
        $fs = new Filesystem();
        $var = __DIR__ . '/../var';

        if ($fs->exists($var)) {
            $fs->remove($var);
        }

        parent::tearDown();
    }
}
