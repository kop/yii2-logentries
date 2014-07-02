<?php

namespace kop\y2le;

use Monolog\Handler\LogEntriesHandler;
use Monolog\Logger;
use yii\base\InvalidCallException;
use yii\log\Logger as YiiLogger;
use yii\log\Target;

/**
 * LogentriesTarget sends log messages to the [Logentries log management service](https://logentries.com/).
 *
 * The log destination is specified via [[logToken]] property. Please refer to
 * [Logentries docs for PHP applications](https://logentries.com/doc/php/) for more details.
 *
 * @link      http://kop.github.io/yii2-logentries Y2LE project page.
 * @license   https://github.com/kop/yii2-logentries/blob/master/LICENSE.md MIT
 *
 * @author    Ivan Koptiev <ikoptev@gmail.com>
 * @version   1.0.0
 */
class LogentriesTarget extends Target
{
    /**
     * @var string $accessToken Logentries log token.
     * @see https://logentries.com/doc/php/
     */
    public $logToken;

    /**
     * @var array $_monologLevels Monolog messages levels.
     */
    private $_monologLevels = [
        YiiLogger::LEVEL_TRACE => Logger::INFO,
        YiiLogger::LEVEL_INFO => Logger::INFO,
        YiiLogger::LEVEL_WARNING => Logger::WARNING,
        YiiLogger::LEVEL_ERROR => Logger::ERROR
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Make sure log token is given
        if (empty($this->logToken)) {
            $className = get_class($this);
            throw new InvalidCallException("{$className} requires \"\$logToken\" attribute to be set.");
        }
    }

    /**
     * Writes log messages to a LogEntriesHandler Monolog handler.
     */
    public function export()
    {
        $monolog = new Logger('Logentries');
        $monolog->pushHandler(new LogEntriesHandler($this->logToken));

        foreach ($this->messages as $message) {
            if (array_key_exists($message[1], $this->_monologLevels)) {
                $monolog->addRecord($this->_monologLevels[$message[1]], $this->formatMessage($message), $message[4]);
            }
        }
    }
}