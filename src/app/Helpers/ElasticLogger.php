<?php

namespace App\Helpers;

use App\Exceptions\WrongParametersException;

class ElasticLogger
{
    /**
     * Приемлемые типы сообщений
     * @var array
     */
    static $types = ['info', 'success', 'danger', 'warning'];

    /**
     * Ключ для хранения в сессии
     * @var string
     */
    static $sessionKey = 'ElasticLogger';

    /**
     * ElasticLogger constructor.
     * Собственно, сохраняем данные о сообщении в сессию (только для запроса на следующей странице)
     * @param $text
     * @param string $type
     * @param null $title
     * @param null $icon
     * @throws WrongParametersException
     */
    public function __construct($text, $type = 'info', $title = null, $icon = null)
    {
        if (in_array($type, static::$types) === false) {
            throw new WrongParametersException('Wrong ElasticLogger type!');
        }

        if (!$text) {
            throw new WrongParametersException('Text can not be empty!');
        }

        request()->session()->flash(static::$sessionKey, [
            'type' => $type,
            'title' => $title,
            'text' => $text,
        ]);
    }

    /**
     * Создаем сообщение статически
     *
     * @param $text
     * @param string $type
     * @param null $title
     * @param null $icon
     * @return ElasticLogger
     * @throws WrongParametersException
     */
    public static function create($text, $type = 'info', $title = null, $icon = null)
    {
        return new ElasticLogger(trim($text), $type, trim($title) ?: null, trim($icon) ?: null);
    }

    /**
     * Хелпер для ошибки
     *
     * @param $text
     * @param null $title
     * @return ElasticLogger
     * @throws WrongParametersException
     */
    public static function danger($text, $title = null)
    {
        return new ElasticLogger(trim($text), 'danger', trim($title) ?: null, 'error');
    }

    /**
     * Хелпер для успешного сообщения
     *
     * @param $text
     * @param null $title
     * @return ElasticLogger
     * @throws WrongParametersException
     */
    public static function success($text, $title = null)
    {
        return new ElasticLogger(trim($text), 'success', trim($title) ?: null, 'success');
    }

    /**
     * Хелпер для информационного сообщения
     *
     * @param $text
     * @param null $title
     * @return ElasticLogger
     */
    public static function info($text, $title = null)
    {
        return new ElasticLogger(trim($text), 'info', trim($title) ?: null, 'info');
    }

    /**
     * Хелпер для предупреждения
     *
     * @param $text
     * @param null $title
     * @return ElasticLogger
     * @throws WrongParametersException
     */
    public static function warning($text, $title = null)
    {
        return new ElasticLogger(trim($text), 'warning', trim($title) ?: null, 'warning');
    }

    /**
     * Хелпер для сообщения после создания данных
     *
     * @param bool $success
     * @return ElasticLogger
     * @throws WrongParametersException
     */
    public static function afterCreating($success = true)
    {
        if ($success === true) {
            return static::success('Запись успешно создана');
        }
        return static::danger('Запись не была создана. Пожалуйста, повторите попытку');
    }

    /**
     * Хелпер для сообщения после обновления данных
     * @param bool $success
     * @return ElasticLogger
     */
    public static function afterUpdating($success = true)
    {
        if ($success === true) {
            return static::success('Запись успешно обновлена');
        }
        return static::danger('Запись не была обновлена. Пожалуйста, повторите попытку');
    }

    /**
     * Хелпер для сообщения после удаления данных
     * @param bool $success
     * @return ElasticLogger
     */
    public static function afterDeleting($success = true)
    {
        if ($success === true) {
            return static::success('Запись была успешно удалена');
        }
        return static::danger('Запись не была удалена. Пожалуйста, повторите попытку');
    }
}
