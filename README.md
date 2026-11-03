# yii2-camunda

[![Latest Version](https://img.shields.io/packagist/v/borodulin/yii2-camunda.svg)](https://packagist.org/packages/borodulin/yii2-camunda)
[![Total Downloads](https://img.shields.io/packagist/dt/borodulin/yii2-camunda.svg)](https://packagist.org/packages/borodulin/yii2-camunda)
[![CI](https://github.com/borodulin/yii2-camunda/actions/workflows/ci.yml/badge.svg)](https://github.com/borodulin/yii2-camunda/actions/workflows/ci.yml)
[![License](https://img.shields.io/packagist/l/borodulin/yii2-camunda.svg)](LICENSE)

## Description

Client for the [Camunda 7](https://docs.camunda.org/manual/latest/reference/rest/) BPM engine REST API for the Yii2 framework.

Covered resources: deployments, process definitions, process instances, tasks, executions,
messages, signals, variable instances, migrations, authorizations and engines.

Tested in CI against Camunda 7.21.

## Requirements

- PHP 7.4 or 8.x
- Yii 2.0.14 or newer (2.0.x) and `yiisoft/yii2-httpclient`
- A running Camunda 7 engine with the REST API enabled

## Installation

Install the extension via [Composer](https://getcomposer.org):

```bash
composer require borodulin/yii2-camunda:^1.0
```

## Configuration

Register the API client as the `camunda` application component:

```php
'components' => [
    'camunda' => [
        'class' => \borodulin\camunda\CamundaApi::class,
        'apiUrl' => 'http://localhost:8080/engine-rest',
        // optional HTTP Basic authentication
        'username' => 'demo',
        'password' => 'demo',
    ],
],
```

If the component is not configured, a client with the default URL
`http://localhost:8080/engine-rest` is used.

## Usage

Each REST resource is represented by a class in the `borodulin\camunda` namespace.
Errors returned by the engine are thrown as `borodulin\camunda\Exception`.

### Deploy a process

```php
use borodulin\camunda\Deployment;

$deployment = (new Deployment())->create('invoice', '/path/to/invoice.bpmn');
```

> Camunda 7.20+ requires `camunda:historyTimeToLive` to be set on every deployed process.

### Start a process instance

```php
use borodulin\camunda\ProcessDefinition;

$definition = new ProcessDefinition();
$instance = $definition->startInstanceByKey('invoice', [
    'businessKey' => 'INV-123',
    'variables' => ProcessDefinition::translateVariables([
        'amount' => 100,
        'customer' => 'ACME',
    ]),
]);
```

`translateVariables()` converts plain PHP values into Camunda typed variables.

### Work with user tasks

```php
use borodulin\camunda\Task;

$task = new Task();
$tasks = $task->getList(['processInstanceBusinessKey' => 'INV-123']);

$task->claim($tasks[0]['id'], 'john');
$task->submitForm($tasks[0]['id'], ['approved' => true]);
```

### Correlate a message

```php
use borodulin\camunda\Message;

(new Message())->messageOne('paymentReceived', 'INV-123', ['paid' => true]);
```

## Testing

The acceptance tests run against a real Camunda engine:

```bash
docker run -d -p 8080:8080 camunda/camunda-bpm-platform:7.21.0
composer install
CAMUNDA_API_URL=http://localhost:8080/engine-rest vendor/bin/codecept run
```

## License

**borodulin/yii2-camunda** is released under the MIT License. See the bundled [`LICENSE`](LICENSE) for details.
