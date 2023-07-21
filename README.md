# smartparts SDK

## Установка
    сomposer require smartparts/sdk

## Ошибки
В случае ошибки по любому из методов будет возвращен ответ с кодом ошибки и сообщением следующего вида

    {
        error       => (int) код ошибки
        message     => (string) текст ошибки
    }

## getAccountStatus
Получение статуса аккаунта по текущему токену.

### Метод
    getAccountStatus() : array

### Пример успешного ответа

    {
        email               => (string) email пользователя
        service             => (bool) есть ли доступ к api у пользователя
        token_expires_at    => (string)(ISO 8601) дата истечения токена
    }

## getNewToken
Перевыпуск токена, текущий токен (по которому сделан запрос) будет инвалидирован в случае успеха.

### Метод
    getNewToken() : array

### Пример успешного ответа

    {
        token       => (string) Новый токен доступы
        expires_at  => (string)(ISO 8601) дата истечения токена
    }

## getRootNodes
Получение узлов верхнего уровня.

### Метод

    getRootNodes() : array

### Пример успешного ответа

    {
        nodes => [
            {
                id              => (int) id узла,
                parent_node_id  => (int|null) id родительского узла,
                title           => (string) Наименование,
                slug            => (string) slug
                full_slug       => (string) slug, включая все родительские
                type            => (string) тип узла,
                type_title      => (string) Наименование типа узла
                images          => (array) Массив ссылок изображений
            },
            ...
        ]
    }

## getNodeByID
Получение узла по ID.

### Метод

    getNodeByID(int $node_id = null) : array

### Пример успешного ответа

    {
        id              => (int) id узла,
        parent_node_id  => (int|null) id родительского узла,
        title           => (string) Наименование,
        slug            => (string) slug
        full_slug       => (string) slug, включая все родительские
        type            => (string) тип узла,
        type_title      => (string) Наименование типа узла
        images          => (array) Массив ссылок изображений
        scheme          => (string|null) Ссылка на изображение схемы
        breadcrumbs 	=> (array) Массив объектов [
            {
                id              => (int) id узла,
                parent_node_id  => (int|null) id родительского узла,
                title           => (string) Наименование,
                slug            => (string) slug
                full_slug       => (string) slug, включая все родительские
                type            => (string) тип узла,
                type_title      => (string) Наименование типа узла
            },
            ...
        ],
        nodes => (array) Массив объектов [
            {
                id              => (int) id узла,
                parent_node_id  => (int|null) id родительского узла,
                title           => (string) Наименование,
                slug            => (string) slug
                full_slug       => (string) slug, включая все родительские
                type            => (string) тип узла,
                type_title      => (string) Наименование типа узла
                images          => (array) Массив ссылок изображений
            },
            ...
        ],
        parts => (array) Массив объектов [
            {
                id                  => (int) id запчасти,
                title               => (string) Наименование,
                sku                 => (string) Артикул,
                note                => (string|null) Заметка,
                quantity            => (int) Кол-во в узле,
                images              => (array) Массив ссылок изображений
                scheme_number       => (int) Номер на схеме
                scheme_subnumber    => (int) Дополнительный номер на схеме
                scheme_cords_exists => (bool) Есть ли координаты
                scheme_cords        => (array) Массив положений на схеме [
                    {
                        topLeft         => [
                            x               => (int),
                            y               => (int),
                            relative_x      => (float) в процентах,
                            relative_y      => (float) в процентах,
                        ],
                        topRight        => [
                            ...
                        ],
                        bottomRight     => [
                            ...
                        ],
                        bottomLeft      => [
                            ...
                        ],
                    },
                    ...
                ]
            },
            ...
        ]
    }

## getNodeBySlug
Получение узла по Slug, полному или частичному.

### Метод

	getNodeBySlug(string $slug = null) : array

### Пример успешного ответа

	Идентичен методу getNodeByID