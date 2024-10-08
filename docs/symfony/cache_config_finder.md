---eonx_docs---
title: CacheConfigFinder In Symfony
weight: 1001
---eonx_docs---

### Override Config Cache in PHP

If your Symfony project is using PHP to define its services, the service id to override is provided to you via
`\EonX\EasyNotification\Bundle\Enum\ConfigServiceId`.

```php
// config/services.php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use EonX\EasyNotification\Bundle\Enum\ConfigServiceId;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services
        ->set(ConfigServiceId::ConfigCache->value, PhpFilesAdapter::class)
        ->arg('$namespace', 'eonx_notification_config');
};
```
