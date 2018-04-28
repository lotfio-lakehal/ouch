<?php declare(strict_types=1);

/**
 * Ouch error handler for PHP
 *
 * @package     Ouch
 * @author      Lotfio Lakehal <lotfiolakehal@gmail.com>
 * @copyright   2018 Lotfio Lakehal
 * @license     MIT
 * @link        https://github.com/lotfio/ouch
 */

namespace Ouch\Core;

class Reporter
{
    /**
     * @var HandlersSetter
     */
    public $handler;

    /**
     * Recorder constructor.
     */
    public function __construct()
    {
        $this->handler = new HandlersSetter(new Handlers());
    }

    /**
     * enable ouch error handler
     *
     * @return $this
     */
    public function enable()
    {
        $this->handler->setErrorHandler();
        $this->handler->setExceptionHandler();
        $this->handler->setFatalHandler();
        return $this;
    }

    /**
     * disable ouch error handler
     * and restore default error handler
     *
     * @return void
     */
    public function disable()
    {
        $this->handler->restoreErrorHandler();
        $this->handler->restoreExceptionHandler();
    }

}