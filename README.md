
## installation
```php
composer require ah-b/oil "0.1"
```
## Usage



```php
$pipelineService = new OilService(new Pipeline());

$pipelineService->add(new Test());

$pipelineService->run('my payload');


```


```php
class Test
{
    public function __invoke($payload)
    {
        return $payload;
    }
}

```

## mediate


```php
$pipelineService = new OilService(new Mediator());

$pipelineService->add(function($payload){ echo $payload; });

$pipelineService->run('my payload');


```