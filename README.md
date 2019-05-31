
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

## Scenario

```php


    public function indexController()
    {
    
        $databaseRecord = "test";
        
        if($databaseRecord == "test")
        {
            // do some logic
        
        }
        
        if($databaseRecord == "foo")
        {
            // do some logic
        
        }        
        
        if($databaseRecord == "bar")
        {
            // do some logic
        
        }  
        
        
        ...
    
    }


```


```php


    public function indexController()
    {
    
        $databaseRecord = "test";
        
        $pipelineService = new OilService(new Pipeline());
        
        $pipelineService->add(new Test());
        
        $pipelineService->add(new Foo());
        
        $pipelineService->add(new Bar());
        
        $pipelineService->run($databaseRecord);
        
        ...
    
    }


```