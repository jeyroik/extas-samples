<?php
namespace extas\components\plugins;

use extas\components\samples\Sample;
use extas\interfaces\samples\ISampleRepository;

/**
 * Class PluginInstallSamples
 *
 * @package extas\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallSamples extends PluginInstallDefault
{
    protected string $selfName = 'sample';
    protected string $selfSection = 'samples';
    protected string $selfUID = Sample::FIELD__NAME;
    protected string $selfItemClass = Sample::class;
    protected string $selfRepositoryClass = ISampleRepository::class;
}
