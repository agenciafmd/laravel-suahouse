## Laravel - Suahouse

[![Downloads](https://img.shields.io/packagist/dt/agenciafmd/laravel-suahouse.svg?style=flat-square)](https://packagist.org/packages/agenciafmd/laravel-suahouse)
[![Licença](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

- Envia os leads para Suahouse

## Instalação

```bash
composer require agenciafmd/laravel-suahouse:dev-master
```

## Configuração

Para que a integração seja realizada, precisamos do **subdominio** do cliente.

Este dado, é consigo quando o cliente passa o acesso ao painel administrativo.

```dotenv
SUAHOUSE_DOMAIN=subdominio-do-cliente.housecrm.com.br
```

Por padrão, o chat virá desabilitado.

Para habilitar, insira a cor (red|blue) no .env

```dotenv
SUAHOUSE_CHAT=blue
```

Vamos adicionar os components da suahouse na nossa `master.blade.php`

```html
<head>
    ...
    <x-suahouse::head/>
</head>
<body>
    ...
    <x-suahouse::body/>
</body>
```

## Uso

### Livewire

Nos formulário disparados pelo livewire, emitimos o evento `suahouse`.

```php
$this->emit('suahouse', [
    'event' => 'form',
    'form_name' => $data['source'],
    'form_id' => $this->formId,
    'code' => $this->development->code,
    'id' => $this->development->id,
    'product' => $this->development->name,
    'name' => $data['name'],
    'email' => $data['email'],
    'ddd' => substr(preg_replace('/[^0-9]/', '', $data['phone']), 0, 2),
    'phone' => substr(preg_replace('/[^0-9]/', '', $data['phone']), 2),
    'description' => $data['message']
]);
```

### Controller

Nos formulários disparados pela Controller, setamos a session `suahouse`.

```php
session()->flash('suahouse', [
    'event' => 'form',
    'form_name' => $data['source'],
    'form_id' => $this->formId,
    'code' => $this->development->code,
    'id' => $this->development->id,
    'product' => $this->development->name,
    'name' => $data['name'],
    'email' => $data['email'],
    'ddd' => substr(preg_replace('/[^0-9]/', '', $data['phone']), 0, 2),
    'phone' => substr(preg_replace('/[^0-9]/', '', $data['phone']), 2),
    'description' => $data['message']
]);
```
