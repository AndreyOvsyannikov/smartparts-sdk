# smartparts SDK

## Установка

	composer require smartparts/sdk

## Описание методов

### getAccountStatus

#### Описание

	getAccountStatus() : array

Получение статуса аккаунта по текущему токену.

#### Возвращает
Пример с данными в случае успеха:

	(
		[email] => ???@???.??
		[service] => true // true или false
	)

Пример с данными в случае ошибки:

	(
		[error] => 7 // номер ошибки
		[message] => Couldn't connect to server // текст ошибки
	)

### getNewToken

#### Описание

	getNewToken() : array

Перевыпуск токена, текущий токен (по которому сделан запрос) будет инвалидирован в случае успеха.

#### Возвращает
Пример с данными в случае успеха:

	(
		[token] => 29|Smil5VQ3ztTmXn00mJyphixsqHWCXTXC5QlhGW4b
		[expires_at] => 2023-07-06T03:58:01.788435Z
	)

Пример с данными в случае ошибки:

	(
		[error] => 7 // номер ошибки
		[message] => Couldn't connect to server // текст ошибки
	)

### getNodes

#### Описание

	getNodes(int $node_id = null) : array

Получение узлов. Если node_id передан, то получит его дочерние узлы, если не передан или null, то получит узлы верхнего уровня (производителей)

#### Возвращает
Пример с данными в случае успеха:

	(
		[nodes] => Array
			(
				[0] => Array
					(
						[id] => 1
						[parent_node_id] => 
						[title] => Русская механика
						[type] => manufacturer
						[type_title] => Производитель
						[parts] => Array
							(
								[0] => Array
                                (
                                    [id] => 6518
                                    [title] => Выпрямитель T011E020
                                    [sku] => 0107595
                                    [note] => ''
                                    [quantity] => 1
                                )
							)

					)

			)

	)

Пример с данными в случае ошибки:

	(
		[error] => 7 // номер ошибки
		[message] => Couldn't connect to server // текст ошибки
	)