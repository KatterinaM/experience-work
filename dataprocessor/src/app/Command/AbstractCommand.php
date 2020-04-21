<?php


namespace App\Command;

use Ahc\Cli\Input\Command;
use App\Application;
use App\Entity\Queue\QueueJob;
use App\Helper\Cli\OutputHelper;

/**
 * Class AbstractCommand
 * @package App\Command
 */
abstract class AbstractCommand extends Command
{
    /**
     * @inheritDoc
     */
    public function showHelp()
    {
        $io     = $this->io();
        $helper = new OutputHelper($io->writer());

        $io->bold("Command {$this->_name}, version {$this->_version}", true)->eol();
        $io->comment($this->_desc, true)->eol();
        $io->bold('Usage: ')->yellow("{$this->_name} [OPTIONS...] [ARGUMENTS...]", true);

        $helper
            ->showArgumentsHelp($this->allArguments())
            ->showOptionsHelp($this->allOptions(), '', 'Legend: <required> [optional] variadic...');

        if ($this->_usage) {
            $io->eol();
            $io->boldGreen('Usage Examples:', true)->colors($this->_usage)->eol();
        }

        return $this->emit('_exit', 0);
    }

    /**
     * Return application object
     * @return Application
     */
    public function app(): ?Application
    {
        /** @var Application $app */
        $app = parent::app();
        return $app;
    }

    /**
     * Execute command on invocation
     * @param $args
     * @return mixed
     */
    public function __invoke($args)
    {
        if (is_array($args) || is_object($args)) {
            // Check if we got queue job
            if ($args instanceof QueueJob) {
                $args = $args->data;
            }

            // Convert $args to sequential arguments
            if (is_array($args)) {
                /** @var  array $args */
                $assocArgs = $args;
            } else {
                /** @var object $args */
                $assocArgs = get_object_vars($args);
            }

            $args = [];
            foreach ($this->allArguments() as $name => $definition) {
                /** @var QueueJob $args */
                $args[] = $assocArgs[$name];
            }
        }

        // Execute command
        return call_user_func([$this, 'execute'], ...$args);
    }
}
