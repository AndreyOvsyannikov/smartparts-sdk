# smartparts SDK

## Установка
	composer require smartparts/sdk

## Ошибки
В случае ошибки по любому из методов будет возвращен ответ с кодом ошибки и сообщением следующего вида

	{
		error 	=> 7
		message	=> Couldn't connect to server
	}

## getAccountStatus
Получение статуса аккаунта по текущему токену.

### Метод
	getAccountStatus() : array

### Пример успешного ответа

	{
		email				=> someemail@gmail.com
		service				=> true|false
		token_expires_at	=> 2000-00-00T00:00:00.000000Z
	}

## getNewToken
Перевыпуск токена, текущий токен (по которому сделан запрос) будет инвалидирован в случае успеха.

### Метод
	getNewToken() : array

### Пример успешного ответа

	{
		token 		=> 29|Smil5VQ3ztTmXn00mJyphixsqHWCXTXC5QlhGW4b
		expires_at 	=> 2000-00-00T00:00:00.000000Z
	}

## getRootNodes
Получение узлов верхнего уровня.

### Метод

	getRootNodes() : array

### Пример успешного ответа

	{
		nodes => [
			{
				id				=> 1,
				parent_node_id	=> 0,
				title			=> Узел,
				slug			=> node
				full_slug		=> parentOfParentNode/parentNode/node
				type			=> manufacturer,
				type_title		=> Производитель
			},
			{
				id				=> 2,
				parent_node_id	=> 0,
				title			=> Узел 2,
				slug			=> node-2
				full_slug		=> parentOfParentNode/parentNode/node-2
				type			=> manufacturer,
				type_title		=> Производитель
			}
		]
	}

## getNodeByID
Получение узла по ID.

### Метод

	getNodeByID(int $node_id = null) : array

### Пример успешного ответа

	{
		id				=> 5,
		parent_node_id	=> 0,
		title			=> Узел 3,
		slug			=> node-3
		full_slug		=> node-1/node-2/node-3
		type			=> manufacturer,
		type_title		=> Производитель,
		breadcrumbs 	=> [
			{
				id				=> 1,
				parent_node_id	=> null,
				title			=> Узел 1,
				slug			=> node-1
				full_slug		=> node-1
				type			=> manufacturer,
				type_title		=> Производитель
			},
			{
				id				=> 2,
				parent_node_id	=> 1,
				title			=> Узел 2,
				slug			=> node-2
				full_slug		=> node-1/node-2
				type			=> manufacturer,
				type_title		=> Производитель
			}
		],
		nodes => [
			{
				id				=> 10,
				parent_node_id	=> 5,
				title			=> Узел 4,
				slug			=> node-4
				full_slug		=> node-1/node-2/node-3/node-4
				type			=> manufacturer,
				type_title		=> Производитель
			},
			{
				id				=> 15,
				parent_node_id	=> 5,
				title			=> Узел 5,
				slug			=> node-5
				full_slug		=> node-1/node-2/node-3/node-5
				type			=> manufacturer,
				type_title		=> Производитель
			}
		],
		parts => [
			{
				id				=> 1,
				title			=> Запчасть 1,
				sku				=> 0x3251
				note			=> замена для 0x3250
				quantity		=> 9,
			},
			{
				id				=> 3521,
				title			=> Запчасть 2,
				sku				=> S02134
				note			=> null
				quantity		=> 2,
			}
		]
	}

## getNodeBySlug
Получение узла по Slug, полному или частичному.

### Метод

	getNodeBySlug(string $slug = null) : array

### Пример успешного ответа

	Идентичен методу getNodeByID